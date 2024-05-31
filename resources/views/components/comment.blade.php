<div class="comment-body my-4">
    @if ($comment->id === $comment->parent_comment_id)
        <h5 class="comment-body-user mt-0">{{ $comment->user->name }}</h5>
        <p class="comment-body-content">{{ $comment->content }}</p>
        <a href="#">
            <i class="fa fa-reply">返信</i>
        </a>

        <form action="{{ route('comments.store_reply', $review) }}" method="POST">
            @csrf

            <input type="hidden" name="parent_comment_id" value="{{ $comment->parent_comment_id }}">
            <div class="reply-area form-group mt-3">
                <textarea name="content" class="form-control" rows="1" placeholder="返信を追加..."></textarea>
                <div class="mt-3 text-end">
                    <button type="button" class="btn btn-outline-secondary me-3">キャンセル</button>
                    <button type="submit" class="btn submit-button text-white">返信</button>
                </div>
            </div>
        </form>

        <div class="reply-container">
            <h5 class="mt-3">
                <a href="#">~件の返信</a>
            </h5>
            <div class="reply-body ms-4">
                <h5 class="mt-0"></h5>
                <p class="reply-body-content"></p>
                <a href="#">
                    <i class="fa fa-reply">返信</i>
                </a>
            </div>
        </div>
    @endif
</div>
