<?php

namespace App\Console\Commands;

use App\Models\Fairshare;
use Illuminate\Console\Command;
use GuzzleHttp\Client;


class CrawlFairshare extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:fairshare';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieve Fairshare DATS using the API\'s get Tools function ';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Fetch DATS from the Fairshare API
        $apiUrl = 'https://api.fairshare-pnf.eu/api/tools';
        $client = new Client();
        $response = $client->get($apiUrl);

        // Check if successful response
        if ($response->getStatusCode() === 200) {
            $data = json_decode($response->getBody(), true);
            //define unwanted fields
            $fieldsToRemove = ['usersNo','downloads','creator','__v'];

            if (!empty($data) && is_array($data['tools'])) {
                foreach ($data['tools'] as $tool) {
                    //Check if draft
                    if (!isset($tool['isDraft']) || (isset($tool['isDraft']) && $tool['isDraft']=="false")) {
                        //Remove unwanted fields
                        foreach ($fieldsToRemove as $field) {
                            unset($tool[$field]);
                        }
                        //Rename _id field
                        if (isset($tool['_id'])) {
                            $tool['fairshare_id'] = $tool['_id'];
                            unset($tool['_id']);
                        }
                        //Change Ukrania to Ukraine
                        if (isset($tool['countries']) && is_array($tool['countries']) && ($key = array_search("Ukrania", $tool['countries'])) !== false) {
                            $tool['countries'][$key] = "Ukraine";
                        }
                        $tool['createdAt'] = now()->toDateTimeString();
                        $tool['updatedAt'] = now()->toDateTimeString();
                        $tool = array_merge(['fairshare_id' => $tool['fairshare_id'],'createdAt' => $tool['createdAt'], 'updatedAt' => $tool['updatedAt']], $tool);
                        Fairshare::insert($tool);
                    }
                }
            }

            $this->info(count($data['tools']) . ' DATS fetched from Fairshare.');
            return Command::SUCCESS;
        } else {
            $this->error('Failed to fetch data from the API.');
        }

    }
}
