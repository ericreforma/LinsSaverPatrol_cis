@extends('master.index')

@section('auth')

<div class="login_wrapper">
    <div class="login_container">
        <div>
            <div class='logo_container'>
                <img src="{{ asset('/img/logo_big.jpg') }}" />
                <h1>Saver Patrol</h1>
                <h3>Customer Information System</h3>
            </div>
            <div class="form_container">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <h2>Login</h2>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                            <input id="username" 
                                type="text" class="form-control @error('username') is-invalid @enderror" 
                                name="username" value="{{ old('username') }}" required autocomplete="username" autofocus
                                placeholder="Username">
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-key"></i>
                                </span>
                            </div>
                            <input id="password" type="password" 
                                class="form-control @error('password') is-invalid @enderror" name="password" 
                                required autocomplete="current-password"
                                placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary login_button">
                            {{ __('Login') }}
                        </button>

                        <!-- @if (Route::has('password.request'))
                            <div class="forgot_password">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        @endif -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
