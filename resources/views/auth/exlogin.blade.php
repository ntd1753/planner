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
    <link href="{{ asset('backend/dist/images/logo.svg') }}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Tinker admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Tinker Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Register - Midone - Tailwind HTML Admin Template</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/app.css') }}" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="login">
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Register Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="Midone - HTML Admin Template" class="w-6"
                        src="{{ asset('backend/dist/images/logo.svg') }}">
                    <span class="text-white text-lg ml-3"> Tinker </span>
                </a>
                <div class="my-auto">
                    <img alt="Midone - HTML Admin Template" class="-intro-x w-1/2 -mt-16"
                        src="{{ asset('backend/dist/images/illustration.svg') }}">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                        Đăng kí tài khoản của bạn
                    </div>
                    <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">Quản lí công việc
                        của bạn ở mọi nơi</div>
                </div>
            </div>
            <!-- END: Register Info -->
            <!-- BEGIN: Register Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div
                    class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                        Sign Up
                    </h2>
                    <div class="intro-x mt-2 text-slate-400 dark:text-slate-400 xl:hidden text-center">
                        Đăng kí tài khoản của bạn</div>
                    <form id="registerForm">
                        @csrf
                        <div class="intro-x mt-8">
                            <input type="text" class="intro-x login__input form-control py-3 px-4 block mt-4"
                                placeholder="Họ và tên" name="name" id="name" required>
                            <input type="text" class="intro-x login__input form-control py-3 px-4 block mt-4"
                                placeholder="Email" name="email" id="email" required>
                            <input type="password" class="intro-x login__input form-control py-3 px-4 block mt-4"
                                placeholder="Password" name="password" id="password" required>
                            <input type="password" class="intro-x login__input form-control py-3 px-4 block mt-4"
                                placeholder="Password Confirmation" id="cf-pass" required>

                        </div>
                        <div id="message" class="intro-x mt-5 xl:mt-8 text-center xl:text-left text-red-500 text-sm mt-2 block">

                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top"
                                type="submit">Đăng kí</button>
                            <a href="{{ route('login') }}">
                                <button
                                    class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top"
                                    type="button">Đăng nhập</button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END: Register Form -->
        </div>
    </div>
    <!-- BEGIN: Dark Mode Switcher-->

    <!-- END: Dark Mode Switcher-->

    <!-- BEGIN: JS Assets-->
    <script src="{{ asset('backend/dist/js/app.js') }}"></script>
    <!-- Import CDN jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Call Ajax handle -->
    <script>
        $(document).ready(function() {
            $('#registerForm').submit(function(e) {
                e.preventDefault();
                const name = $('#name').val();
                const email =$('#email').val();
                const password = $('#password').val();
                const cfPass = $('#cf-pass').val();

                if(cfPass == password){
                    if(password.length<8){
                        document.getElementById(`message`).innerText="mật khẩu phải có ít nhất 8 kí tự";
                        return true;
                    }
                    $.ajax({
                    type: 'POST',
                    url: '/register/store', // Đường dẫn đến route xử lý đăng ký
                    data: {
                        _token: '{{ csrf_token() }}',
                        email: email,
                        name: name,
                        password: password
                    },
                    success: function(response) {
                        //$('#message').text(response.message);
                        window.location.href = '/login';
                    },
                    error: function(xhr, status, error) {
                        //$('#message').text(xhr.responseJSON.error);
                        document.getElementById(`message`).innerText=xhr.responseJSON.message;
                    }
                });
                }
                else{
                    document.getElementById(`message`).innerText="mật khẩu nhập lại sai";
                }

            });
        });
    </script>
    <!-- END: JS Assets-->
</body>

</html>
