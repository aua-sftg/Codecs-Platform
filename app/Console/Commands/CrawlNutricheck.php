<?php

namespace App\Console\Commands;

use App\Models\Nutricheck;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;

class CrawlNutricheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:nutricheck';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieve Nutricheck datasets using the API\'s get technologies function ';

    private Collection|null $db_ids = null;

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Fetch datasets from the Nutricheck API
        $apiUrl = 'https://platform.nutri-checknet.eu/api/tools-services';
        $client = new Client();
        $response = $client->get($apiUrl);

        // Check if successful response
        if ($response->getStatusCode() === 200) {
            $data = json_decode($response->getBody(), true);

            // Language mapping array
            $languageMapping = [
                1 => 'English',
                2 => 'Estonian',
                3 => 'Greek',
                4 => 'Lithuanian',
                5 => 'Dutch/Flemish',
                6 => 'Danish',
                7 => 'Polish',
                8 => 'German',
                9 => 'Spanish',
                10 => 'Slovenian',
                11 => 'Slovak',
                12 => 'Romanian',
                13 => 'Italian',
                14 => 'Irish',
                15 => 'Hungarian',
                16 => 'French',
                17 => 'Czech',
                18 => 'Croatian',
                19 => 'Bulgarian',
                20 => 'Bosnian',
                21 => 'Austrian',
                22 => 'Macedonian',
                23 => 'Portuguese',
                24 => 'Serbian',
                25 => 'Ukrainian',
            ];

            // TRL mapping array
            $trlMapping = [
                1 => 'TRL 8 – System complete and qualified',
                2 => 'TRL 5 – Technology validated in relevant environment',
                3 => 'TRL 9 – Actual system proven in operational environment',
                4 => 'TRL 3 – Experimental proof of concept',
                5 => 'TRL 7 – System prototype demonstration in operational environment',
                6 => 'TRL 1 – Basic principles observed',
                7 => 'TRL 6 – Technology demonstrated in relevant environment',
                8 => 'TRL 4 – Technology validated in lab',
                9 => 'TRL 2 – Technology concept formulated',
            ];

            try {
                if (!empty($data) && is_array($data)) {
                    foreach ($data as $item) {
                        $tool = [
                            'nutricheck_id' => $item['id'],
                            'name' =>  $item['name_en'] ?? $item['name']['en'] ?? null,
                            'license' => $item['license'] ?? null,
                            'url' => $item['url'] ?? null,
                            'language' => $languageMapping[$item['language_id']] ?? 'Unknown',
                            'available_in_other_languages' => $item['available_in_other_languages'] ?? null,
                            'description' => $item['description']['en'] ?? null,
                            'freq_of_assessments' => $item['freq_of_assessments']['en'] ?? null,
                            'manufacturer' => $item['manufacturer']['name']['en'] ?? null, // Extract manufacturer name
                            'trl_level' => $trlMapping[$item['trl_level_id']] ?? 'Unknown', // Extract TRL level description
  
                        ];
                         // Process additional languages if available_in_other_languages is 1
                        if ($item['available_in_other_languages'] == 1 && !empty($item['languages'])) {
                            $additionalLanguages = [];
                            foreach ($item['languages'] as $language) {
                                $additionalLanguages[] = $language['name']['en'] ?? 'Unknown';
                            }
                            $tool['additional_languages'] = implode(', ', $additionalLanguages);
                        }

                        // Process countries
                        if (!empty($item['countries'])) {
                            $countries = [];
                            foreach ($item['countries'] as $country) {
                                $countries[] = $country['name']['en'] ?? 'Unknown';
                            }
                            $tool['countries'] = $countries; // Save as an array
                        }

                        // Process target audience
                        if (!empty($item['target_audience'])) {
                            if (isset($item['target_audience']['en'])) {
                                // Single target audience
                                $tool['target_audience'] = $item['target_audience']['en'] ?? 'Unknown';
                            } else {
                                // Multiple target audiences
                                $targetAudience = [];
                                foreach ($item['target_audience'] as $audience) {
                                    $targetAudience[] = $audience['en'] ?? 'Unknown';
                                }
                                $tool['target_audience'] = implode(', ', $targetAudience);
                            }
                        }

                        // Process manufacturers
                        if (!empty($item['manufacturers'])) {
                            $manufacturers = [];
                            foreach ($item['manufacturers'] as $manufacturer) {
                                $manufacturers[] = $manufacturer['name']['en'] ?? 'Unknown';
                            }
                            $tool['manufacturer'] = implode(', ', $manufacturers);
                        }

                        // Process crop types
                        if (!empty($item['crop_types'])) {
                            $cropTypes = [];
                            foreach ($item['crop_types'] as $cropType) {
                                $cropTypes[] = $cropType['name']['en'] ?? 'Unknown';
                            }
                            $tool['crop_types'] = implode(', ', $cropTypes);
                        }

                        // Process tool types
                        if (!empty($item['tool_type'])) {
                            if (isset($item['tool_type']['name'])) {
                                // Single tool type
                                $tool['tool_type'] = $item['tool_type']['name']['en'] ?? 'Unknown';
                            } else {
                                // Multiple tool types
                                $toolTypes = [];
                                foreach ($item['tool_type'] as $toolType) {
                                    $toolTypes[] = $toolType['name']['en'] ?? 'Unknown';
                                }
                                $tool['tool_type'] = implode(', ', $toolTypes);
                            }
                        }

                        $tool['createdAt'] = now()->toDateTimeString();
                        $tool['updatedAt'] = now()->toDateTimeString();
                        $tool = array_merge(['nutricheck_id' => $tool['nutricheck_id'],'createdAt' => $tool['createdAt'], 'updatedAt' => $tool['updatedAt']], $tool);  
                        
                        $processedData[] = $tool;

                        if($this->recordExists($tool['nutricheck_id'])){
                            dump("Nutricheck ID: {$tool['nutricheck_id']} will be updated");
                            Nutricheck::where('nutricheck_id',$tool['nutricheck_id'])->update($tool);
                        }else {
                            dump("Nutricheck ID: {$tool['nutricheck_id']} will be inserted");
                            Nutricheck::insert($tool);
                        }

                    }

                }

            }catch (\Exception $e) {
                dump($e->getMessage());
            }

            // Write the processed data to a text file
            // file_put_contents(storage_path('app/nutricheck_final_data.txt'), print_r($processedData, true));

            $this->info(' datasets retrieved from Nutricheck.');
            return Command::SUCCESS;
        } else {
            $this->error('Failed to fetch data from the API.');
        }
    }

    private function recordExists($id): bool
    {
        if ($this->db_ids==null) {
            $this->db_ids = Nutricheck::all()->pluck('nutricheck_id');
        }

        return $this->db_ids->contains($id);
    }
}
