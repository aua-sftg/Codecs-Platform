<?php

namespace App\Http\Livewire\DatasetInventory;

use Livewire\Component;
use App\Logic\DatasetInventoryFilterHelper;

class DatasetsInventoryFilters extends Component
{
    public array $filterOptions = [
        'sectors' => [],
        'data_formats'=> [],
        'creators'=>[],
        'audiences'=>[]
    ];

    public array $filters = [
        'sectors' => [],
        'data_formats'=> [],
        'creators'=>[],
        'audiences'=>[]
    ];


    public function toggleFilter($value,$key)
    {
        if (in_array($value, $this->filters[$key])) {
            $this->filters[$key] = array_diff($this->filters[$key], [$value]);
        } else {
            $this->filters[$key][] = $value;
        }
        $this->emit('dataFilters', $this->filters);

    }

    public function clearFilters()
    {
        // Reset all filters to their initial state
        $this->filters = [
            'sectors' => [],
            'data_formats'=> [],
            'creators'=>[],
            'audiences'=>[]
        ];

        // Emit the event to apply filters
        $this->emit('dataFilters', $this->filters);
        $this->dispatchBrowserEvent('clear-checkboxes');
    }

    public function render()
    {
        // TODO is there a reason to call the function separately?
        $this->filterOptions['sectors'] = DatasetInventoryFilterHelper::getDistinctValues('sectors', 'name');
        $this->filterOptions['data_formats'] = DatasetInventoryFilterHelper::getDistinctValues('data_formats', 'name');
        $this->filterOptions['creators'] = DatasetInventoryFilterHelper::getDistinctValues('organizations', 'name');
        $this->filterOptions['audiences'] = DatasetInventoryFilterHelper::getDistinctValues('audiences', 'name');
        return view('livewire.dataset-inventory.datasets-inventory-filters');
    }
}
