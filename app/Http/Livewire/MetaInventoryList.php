<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Logic\ScenarioHelper;
use App\Models\Scenario;
use App\Logic\MetaInventory;
class MetaInventoryList extends Component
{
    public $scenario;
    public $searchTerm='';
    public $metaFilters;


    protected $listeners = ['searchParam' => 'searchParam', 'metaFilters' => 'metaFilters'];

    public function mount(Scenario $scenario)
    {
        $this->scenario = $scenario;
    }

    public function render()
    {
        $datasets = ScenarioHelper::get_results($this->scenario);

        // Apply search filter
        if($this->searchTerm!='') {
            $datasets = $datasets->filter(function ($dataset){

                return ((isset($dataset['name']) && stripos($dataset['name'], $this->searchTerm) !==false) ||
                    (isset($dataset['title']) && stripos($dataset['title'], $this->searchTerm) !==false) ||
                    (isset($dataset['ToolName']) && stripos($dataset['ToolName'], $this->searchTerm) !==false) ||
                    (isset($dataset['shortDescription']) && stripos($dataset['shortDescription'], $this->searchTerm) !==false) ||
                    (isset($dataset['Description']) && stripos($dataset['Description'], $this->searchTerm) !==false) ||
                    (isset($dataset['keywords']) && stripos($dataset['keywords'], $this->searchTerm) !==false) ||
                    (isset($dataset['croppingSystem'])  && in_array($this->searchTerm, $dataset['croppingSystem']) !==false) ||
                    (isset($dataset['Keywords']) && in_array($this->searchTerm, $dataset['Keywords']) !==false));

            });
        }

        //Apply metaFilters
        if (!empty($this->metaFilters)) {
            $datasets = $datasets->filter(function ($dataset) {
                $showDataset = true;

                foreach ($this->metaFilters as $key => $values) {
                    if (!empty($values)) {
                        switch ($key) {
                            case 'sources':
                                // Find the count of the common elements between selected sources($values) and the set of keys in the dataset array
                                // E.g. $values=[fairshare_id] $dataset=[fairshare_id=>...]
                                //Count of this intersect returns 1 which means that this dataset is from Fairshare collection (similarly for smartAKIS, Desira)
                                $showDataset = count(
                                    array_intersect(
                                        $values, array_keys($dataset)
                                    )
                                )>0;
                                break;
                            case 'countries':
                                // Find the appropriate key for the dataset from the list of values['countries','country','CountriesUsed']
                                $datasetCountries = array_intersect(
                                    ['countries','country','CountriesUsed'], array_keys($dataset)
                                );
                                //If we found the datasets country key and at least one of the selected countries (values) intersects (exists) in the dataset value key show the dataset
                                $showDataset = count($datasetCountries) == 1 && count(
                                        array_intersect(
                                            $dataset[current($datasetCountries)], $values
                                        )
                                    ) > 0;

                                break;
                        }
                    }
                }

                return $showDataset;
            });
        }

        $results = MetaInventory::results_transform($datasets);

        return view('livewire.meta-inventory-list', compact("results"));
    }

    public function searchParam($searchTerm) {
        $searchTerm = trim($searchTerm);
        $this->searchTerm = $searchTerm;
    }

    public function metaFilters($metaFilters) {
        $this->metaFilters = $metaFilters;
    }
}
