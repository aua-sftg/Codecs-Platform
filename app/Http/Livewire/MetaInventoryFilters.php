<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Logic\MetaInventoryFilterHelper;

class MetaInventoryFilters extends Component
{

    public array $filterOptions = [
      'sources' => [
          ['value'=>'DesiraID', 'label'=>'Desira'],
          ['value'=>'fairshare_id', 'label'=>'Fairshare'],
          ['value'=>'smartakis_id', 'label'=>'smartAKIS']
      ],
      'countries'=> []
    ];

    public array $filters = [
        'sources' => [],
        'countries' => [],
    ];

    public function toggleFilter($value,$key)
    {
        if (in_array($value, $this->filters[$key])) {
            $this->filters[$key] = array_diff($this->filters[$key], [$value]);
        } else {
            $this->filters[$key][] = $value;
        }
        $this->emit('metaFilters', $this->filters);

    }

    public function clearFilters()
    {
        // Reset all filters to their initial state
        $this->filters = [
            'sources' => [],
            'countries' => [],
        ];

        // Emit the event to apply filters
        $this->emit('metaFilters', $this->filters);
    }

    public function render()
    {
        $this->filterOptions['countries'] = MetaInventoryFilterHelper::getDistinctCountries();
        return view('livewire.meta-inventory-filters');
    }
}
