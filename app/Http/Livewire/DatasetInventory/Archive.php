<?php

namespace App\Http\Livewire\DatasetInventory;

use App\Logic\Toastr;
use App\Models\Dataset;
use App\Models\User;
use Livewire\Component;

class Archive extends Component
{

    protected $queryString = ['sort_by'];
    public string $sort_by = 'created_at';
    public string|null $deleteID = null;
    public string $deleteName = '';


    public function render()
    {
        $datasets = auth()
            ->user()
            ->datasets()
            ->with(['keywords','organization'])
            ->get();

        return view('livewire.dataset-inventory.archive',[
            'datasets'=> $this->sort_by=='created_at'
                ? $datasets->sortByDesc($this->sort_by,)
                : $datasets->sortBy($this->sort_by)
        ]);
    }

    public function confirm_delete($id, $deleteName):void
    {
        $this->deleteID = $id;
        $this->deleteName = $deleteName;
        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function cancel_delete()
    {
        $this->deleteID = null;
        $this->dispatchBrowserEvent('hide-delete-modal');
    }

    public function perform_delete()
    {
        Dataset::find($this->deleteID)->delete();
        $this->cancel_delete();
        $this->dispatchBrowserEvent('toastr',[
            'type'=>'success',
            'message'=>'Dataset deleted successfully.'
        ]);
    }
}
