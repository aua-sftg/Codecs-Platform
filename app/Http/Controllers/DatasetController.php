<?php

namespace App\Http\Controllers;

use App\Logic\DatasetHelper;
use App\Logic\KeywordHelper;
use App\Logic\PermissionHelper;
use App\Logic\SectorHelper;
use App\Logic\Status;
use App\Logic\Toastr;
use App\Models\Dataset;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use PHPMailer\PHPMailer\Exception;

class DatasetController extends Controller
{
    public function index(Request $request)
    {
        if(Gate::forUser($request->user())->denies(PermissionHelper::PERMISSION_UPLOAD_DATASETS))
        {
            abort(403);
        }
        return view('datasets.index');
    }

    public function form(Request $request)
    {
        if(Gate::forUser($request->user())->denies(PermissionHelper::PERMISSION_UPLOAD_DATASETS))
        {
            abort(403);
        }
        return view('datasets.form');
    }

    public function edit(Dataset $dataset, Request $request)
    {
        if(Gate::forUser($request->user())->denies(PermissionHelper::PERMISSION_UPLOAD_DATASETS))
        {
            abort(403);
        }

        if($request->user()->id !== $dataset->uploaded_by)
        {
            Toastr::error('You do not have permission to edit this dataset');
            return redirect()->route('datasets.index');
        }

        return view('datasets.form',['dataset'=>$dataset]);
    }

    public function save(Request $request)
    {

        if(Gate::forUser($request->user())->denies(PermissionHelper::PERMISSION_UPLOAD_DATASETS))
        {
            abort(403);
        }
        /**
         * @todo move this to a service class and authorize this request
         */


        try {
            DB::beginTransaction();

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
            $dataset->update(['dataset_id'=>$dataset->id]);

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

            Toastr::success('Dataset saved');
            \DB::commit();
            return redirect()->route('datasets.index');
        }catch (Exception $e)
        {
            \DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
