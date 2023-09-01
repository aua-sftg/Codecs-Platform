<?php

namespace App\Logic;

use App\Models\Desira;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DesiraCrawler
{
    private int $from, $to;
    private string $url = 'https://desira-apps.madgik.di.uoa.gr/kbtbe/indexedtools/getTool?id=%s';
    private const CHUNK_SIZE = 80; // The number of records to insert in a single query.

    /**
     * DesiraCrawler constructor.
     *
     * @param int $from - The starting point for the crawler.
     * @param int $to   - The ending point for the crawler.
     */
    public function __construct(int $from, int $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * Run the crawler and fetch the data.
     */
    public function run(): void
    {
        $dataChunk = [];
        foreach (range($this->from, $this->to) as $id) {
            dump('crawling id: ' . $id .'/'. $this->to);
            $data = $this->crawl($id);
            if ($data) {
                $dataChunk[] = $data;

                if (count($dataChunk) === self::CHUNK_SIZE) {
                    Desira::insert($dataChunk);
                    $dataChunk = [];
                }
            }
            dump('sleeping for 1 second');
            sleep(0.6);
        }

        if (!empty($dataChunk)) {
            Desira::insert($dataChunk);
        }
    }

    /**
     * Crawl a specific ID and return the transformed data.
     *
     * @param int $id - The ID to crawl.
     * @return array|null - Returns the transformed data or null.
     */
    public function crawl(int $id): ?array
    {
        $url = sprintf($this->url, $id);
        $original_response = file_get_contents($url);
        $response = json_decode($original_response, true);

        if (!isset($response['error']) && count($response['responseData']) > 0) {
            $transformed_data = $this->transformDataForDB($response['responseData'], $id);
            Storage::put("desira/{$id}.json", $original_response);
            Storage::put("desira/{$id}-transformed.json", json_encode($transformed_data));
            return $transformed_data;
        }

        return null;
    }

    /**
     * Transform the raw data from the API into a format suitable for the DB.
     *
     * @param array $data       - The raw data to be transformed.
     * @param int   $desired_id - The desired ID for the data.
     * @return array - The transformed data.
     */
    public function transformDataForDB(array $data, int $desired_id): ?array
    {
        try {
            $simplified_data = [
                'DesiraID' => $desired_id,
                'created_at' => Carbon::now()->toDateString(),
                'updated_at' => Carbon::now()->toDateString()
            ];

            foreach ($data as $attribute) {
                $this->mapAttributeData($simplified_data, $attribute);
            }

            if (isset($data[0]['data']) && isset($data[0]['mappedAttributes'])) {
                $this->mapDomainData($simplified_data, $data);
            }

            return $simplified_data;

        } catch (\Exception $e) {
            // Log the exception instead of dying
            Log::error('Error processing data for ID ' . $desired_id . ': ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Map the attribute data to the appropriate fields.
     *
     * @param array $simplified_data - The data array being built.
     * @param array $attribute       - The attribute data to map.
     */
    private function mapAttributeData(&$simplified_data, $attribute): void
    {
        switch ($attribute['attribute']) {
            case 'toolDetails':
                $this->setDataIfExists($simplified_data, 'ToolName', $attribute['data'], 'name');
                $this->setDataIfExists($simplified_data, 'Description', $attribute['data'], 'intendedOutcome');
                $this->setDataIfExists($simplified_data, 'URL', $attribute['data'], 'url');
                break;

            case 'digitalTechnologies':
            case 'countries':
                $values = array_column($attribute['data'], 'value');
                $simplified_data[$attribute['attribute'] == 'digitalTechnologies' ? 'Technology' : 'CountriesUsed'] = count($values) == 1 ? [$values[0]] : $values;
                break;

            case 'physicalDigitalConnections':
                $connections = array_column($attribute['data'], 'comment');
                $simplified_data['Connection'] = count($connections) == 1 ? [$connections[0]] : $connections;
                break;

            case 'usedBy':
                $simplified_data['Users'] = $attribute['data'];
                break;

            case 'achievedOutcome':
                $simplified_data['AchievedOutcome'] = $attribute['data'];
                break;

            case 'toolMaturityLevel':
                $simplified_data['MaturityLevel'] = $attribute['data'];
                break;

            case 'requiresInternet':
            case 'isDataCollectedFromUsers':
                $simplified_data[$attribute['attribute'] == 'requiresInternet' ? 'RequiresInternet' : 'CollectsUserData'] = $attribute['data'] ? "Yes" : "No";
                break;

            case 'digitalTechUsage':
                $simplified_data['DigitalTechUsage'] = strpos($attribute['data'], ',') !== false ? array_map('trim', explode(',', $attribute['data'])) : [$attribute['data']];
                break;

            case 'sensitiveDataUsage':
                $simplified_data['UsesSensitiveData'] = $attribute['data']??null;
                break;

            case 'countryRegions':
                $simplified_data['CountryRegions'] = $attribute['data']??null;
                break;

            case 'humanWorkReplacementExtent':
                $simplified_data['HumanWorkReplacementExtent'] = $attribute['data']??null;
                break;

            case 'humanToolInteractions':
                $simplified_data['HumanToolInteractions'] = $attribute['data']??null;
                break;

            case 'dateAdded':
                $simplified_data['DateAddedTimestamp'] = $attribute['data']??null;
                break;

            case 'keywords':
                $keywordList = [];
                foreach ($attribute['data'] as $keyword) {
                    $keywordList[] = $keyword['value'];
                }
                $simplified_data['Keywords'] = $keywordList;
                break;

        }
    }

    /**
     * Set a value in the array if the key exists in the data.
     *
     * @param array  $array   - The destination array.
     * @param string $key     - The key to set.
     * @param array  $data    - The source data array.
     * @param string $dataKey - The key in the source data.
     */
    private function setDataIfExists(&$array, $key, $data, $dataKey): void
    {
        if (isset($data[$dataKey])) {
            $array[$key] = $data[$dataKey];
        }
    }

    /**
     * Map the domain data to the appropriate fields.
     *
     * @param array $simplified_data - The data array being built.
     * @param array $data            - The domain data to map.
     */
    private function mapDomainData(&$simplified_data, $data): void
    {
        $domainData = reset($data[0]['data']);  // Get the first domain data
        $subdomainId = key($domainData);
        $applicationScenarios = array_map(function ($scenarioId) use ($data) {
            return $data[0]['mappedAttributes'][$scenarioId];
        }, $domainData[$subdomainId]);

        $simplified_data['Domain'] = $data[0]['mappedAttributes'][key($data[0]['data'])];
        $simplified_data['Subdomain'] = $data[0]['mappedAttributes'][$subdomainId];
        $simplified_data['ApplicationScenarios'] = $applicationScenarios;
    }
}
