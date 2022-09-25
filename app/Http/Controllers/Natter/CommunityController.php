<?php

namespace App\Http\Controllers\Natter;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Natter\Community;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CommunityStoreRequest;

// Natter - The Door for Everywhere

class CommunityController extends Controller
{
    public function index($slug = null)
    {
        if (!$slug) {
            $view = 'frontend.natter.community_main';
            $communities = Community::all();
            $data = [
                'title' => trans('natter.community.list'),
                'communities' => $communities,
            ];
        } else {
            $community = Community::where('slug', $slug)->first();
            $view = 'frontend.natter.community_my';
            $data = [
                'title' => trans('natter.community.my'),
                'community' => $community,
            ];
        }
        return view($view, $data);
    }

    public function list()
    {
        $communities = Community::withTrashed()->orderBy('name', 'asc')->paginate(48);
        return view('frontend.natter.community_list', [
            'title' => 'natter.communities',
            'communities' => $communities,
        ]);
    }

    public function create()
    {
        return view('frontend.natter.community_cred', [
            'title' => trans('natter.community.create_new'),
            'edit' => false,
        ]);
    }

    public function store(CommunityStoreRequest $request)
    {
        $c = Community::create([
            'owner_id' => auth()->user()->character->id,
            'name' => $name = ucfirst(Str::camel($request->name)),
            'description' => $request->description,
        ]);

        return Redirect::route('natter.community', $c->slug)
            ->withSuccess(trans('natter.community.created_ok'));
    }

    public function edit($slug)
    {
        $community = Community::withTrashed()->where('slug', $slug)->first();
        return view('frontend.natter.community_cred', [
            'title' => trans('natter.community.edit'),
            'community' => $community,
            'edit' => true,
        ]);
    }

    public function update(CommunityStoreRequest $request, $slug)
    {
        $c = Community::withTrashed()->where('slug', $slug)->first();
        $c->update([
            'name' => $name = ucfirst(Str::camel($request->name)),
            'description' => $request->description,
        ]);

        return Redirect::route('natter.community', $c->slug)
            ->withSuccess(trans('natter.community.updated_ok'));
    }

    public function show($slug)
    {
        $community = Community::where('slug', $slug)->first();
        return view('frontend.natter.community_show', [
            'title' => '/r/' . $community->name,
            'community' => $community,
        ]);
    }

    public function delete($slug)
    {
        $c = Community::where('slug', $slug)->first();
        $c->delete();
        return Redirect::back()
            ->withSuccess(trans('natter.community.trashed_ok'));
    }

    public function restore($slug)
    {
        $c = Community::withTrashed()->where('slug', $slug)->first();
        $c->restore();
        return Redirect::back()
            ->withSuccess(trans('natter.community.restored_ok'));
    }

    public function destroy($slug)
    {
        $c = Community::withTrashed()->where('slug', $slug)->first();
        $c->forceDelete();
        return Redirect::back()
            ->withSuccess(trans('natter.community.destroyed_ok'));
    }
}
