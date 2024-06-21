<footer>
    <div class="d-flex justify-content-center fs-4 mb-4">
        <a href="{{ url('/') }}" class="text-center">
            {{ config('app.name', 'Laravel') }}
        </a>
    </div>

    <div class="d-flex justify-content-center mb-4 text-white">
        @guest
            <a href="{{ route('login') }}" class="me-3">ログイン</a>
            <a href="{{ route('register') }}">新規登録</a>
        @else
            <a href="{{ route('mypage') }}" class="me-3">マイページ</a>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endguest
    </div>

    <div class="d-flex justify-content-center mb-4">
        <a href="{{ route('terms.index') }}" class="me-3">利用規約</a>
        <a href="{{ route('contact.index') }}">お問い合わせ</a>
    </div>

    <div class="d-flex justify-content-center mb-5">
        <a href="{{ route('privacypolicy.index') }}" class="me-3">プライバシーポリシー</a>
    </div>

    <div class="d-flex justify-content-center">
        <p class="text-center text-white">
            &copy;{{ config('app.name', 'Laravel') }} All rights reserved.
        </p>
    </div>
    </div>
</footer>
