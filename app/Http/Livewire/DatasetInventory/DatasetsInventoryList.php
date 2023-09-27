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
    public $dataFilters;
    public $currentPage = 1;
    public $perPage = 20;

    public $startPage;
    public $endPage;

    public $queryString = ['currentPage'];

    protected $listeners = ['searchParam' => 'searchParam', 'dataFilters' => 'dataFilters'];


    public function render()
    {
        $datasets = DatasetHelper::get_datasets();

        // Apply search filter
        if($this->searchTerm!='') {
            $datasets = $datasets->filter(function ($dataset){

                return ((isset($dataset['name']) && stripos($dataset['name'], $this->searchTerm) !==false) ||
                    (isset($dataset['abstract']) && stripos($dataset['abstract'], $this->searchTerm) !==false) ||
                    (isset($dataset['description']) && stripos($dataset['description'], $this->searchTerm) !==false) ||
                    (isset($dataset['data_collection_method']) && stripos($dataset['data_collection_method'], $this->searchTerm) !==false));

            });
        }

        //Apply dataFilters
        if (!empty($this->dataFilters)) {
            $datasets = $datasets->filter(function ($dataset) {
                $showDataset = true;

                foreach ($this->dataFilters as $key => $values) {
                    if (!empty($values)) {
                        switch ($key) {
                            case 'sectors':
                                $sectors = $dataset->sector->pluck('name')->toArray();
                                $showDataset = count(
                                        array_intersect(
                                            $sectors, $values
                                        )
                                    ) > 0;

                                break;
                            case 'data_formats':
                                $data_formats = $dataset->data_formats->pluck('name')->toArray();
                                $showDataset = count(
                                        array_intersect(
                                            $data_formats, $values
                                        )
                                    ) > 0;

                                break;
                            case 'creators':
                                $organization = $dataset['organization']['name'];
                                $showDataset = in_array($organization, $values);
                                break;
                            case 'audiences':
                                $audiences = $dataset->audiences->pluck('name')->toArray();
                                $showDataset = count(
                                        array_intersect(
                                            $audiences, $values
                                        )
                                    ) > 0;

                                break;
                        }
                    }
                }

                return $showDataset;
            });
        }


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

    public function dataFilters($dataFilters) {
        $this->dataFilters = $dataFilters;
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

