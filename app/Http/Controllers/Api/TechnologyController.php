<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology;

class TechnologyController extends Controller
{
    public function index()
    {

        $technologies = Technology::all();
        return response()->json([
            'status' => 'success',
            'message' => 'Ok',
            'results' => $technologies
        ], 200);
    }
}
