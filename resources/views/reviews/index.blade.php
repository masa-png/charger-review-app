@extends('layouts.app')
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-5 mt-4">
                <div>
                    <img src="{{ $review->product->image_path ? $review->product->image_path : asset('img/壁挿し.jpg') }}"
                        class="img-thumbnail card-img-top">
                </div>

                <div class="card mt-5" style="width: 26rem;">
                    <div class="card-body">
                        <h2 class="card-title">{{ $review->product->vendor->name }}</h2>
                        <h3 class="card-subtitle mb-2 text-body-secondary">{{ $review->product->name }}</h3>
                        <h4 class="card-text mb-3">種類 {{ $review->product->type->name }}タイプ</h4>
                        <h4 class="card-text mb-3">W数 {{ $review->product->wattage->watt }}W</h4>
                        <h4 class="card-text mb-3">¥{{ number_format($review->product->price) }}</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mt-4 ms-md-5">
                <div class="mb-5">
                    <h3 class="fw-bold">{{ $review->title }}</h3>
                    <p class="fs-5 mb-2"><span class="review-score-color">{{ str_repeat('★', $review->score) }}</span><span
                            class="review-score-blank-color">{{ str_repeat('★', 5 - $review->score) }}</span></p>
                    <p>{{ $review->content }}</p>
                    <p><span class="fw-bold me-2">{{ $review->user->name }}</span><span
                            class="text-muted">{{ $review->created_at }}</span></p>
                </div>

                {{-- コメント欄 --}}
                <div class="comment-area form-group">
                    @guest
                        <div class="mb-4">
                            <h5>ユーザー登録していただくとレビューに対してコメントができます。</h5>
                        </div>
                    @else
                        <h5 class="fw-bold">{{ $review->comments->count() }}件のコメント</h5>

                        <form action="{{ route('comments.store', $review) }}" method="POST">
                            @csrf
                            <textarea name="content" class="form-control input-comment" rows="1" placeholder="コメントする..."></textarea>
                            <div class="mt-3 text-end btn-area">
                                <button type="submit" class="btn comment-button text-white" disabled>コメント</button>
                            </div>
                        </form>
                    </div>

                    <div class="comment-container mt-5">
                        @foreach ($review->comments as $comment)
                            @component('components.comment', ['comment' => $comment, 'review' => $review])
                            @endcomponent
                        @endforeach
                    </div>
                @endguest
            </div>
        </div>
    </div>
@endsection
