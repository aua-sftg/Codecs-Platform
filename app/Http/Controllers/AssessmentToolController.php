<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssessmentTool;

class AssessmentToolController extends Controller
{
    public function index() {
        return view('assessmenttools.assessment_tools_list');
    }

    public function show($tool_slug, $tool_inv_id) {
        $assessment_tool = AssessmentTool::findOrFail($tool_inv_id);
        $meta = [
            'title' => $assessment_tool['name'],
            'description' => $assessment_tool['description'] ?? '',
        ];
        $isEnvironmentalCalculator = $tool_slug === 'environmental-calculator';
        $isEconomicCalculator = $tool_slug === 'economic-cost-calculator';
        $isTatCalculator = $tool_slug === 'technology-assessment-tool';
        
        return view('assessmenttools.assessment_tools_detailed', compact('assessment_tool', 'meta', 'tool_slug', 'isEnvironmentalCalculator', 'isEconomicCalculator', 'isTatCalculator'));
    }
}
