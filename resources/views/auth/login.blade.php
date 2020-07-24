@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Đăng nhập') }}</div>

                <div class="card-body">
                    {{-- <form method="POST" action="{{ route('login') }}"> --}}
                    {{-- @csrf --}}

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                        <div class="col-md-6">
                        <input id="email" type="email" class="form-control " name="email" value="{{old('email')}}"
                                autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mật khẩu') }}</label>
                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                        autocomplete="current-password" value="{{old('password')}}">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <div class="col-12 col-md-6 col-lg-6  text-right">
                            <button class="btn btn-primary" id="btn_hk_login">Hộ Khẩu</button>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6 text-left">
                            <button class="btn btn-success" id="btn_nk_login">Nhân khẩu</button>
                        </div>
                    </div>
                    {{-- <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
            </div> --}}
            {{-- </form> --}}
        </div>
    </div>
</div>
</div>
<div class="row">
    <form action="{{route('hk_login')}}" method="POST" id="form_hk_login" style="display:none">
        @csrf
        <input id="email_hk" value="" name="email">
        <input id="password_hk" value="" name="password">
    </form>
    <form action="{{route('nk_login')}}" method="POST" id="form_nk_login" style="display:none">
        @csrf
        <input id="email_nk" value="" name="email">
        <input id="password_nk" value="" name="password">
    </form>
</div>
</div>
<script>
    $('#btn_hk_login').click(function(){
        console.log("btn_hk_login");
        email=$("#email").val();
        pass=$("#password").val();
        // console.log(email)
        $("#email_hk").val(email);
        $("#password_hk").val(pass);
        $('#form_hk_login').submit();
    })

    $("#btn_nk_login").click(function(){
        email=$("#email").val();
        pass=$("#password").val();
        $("#email_nk").val(email);
        $("#password_nk").val(pass);
        $('#form_nk_login').submit();
    });
</script>
@endsection