@extends('layouts.app')

@section('content')
    <div class="mainvisual-wrapper mb-5 pb-5">
        <ul class="slide p-0">
            <li class="item">
                <img src="{{ asset('img/desk.jpeg') }}" class="w-100 img-fluid">
            </li>
            <li class="item">
                <img src="{{ asset('img/desk2.jpg') }}" class="w-100 img-fluid">
            </li>
        </ul>
        <div class="container mainvisual-text-box">
            <div class="row justify-content-center">
                <div class="col-8 mainvisual-text-content">
                    <h1 class="text-white mb-3 lh-lg">
                        愛用の充電器を見つけよう！<br>
                        レビュー投稿しよう！！
                    </h1>
                    <p class="text-white lh-lg">ChargerReviewは、<br>
                        愛用している充電器のレビュー投稿ができるサイトです。
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- 新着記事 --}}
    <section class="pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg12 text-center">
                    <h1 class="mb-4 sec-title">新着記事</h1>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4 mb-4">
                @foreach ($recently_reviews as $recently_review)
                    <div class="col">
                        <div class="card h-100">
                            <a href="{{ route('reviews.index', ['review' => $recently_review->id]) }}">
                                <img src="{{ $recently_review->image_path ? $recently_review->image_path : asset('img/IMG_0835.jpeg') }}"
                                    class="img-thumbnail card-img-top">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title">メーカー名 {{ $recently_review->vendor->name }}</h4>
                                <h4 class="card-subtitle mb-2 text-body-secondary">{{ $recently_review->name }}</h4>
                                <p class="card-title">種類 {{ $recently_review->type->name }}タイプ</p>
                                <p class="card-title">W数 {{ $recently_review->wattage->watt }}W</p>
                                <label class="card-title">¥{{ number_format($recently_review->price) }}</label><br>
                            </div>
                            <div class="card-footer">
                                <small class="text-body-secondary">{{ $recently_review->created_at }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-3 text-end">
                <a href="{{ route('products.index') }}" class="btn more-button text-white">もっと見る</a>
            </div>
        </div>
    </section>

    {{-- USB PDとは？ --}}
    <section class="explanation my-5 py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg12 text-center">
                    <h1 class="mb-4 sec-title">USB PDについて!?</h1>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row mb-5">
                <div class="col-md-6">
                    <img src="{{ asset('img/usbpd.jpg') }}" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h1 style="color: #C60E31;" class="fw-bold my-3">01</h1>
                    <h2>USB PDとは「USB Power Delivery」の略称！</h2>
                    <p class="lh-lg">USB規格を作成している団体によって定められた、Type-Cに<br>
                        対応した給電規格のこと。最大100Wの電力を供給できるよう<br>
                        に規格されています。
                    </p><br>
                    <span>※2022年には最大240Wまで引き上げられています。</span>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-6 order-2 order-md-1">
                    <h1 style="color: #C60E31" class="fw-bold my-3">02</h1>
                    <h2>USB PDのメリット！</h2>
                    <p class="lh-lg">対応機器を接続するだけでUSB PD規格による急速充電を<br>
                        自動的に行うことが出来る。接続機器側は充電器側の<br>
                        供給能力以上の電力を要求しないため、安全に使用することができます。
                    </p>
                </div>
                <div class="col-md-6 order-1 order-md-2">
                    <img src="{{ asset('img/connect.jpg') }}" class="img-fluid">
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-6">
                    <img src="{{ asset('img/pd.jpg') }}" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h1 style="color: #C60E31" class="fw-bold my-3">03</h1>
                    <h2>USB PD対応の充電器を選ぶ際の注意点！</h2>
                    <p class="lh-lg">特に消費電力の大きいノートパソコンなどは、機器側が<br>
                        必要とする電力に充電器側が対応しているか「W数を」<br>
                        確認するようにしましょう！
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- 充電器の種類 --}}
    <section class="category my-5 py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg12 text-center">
                    <h1 class="mb-4 sec-title">充電器の種類</h1>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="multiple-items text-center">
                @foreach ($types as $type)
                    <div>
                        <a href="{{ route('products.index', ['type_id' => $type->id]) }}"><img class="img-thumbnail"
                                src="{{ asset('img/') }}/{{ $type->name }}.jpg"></a>
                        <a href="{{ route('products.index', ['type_id' => $type->id]) }}">
                            <p>{{ $type->name }}タイプ</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
