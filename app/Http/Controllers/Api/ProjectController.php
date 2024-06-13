<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $projects = Project::with('type', 'technologies')->paginate(10);
        //  dd($projects);
        return response()->json([
            'success' => true,
            'message' => 'Ok',
            'results' => $projects
        ], 200);
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->with('type', 'technologies')->first();
        if($project){
            return response()->json([
                'success' => true,
                'message' => 'Ok',
                'results' => $project
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Project not found'
            ], 404);
        }
    }

}
