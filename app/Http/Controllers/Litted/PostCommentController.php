<?php

namespace App\Http\Controllers\Litted;

use App\Models\Litted\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;

class PostCommentController extends Controller
{
    public function store($community_slug, $id)
    {
        $post = Post::where('id', $id)->firstOrFail();
        $post->comments()->create([
            'author_id' => auth()->user()->character->id,
            'comment' => Request::input('comment'),
        ]);
        return Redirect::back();
    }
}
