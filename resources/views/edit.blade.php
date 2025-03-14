<form method="post" action="{{ route('comment.update', $commentId) }}">
    {{ csrf_field() }}

    <textarea name="content" id="" style="width: 33vw;; height: 33vh;">{{ $comment->content }}</textarea>
    <br>
    <button type="submit">submit</button>


</form>


<a href="{{ route('blog.people', $comment->people_id) }}">Go back to page</a>
