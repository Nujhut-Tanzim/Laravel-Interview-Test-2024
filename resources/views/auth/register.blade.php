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
                        <p class="loginForm__header__para mt-3">Register with your data.</p>
                    </div>
                    <div class="loginForm__wrapper mt-4">
                        <!-- Form -->
                        <form class="custom_form" id="registerForm">
                            <!-- Name -->
                            <div class="single_input">
                                <label class="label_title">Name</label>
                                <div class="include_icon">
                                    <input class="form--control radius-5" type="text" name="name" placeholder="Enter your Full Name" value="{{ old('name') }}" required autofocus autocomplete="name">
                                    <div class="icon"><span class="material-symbols-outlined">person</span></div>
                                </div>
                                @error('name')
                                <div class="error_message">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email Address -->
                            <div class="single_input">
                                <label class="label_title">Email</label>
                                <div class="include_icon">
                                    <input class="form--control radius-5" type="email" name="email" placeholder="Enter your email address" value="{{ old('email') }}" required autocomplete="username">
                                    <div class="icon"><span class="material-symbols-outlined">mail</span></div>
                                </div>
                                @error('email')
                                <div class="error_message">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="single_input">
                                <label class="label_title">Password</label>
                                <div class="include_icon">
                                    <input class="form--control radius-5" type="password" name="password" placeholder="Enter your password" required autocomplete="new-password">
                                    <div class="icon"><span class="material-symbols-outlined">lock</span></div>
                                </div>
                                @error('password')
                                <div class="error_message">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="single_input">
                                <label class="label_title">Confirm Password</label>
                                <div class="include_icon">
                                    <input class="form--control radius-5" type="password" name="password_confirmation" placeholder="Confirm password" required autocomplete="new-password">
                                    <div class="icon"><span class="material-symbols-outlined">lock</span></div>
                                </div>
                                @error('password_confirmation')
                                <div class="error_message">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Sign Up Button -->
                            <div class="btn_wrapper single_input">
                                <button type="submit" class="cmn_btn w-100 radius-5">Sign Up</button>
                            </div>

                            <!-- Already have an account -->
                            <div class="btn-wrapper mt-4">
                                <p class="loginForm__wrapper__signup"><span>Already have an Account? </span>
                                    <a href="{{ route('login') }}" class="loginForm__wrapper__signup__btn">Sign In</a>
                                </p>
                            </div>

                            <!-- Social Login Options (Optional) -->
                            <div class="loginForm__wrapper__another d-flex flex-column gap-2 mt-3">
                                <a href="{{route('auth.redirection','google')}}" class="loginForm__wrapper__another__btn radius-5 w-100">
                                    <img src="html/assets/img/icon/googleIocn.svg" alt="" class="icon"> Login With Google
                                </a>
                                <a href="{{route('auth.redirection','facebook')}}" class="loginForm__wrapper__another__btn radius-5 w-100">
                                    <img src="html/assets/img/icon/fbIcon.svg" alt="" class="icon"> Login With Facebook
                                </a>
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
    <!-- Fancy Box Js -->
    <script src="html/assets/js/fancybox.umd.js"></script>
    <!-- main js -->
    <script src="html/assets/js/main.js"></script>


    <script>
        $(document).ready(function() {

            let csrfToken = $('meta[name="csrf-token"]').attr('content');


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            $('#registerForm').submit(function(e) {
                e.preventDefault();
                let name = $('input[name="name"]').val();
                let email = $('input[name="email"]').val().trim();
                let password = $('input[name="password"]').val().trim();
                let passwordConfirmation = $('input[name="password_confirmation"]').val().trim();

                // Basic front-end validation
                if (name === "") {
                    alert("Name is required.");

                } else if (email === "") {
                    alert("Email is required.");

                } else if (password === "") {
                    alert("Password is required.");

                } else if (password.length < 8) {
                    alert("Password must be at least 8 characters long.");

                } else if (password !== passwordConfirmation) {
                    alert("Passwords do not match.");

                } else {

                    let form = $(this);

                    // Send the form data using AJAX
                    $.ajax({
                        url: "{{ route('registerStore') }}",
                        method: 'POST',
                        data: form.serialize(),
                        success: function(response) {
                            if (response.success) {
                                alert('Registration Successful!');
                                window.location.href = response.redirect_url;
                            } else {
                                alert('Registration failed. Please try again.');
                            }
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