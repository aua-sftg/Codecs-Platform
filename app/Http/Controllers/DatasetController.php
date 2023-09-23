<?php

namespace App\Http\Controllers;

use App\Logic\DatasetHelper;
use App\Logic\KeywordHelper;
use App\Logic\SectorHelper;
use App\Models\Dataset;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\Exception;

class DatasetController extends Controller
{
    public function index()
    {
        return view('datasets.index');
    }

    public function form()
    {
        return view('datasets.form');
    }

    public function edit(Dataset $dataset)
    {
        return view('datasets.form',['dataset'=>$dataset]);
    }

    public function save(Request $request)
    {
        /**
         * @todo move this to a service class
         */

        try {
            \DB::beginTransaction();

            if($request->get('status',null) == 'published')
            {
                $request->validate(DatasetHelper::VALIDATION_RULES);
            }

            $dataset = $request->dataset_id
                ? Dataset::find($request->dataset_id)
                : new Dataset();

            $dataset->fill(array_merge(
                $request->except(
                    DatasetHelper::fields()
                        ->where('exclude_from_form_save', '=', true)
                        ->pluck('name')
                        ->toArray()
                ),
                [
                    'uploaded_by'=>auth()->user()->id,
                ]
            ));
            $dataset->save();

            $dataset->data_formats()->sync($request->get('data_formats',[]));
            $dataset->audiences()->sync($request->get('audiences',[]));

            $dataset->sector()->sync(
                SectorHelper::getSectorIDS(
                    $request->get('sector',[])
                )
            );

            $dataset->keywords()->sync(
                KeywordHelper::getKeywordIDS(
                    $request->get('keywords',[])
                )
            );

            if($request->file && $request->file->isValid())
            {
                $filename = time().'-'.$request->file->getClientOriginalName().'.'.$request->file->extension();
                $request->file->storePubliclyAs('',$filename,'datasets');
                $dataset->update([
                    'file'=>$filename,
                ]);
            }

            \DB::commit();
            return redirect()->route('datasets.index');
        }catch (Exception $e)
        {
            \DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
