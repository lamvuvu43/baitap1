@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Đăng nhập') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('hk_login') }}" id="form_login">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email | User</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control " name="email"
                                    value="{{old('email')}}" autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Mật khẩu') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password" value="{{old('password')}}">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
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
            </form>
            <div class="form-group row mb-2">
                <div class="col-12 col-md-6 col-lg-6  text-md-right text-lg-right text-sm-center mb-sm-2">
                    <button class="btn btn-primary" id="btn_hk_login"  style="width:93px">Hộ Khẩu</button>
                </div>
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left  text-sm-center">
                    <button class="btn btn-success" id="btn_nk_login">Nhân khẩu</button>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    $('#btn_hk_login').click(function(){
      $("#form_login").submit();
    })

    $("#btn_nk_login").click(function(event){
        event.preventDefault();
        $("#form_login").attr('action',"{{route('nk_login')}}");
        $("#form_login").submit();
    });
    $(".close").click(function(e){
    
        $(".alert").hide(500);
    })
</script>
@endsection