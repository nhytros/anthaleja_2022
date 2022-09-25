<?php

namespace App\Http\Controllers\Portfolio;

use Faker\Factory;
use App\Models\Natter\Skill;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\{Auth, Storage, Redirect};

class SkillController extends Controller
{
    public $faker, $path;

    public function __construct()
    {
        $this->faker = Factory::create();
        $this->path = "uploads/images/portfolio/skills";
    }

    public function index()
    {
        return view('frontend.portfolio.skills.index', [
            'title' => __('Skills'),
            'skills' => Skill::withTrashed()->orderBy('name', 'asc')->get(),
            'edit' => false,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $upload = $request->file('image')->store($this->path);
            // Image::make($request()->file('image'))->encode('webp');
            // dd($upload, $webp);
        }

        Skill::create([
            'name' => $request->name,
            'image' => $upload,
        ]);
        return Redirect::back()->withSuccess(__('Skill created.'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return view('frontend.portfolio.skills.index', [
            'skills' => Skill::all(),
            'skill' => Skill::where('id', $id)->firstOrFail(),
            'title' => __('Skills'),
            'edit' => true,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $skill = Skill::where('id', $id)->firstOrFail();

        if ($request->hasFile('image')) {
            if ($skill->image) {
                Storage::delete($skill->image);
            }
            $upload = $request->file('image')->store($this->path);
        } else {
            $upload = $skill->image;
        }

        $skill->update([
            'name' => $request->name,
            'image' => $upload,
        ]);
        return Redirect::route('portfolio.skills')->withSuccess(__('Skill updated.'));
    }

    public function delete($id)
    {
        $skill = Skill::where('id', $id)->firstOrFail();
        $skill->delete();
        return Redirect::back()->withSuccess(__('Skill trashed.'));
    }

    public function restore($id)
    {
        $skill = Skill::withTrashed()->where('id', $id)->firstOrFail();
        $skill->restore();
        return Redirect::back()->withSuccess(__('Skill restored.'));
    }

    public function destroy($id)
    {
        $skill = Skill::withTrashed()->where('id', $id)->firstOrFail();
        if ($skill->image) {
            Storage::delete($skill->image);
        }
        $skill->forceDelete();
        return Redirect::back()->withSuccess(__('Skill deleted permanently.'));
    }
}
