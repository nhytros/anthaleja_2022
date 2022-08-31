<?php

namespace App\Http\Controllers\Litted;

use App\Models\Litted\Vote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Models\Litted\{Post, Community};
use Illuminate\Support\Facades\Redirect;
use App\Http\Resources\Litted\PostShowResource;

class PostController extends Controller
{

    public function create($slug)
    {
        return view('frontend.litted.post_create', [
            'title' => trans('litted.community.post.create'),
            'community' => Community::where('slug', $slug)->firstOrFail(),
        ]);
    }

    public function edit($id)
    {
        $post = Post::where('id', $id)->findOrFail();
        $this->authorize('update', $post);
        return view('frontend.litted.post_edit', [
            'title' => trans('litted.community.post.edit'),
            'post' => Post::findOrFail($id),
        ]);
    }

    public function store(PostStoreRequest $request)
    {
        $post = Post::create([
            'author_id' => auth()->user()->character->id,
            'community_id' => $request->community_id,
            'title' => $request->title,
            'slug' => $request->slug,
            'url' => $request->url,
            'body' => $request->body,
        ]);
        $community = Community::findOrFail($post->community_id);
        return Redirect::route('litted.communities.show', $community->slug);
    }

    public function update(PostStoreRequest $request, $id)
    {
        $post = Post::where('id', $id)->firstOrFail();
        $this->authorize('update', $post);
        $post->update($request->validated());
        // $post = Post::update([
        //     'author_id' => auth()->user()->character->id,
        //     'community_id' => $request->community_id,
        //     'title' => $request->title,
        //     'slug' => $request->slug,
        //     'url' => $request->url,
        //     'body' => $request->body,
        // ]);
        $community = Community::findOrFail($post->community_id);
        return Redirect::route('litted.communities.show', $community->slug);
    }


    public function show($community_slug, $slug)
    {
        $community = Community::where('slug', $community_slug)->firstOrFail();
        $post = new PostShowResource(Post::with(['comments'])->where('slug', $slug)->withTrashed()->firstOrFail());
        $isVoted = Vote::where('post_id', $post->id)
            ->where('character_id', auth()->user()->character->id)
            ->first();
        return view('frontend.litted.post_show', [
            'title' => $post->title,
            'community' => $community,
            'post' => $post,
            'voted' => $isVoted,
        ]);
    }

    public function delete($slug)
    {
        $post = Post::findOrFail($slug)->delete();
        $this->authorize('delete', $post);
        return Redirect::back();
    }

    public function restore($slug)
    {
        $post = Post::withTrashed()->findOrFail($slug)->restore();
        $this->authorize('restore', $post);
        return Redirect::back();
    }

    public function destroy($slug)
    {
        $post = Post::withTrashed()->findOrFail($slug);
        $this->authorize('forceDelete', $post);
        $c = Community::findOrFail($post->community_id);
        $post->forceDelete();
        return Redirect::route('litted.communities.show', $c->name);
    }

    public function vote(Request $request, $id)
    {
        $post = Post::where('id', $id)->first();
        dd($post);
        $isVoted = Vote::where('post_id', $post->id)
            ->where('character_id', auth()->user()->character->id)
            ->first();
        if ($request->up) {
            if (!$isVoted) {
                Vote::create([
                    'character_id' => auth()->user()->character->id,
                    'post_id' => $post->id,
                    'vote' => 1,
                ]);
                $post->increment('votes', 1);
                //     if (!$isVoted->vote) {
                //         $isVoted->update(['vote' => 1]);
                //         $post->increment('votes', 2);
                //         return Redirect::back();
                //     } else {
                //         if ($isVoted->vote === 1) {
                //             return Redirect::back();
                //         }
                //     }
                // } else {
                return Redirect::back();
            } elseif ($isVoted->vote == 1) {
                return Redirect::back();
            }
        }
        if ($request->down) {
            if ($isVoted->vote === 1) {
                $isVoted->update(['vote' => 0]);
                $post->increment('votes', -1);
            } else {
                return Redirect::back();
            }
        }
        return Redirect::back();
    }
}
