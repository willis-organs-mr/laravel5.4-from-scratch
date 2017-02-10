<div class="card">
    <div class="card-block">
        <form method="POST" action="/post/{{ $post->id }}/comments">
            {{ csrf_field() }}
            <div class="form-group">
                <textarea class="form-control" name="body" placeholder="Your comment here..." required></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Comment</button>
            </div>
            @include('layouts.errors')
        </form>
    </div>
</div>
