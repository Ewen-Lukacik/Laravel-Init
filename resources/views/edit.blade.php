<div>
    <!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->

    {{ dd($commentId) }}
    <form method="post" action="{{ route('comment.edit', $commentId) }}">

    <button>Submit</button>
</form>

</div>
