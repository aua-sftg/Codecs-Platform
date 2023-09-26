<?php

namespace App\Http\Livewire\DatasetInventory;

use Livewire\Component;
use App\Logic\DatasetHelper;
use App\Models\Dataset;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Livewire\WithPagination;

class DatasetsInventoryList extends Component
{
    use WithPagination;

    public $searchTerm='';
    public $metaFilters;
    public $currentPage = 1;
    public $perPage = 20;

    public $startPage;
    public $endPage;

    public $queryString = ['currentPage'];

    protected $listeners = ['searchParam' => 'searchParam', 'metaFilters' => 'metaFilters'];


    public function render()
    {
        $datasets = DatasetHelper::get_datasets();

        // Apply search filter
        if($this->searchTerm!='') {
            $datasets = $datasets->filter(function ($dataset){

                return ((isset($dataset['name']) && stripos($dataset['name'], $this->searchTerm) !==false) ||
                    (isset($dataset['abstract']) && stripos($dataset['abstract'], $this->searchTerm) !==false) ||
                    (isset($dataset['ToolName']) && stripos($dataset['ToolName'], $this->searchTerm) !==false) ||
                    (isset($dataset['description']) && stripos($dataset['description'], $this->searchTerm) !==false) ||
                    (isset($dataset['data_collection_method']) && stripos($dataset['data_collection_method'], $this->searchTerm) !==false));

            });
        }

        //Apply metaFilters
//        if (!empty($this->metaFilters)) {
//            $datasets = $datasets->filter(function ($dataset) {
//                $showDataset = true;
//
//                foreach ($this->metaFilters as $key => $values) {
//                    if (!empty($values)) {
//                        switch ($key) {
//                            case 'sources':
//                                // Find the count of the common elements between selected sources($values) and the set of keys in the dataset array
//                                // E.g. $values=[fairshare_id] $dataset=[fairshare_id=>...]
//                                //Count of this intersect returns 1 which means that this dataset is from Fairshare collection (similarly for smartAKIS, Desira)
//                                $showDataset = count(
//                                        array_intersect(
//                                            $values, array_keys($dataset)
//                                        )
//                                    )>0;
//                                break;
//                            case 'countries':
//                                // Find the appropriate key for the dataset from the list of values['countries','country','CountriesUsed']
//                                $datasetCountries = array_intersect(
//                                    ['countries','country','CountriesUsed'], array_keys($dataset)
//                                );
//                                //If we found the datasets country key and at least one of the selected countries (values) intersects (exists) in the dataset value key show the dataset
//                                $showDataset = count($datasetCountries) == 1 && count(
//                                        array_intersect(
//                                            $dataset[current($datasetCountries)], $values
//                                        )
//                                    ) > 0;
//
//                                break;
//                        }
//                    }
//                }
//
//                return $showDataset;
//            });
//        }


        $perPage = $this->perPage;
        $filteredDatasets = $datasets->forPage($this->currentPage, $perPage);
        $total = $datasets->count();


        $paginatedResults = new LengthAwarePaginator(
            $filteredDatasets,
            $total,
            $perPage,
            $this->currentPage,
            [
                'path' => route('inventory_of_datasets'),
            ]
        );

        //I use this to only display up to 3 numbered button for choosing pages
        $this->startPage = max(1, $this->currentPage - 1);
        $this->endPage = min($this->startPage + 2, $paginatedResults->lastPage());


        return view('livewire.dataset-inventory.datasets-inventory-list', compact('paginatedResults'));

    }

    public function searchParam($searchTerm) {
        $searchTerm = trim($searchTerm);
        $this->searchTerm = $searchTerm;
    }

    public function metaFilters($metaFilters) {
        $this->metaFilters = $metaFilters;
    }

    public function gotoPage($page)
    {
        $this->currentPage = $page; // Update the Livewire component's currentPage property
    }

    public function nextPage()
    {
        $this->currentPage++; // Increment the currentPage
    }

    public function previousPage()
    {
        $this->currentPage--; // Decrement the currentPage
    }
}

