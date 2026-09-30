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


        $keywords = $dataset->keywords->pluck('name');

        $data_formats= $dataset->data_formats->pluck('name');

        if(isset($dataset['audiences'])){
            $audiences = $dataset->audiences->pluck('name');
        }
        else {
            $audiences=[];
        }

        $sectors= $dataset->sector->pluck('name');


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
