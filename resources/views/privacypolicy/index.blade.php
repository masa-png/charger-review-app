@extends('layouts.app')
@section('content')
    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-10">
                <nav class="my-3" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('top') }}">トップ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">利用規約</li>
                    </ol>
                </nav>

                <h2 class="mb-4 text-center">プライバシーポリシー</h2>

                <div class="mb-4">
                    <p>以下に当サイトのプライバシーポリシーを記載します。
                    </p>

                    <h2>1.個人情報の利用目的</h2>
                    <ul>
                        <li>当サイトでは、メールのお問い合わせ、会員登録などの際に、名前（会員ID）、メールアドレス等の個人情報をご登録いただく場合があります。</li>
                        <li>これらの個人情報は質問に対する回答や必要な情報を電子メールなどでご連絡する場合に利用させていただくものであり、個人情報をご提供いただく際の目的以外では利用致しません。
                        </li>
                    </ul>

                    <h2>2.個人情報の第三者への開示</h2>
                    <p>当サイトでは、個人情報を適切に管理し、いかに該当する場合を除いて第三者に開示することはありません。</p>
                    <ul>
                        <li>本人のご了解がある場合</li>
                        <li>法令等への協力のため、開示が必要となる場合</li>
                    </ul>

                    <h2>3.個人情報の開示、訂正、追加、削除、利用停止</h2>
                    <p>ご本人からの個人データの開示、訂正、追加、削除、利用停止のご希望の場合には、ご本人であることを確認させていただいた上、速やかに対応させていただきます。</p>

                    <h2>4.クッキー (Cookie)</h2>
                    <p>当サイトでは、一部のコンテンツについてCookie（クッキー）を利用しています。
                    </p>
                    <ul>
                        <li>Cookieとは、サイトにアクセスした際にブラウザに保存される情報ですが、お名前やメールアドレス等の個人情報は含まれません。</li>
                        <li>当サイトにアクセスいただいた方々に効果的な広告を配信するためやアクセス解析にCookieの情報を利用させていただく場合があります。</li>
                        <li>ブラウザの設定により、Cookieを使用しないようにすることも可能です。</li>
                    </ul>

                    <h2>5.プライバシーポリシーの変更について</h2>
                    <ul>
                        <li>当サイトは、個人情報に関して適用される日本の法令を遵守するとともに、本ポリシーの内容を適宜見直しその改善に努めます。</li>
                        <li>修正された最新のプライバシーポリシーは常に本ページにて開示されます。</li>
                    </ul>

                    <h2>5.免責事項</h2>
                    <ul>
                        <li>当サイトのコンテンツ・情報につきまして、可能な限り正確な情報を掲載するよう努めておりますが、誤情報が入り込んだり、情報が古くなっていることもございます。</li>
                        <li>当サイトに掲載された内容によって生じた損害等の一切の責任を負いかねますのでご了承ください。</li>
                    </ul>

                    <h5 class="mt-4">運営者情報</h5>
                    <h5 class="text-body-secondary">{{ config('app.name', 'Laravel') }}</h5>
                    <h5 class="text-body-secondary">https://charger-review.com</h5>
                </div>
            </div>
        </div>
    </div>
@endsection
