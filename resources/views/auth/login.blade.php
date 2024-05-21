<!DOCTYPE html>
<!--
Template Name: Tinker - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="dist/images/logo.svg" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Tinker admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Tinker Admin Template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <title>Login</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{ asset('backend/dist/css/app.css') }}" />
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Login Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <a href="" class="-intro-x flex items-center pt-5">
                        <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('backend/dist/images/logo.svg') }}">
                        <span class="text-white text-lg ml-3"> Tinker </span>
                    </a>
                    <div class="my-auto">
                        <img alt="Midone - HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="{{ asset('backend/dist/images/illustration.svg') }} ">
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                            Hãy đăng nhập vào
                            <br>
                            tài khoản của bạn
                        </div>
                        <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">Quản lí công việc của bạn tại mọi nơi</div>
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Đăng nhập
                        </h2>
                        <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">Hãy đăng nhập vào tài khoản của bạn</div>
                        <form action="{{ route('auth.login.store') }}" method="POST">
                            @csrf
                            <div class="intro-x mt-8">
                                <input id="email" type="email"  type="text" class="intro-x login__input form-control py-3 px-4 block @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback invalid-feedback text-red-500 text-sm mt-2 block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                <input id="password" type="password" type="password" class="intro-x login__input form-control py-3 px-4 block mt-4 @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4">
                                <div class="flex items-center mr-auto">
                                    <input id="remember-me" type="checkbox" class="form-check-input border mr-2">
                                    <label class="cursor-pointer select-none" for="remember-me" >Nhớ mật khẩu</label>
                                </div>
                                @if (Route::has('password.request'))
                                <a class="" href="{{ route('password.request') }}">
                                    Quên mật khẩu ?
                                </a>
                            @endif
                            </div>
                            <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                                <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top" type="submit">Đăng nhập</button>
                                <a href="{{ route('register') }}">
                                    <button class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top" type="button">Đăng kí</button>
                                </a>
                            </div>
                        </form>
                        <div class="intro-x mt-8 grid items-center">
                            <div class="line-break text-center text-[#999] mb-5 flex justify-center">
                                <span class="grow h-14">hoặc đăng nhập qua</span>
                            </div>
                            <div class="social-login text-center grid grid-cols-2 gap-x-8 pb-5 items-center">
                                <a class="social-login--facebook grid justify-items-center " onclick="loginFacebook()" >
                                    <img width="129px" height="37px" alt="facebook-login-button" src="//bizweb.dktcdn.net/assets/admin/images/login/fb-btn.svg">
                                </a>
                                <a class="social-login--google grid justify-items-center"  onclick="loginGoogle()">
                                    <img width="129px" height="37px" alt="google-login-button" src="//bizweb.dktcdn.net/assets/admin/images/login/gp-btn.svg">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Login Form -->
            </div>
        </div>
        <!-- BEGIN: Dark Mode Switcher-->
        <!-- END: Dark Mode Switcher-->

        <!-- BEGIN: JS Assets-->
        <script src="{{ asset('backend/dist/js/app.js') }}"></script>
        <script type="text/javascript">
            function loginGoogle() {
                var width = 600, height = 400;
                var left = (screen.width - width)/2;
                var top = (screen.height - height)/2;
                var url = '/login/oauth/google'; // Đảm bảo URL này trỏ đến route xử lý Socialite::driver('google')->redirect()
                var params = 'width=' + width + ', height=' + height;
                params += ', top=' + top + ', left=' + left;
                params += ', directories=no';
                params += ', location=no';
                params += ', menubar=no';
                params += ', resizable=no';
                params += ', scrollbars=no';
                params += ', status=no';
                params += ', toolbar=no';
                window.open(url, 'Google Login', params);
            }
            function loginFacebook() {
                var width = 600, height = 400;
                var left = (screen.width - width)/2;
                var top = (screen.height - height)/2;
                var url = '/login/oauth/facebook'; // Đảm bảo URL này trỏ đến route xử lý Socialite::driver('google')->redirect()
                var params = 'width=' + width + ', height=' + height;
                params += ', top=' + top + ', left=' + left;
                params += ', directories=no';
                params += ', location=no';
                params += ', menubar=no';
                params += ', resizable=no';
                params += ', scrollbars=no';
                params += ', status=no';
                params += ', toolbar=no';
                window.open(url, 'Google Login', params);
            }
        </script>
        </script>
        <!-- END: JS Assets-->
    </body>
</html>
