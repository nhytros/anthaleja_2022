<?php

namespace App\Http\Controllers\Portfolio;

use Faker\Factory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Natter\{Skill, Project};
use Illuminate\Support\Facades\{Auth, Storage, Redirect};

class ProjectController extends Controller
{
    public $faker, $path;

    public function __construct()
    {
        $this->faker = Factory::create();
        $this->path = "uploads/images/portfolio/projects";
    }

    public function index()
    {
        return view('frontend.portfolio.projects.index', [
            'skills' => Skill::orderBy('name', 'asc')->get(),
            'project' => false,
            'projects' => Project::with('skill')->get(),
            'title' => __('Projects'),
            'edit' => false,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'skill_id' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $upload = $request->file('image')->store($this->path);
        }

        Project::create([
            'character_id' => Auth::user()->character->id,
            'name' => $request->name,
            'skill_id' => $request->skill_id,
            'image' => $upload,
        ]);
        return Redirect::back()->withSuccess(__('Project created.'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return view('frontend.portfolio.projects.index', [
            'skills' => Skill::orderBy('name', 'asc')->get(),
            'projects' => Project::with('skill')->get(),
            'project' => Project::where('id', $id)->firstOrFail(),
            'title' => __('Projects'),
            'edit' => true,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'skill_id' => 'required',
        ]);
        $project = Project::where('id', $id)->firstOrFail();

        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::delete($project->image);
            }
            $upload = $request->file('image')->store($this->path);
        } else {
            $upload = $project->image;
        }

        $project->update([
            'character_id' => Auth::user()->character->id,
            'name' => $request->name,
            'skill_id' => $request->skill_id,
            'image' => $upload,
        ]);
        return Redirect::route('portfolio.projects')->withSuccess(__('Project updated.'));
    }

    public function delete($id)
    {
        $project = Project::where('id', $id)->firstOrFail();
        $project->delete();
        return Redirect::back()->withSuccess(__('Project trashed.'));
    }

    public function restore($id)
    {
        $project = Project::withTrashed()->where('id', $id)->firstOrFail();
        $project->restore();
        return Redirect::back()->withSuccess(__('Project restored.'));
    }

    public function destroy($id)
    {
        $project = Project::withTrashed()->where('id', $id)->firstOrFail();
        if ($project->image) {
            Storage::delete($project->image);
        }
        $project->forceDelete();
        return Redirect::back()->withSuccess(__('Project deleted permanently.'));
    }
}
