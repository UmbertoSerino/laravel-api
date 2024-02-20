<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // $projects = Project::all();
        // Eager Loading vs - Lazy loading
        $projects = Project::with('type', 'technologies', 'user')->paginate(5);
        return response()->json(
            [
                "success" => true,
                "result" => $projects
            ]
        );
    }
    public function show(Project $project)
    {
        return response()->json(
            [
                "success" => true,
                "result" => $project
            ]
        );
    }
    public function search(Request $request)
    {
        $data = $request->all();

        if (isset($data['title'])) {
            $url = $data['title'];
            $projects = Project::where('title', 'LIKE', "%{$url}%")->get();
        } elseif (is_null($data['title'])) {
            $projects = Project::all();
        } else {
            abort(404);
        }

        return response()->json([
            "success" => true,
            "results" => $projects,
            "matches" => count($projects)
        ]);
    }
}
