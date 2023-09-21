<?php

namespace App\Http\Controllers;

use App\Models\Scenario;
use App\Models\Fairshare;
use App\Models\Smartakis;
use App\Models\Desira;
use Illuminate\Http\Request;

class MetaInventoryController extends Controller
{

    protected array $sourceModelMap = [
        'fairshare' => Fairshare::class,
        'smartakis' => Smartakis::class,
        'desira' => Desira::class,
    ];

    public function index(Scenario $scenario) {
        return view('components.metainventory.meta_inventory_list', compact('scenario'));
    }

    public function show($meta_inv_title, $meta_inv_id, $meta_inv_source) {
        $this->handleInventoryDataset($meta_inv_id, $meta_inv_source);
    }

    private function handleInventoryDataset($meta_inv_id, $meta_inv_source) {
        $modelClass = $this->getModelClass($meta_inv_source);

        if ($modelClass) {
            $dataset = $modelClass::find($meta_inv_id);

            if ($dataset) {
                dd($dataset);
                //return view('fairshare.show', ['dataset' => $dataset]);
            }
        }

        abort(404);
    }

    private function getModelClass($meta_inv_source)
    {
        return $this->sourceModelMap[$meta_inv_source] ?? null;
    }
}
