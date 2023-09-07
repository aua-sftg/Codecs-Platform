<?php

namespace App\Console\Commands;

use App\Models\Smartakis;
use Illuminate\Console\Command;
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

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Fetch datasets from the Smartakis API
        $apiUrl = 'https://smartakis.sftgroup.gr/api/technologies?paginate=1000';
        $client = new Client();
        $response = $client->get($apiUrl);

        // Check if successful response
        if ($response->getStatusCode() === 200) {
            $data = json_decode($response->getBody(), true);


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
                    Smartakis::insert($tool);

                }
            }

            $this->info(' datasets retrieved from Smartakis.');
            return Command::SUCCESS;
        } else {
            $this->error('Failed to fetch data from the API.');
        }

    }
}
