<form action="{{ route('litted.post.vote', $post->id) }}" method="post">@csrf
    <div id="votes">
        <div class="m-3">
            <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                <button type="submit" name="up" value="1" class="btn btn-outline-success"
                    {{ $post->voted ? 'disabled' : '' }}>
                    <x-fas-thumbs-up />
                </button>
                <span class="btn btn-outline-dark">{{ $post->votes }}</span>
                <button type="submit" name="down" value="1" class="btn btn-outline-danger"
                    {{ $post->voted != 0 ? '' : 'disabled' }}>
                    <x-fas-thumbs-down />
                </button>
            </div>
        </div>
    </div>
</form>
