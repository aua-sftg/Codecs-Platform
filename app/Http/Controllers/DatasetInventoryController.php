<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Dataset;

class DatasetInventoryController extends Controller
{

    public function index() {
        return view('datasets.data_inventory_list');
    }

    public function show($data_inv_title, $data_inv_id) {

        $dataset = Dataset::findOrFail($data_inv_id);

        $keywords = $dataset['keywords']->map(function($keyword){
            return $keyword->name;
        })->toArray();

        $data_formats= $dataset['data_formats']->map(function ($data_format){
            return $data_format->name;
        })->toArray();

        if(isset($dataset['audiences'])){
            $audiences= $dataset['audiences']->map(function ($audience){
                return $audience->name;
            })->toArray();
        }
        else {
            $audiences=[];
        }


        $sectors= $dataset['sector']->map(function ($sector){
            return $sector->name;
        })->toArray();


        //Used for the seo of the page
        $meta = [
            'title' => $data_inv_title,
            'keywords' => $keywords,
            'description' => $dataset['abstract'] ?? $dataset['description'],
        ];

        // Check if 'keywords' is an array and convert it to a string if needed
        if (is_array($meta['keywords'])) {
            $meta['keywords'] = implode(', ', $meta['keywords']);
        }

        return view('datasets.dataset_inventory_detailed', compact('dataset', 'meta','keywords','data_formats','audiences','sectors'));
    }

}
