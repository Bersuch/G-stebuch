@foreach($comments as $comment)
    <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>

        <hr />
        <strong>{{ $comment->user->name }}</strong>
        <p class="mt-2 ml-5">{{ $comment->body }}</p>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('storeComment') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="body" class="form-control" />
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group mt-2 mb-2">
                <input type="submit" class="btn btn-warning" value="Reply" />
            @if ($user->id === $comment->user_id)
                    <a href="{{ route('deleteComment', ['id' => $comment->id]) }}"><button type="button" class="btn btn-outline-danger">Löschen</button></a>
            @endif
                
            </div>
            
        </form>

        @include('commentsDisplay', ['comments' => $comment->replies])

    </div>

@endforeach  