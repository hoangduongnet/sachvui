<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Thư Viện Sách')</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home.index') }}">Thư Viện Sách</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('book.index') }}">Tất Cả Sách</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @auth
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $currentUser->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @if($currentUser->isAdmin())
                                <li><a href="{{ route('admin.book.index') }}">Quản Lý Sách</a></li>
                            <li><a href="{{ route('admin.book.create') }}">Thêm Sách</a></li>
                            @endif
                            <li><a href="{{ route('user.logout') }}">Đăng Xuất</a></li>
                        </ul>
                    </li>
                @endauth

                @guest
                    <li><a href="{{ route('user.register') }}">Đăng Ký</a></li>
                    <li><a href="{{ route('user.login') }}">Đăng Nhập</a></li>
                @endguest
            </ul>
            <form method="get" action="{{ route('search.index') }}" class="navbar-form navbar-right" autocomplete="off">
                <input type="text" class="form-control" name="keyword" placeholder="Nhập từ khóa cần tìm kiếm...">
                <button type="submit" class="btn btn-success">Tìm Sách</button>
            </form>
        </div>
    </div>
</nav>


<div class="container">
    @yield('content')
</div>

<footer>
    <div class="container">

    </div>
</footer>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
