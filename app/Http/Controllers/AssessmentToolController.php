<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssessmentToolController extends Controller
{
    public function index() {
        return view('assessmenttools.assessment_tools_list');
    }
}
