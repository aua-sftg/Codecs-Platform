<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use MongoDB\Client;
use App\Models\InvDuplicates;

class CheckInvDuplicates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mongodb:checktitles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check for similar titles in the meta-inventories MongoDB collections';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // MongoDB connection string
        $connectionString = env('DB_DSN');


        // Connect to the MongoDB
        $client = new Client($connectionString);

        // Select database
        $db_name = env('DB_DATABASE');
        settype($db_name, 'string');
        $db = $client->selectDatabase($db_name);

        // List of collection names to check
        $collectionsToCheck = ["fairshare", "desira", "smartakis"];

        $titles = [];

        foreach ($collectionsToCheck as $collectionName) {
            $collection = $db->selectCollection($collectionName);
            $datasets = $collection->find();

            foreach ($datasets as $document) {
                //Differentiate between title field in collections
                if($collectionName==='fairshare') {
                    $title = $document['name'] ?? null;
                }
                elseif ($collectionName==='smartakis') {
                    $title = $document['title'] ?? null;
                }
                else {
                    $title = $document['ToolName'] ?? null;
                }


                // Skip documents without a title
                if ($title) {
                    $titles[] = [
                        'collection' => $collectionName,
                        'title' => $title,
                        'id' => $document['_id']
                    ];
                }
            }
        }

        $similarTitles = [];
        $threshold = 80; // Minimum similarity threshold (adjust if needed)


        foreach ($titles as $title1Data) {
            $title1 = $title1Data['title'];
            $collection1 = $title1Data['collection'];
            $id1 = $title1Data['id'];

            $similarTitles["$collection1 - $title1 - $id1"] = [];

            foreach ($titles as $title2Data) {
                $title2 = $title2Data['title'];
                $collection2 = $title2Data['collection'];
                $id2 = $title2Data['id'];

                if ($collection1!==$collection2 && $this->calculateSimilarity($title1, $title2) >= $threshold &&  !$this->pairExistsInSimilarTitles($similarTitles, $collection1, $title1, $id1,  $collection2, $title2, $id2)) {
                    $similarTitles["$collection1 - $title1 - $id1"][] = "$collection2 - $title2 - $id2";
                }
            }
        }

        if (!empty($similarTitles)) {
            foreach ($similarTitles as $title => $similarTitleList) {
                if (!empty($similarTitleList)) {
                    $duplicates[] = ("{$title}: " . implode(', ', $similarTitleList));
                }
            }
            InvDuplicates::insert($duplicates);
            $this->info("Similar titles found");
        } else {
            $this->info("No similar titles found across collections");
        }
    }

    private function calculateSimilarity($string1, $string2)
    {
        similar_text($string1, $string2, $percent);
        return $percent;
    }

    private function pairExistsInSimilarTitles($similarTitles, $collection1, $title1, $id1, $collection2, $title2, $id2)
    {
        $key1 = "$collection1 - $title1 - $id1";
        $key2 = "$collection2 - $title2 - $id2";

        foreach ($similarTitles as $title => $similarTitleList) {
            if (in_array($key1, $similarTitleList) || in_array($key2, $similarTitleList)) {
                return true;
            }
        }

        return false;

    }
}
