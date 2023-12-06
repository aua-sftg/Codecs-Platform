<?php

namespace App\Http\Livewire;

use App\Models\Scenario;
use Livewire\Component;
use App\Logic\MetaInventoryFilterHelper;
use App\Logic\ScenarioHelper;

class MetaInventoryFilters extends Component
{
    protected $listeners = ['updateTotalCount' => 'updateTotalCount'];

    public $totalCount;
    public $scenario;
    public function mount(Scenario $scenario) {
        $this->scenario = $scenario;
        $this->totalCount = ScenarioHelper::get_results_count($this->scenario);
    }

    public function updateTotalCount($total)
    {
        $this->totalCount = $total;
        $this->dispatchBrowserEvent('updateTotalCount', ['totalCount' => $total]);
    }
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

    //Countries that we want to remove from the list (temporary)
    public array $countriesToRemove= ['African Countries','All Baltic States','All Europe','Central America','Europe','European Union','Latin America','Multiple countries'];

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
        $this->dispatchBrowserEvent('clear-checkboxes');
    }

    public function render()
    {
        $this->filterOptions['countries'] = MetaInventoryFilterHelper::getDistinctCountries($this->countriesToRemove);
        return view('livewire.meta-inventory-filters');
    }
}
