<?php

namespace App\Http\Resources\Litted;

use App\Models\Litted\Vote;
use Illuminate\Http\Resources\Json\JsonResource;

class PostShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'username' => $this->character->username,
            'slug' => $this->slug,
            'url' => $this->url,
            'owner' => auth()->user()->character->id == $this->author_id ? true : false,
            'comment' => CommentResource::collection($this->whenLoaded('relationship', 'comments')),
            'voted' => Vote::where('character_id', auth()->user()->character->id)->where('post_id', $this->id)->first(),
        ];
    }
}
