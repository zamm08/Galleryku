<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $data['title'] }}</title>
    <meta name="title" content="{{ $data['title'] }}">
    <meta name="description" content="{{ $data['description'] }}">
    <link href="bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link {{ request()->segment(1) == '' || request()->segment(1) == '/' ? 'active' : '';  }}" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->segment(1) == 'registrasi' ? 'active' : '';  }}" href="registrasi">Registrasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->segment(1) == 'login' ? 'active' : '';  }}" href="login">Login</a>
                    </li>
                    @else
                    @if(isset(auth()->user()->username))
                    <li class="nav-item d-flex align-items-center">
                        <a href="javascript:void(0);" onclick="window.document.getElementById('formLogout').submit();" class="btn btn-sm btn-danger">Logout</a>
                    </li>
                    <form id="formLogout" action="logout" method="POST" class="d-none">@csrf</form>
                    @endif
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <script src="bootstrap.bundle.min.js"></script>
</body>
</html>