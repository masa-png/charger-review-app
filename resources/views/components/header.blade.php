<header>
    <nav class="navbar navbar-expand-md navbar-light shadow-sm h-auto">
        <div class="container">
            <a class="navber-brand" href="{{ url('/') }}">
                {{-- <img src="{{ asset('img/logo.jpg') }}"> --}}
                {{ config('app.name', 'Laravel') }}
            </a>
            @auth
                <a href="{{ route('logout') }}" class="link-dark"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                    @csrf
                </form>
            @endauth

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item me-4">
                            <a href="{{ route('top') }}" class="navlink fw-bold">TOP</a>
                        </li>
                        <li class="nav-item me-4">
                            <a href="{{ route('login') }}" class="navlink fw-bold">ログイン</a>
                        </li>
                        <li class="nav-item me-4">
                            <a href="{{ route('reviews') }}" class="navlink fw-bold">レビュー一覧</a>
                        </li>
                        <li class="nav-item me-4">
                            <a href="{{ route('top') }}" class="navlink fw-bold">お問い合わせ</a>
                        </li>
                    @else
                        <li class="nav-item me-4">
                            <a href="{{ route('top') }}" class="navlink fw-bold">TOP</a>
                        </li>
                        <li class="nav-item me-4">
                            <a href="{{ route('mypage') }}" class="navlink fw-bold">マイページ</a>
                        </li>
                        <li class="nav-item me-4">
                            <a href="{{ route('reviews') }}" class="navlink fw-bold">レビュー一覧</a>
                        </li>
                        <li class="nav-item me-4">
                            <a href="{{ route('top') }}" class="navlink fw-bold">お問い合わせ</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>
