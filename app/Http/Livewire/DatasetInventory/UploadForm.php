<?php

namespace App\Http\Livewire\DatasetInventory;

use App\Logic\DatasetHelper;
use App\Logic\KeywordHelper;
use App\Logic\SectorHelper;
use App\Logic\Status;
use App\Models\Dataset;
use Livewire\Component;
use Livewire\WithFileUploads;
use PHPMailer\PHPMailer\Exception;

class UploadForm extends Component
{
    use WithFileUploads;

    public array $data ;
    public string $form_data_attribute_name = 'data';
    public int $current_step = 1;
    public bool $has_previous = false;
    public bool $has_next = true;

    public function mount()
    {
        $this->data = [];
    }

    public function save_draft()
    {
        $this->save(true);
    }

    public function next_step():void
    {
        $this->current_step++;
        $max_steps = DatasetHelper::stepped_fields()->keys()->count();
        $this->has_next=$max_steps>$this->current_step;
        $this->has_previous = true;
    }
    public function prev_step():void
    {
        $this->current_step--;
        $this->has_previous= $this->current_step>1;
        $this->has_next = true;
    }

    public function save($draft=false):void
    {
        try {
            \DB::beginTransaction();

            $this->validate_all($draft);

            $newDataset = Dataset::create(
                array_merge(
                    collect($this->data)
                        ->except(
                            DatasetHelper::fields()
                                ->where('exclude_from_form_save', '=', true)
                                ->pluck('name')
                                ->toArray()
                        )->toArray(),
                    [
                        'uploaded_by'=>auth()->user()->id,
                    ]
                )
            );


            $newDataset->data_formats()->sync($this->data['data_formats']??[]);
            $newDataset->audiences()->sync($this->data['audiences']??[]);

            $newDataset->sector()->sync(
                SectorHelper::getSectorIDS(
                    $this->data['sector']??[]
                )
            );

            $newDataset->keywords()->sync(
                KeywordHelper::getKeywordIDS(
                    $this->data['keywords']??[]
                )
            );

            if(isset($this->data['file']))
            {
                $filename = time().'-'.$this->data['file']->getClientOriginalName().'.'.$this->data['file']->extension();
                $this->data['file']->storePubliclyAs('',$filename,'datasets');
                $newDataset->update([
                    'file'=>$filename,
                ]);
            }

            \DB::commit();

            $this->redirect(route('datasets.index'));
        }catch (Exception $e)
        {
            \DB::rollBack();
            dump($e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.dataset-inventory.upload-form');
    }

    public function updateField($field_name, $field_value='')
    {
        $this->data[$field_name] = $field_value;
    }

    private function validate_all($draft=false)
    {
        //if its not draft mode make sure to validate the request fields
        if(!$draft)
        {
            $rules = collect(DatasetHelper::VALIDATION_RULES)->mapWithKeys(function($value,$key){
                return [
                    "{$this->form_data_attribute_name}.{$key}"=>$value,
                ];
            })->toArray();

            $this->validate($rules,[
                'required'=>'The field is required.'
            ]);
        }else{
            //draft mode so make sure it is listed so
            $this->data['status'] = Status::STATUS_DRAFT;
        }
    }
}
