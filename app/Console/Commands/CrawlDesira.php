<?php

namespace App\Console\Commands;

use App\Logic\DesiraCrawler;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class CrawlDesira extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:desira {id_range : The ids to crawl separated by - i.e. 1-10}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crawl desira platform. Pass id range to craw i.e. 1-40 and it will crawl incrementally';


    private int $from_id, $to_id;

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->parseArguments();
        $crawler = new DesiraCrawler($this->from_id, $this->to_id);
        $crawler->run();

        return Command::SUCCESS;
    }

    /**
     * Parses the 'id_range' argument to extract the starting and ending IDs.
     *
     * The 'id_range' is expected to be in the format 'X-Y', where X is the starting ID
     * and Y is the ending ID. Both X and Y should be integers.
     *
     * - If only X is provided (e.g., '10-'), then both from_id and to_id will be set to X.
     * - If both X and Y are provided, from_id will be set to X and to_id will be set to Y.
     * - If the format is incorrect or the starting ID is greater than the ending ID,
     *   the method will throw an InvalidArgumentException.
     *
     * @throws \Exception if 'id_range' is not provided or has an incorrect format.
     * @return void
     */
    private function parseArguments():void
    {
        $idRange = $this->argument('id_range');

        if (!$idRange) {
            throw new \Exception("The id_range argument is required and must be in the format X-Y.");
        }

        $range = explode('-', $idRange);

        $this->from_id = isset($range[0]) ? (int) $range[0] : 0;
        $this->to_id = isset($range[1]) ? (int) $range[1] : $this->from_id;

        if ($this->from_id > $this->to_id) {
            throw new \Exception("The starting ID should be less than or equal to the ending ID.");
        }
    }
}
