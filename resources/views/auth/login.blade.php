@extends('frontend.layouts.app')

@section('section')

            <div class="tt-loginpages-wrapper">
                <div class="tt-loginpages">
                    <a href="{{url('/')}}" class="tt-block-title">
                        <img src="{{asset('frontend/assets/images/logo.png')}}" alt="">
                        <div class="tt-title">
                            Welcome to Forum19
                        </div>
                        <div class="tt-description">
                            Log into your account to unlock true power of community.
                        </div>
                    </a>
                    <form class="form-default" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="loginUserName">Username</label>
                            <input id="loginUserName" type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}"
                                   required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
{{--                            <input type="text" name="name" class="form-control" id="loginUserName" placeholder="azyrusmax" >--}}
                        </div>
                        <div class="form-group">
                            <label for="loginUserPassword">Password</label>
                            <input id="loginUserPassword" type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
{{--                            <input type="password" name="name" class="form-control" id="loginUserPassword" placeholder="************">--}}
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <div class="checkbox-group">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label for="settingsCheckBox01">
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            <span class="tt-text">Remember me</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col ml-auto text-right">
                                @if (Route::has('password.request'))
{{--                                    <a class="btn btn-link" href="{{ route('password.request') }}" >--}}
{{--                                        {{ __('Forgot Your Password?') }}--}}
{{--                                    </a>--}}

                                <a href="{{ route('password.request') }}" class="tt-underline">Forgot Password</a>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary btn-block">Log in</button>
                        </div>
                        <p>Or login with social network</p>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <a href="#" class="btn btn-color01 btn-secondary btn-block">
                                        <i>
                                            <svg class="icon">
                                                <use xlink:href="#facebook-f-brands"></use>
                                            </svg>
                                        </i>
                                        Facebook
                                    </a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <a href="#" class="btn btn-color02 btn-block">
                                        <i>
                                            <svg class="icon">
                                                <use xlink:href="#twitter-brands"></use>
                                            </svg>
                                        </i>
                                        Twitter
                                    </a>
                                </div>
                            </div>
                        </div>
                        <p>Don’t have an account? <a href="{{url('register')}}" class="tt-underline">Signup here</a></p>
                        <div class="tt-notes">
                            By Logging in, signing in or continuing, I agree to
                            Forum19’s <a href="#" class="tt-underline">Terms of Use</a> and <a href="#" class="tt-underline">Privacy Policy.</a>
                        </div>
                    </form>
                </div>
            </div>

@endsection