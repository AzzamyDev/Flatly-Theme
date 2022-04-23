@extends('layouts.app_auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5 bg-primary">
                    <div class="card-body p-0">
                        <div class="row justify-content-center">
                            {{-- <div class="col-lg-6 d-none d-lg-flex">
                            <div class="flex-grow-1 bg-login-image"
                                style="background-image: url(&quot;assets/img/background.png&quot;) center / cover no-repeat; ">
                            </div>
                        </div> --}}
                            <div class="col-lg-7">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-white mb-4">Welcome Back!</h4>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="mb-4">
                                            <input
                                                class="border rounded-pill border-none form-control px-3 py-2 @error('username') is-invalid @enderror"
                                                type="username" id="exampleInputEmail" placeholder="Enter Username"
                                                name="username" autofocus="" required="">
                                            {{-- Error Message --}}
                                            @error('username')
                                                <small class="ml-3 text-danger">
                                                    <i class="fas fa-info-circle text-danger"></i> {{ $message }}
                                                </small>
                                            @enderror
                                            {{-- End Error --}}
                                        </div>
                                        <div class="mb-5">
                                            <div class="input-group">
                                                <input
                                                    class="form-control px-3 py-2 @error('password') is-invalid @enderror"
                                                    type="password"
                                                    style="font-size: 13;border-top-left-radius: 25px;border-bottom-left-radius: 25px;border-width: 0px;"
                                                    name="password" placeholder="Password" required="">
                                                {{-- <span class="border-dark bg-primary input-group-text"
                                                style="border-top-right-radius: 25px;border-bottom-right-radius: 25px;"><i
                                                    class="fas fa-eye text-white" style="cursor:pointer;"></i>
                                            </span> --}}
                                                <span class="border-success input-group-text bg-dark"
                                                    style="border-top-right-radius: 25px;border-bottom-right-radius: 25px;border-width: 0px;"><i
                                                        class="text-white fas fa-eye" style="; cursor:pointer;"></i>
                                                </span>
                                            </div>
                                            @error('password')
                                                <small class="ml-3 text-danger">
                                                    <i class="fas fa-info-circle text-danger"></i> {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                        {{-- <div class="mb-3">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check"><input
                                                        class="form-check-input custom-control-input" type="checkbox"
                                                        id="formCheck-1"><label
                                                        class="form-check-label text-white-50 custom-control-label"
                                                        for="formCheck-1">Remember Me</label></div>
                                            </div>
                                        </div> --}}
                                        <button type="submit"
                                            class="rounded-pill btn btn-lg btn-dark d-block shadow-none w-100">Login</button>
                                        <hr text-dark>
                                    </form>
                                    <div class="text-center" style="margin-bottom: 10px;"><a class=" text-white"
                                            href="forgot-password" style="margin-bottom: 0;">Forgot Password?</a></div>
                                    <div class="text-center"><a class="link-light text-white" href="register">Create an
                                            Account!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
