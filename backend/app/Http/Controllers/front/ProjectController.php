<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function latestprojects(Request $request){
        $projects = Project::orderBy('created_at','DESC')
        ->where('status',1)
        ->limit($request->limit)
        ->get();

        return response()->json([
            'status' => true,
            'data' => $projects
        ]);
    }

    public function index(){
        $projects = Project::orderBy('created_at','DESC')
        ->where('status',1)
        ->get();

        return response()->json([
            'status' => true,
            'data' => $projects
        ]);
    }

    public function project($id){
        $projects = Project::find($id);

        if($projects == null){
            return response()->json([
                'status' => false,
                'message' => 'project not found'
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $projects
        ]);
    }
}
