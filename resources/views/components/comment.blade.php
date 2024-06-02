<div class="comment-body my-4">
    <h5 class="comment-body-user mt-0">{{ $comment->user->name }}</h5>
    <p class="comment-body-content">{{ $comment->content }}</p>
    <a class="accordion-title js-accordion-title ps-3">返信</a>

    <form action="{{ route('comments.store_reply', $review) }}" method="POST" class="reply-area">
        @csrf

        <input type="hidden" name="parent_comment_id" value="{{ $comment->id }}">
        <div class="form-group mt-3">
            <textarea name="content" class="form-control input-reply" rows="1" placeholder="返信を追加..."></textarea>
            <div class="mt-3 text-end">
                <button type="submit" class="btn reply-button text-white" disabled>返信</button>
            </div>
        </div>
    </form>

    <div class="reply-accordion-container">
        <div class="reply-accordion-item">
            @if ($comment->children->count() > 0)
                <h5 class="accordion-title js-accordion-title mt-3 ps-3">
                    {{ $comment->children->count() }}件の返信
                </h5>
            @endif
            <div class="accordion-content ms-3">
                @foreach ($comment->children as $reply)
                    @component('components.comment', ['comment' => $reply, 'review' => $review])
                    @endcomponent
                @endforeach
            </div>
        </div>
    </div>
</div>
