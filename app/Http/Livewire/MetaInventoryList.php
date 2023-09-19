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
    public $selectedFilters;
    public $filterFields;

    protected $listeners = ['searchParam' => 'searchParam', 'applyFilters' => 'applyFilters'];

    public function mount(Scenario $scenario)
    {
        $this->scenario = $scenario;
    }

    public function render()
    {
        $datasets = ScenarioHelper::get_results($this->scenario);

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
        $results = MetaInventory::results_transform($datasets);

        return view('livewire.meta-inventory-list', compact("results"));
    }

    public function searchParam($searchTerm) {
        $searchTerm = trim($searchTerm);
        $this->searchTerm = $searchTerm;
    }

    public function applyFilters($applyFilters) {
//        list($this->selectedFilters, $this->filterFields) = $applyFilters;
//        dd($this->selectedFilters);
    }
}
