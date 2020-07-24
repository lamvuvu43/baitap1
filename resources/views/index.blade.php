<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('pageTitle') - Quản lý hổ khẩu</title>



    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- bootstrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">

    <link href="{{asset('/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" crossorigin="anonymous" />
    <script src="{{ asset('js/font-awesome.5.1.min.js') }}" crossorigin="anonymous"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap4.min.css"
        rel="stylesheet" />
    <link href="{{ asset('/css/loading.css')}}" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/nhan_khau.css')}}">
    <link rel="stylesheet" href="{{asset('css/ho_khau.css')}}">
    <link rel="stylesheet" href="{{asset('css/popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-confirm.min.css')}}">
    <script src="{{asset("js/jquery-confirm.min.js")}}"></script>

</head>

<body>
    <div class="loading">
        <div class="showloading"></div>
    </div>
    @if (session('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ session('success') }}
    </div>
    @endif
    @if (session('no_permision'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ session('no_permision') }}
    </div>
    @endif
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        {{-- <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
        @else
        <a href="{{ route('login') }}">Login</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}">Register</a>
        @endif
        @endauth
    </div> --}}
    @endif
    <div class="container" style="position: relative;">
        <div class="jumbotron text-center">
            <h1>Quản lý hộ khẩu</h1>
            {{-- <p>Bootstrap is the most popular HTML, CSS, and JS framework for developing --}}
            {{-- responsive, mobile-first projects on the web.</p> --}}
        </div>
        <ul class="nav justify-content-center bg-">
            @if(Auth::check())
            <li class="nav-item">
                <a class="nav-link active" href="{{route('ho_khau')}}">Hộ Khẩu</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('nhan_khau')}}">Nhân Khẩu</a>
            </li>
            @endif
            <li class="nav-item drowpdown">

                <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(Auth::check())
                    {{Auth::user()->name}}
                    @else
                    @if(Auth::guard('nhan_khau_login')->check())
                    {{Auth::guard('nhan_khau_login')->user()->Ho_Ten}}
                    @endif
                    @endif

                </a>
                <div class="dropdown-menu">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                </div>
            </li>


            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

        </ul>
        @yield('list_ho_khau')
        @yield('add_ho_khau')
        @yield('edit_ho_khau')
        @yield('list_nhan_khau')
        @yield('add_member_to_hk')
        @yield('list_nhan_khau_by_hk')
    </div>

    {{-- <div class="container bg-light">
          
        </div> --}}
    </div>
    <!-- Thư viện jquery đã nén phục vụ cho bootstrap.min.js  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Thư viện popper đã nén phục vụ cho bootstrap.min.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <!-- Bản js đã nén của bootstrap 4, đặt dưới cùng trước thẻ đóng body-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/loading.js') }}"></script>
    <script src="{{asset('js/table2csv.js')}}"></script>
</body>

</html>