@extends('layouts.app')

@section('content')
    <div>
        <img src="{{ asset('img/') }}" class="img-fluid">
    </div>

    {{-- USB PDとは？ --}}
    <section class="explanation my-5 py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg12 text-center">
                    <h1 class="mb-4 sec-title">USB PDとは？</h1>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row mb-5">
                <div class="col-md-6">
                    <img src="{{ asset('img/') }}" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h1 style="color: #C60E31;" class="fw-bold mb-3">01</h1>
                    <h2>USB PDとは「USB Power Delivery」の略称！</h2>
                    <p>USB規格を作成している団体によって定められた、Type-Cに<br>
                        対応した給電規格のこと。最大100Wの電力を供給できるよう<br>
                        に規格されています。
                    </p><br>
                    <span>※2022年には最大240Wまで引き上げられています。</span>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-6">
                    <h1 style="color: #C60E31" class="fw-bold mb-3">02</h1>
                    <h2>USB PDのメリット！</h2>
                    <p>対応機器を接続するだけでUSB PD規格による急速充電を<br>
                        自動的に行うことが出来る。接続機器側は充電器側の<br>
                        供給能力以上の電力を要求しないため、安全に使用することができます。
                    </p>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('img/') }}" class="img-fluid">
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-6">
                    <img src="{{ asset('img/') }}" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h1 style="color: #C60E31" class="fw-bold mb-3">03</h1>
                    <h2>USB PD対応の充電器を選ぶ際の注意点！</h2>
                    <p>特に消費電力の大きいノートパソコンなどは、機器側が<br>
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
                <div>
                    <a href=""><img class="img-thumbnail" src="{{ asset('img/') }}" alt="壁挿しタイプ"></a>
                    <a href="">
                        <p>壁挿しタイプ</p>
                    </a>
                </div>
                <div>
                    <a href=""><img class="img-thumbnail" src="{{ asset('img/') }}" alt="卓上タイプ"></a>
                    <a href="">
                        <p>卓上タイプ</p>
                    </a>
                </div>
                <div>
                    <a href=""><img class="img-thumbnail" src="{{ asset('img/') }}" alt="ワイヤレスタイプ"></a>
                    <a href="">
                        <p>ワイヤレスタイプ</p>
                    </a>
                </div>
                <div>
                    <a href=""><img class="img-thumbnail" src="{{ asset('img/') }}" alt="マグネットタイプ"></a>
                    <a href="">
                        <p>マグネットタイプ</p>
                    </a>
                </div>
                <div>
                    <a href=""><img class="img-thumbnail" src="{{ asset('img/') }}" alt="ステーションタイプ"></a>
                    <a href="">
                        <p>ステーションタイプ</p>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
