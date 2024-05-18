<header>
    <nav class="navbar navbar-expand-md navbar-light shadow-sm h-auto">
        <div class="container">
            <a class="navber-brand" href="{{ url('/') }}">
                {{-- <img src="{{ asset('img/logo.jpg') }}"> --}}
                {{ config('app.name', 'Laravel') }}
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item me-4">
                        <a href="{{ route('top') }}" class="navlink fw-bold">TOP</a>
                    </li>
                    @guest
                        <li class="nav-item me-4">
                            <a href="{{ route('login') }}" class="navlink fw-bold">マイページ</a>
                        </li>
                    @else
                        <li class="nav-item me-4">
                            <a href="{{ route('top') }}" class="navlink fw-bold">マイページ</a>
                        </li>
                    @endguest

                    <li class="nav-item me-4">
                        <a href="{{ route('top') }}" class="navlink fw-bold">レビュー一覧</a>
                    </li>
                    <li class="nav-item me-4">
                        <a href="{{ route('top') }}" class="navlink fw-bold">お問い合わせ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
