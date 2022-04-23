@extends('layouts.app_auth')

@section('content')
    <div class="container">
        <div class="card shadow-lg o-hidden border-0 my-5 bg-primary">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-flex">
                        <div class="flex-grow-1 bg-register-image"
                            style="background: url(&quot;assets/img/white.png&quot;) center / cover no-repeat;"></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-white mb-4">Create an Account!</h4>
                            </div>
                            <form class="user" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="mb-3">
                                    <input
                                        class="border rounded-pill border-dark form-control px-3 py-2 @error('name') is-invalid @enderror"
                                        type="text" id="name" placeholder="Full Name" name="name" required=""
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <small class="ml-3 text-danger">
                                            <i class="fas fa-info-circle text-danger"></i> {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input
                                        class="border rounded-pill border-dark form-control px-3 py-2 @error('email') is-invalid @enderror"
                                        type="email" id="email" aria-describedby="emailHelp" placeholder="Email Address"
                                        name="email" required="" value="{{ old('email') }}">
                                    @error('email')
                                        <small class="ml-3 text-danger">
                                            <i class="fas fa-info-circle text-danger"></i> {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input
                                        class="border rounded-pill border-dark form-control px-3 py-2 @error('username') is-invalid @enderror"
                                        type="text" id="username" aria-describedby="emailHelp" placeholder="Username"
                                        name="username" required="" value="{{ old('username') }}">
                                    @error('username')
                                        <small class="ml-3 text-danger">
                                            <i class="fas fa-info-circle text-danger"></i> {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <div class="input-group">
                                            <input class="form-control px-3 py-2 @error('password') is-invalid @enderror"
                                                type="password" id="password"
                                                style="font-size: 13;border-top-left-radius: 25px;border-bottom-left-radius: 25px;border-width: 0px;"
                                                name="password" placeholder="Password" required="" minlength="8">
                                            <span class="bg-success input-group-text"
                                                style="border-top-right-radius: 25px;border-bottom-right-radius: 25px;background: #2aa198;border-width: 0px;"><i
                                                    class="text-white fas fa-eye" style="; cursor:pointer;"></i>
                                            </span>
                                        </div>
                                        @error('password')
                                            <small class="ml-3 text-danger">
                                                <i class="fas fa-info-circle text-danger"></i> {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <input
                                                class="form-control px-3 py-2 @error('password_confirmation') is-invalid @enderror"
                                                type="password" id="password_confirmation"
                                                style="font-size: 13;border-top-left-radius: 25px;border-bottom-left-radius: 25px;border-width: 0px;font-family: Nunito, sans-serif;"
                                                name="password_confirmation" placeholder="Repeat Password" required=""
                                                minlength="8">
                                            <span class="input-group-text bg-success"
                                                style="border-top-right-radius: 25px;border-bottom-right-radius: 25px;background: #2aa198;border-width: 0px;">
                                                <i class="fas fa-eye text-white" style=" cursor:pointer;"></i>
                                            </span>
                                        </div>
                                        @error('password_confirmation')
                                            <small class="ml-3 text-danger">
                                                <i class="fas fa-info-circle text-danger"></i> {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <button class="btn btn-dark btn-lg rounded-pill d-block btn-user w-100 mt-4"
                                    type="submit">Register Account
                                </button>
                                <hr>
                            </form>
                            <div class="text-center" style="margin-bottom: 10px;"><a class="text-white"
                                    href="#">Forgot Password?</a></div>
                            <div class="text-center"><a class="text-white" href="{{ route('login') }}">Already
                                    have
                                    an
                                    account? Login!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
                                }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password')
                                }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm
                                Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
