<div class="d-flex">
    <div class="comment-img-box">
        <img src="{{ $comment->user->image_path ? $comment->user->image_path : url('https://product-review-user.s3.ap-northeast-1.amazonaws.com/profiles/79AAE03E-12F1-4833-8B88-F57CC41C5D69_1_201_a.jpeg') }}"
            class="rounded-circle" alt="プロフィール画像">
    </div>
    <div class="comment-body w-100">
        <p class="comment-body-user fw-bold">{{ $comment->user->name }}</p>
        <h5 class="comment-body-content">{{ $comment->content }}</h5>
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

        <div class="reply-accordion-container mt-3 mb-4">
            <div class="reply-accordion-item">
                @if ($comment->children->count() > 0)
                    <a class="accordion-title js-accordion-title mt-3 ps-3" style="font-size: 16px;">
                        {{ $comment->children->count() }}件の返信
                    </a>
                @endif
                <div class="accordion-content mt-3">
                    @foreach ($comment->children as $reply)
                        @component('components.comment', ['comment' => $reply, 'review' => $review])
                        @endcomponent
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
