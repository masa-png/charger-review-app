@extends('layouts.app')
@section('content')
    <div class="container pt-3">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div>
                    <img src="{{ asset('img/IMG_0835.jpeg') }}" class="img-thumbnail">
                </div>

                <div class="card mt-5" style="width: 18rem;">
                    <div class="card-body">
                        <h2 class="card-title">CIO</h2>
                        <h3 class="card-subtitle mb-2 text-body-secondary">NovaPort</h3>
                        <h4 class="card-text mb-3">種類:</h4>
                        <h4 class="card-text mb-3">W数:<a href="{{ route('reviews') }}">15W〜20W</a></h4>
                        <h4 class="card-text mb-3">値段:</h4>
                        <h4 class="card-text mb-3">投稿者:</h4>
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
                    <h3>コストパフォーマンスが抜群</h3>
                    <p class="fs-5 mb-2"><span class="review-score-color">★★★★★</span><span
                            class="review-score-blank-color"></span></p>
                    <p>価格に見合った性能をもつ充電器で、2ポートついていて最大65W出力、スマホとPCを充電するのにちょうどいい!!</p>
                    <p><span class="fw-bold me-2">ユーザー名</span><span class="text-muted">投稿日('Y年m月d日')</span></p>
                </div>

                @guest
                    <div class="mb-4">
                        ユーザー登録していただくとレビューに対してコメントができます。
                    </div>
                @endguest

            </div>
        </div>
    </div>
@endsection
