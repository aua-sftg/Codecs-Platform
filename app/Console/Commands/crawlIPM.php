<?php

namespace App\Console\Commands;

use App\Models\IPMWorks;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;

class crawlIPM extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:IPM';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieve IPWORKS datasets using the API\'s get technologies function ';

    private Collection|null $db_ids = null;

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Fetch datasets from the IPM API
        $apiUrl = 'https://ipmworks.net/ipmworks/resource/smartProtect';
        $client = new Client();
        $response = $client->get($apiUrl);

        // Check if successful response
        if ($response->getStatusCode() === 200) {
            $data = json_decode($response->getBody(), true);


            try {
                if (!empty($data) && is_array($data)) {

                    $excludedNames = [
                        "Dropleg Lechler",
                        "Pocket Diagnostic®",
                        "Attractant lures for seedcorn maggot (bean seed fly)",
                        "THRIPS-LURE",
                        "Predalure",
                        "Creative Diagnostics",
                        "Koppert Airbug",
                        "CleanLight field implements",
                        "Dropleg® Beluga",
                        "VERDAPROTECT - for aphid control in vegetables",
                        "PHEROCON®",
                        "STORGARD® Early-Warning Insect Monitoring System",
                        "Barrix Catch Vegetable fly trap",
                        "Barrix Catch Vegetable Fly Lure - C10",
                        "Brown Marmorated Stink Bug Trap",
                        "Biospreader",
                        "Chromotropic trap - Black Glue Roll Tuta+",
                        "Tutatec",
                        "Agdia - AmplifyRP AccelerR8",
                        "Agdia - AmplifyRP® XRT",
                        "Loopamp Realtime Turbidimeter (LA-500)",
                        "Wingsprayer",
                        "Cropsurfer™ / Släpduk™",
                        "Dubex Wave sprayers",
                        "Redball-Hooded sprayers",
                        "360 undercover",
                        "Dropleg Hardi",
                        "Biosense Laboratories",
                        "Trailed sprayer WHIRLWIND M612 \"ALBATROS\"",
                        "Plant Pathogen test Kits from Ephyra Biosciences Inc.",
                        "LOEWE - Plant Pathogen ELISA Kits",
                        "Nippon Gene LAMP products",
                        "Natutec Drive",
                        "Agdia - ImmunoStrip® Tests",
                        "LOEWE®FAST Lateral Flow Kits",
                        "LOEWE Molecular Diagnostics - DNA PCR kits",
                        "LOEWE Molecular Diagnostics - RNA PCR kits",
                        "BIOREBA - AgriStrip",
                        "BIOREBA - ELISA kits",
                        "PCR and qPCR tests powered by Qualiplante & BIOREBA",
                        "AlphaScents Traps",
                        "DAS-ELISA",
                        "PATHOSCREEN",
                        "4Disc - Streuix",
                        "Micron Herbiflex 4 - Handheld knapsack CDA sprayer for weed control",
                        "Micron Herbi 4 - Handheld knapsack CDA sprayer for weed control",
                        "Micron Herbidome 600 - Handheld knapsack shielded CDA sprayer for weed control",
                        "Micron Herbidome 350 - Shielded knapsack CDA sprayer for weed control",
                        "Micron Electrafan - Air-assisted CDA spinning disc sprayer",
                        "Micron Micromax - Rotary CDA atomiser for blanket applications for boom sprayers and ATVs",
                        "Ecological Dispensing System (EcoDis) adapted for boom mounting (by Ecobotix)"
                    ];

                    foreach ($data as $item) {
                        // Check if resourceName is not in the excluded names
                        if (!in_array($item['resourceName'], $excludedNames)) {
                            $tool = [
                                'ipm_id' => $item['idResource'],
                                'name' =>  $item['resourceName'] ?? null,
                                'description' => $item['description'] ?? null,
                                'url' => $item['resourceOrigin'] ?? null,
                                'license' => 'Unknown',    
                                'resource_type' => $item['resourceType']['name'] ?? null, // Extract resource type name
                                'institution' => $item['contactInstitution'] ?? null, // Extract institution name
                                'source_project' => $item['project'] ?? null,
                                'source_project_link' => $item['projectWeb'] ?? null,
                                'image_url' => 'https://ipmworks.net/ipmworks/resource/image/' . $item['idResource'], // Construct image URL
                                'language' => $item['language']['name'] ?? null, // Extract language name
                                'ipm_creation_date' => $item['creationDate'] ?? null,

                            ];
    
                            // Process links
                            if (!empty($item['links'])) {
                                $links = [];
                                foreach ($item['links'] as $link) {
                                    $links[] = $link['url'] ?? 'Unknown';
                                }
                                $tool['links'] = $links; // Save as an array
                            }

                            // Process sectors
                            if (!empty($item['sectors'])) {
                                $sectors = [];
                                foreach ($item['sectors'] as $sector) {
                                    $sectors[] = $sector['name'] ?? 'Unknown';
                                }
                                $tool['sectors'] = $sectors; // Save as an array
                            }

                            // Process regions
                            if (!empty($item['regions'])) {
                                $regions = [];
                                foreach ($item['regions'] as $region) {
                                    $regions[] = $region['name'] ?? 'Unknown';
                                }
                                $tool['regions'] = $regions; // Save as an array
                            }

                            // Process pests
                            if (!empty($item['pests'])) {
                                $pests = [];
                                foreach ($item['pests'] as $pest) {
                                    $pests[] = $pest['commonName'] ?? 'Unknown';
                                }
                                $tool['pests'] = $pests; // Save as an array
                            }

                            // Process crops
                            if (!empty($item['crops'])) {
                                $crops = [];
                                foreach ($item['crops'] as $crop) {
                                    $crops[] = $crop['commonName'] ?? 'Unknown';
                                }
                                $tool['crops'] = $crops; // Save as an array
                            }

                            // Process links
                            if (!empty($item['links'])) {
                                $links = [];
                                foreach ($item['links'] as $link) {
                                    $links[] = $link['url'] ?? 'Unknown';
                                }
                                $tool['links'] = $links; // Save as an array
                            }
    
                            $tool['createdAt'] = now()->toDateTimeString();
                            $tool['updatedAt'] = now()->toDateTimeString();
                            $tool = array_merge(['ipm_id' => $tool['ipm_id'],'createdAt' => $tool['createdAt'], 'updatedAt' => $tool['updatedAt']], $tool);  
                            
                            $processedData[] = $tool;
    
                            if($this->recordExists($tool['ipm_id'])){
                                dump("IPMWorks ID: {$tool['ipm_id']} will be updated");
                                IPMWorks::where('ipm_id',$tool['ipm_id'])->update($tool);
                            }else {
                                dump("IPMWorks ID: {$tool['ipm_id']} will be inserted");
                                IPMWorks::insert($tool);
                            }
                        }
                    }

                }

            }catch (\Exception $e) {
                dump($e->getMessage());
            }

            // Write the processed data to a text file
            // file_put_contents(storage_path('app/IPM_final_data.txt'), print_r($processedData, true));

            $this->info(' datasets retrieved from IPM.');
            return Command::SUCCESS;
        } else {
            $this->error('Failed to fetch data from the API.');
        }
    }

    private function recordExists($id): bool
    {
        if ($this->db_ids==null) {
            $this->db_ids = IPMWorks::all()->pluck(value: 'ipm_id');
        }

        return $this->db_ids->contains($id);
    }
}
