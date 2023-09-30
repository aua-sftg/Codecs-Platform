<?php

namespace App\Http\Livewire\DatasetInventory;

use App\Logic\DatasetHelper;
use App\Logic\Toastr;
use App\Models\Dataset;
use App\Models\Favorite;
use App\Models\User;
use Dflydev\DotAccessData\Data;
use Livewire\Component;

class Archive extends Component
{

    protected $queryString = ['sort_by','status'];
    public string $sort_by = 'created_at';
    public string $status = '';
    public string|null $deleteID = null;
    public string $deleteName = '';


    public function render()
    {
        return view('livewire.dataset-inventory.archive',[
            'datasets'=>
                auth()->user()
                    ->datasets()
                    ->with(['keywords', 'organization'])
                    ->when($this->status != '', function ($query) {
                        return $query->where('status', $this->status);
                    })
                    ->orderBy($this->sort_by, $this->sort_by == 'created_at' ? 'desc' : 'asc')
                    ->get()
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
