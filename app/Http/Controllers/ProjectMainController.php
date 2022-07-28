<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Project;
use App\Models\Tag;


class ProjectMainController extends Controller
{
    public function index(){
        $projects = Project::orderBy('id', 'desc')
                    ->paginate(6);
        $tags = Tag::all();
        return Inertia::render('Main/Project', [
            'projects' => $projects,
            'tags' => $tags
        ]);
    }

    public function detail($id){
        $project = Project::find($id);
        $tags = Tag::all();

        return Inertia::render('Main/ProjectDetail', [
            'project' => $project,
            'tags' => $tags
        ]);
    }
}

