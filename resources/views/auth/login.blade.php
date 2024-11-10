<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bytedash - Admin Template</title>

    <!-- favicon -->
    <link rel=icon href="html/favicons.png" sizes="16x16" type="icon/png">
    <!-- animate -->
    <link rel="stylesheet" href="html/assets/css/animate.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="html/assets/css/bootstrap.min.css">
    <!-- All Icon -->
    <link rel="stylesheet" href="html/assets/css/icon.css">
    <!-- slick carousel  -->
    <link rel="stylesheet" href="html/assets/css/slick.css">
    <!-- Select2 Css -->
    <link rel="stylesheet" href="html/assets/css/select2.min.css">
    <!-- Sweet alert Css -->
    <link rel="stylesheet" href="html/assets/css/sweetalert.css">
    <!-- Flatpickr Css -->
    <link rel="stylesheet" href="html/assets/css/flatpickr.min.css">
    <!-- Country Select Css -->
    <link rel="stylesheet" href="html/assets/css/niceCountryInput.css">
    <link rel="stylesheet" href="html/assets/css/jsuites.css">
    <!-- Fancy box Css -->
    <link rel="stylesheet" href="html/assets/css/fancybox.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="html/assets/css/dashboard.css">
    <!-- dark css -->

</head>

<body>



    <!--login Area start-->
    <section class="loginForm">
        <div class="loginForm__flex">
            <div class="loginForm__left">
                <div class="loginForm__left__inner desktop-center">
                    <div class="loginForm__header">
                        <h2 class="loginForm__header__title">Welcome Back</h2>
                        <p class="loginForm__header__para mt-3">Login with your data that you entered during registration.</p>
                    </div>
                    <div class="loginForm__wrapper mt-4">
                        <!-- Form -->
                        <form class="custom_form">

                            <!-- Email Address -->
                            <div class="single_input">
                                <label class="label_title" for="email">{{ __('Email') }}</label>
                                <div class="include_icon">
                                    <input class="form--control radius-5" type="email" id="email" name="email" placeholder="Enter your email address" :value="old('email')" required autofocus autocomplete="username">
                                    <div class="icon"><span class="material-symbols-outlined">mail</span></div>
                                </div>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="single_input mt-4">
                                <label class="label_title" for="password">{{ __('Password') }}</label>
                                <div class="include_icon">
                                    <input class="form--control radius-5" type="password" id="password" name="password" placeholder="Enter your password" required autocomplete="current-password">
                                    <div class="icon"><span class="material-symbols-outlined">lock</span></div>
                                </div>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Remember Me -->
                            <div class="loginForm__wrapper__remember single_input mt-4">
                                <div class="dashboard_checkBox">
                                    <input class="dashboard_checkBox__input" id="remember" type="checkbox" name="remember">
                                    <label class="dashboard_checkBox__label" for="remember">{{ __('Remember me') }}</label>
                                </div>
                                @if (Route::has('password.request'))
                                <div class="forgotPassword">
                                    <a href="{{ route('password.request') }}" class="forgotPass">{{ __('Forgot passwords?') }}</a>
                                </div>
                                @endif
                            </div>

                            <!-- Sign In Button -->
                            <div class="btn_wrapper single_input mt-4">
                                <x-primary-button class="cmn_btn w-100 radius-5">
                                    {{ __('Log In') }}
                                </x-primary-button>
                            </div>

                            <!-- Sign Up & Social Login Links -->
                            <div class="btn-wrapper mt-4">
                                <p class="loginForm__wrapper__signup">
                                    <span>{{ __("Don't have an account?") }}</span>
                                    <a href="{{ route('register') }}" class="loginForm__wrapper__signup__btn">{{ __('Sign Up') }}</a>
                                </p>
                                <div class="loginForm__wrapper__another d-flex flex-column gap-2 mt-3">
                                    <a href="{{route('auth.redirection','google')}}" class="loginForm__wrapper__another__btn radius-5 w-100">
                                        <img src="html/assets/img/icon/googleIocn.svg" alt="Google" class="icon"> Login With Google
                                    </a>
                                    <a href="{{route('auth.redirection','facebook')}}" class="loginForm__wrapper__another__btn radius-5 w-100">
                                        <img src="html/assets/img/icon/fbIcon.svg" alt="Facebook" class="icon"> Login With Facebook
                                    </a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="loginForm__right loginForm__bg " style="background-image: url(html/assets/img/login.jpg);">
                <div class="loginForm__right__logo">
                    <div class="loginForm__logo">
                        <a href="index.html"><img src="html/assets/img/logo.webp" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- login Area end -->





    <!-- jquery -->
    <script src="html/assets/js/jquery-3.6.4.min.js"></script>
    <!-- jquery Migrate -->
    <script src="html/assets/js/jquery-migrate-3.4.1.min.js"></script>
    <!-- bootstrap -->
    <script src="html/assets/js/bootstrap.bundle.min.js"></script>
    <!-- Slick Slider -->
    <script src="html/assets/js/slick.js"></script>
    <!-- Plugins Js -->
    <script src="html/assets/js/plugin.js"></script>

    <!-- Country Select Js -->
    <script src="html/assets/js/niceCountryInput.js"></script>
    <!-- Multiple Country Select Js -->
    <script src="html/assets/js/jsuites.js"></script>
    <!-- Fancy box Js -->
    <script src="html/assets/js/fancybox.umd.js"></script>
    <!-- main js -->
    <script src="html/assets/js/main.js"></script>

    <script>
        $(document).ready(function() {
            // Handle form submission with AJAX
            $('.custom_form').on('submit', function(event) {
                event.preventDefault(); // Prevent form from submitting traditionally



                // Collect form data
                var formData = {
                    email: $('#email').val(),
                    password: $('#password').val(),
                    remember: $('#remember').is(':checked') ? 1 : 0,
                    _token: $('input[name="_token"]').val()
                };

                // AJAX request to the login route
                $.ajax({
                    url: "{{ route('login') }}",
                    method: 'POST',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            alert('Login successful! Redirecting...');
                            window.location.href = response.redirect_url;
                        } else {
                            alert('Login failed: ' + response.message);
                        }
                    },
                    error: function(xhr) {
                        alert('Validation errors: \n' + xhr.responseJSON.message);
                    }
                });
            });
        });
    </script>

</body>

</html>