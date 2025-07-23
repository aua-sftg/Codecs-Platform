<?php

namespace App\Http\Controllers;

use App\Models\Scenario;
use App\Models\Fairshare;
use App\Models\Smartakis;
use App\Models\Desira;
use App\Models\Nutricheck;
use App\Models\IPMWorks;
use Illuminate\Http\Request;

class MetaInventoryController extends Controller
{

    protected array $sourceModelMap = [
        'fairshare' => Fairshare::class,
        'smartakis' => Smartakis::class,
        'desira' => Desira::class,
        'nutricheck' => Nutricheck::class,
        'ipmworks' => IPMWorks::class,
    ];

    public function index(Scenario $scenario) {
        return view('components.metainventory.meta_inventory_list', compact('scenario'));
    }

    public function ll_index() {
        return view('lldatasets.ll_datasets_list');
    }

    public function ll_show($meta_inv_title, $meta_inv_id) {
        $dataset = \App\Models\LLDataset::findOrFail($meta_inv_id);
        //Used for the seo of the page
        $meta = [
            'title' => $meta_inv_title,
            'keywords' => '',
            'description' => '',
            'source' => 'living_lab',
        ];
        $meta['keywords'] = $dataset['keywords'];
        $meta['description'] = $dataset['description'];

        return view('components.metainventory.meta_inventory_detailed', compact('dataset', 'meta'));
    }

    public function show($meta_inv_title, $meta_inv_id, $meta_inv_source) {
        $modelClass = $this->getModelClass($meta_inv_source);

        if (!$modelClass) {
            abort(404);
        }
        $dataset = $modelClass::findOrFail($meta_inv_id);
        //Used for the seo of the page
        $meta = [
            'title' => $meta_inv_title,
            'keywords' => '',
            'description' => '',
            'source' => $meta_inv_source,
        ];
        if ($meta_inv_source == 'fairshare') {
            $meta['keywords'] = $dataset['keywords'];
            $meta['description'] = $dataset['title'];
        }
        elseif ($meta_inv_source == 'smartakis') {
            $meta['keywords'] = $dataset['croppingSystem'];
            $meta['description'] = $dataset['shortDescription'];
        }
        elseif ($meta_inv_source == 'desira') {
            $meta['keywords'] = $dataset['Keywords'];
            $meta['description'] = $dataset['Description'];
        }
        elseif ($meta_inv_source == 'nutricheck') {
            $meta['keywords'] = [];
            $meta['description'] = $dataset['description'];
        }
        elseif ($meta_inv_source == 'ipmworks') {
            $meta['keywords'] = [];
            $meta['description'] = $dataset['description'];
        }
        // Check if 'keywords' is an array and convert it to a string if needed
        if (is_array($meta['keywords'])) {
            $meta['keywords'] = implode(', ', $meta['keywords']);
        }
        return view('components.metainventory.meta_inventory_detailed', compact('dataset', 'meta'));
    }


    private function getModelClass($meta_inv_source)
    {
        return $this->sourceModelMap[$meta_inv_source] ?? null;
    }
}
