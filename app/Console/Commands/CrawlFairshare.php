<?php

namespace App\Console\Commands;

use App\Logic\MetaInventory;
use App\Models\Fairshare;
use App\Models\Favorite;
use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;


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

    private Collection|null $db_ids = null;

    private const INVENTORY_ID = 'fairshare_id';

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
                        if($this->recordExists($tool[self::INVENTORY_ID])){
                            $this->info('Record with id '.$tool[self::INVENTORY_ID].' will be updated');
                            Fairshare::where(self::INVENTORY_ID,$tool[self::INVENTORY_ID])->update($tool);
                        }else{
                            $this->info('Record with id '.$tool[self::INVENTORY_ID].' will be inserted');
                            Fairshare::insert($tool);
                        }
                    }else{
                        if($this->recordExists($tool['_id'])){
                            $this->info('Record with id '.$tool['_id'].' is draft and will removed from favorites');
                            //if is draft  and exists in the database update as draft
                            $this->info('Record with id '.$tool['_id'].' will be updated as draft');
                            Fairshare::where(self::INVENTORY_ID,$tool['_id'])->update(['isDraft'=>true]);
                            MetaInventory::removeFromFavorites('fairshare',$tool['_id']);
                        }
                    }
                }
            }

            $this->info(count($data['tools']) . ' DATS fetched from Fairshare.');
            return Command::SUCCESS;
        } else {
            $this->error('Failed to fetch data from the API.');
        }

    }

    public function recordExists($id): bool
    {
        if (!$this->db_ids) {
            $this->db_ids = Fairshare::all()->pluck(self::INVENTORY_ID);
        }

        return $this->db_ids->contains($id);
    }
}
