<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VirtualTours;

class VirtualToursController extends Controller
{
    public function index() {
        return view('virtualtours.virtuals_tours_list');
    }

}
