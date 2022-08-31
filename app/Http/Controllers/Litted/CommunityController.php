<?php

namespace App\Http\Controllers\Litted;

use App\Models\Litted\Vote;
use Illuminate\Http\Request;
use App\Models\Litted\Community;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CommunityStoreRequest;
use App\Http\Resources\Litted\CommunityPostResource;

class CommunityController extends Controller
{
    public function index($owner = 'all')
    {
        $cm = Community::get();
        $count = 0;
        foreach ($cm as $c) {
            $count += $c->owner_id == auth()->user()->character->id;
        }
        if ($owner == 'all') {
            $communities = Community::orderBy('name')->paginate(24);
            $title = trans('litted.community.list');
        }
        if ($owner == 'my') {
            $communities = Community::where('owner_id', auth()->user()->character->id)->orderBy('name')->paginate(24);
            $title = trans('litted.community.my');
        }
        return view('frontend.litted.community_list', [
            'title' => $title,
            'communities' => $communities,
            'cancreate' => $count == 0,
        ]);
    }

    public function create()
    {
        return view('frontend.litted.community_create', [
            'title' => trans('litted.community.create'),
        ]);
    }

    public function edit($slug)
    {
        $community = Community::where('slug', $slug)->firstOrFail();
        $this->authorize('update', $community);
        return view('frontend.litted.community_edit', [
            'title' => trans('litted.community.edit'),
            'community' => $community,
        ]);
    }

    public function store(CommunityStoreRequest $request)
    {
        Community::create([
            'owner_id' => auth()->user()->character->id,
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
        ]);
        return Redirect::route('litted.communities.show', $request->slug)->withSuccess(trans('litted.community.created_ok'));
    }

    public function update(Request $request, $id)
    {
        $community = Community::where('id', $id)->firstOrFail();
        $this->authorize('update', $community);
        $community->update([
            'owner_id' => auth()->user()->character->id,
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
        ]);
        return Redirect::route('litted.communities.show', $request->slug)->withSuccess(trans('litted.community.updated_ok'));
    }

    public function show($slug)
    {
        $community = Community::where('slug', $slug)->firstOrFail();
        $posts = CommunityPostResource::collection(
            $community->posts()
                ->with('character')
                ->orderBy('created_at', 'desc')
                ->paginate(24)
        );
        // dd($posts);
        return view('frontend.litted.community_show', [
            'title' => $community->name,
            'community' => $community,
            'posts' => $posts,
        ]);
    }

    public function delete($slug)
    {
        $community = Community::findOrFail($slug)->delete();
        $this->authorize('delete', $community);
        return Redirect::back();
    }

    public function restore($slug)
    {
        $community = Community::withTrashed()->findOrFail($slug)->restore();
        $this->authorize('restore', $community);
        return Redirect::back();
    }

    public function destroy($slug)
    {
        $community = Community::withTrashed()->findOrFail($slug);
        $this->authorize('forceDelete', $community);
        $community->forceDelete();
        return Redirect::route('litted.communities');
    }
}
