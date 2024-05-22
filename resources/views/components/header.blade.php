<header>
    <nav class="navbar navbar-expand-md bg-body-tertiary">
        <div class="container">
            <a class="navber-brand nav-link" href="{{ url('/') }}">
                {{-- <img src="{{ asset('img/logo.jpg') }}"> --}}
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                        <a class="navber-brand nav-link" href="{{ url('/') }}">
                            {{-- <img src="{{ asset('img/logo.jpg') }}"> --}}
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end align-items-center flex-grow-1 pe-3">
                        @guest
                            <li class="nav-item me-4">
                                <a href="{{ route('top') }}" class="nav-link fw-bold">TOP</a>
                            </li>
                            <li class="nav-item me-4">
                                <a href="{{ route('login') }}" class="nav-link fw-bold">ログイン</a>
                            </li>
                            <li class="nav-item me-4">
                                <a href="{{ route('reviews') }}" class="nav-link fw-bold">レビュー一覧</a>
                            </li>
                            <li class="nav-item me-4">
                                <a href="{{ route('contact') }}" class="nav-link fw-bold">お問い合わせ</a>
                            </li>
                        @else
                            <li class="nav-item me-4">
                                <a href="{{ route('top') }}" class="nav-link fw-bold">TOP</a>
                            </li>
                            <li class="nav-item me-4 dropdown">
                                <a class="nav-link dropdown-toggle fw-bold" href="{{ route('mypage') }}" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    マイページ
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('mypage') }}">マイページへ</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}" class="dropdown-item"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            ログアウト
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item me-4">
                                <a href="{{ route('reviews') }}" class="nav-link fw-bold">レビュー一覧</a>
                            </li>
                            <li class="nav-item me-4">
                                <a href="{{ route('contact') }}" class="nav-link fw-bold">お問い合わせ</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
