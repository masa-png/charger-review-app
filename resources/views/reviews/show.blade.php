@extends('layouts.app')
@section('content')
    <div class="container pt-3">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-theme="dark">
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
                {{-- <div>
                    <img src="{{ asset('img/IMG_0835.jpeg') }}" class="img-thumbnail">
                </div> --}}

                <div class="card mt-5" style="width: 26rem;">
                    <div class="card-body">
                        <h2 class="card-title">CIO</h2>
                        <h3 class="card-subtitle mb-2 text-body-secondary">NovaPort</h3>
                        <h4 class="card-text mb-3">種類:</h4>
                        <h4 class="card-text mb-3">W数:<a href="{{ route('reviews') }}">15W〜20W</a></h4>
                        <h4 class="card-text mb-3">値段:</h4>
                        <h4 class="card-text mb-3">商品のリンク先:<a
                                href="https://www.amazon.co.jp/NovaPort-USB-C-%E3%80%90CIO%E7%8B%AC%E8%87%AA%E6%8A%80%E8%A1%93-NovaIntelligence%E6%90%AD%E8%BC%89%E3%80%91-CIO-G45W2C/dp/B0BHCH1BF9/ref=sr_1_8?__mk_ja_JP=%E3%82%AB%E3%82%BF%E3%82%AB%E3%83%8A&crid=2TDLCH5D6QEJG&dib=eyJ2IjoiMSJ9.wFeJS29_wZ9syhfdQw7XflWAPjQ19mHo1XswNUgqhSRdXO7reQVxlcr63Hvl2DgWiZyVGJxYC2wowwA4DHOkcZt7b15aevwoWBWgE0sdNVlBy2mxFBmxziFkCSEV5G7sNOStRdnZCIP_ucZlui5181TDDpUb2f9XA1NxBZ2Jq2wbMeaCAoxqFLEmio5NANpiutYb1r6LvX2t17rEBD6aZNtuhrINCzM2m8Z92tMXzunrWBJUolCbayjvoeA11ULCOH6Pu34ZOZ8IQB_5A7J8QQfaWbNXTbBurEeMgPyVpNw.uXS4mrKRCIeJHxNk9xZLkeTVsgI8ndqhroTu92gJQuY&dib_tag=se&keywords=cio&qid=1716107379&sprefix=cio%2Caps%2C164&sr=8-8&th=1">
                                link
                            </a>
                        </h4>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-5">
                    <h3 class="fw-bold">コストパフォーマンスが抜群</h3>
                    <p class="fs-5 mb-2"><span class="review-score-color">★★★★★</span><span
                            class="review-score-blank-color"></span></p>
                    <p>価格に見合った性能をもつ充電器で、2ポートついていて最大65W出力、スマホとPCを充電するのにちょうどいい!!</p>
                    <p><span class="fw-bold me-2">ユーザー名</span><span class="text-muted">投稿日('Y年m月d日')</span></p>
                </div>

                @guest
                    <div class="mb-4">
                        <p>ユーザー登録していただくとレビューに対してコメントができます。</p>
                    </div>
                @endguest

                {{-- コメント欄 --}}
                <div class="form-group">
                    <h4 class="fw-bold">1件のコメント</h4>
                    <textarea name="content" class="form-control" rows="1" placeholder="コメントする..."></textarea>
                    <div class="mt-3 text-end">
                        <a class="btn btn-outline-secondary me-3" href="#" role="button">キャンセル</a>
                        <a class="btn submit-button text-white" href="#" role="button">コメント</a>
                    </div>
                </div>

                <div class="mt-5">
                    <div>
                        <div class="comment-body">
                            <h5 class="mt-0">
                                <a href="#">ユーザー名</a>
                                <a href="#">
                                    <i class="fa fa-reply"></i>
                                </a>
                            </h5>
                            テストコメント
                            <div class="form-group mt-3">
                                <textarea name="content" class="form-control" rows="1" placeholder="返信を追加..."></textarea>
                                <div class="mt-3 text-end">
                                    <a class="btn btn-outline-secondary me-3" href="#" role="button">キャンセル</a>
                                    <a class="btn submit-button text-white" href="#" role="button">コメント</a>
                                </div>
                            </div>

                            <div>
                                <h5 class="mt-3">
                                    <a href="#">~件の返信</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
