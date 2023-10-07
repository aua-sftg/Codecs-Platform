<?php

namespace App\Console\Commands;

use App\Models\Smartakis;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;


class CrawlSmartakis extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:smartakis';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieve Smartakis datasets using the API\'s get technologies function ';

    private Collection|null $db_ids = null;

    private const PAGINATION_SIZE = 1000;

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Fetch datasets from the Smartakis API
        $apiUrl = 'https://smartakis.sftgroup.gr/api/technologies?paginate='.self::PAGINATION_SIZE;
        $client = new Client();
        $response = $client->get($apiUrl);

        // Check if successful response
        if ($response->getStatusCode() === 200) {
            $data = json_decode($response->getBody(), true);


            try {
                if (!empty($data) && is_array($data['data'])) {
                    foreach ($data['data'] as $page) {
                        $tool = $page['response'];
//                    print_r($tool);
                        //Rename id field
                        if (isset($tool['id'])) {
                            $tool['smartakis_id'] = $tool['id'];
                            unset($tool['id']);
                        }
                        $tool['createdAt'] = now()->toDateTimeString();
                        $tool['updatedAt'] = now()->toDateTimeString();
                        $tool = array_merge(['smartakis_id' => $tool['smartakis_id'],'createdAt' => $tool['createdAt'], 'updatedAt' => $tool['updatedAt']], $tool);

                        if($this->recordExists($tool['smartakis_id'])){
                            dump("Smartakis ID: {$tool['smartakis_id']} will be updated");
                            Smartakis::where('smartakis_id',$tool['smartakis_id'])->update($tool);
                        }else {
                            dump("Smartakis ID: {$tool['smartakis_id']} will be inserted");
                            Smartakis::insert($tool);
                        }

                    }
                }

            }catch (\Exception $e) {
                dump($e->getMessage());
            }

            $this->info(' datasets retrieved from Smartakis.');
            return Command::SUCCESS;
        } else {
            $this->error('Failed to fetch data from the API.');
        }

    }

    private function recordExists($id): bool
    {
        if ($this->db_ids==null) {
            $this->db_ids = Smartakis::all()->pluck('smartakis_id');
        }

        return $this->db_ids->contains($id);
    }
}
