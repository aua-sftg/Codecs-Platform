<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MetaInventoryFilters extends Component
{

    public array $filterOptions = [
      'sources' => ['Desira', 'Fairshare', 'smartAKIS'],
      'countries'=> ['Albania','Andorra','Austria','Belarus','Belgium','Bosnia and Herzegovina','Bulgaria','Croatia','Czech Republic',
                   'Denmark','Estonia','Finland','France','Germany','Greece','Hungary','Iceland','Ireland','Italy','Kosovo','Latvia','Liechtenstein',
                   'Lithuania','Luxembourg','North Macedonia','Malta','Moldova','Monaco','Montenegro','Netherlands','Norway','Poland','Portugal','Romania',
                   'Russia','San Marino','Serbia','Slovakia','Slovenia','Spain','Sweden','Switzerland','Ukraine','United Kingdom','Vatican City']
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
        dd($this->filters);

    }

    public function render()
    {
        return view('livewire.meta-inventory-filters');
    }
}
