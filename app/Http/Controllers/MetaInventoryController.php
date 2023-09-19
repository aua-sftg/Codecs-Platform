<?php

namespace App\Http\Controllers;

use App\Models\Scenario;
use Illuminate\Http\Request;

class MetaInventoryController extends Controller
{
    public function index(Scenario $scenario) {
        return view('components.metainventory.meta_inventory_list', compact('scenario'));
    }
}
