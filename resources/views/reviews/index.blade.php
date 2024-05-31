@extends('layouts.app')
@section('content')
    <div class="container pt-3">
        <div class="row justify-content-center mt-5">
            <div class="col-md-5 mt-4 px-md-2">
                <div id="carouselExampleIndicators" class="carousel slide w-75" data-bs-theme="dark">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('img/IMG_0835.jpeg') }}" class="img-thumbnail d-block">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/IMG_0835.jpeg') }}" class="img-thumbnail d-block">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/IMG_0835.jpeg') }}" class="img-thumbnail d-block">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <div class="card mt-5" style="width: 26rem;">
                    <div class="card-body">
                        <h2 class="card-title">{{ $review->product->vendor->name }}</h2>
                        <h3 class="card-subtitle mb-2 text-body-secondary">{{ $review->product->name }}</h3>
                        <h4 class="card-text mb-3">種類 {{ $review->product->type->name }}タイプ</h4>
                        <h4 class="card-text mb-3">W数 {{ $review->product->wattage->watt }}W</h4>
                        <h4 class="card-text mb-3">¥{{ number_format($review->product->price) }}</h4>
                        <h4 class="card-text mb-3">商品のリンク先:<a
                                href="https://www.amazon.co.jp/NovaPort-USB-C-%E3%80%90CIO%E7%8B%AC%E8%87%AA%E6%8A%80%E8%A1%93-NovaIntelligence%E6%90%AD%E8%BC%89%E3%80%91-CIO-G45W2C/dp/B0BHCH1BF9/ref=sr_1_8?__mk_ja_JP=%E3%82%AB%E3%82%BF%E3%82%AB%E3%83%8A&crid=2TDLCH5D6QEJG&dib=eyJ2IjoiMSJ9.wFeJS29_wZ9syhfdQw7XflWAPjQ19mHo1XswNUgqhSRdXO7reQVxlcr63Hvl2DgWiZyVGJxYC2wowwA4DHOkcZt7b15aevwoWBWgE0sdNVlBy2mxFBmxziFkCSEV5G7sNOStRdnZCIP_ucZlui5181TDDpUb2f9XA1NxBZ2Jq2wbMeaCAoxqFLEmio5NANpiutYb1r6LvX2t17rEBD6aZNtuhrINCzM2m8Z92tMXzunrWBJUolCbayjvoeA11ULCOH6Pu34ZOZ8IQB_5A7J8QQfaWbNXTbBurEeMgPyVpNw.uXS4mrKRCIeJHxNk9xZLkeTVsgI8ndqhroTu92gJQuY&dib_tag=se&keywords=cio&qid=1716107379&sprefix=cio%2Caps%2C164&sr=8-8&th=1">
                                link
                            </a>
                        </h4>
                    </div>
                </div>
            </div>

            <div class="col-md-7 mt-4 pe-md-5">
                <div class="mb-5">
                    <h3 class="fw-bold">{{ $review->title }}</h3>
                    <p class="fs-5 mb-2"><span class="review-score-color">{{ str_repeat('★', $review->score) }}</span><span
                            class="review-score-blank-color">{{ str_repeat('★', 5 - $review->score) }}</span></p>
                    <p>{{ $review->content }}</p>
                    <p><span class="fw-bold me-2">{{ $review->user->name }}</span><span
                            class="text-muted">{{ $review->created_at }}</span></p>
                </div>

                {{-- コメント欄 --}}
                <div class="comment-area form-group w-75">
                    @if ($comment_count > 0)
                        <h5 class="fw-bold">{{ $comment_count }}件のコメント</h5>
                    @else
                        <h5 class="fw-bold">この記事にコメントはありません。</h5>
                    @endif

                    @guest
                        <div class="mb-4">
                            <h5>ユーザー登録していただくとコメントができます。</h5>
                        </div>
                    @else
                        <form action="{{ route('comments.store', $review) }}" method="POST">
                            @csrf
                            <textarea name="content" class="form-control" rows="1" placeholder="コメントする..."></textarea>
                            <div class="mt-3 text-end">
                                <button type="button" class="btn btn-outline-secondary me-3">キャンセル</button>
                                <button type="submit" class="btn submit-button text-white">コメント</button>
                            </div>
                        </form>
                    </div>

                    <div class="comment-container mt-5 w-75">
                        @foreach ($comments as $comment)
                            @component('components.comment', ['comment' => $comment, 'review' => $review])
                            @endcomponent
                        @endforeach
                    </div>
                @endguest
            </div>
        </div>
    </div>
@endsection
