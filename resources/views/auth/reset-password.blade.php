<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bytedash - Password Reset</title>

    <!-- favicon -->
    <link rel="icon" href="{{ asset('html/favicons.png') }}" sizes="16x16" type="image/png">
    <!-- animate -->
    <link rel="stylesheet" href="{{ asset('html/assets/css/animate.css') }}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('html/assets/css/bootstrap.min.css') }}">
    <!-- All Icon -->
    <link rel="stylesheet" href="{{ asset('html/assets/css/icon.css') }}">
    <!-- slick carousel -->
    <link rel="stylesheet" href="{{ asset('html/assets/css/slick.css') }}">
    <!-- Select2 Css -->
    <link rel="stylesheet" href="{{ asset('html/assets/css/select2.min.css') }}">
    <!-- Sweet alert Css -->
    <link rel="stylesheet" href="{{ asset('html/assets/css/sweetalert.css') }}">
    <!-- Flatpickr Css -->
    <link rel="stylesheet" href="{{ asset('html/assets/css/flatpickr.min.css') }}">
    <!-- Country Select Css -->
    <link rel="stylesheet" href="{{ asset('html/assets/css/niceCountryInput.css') }}">
    <link rel="stylesheet" href="{{ asset('html/assets/css/jsuites.css') }}">
    <!-- Fancy box Css -->
    <link rel="stylesheet" href="{{ asset('html/assets/css/fancybox.css') }}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('html/assets/css/dashboard.css') }}">
</head>

<body>

    <!-- Password Reset Area start -->
    <section class="loginForm">
        <div class="loginForm__flex">
            <div class="loginForm__left">
                <div class="loginForm__left__inner desktop-center">
                    <div class="loginForm__header">
                        <h2 class="loginForm__header__title">Reset Password</h2>
                        <p class="loginForm__header__para mt-3">Enter a new password to reset your account access.</p>
                    </div>
                    <div class="loginForm__wrapper mt-4">
                        <!-- Form -->
                        <form id="reset_form" class="custom_form">

                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <!-- Validation Errors -->
                            @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <!-- Email Address -->
                            <div class="single_input">
                                <label class="label_title" for="email">{{ __('Email') }}</label>
                                <div class="include_icon">
                                    <input class="form--control radius-5" type="email" id="email" name="email" placeholder="Enter email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" />
                                    <div class="icon"><span class="material-symbols-outlined">mail</span></div>
                                </div>
                            </div>

                            <!-- New Password -->
                            <div class="single_input mt-4">
                                <label class="label_title" for="password">{{ __('New Password') }}</label>
                                <div class="include_icon">
                                    <input class="form--control radius-5" type="password" id="password" name="password" placeholder="Enter new password" required autocomplete="new-password" />
                                    <div class="icon"><span class="material-symbols-outlined">lock</span></div>
                                </div>
                            </div>

                            <!-- Confirm Password -->
                            <div class="single_input mt-4">
                                <label class="label_title" for="password_confirmation">{{ __('Confirm Password') }}</label>
                                <div class="include_icon">
                                    <input class="form--control radius-5" type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm new password" required autocomplete="new-password" />
                                    <div class="icon"><span class="material-symbols-outlined">lock</span></div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="btn_wrapper single_input d-flex gap-2 mt-4">
                                <button type="submit" class="cmn_btn w-100 radius-5">{{ __('Reset Password') }}</button>
                                <a href="{{ route('login') }}" class="cmn_btn outline_btn w-100 radius-5">{{ __('Cancel') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="loginForm__right loginForm__bg" style=`background-image: url(\' {{ asset("html/assets/img/login.jpg") }}\')`>

                <div class="loginForm__right__logo">
                    <div class="loginForm__logo">
                        <a href="index.html"><img src="{{ asset('html/assets/img/logo.webp') }}" alt="Logo"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Password Reset Area end -->

    <!-- Scripts -->
    <script src="{{ asset('html/assets/js/jquery-3.6.4.min.js') }}"></script>
    <script src="{{ asset('html/assets/js/jquery-migrate-3.4.1.min.js') }}"></script>
    <script src="{{ asset('html/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('html/assets/js/slick.js') }}"></script>
    <script src="{{ asset('html/assets/js/plugin.js') }}"></script>
    <script src="{{ asset('html/assets/js/fancybox.umd.js') }}"></script>
    <script src="{{ asset('html/assets/js/niceCountryInput.js') }}"></script>
    <script src="{{ asset('html/assets/js/jsuites.js') }}"></script>
    <script src="{{ asset('html/assets/js/main.js') }}"></script>

    <script>
        $(document).ready(function() {
            let csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            $('#reset_form').on('submit', function(e) {
                e.preventDefault();

                let email = $('#email').val().trim();
                let password = $('#password').val();
                let passwordConfirmation = $('#password_confirmation').val();
                let token = $('input[name="token"]').val();

                // Front-end validation
                if (email === "") {
                    alert("Email is required.");

                } else if (password === "") {
                    alert("Password is required.");

                } else if (passwordConfirmation === "") {
                    alert("Password confirmation is required.");

                } else if (password !== passwordConfirmation) {
                    alert("Passwords do not match.");

                } else {
                    // AJAX request to submit the form
                    $.ajax({
                        url: "{{ route('password.store') }}",
                        method: 'POST',
                        data: {
                            email: email,
                            password: password,
                            password_confirmation: passwordConfirmation,
                            token: token
                        },
                        success: function() {

                            alert("Password has been reset successfully!");
                            window.location.href = "{{ route('login') }}";
                        },
                        error: function(xhr) {
                            alert('Validation errors: \n' + xhr.responseJSON.message);
                        }
                    });
                }
            });
        });
    </script>


</body>

</html>