@extends('layouts.app')
@section('content')
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h2 class="text-center mb-3">{{ __('お問い合わせありがとうございます。') }}</h2>
                <div class="text-center">
                    <p>{{ __('このたびは、お問い合わせ頂き誠にありがとうございます。') }}</p>
                    {{-- <p>{{ __('お送り頂きました内容を確認の上、3営業日以内に折り返しご連絡させて頂きます。') }}</p>
                    <p>{{ __('また、ご記入頂いたメールアドレスへ、自動返信の確認メールをお送りしております。') }}</p>
                    <p>{{ __('しばらく経ってもメールが届かない場合は、入力頂いたメールアドレスが間違っているか、迷惑メールフォルダに振り分けられている可能性がございます。') }}</p> --}}
                    {{-- <p>{{ __('また、ドメイン指定をされている場合は、「@masa-studio.net」からのメールが受信できるようあらかじめ設定をお願いいたします。') }}</p> --}}
                    {{-- <p>{{ __('以上の内容をご確認の上、お手数ですがもう一度フォームよりお問い合わせ頂きますようお願い申し上げます。') }}</p><br><br> --}}
                </div>

                <div class="text-center">
                    <a href="{{ route('products.index') }}" class="btn submit-button w-75 text-white">投稿一覧へ</a>
                </div>
            </div>
        </div>
    </div>
@endsection
