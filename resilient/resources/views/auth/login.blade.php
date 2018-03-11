@extends('layouts.app')

@section('addcss')

    <style>
            
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .logocontainer {
                text-align: center;
            }

            .title {
                font-size: 44px;
            }

            .m-b-md {
                margin-bottom: 10px;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
            }
        </style>

@endsection

@section('content')

<div class="container">

    <div class="logocontainer" style="margin-bottom: 30px;">

        <img src="{{asset('img/logo.png')}}" alt="Logo" id="logo" style="width: 120px; height: auto; margin-right: 250px;">

        <div class="title m-b-md pull-right" >
            RESILIENT
        </div>

    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                    
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Recordarme') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Olvidó Su contraseña?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('addjs')
<script>
    var tl = new TimelineLite();

    var title = $('.title'),
        logo = $('#logo');

    

    tl.to(logo, 2, {rotation:90, transformOrigin:"left 50%"});


    tl.from(title, 2.5, {left:100, opacity:0});

    

</script>
    
    
@endsection
