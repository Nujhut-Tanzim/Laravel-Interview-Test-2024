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
                        <h2 class="loginForm__header__title">Forgot Password</h2>
                        <p class="loginForm__header__para mt-3">Login with your data that you entered during registration.</p>
                    </div>
                    <div class="loginForm__wrapper mt-4">
                        <!-- Form -->
                        <form class="custom_form" id="forget_form">


                            <!-- Session Status -->
                            @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                            @endif

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
                                <label class="label_title" for="email">{{ __('Enter Email') }}</label>
                                <div class="include_icon">
                                    <input class="form--control radius-5" type="email" id="email" name="email" placeholder="Enter email" :value="old('email')" required autofocus />
                                    <div class="icon"><span class="material-symbols-outlined">mail</span></div>
                                </div>
                            </div>

                            <!-- Submit and Cancel Buttons -->
                            <div class="btn_wrapper single_input d-flex gap-2">
                                <button type="submit" class="cmn_btn w-100 radius-5">{{ __('Submit') }}</button>
                                <a href="{{ route('login') }}" class="cmn_btn outline_btn w-100 radius-5">{{ __('Cancel') }}</a>
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
    <!-- Fancy box Js -->
    <script src="html/assets/js/fancybox.umd.js"></script>

    <!-- Country Select Js -->
    <script src="html/assets/js/niceCountryInput.js"></script>
    <!-- Multiple Country Select Js -->
    <script src="html/assets/js/jsuites.js"></script>
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

            $('#forget_form').on('submit', function(e) {
                e.preventDefault();

                // Front-end validation
                let email = $('#email').val().trim();

                if (email === "") {
                    alert("Email is required.");

                } else {

                    // AJAX request to submit the form
                    $.ajax({
                        url: "{{ route('password.email') }}",
                        method: 'POST',
                        data: {
                            email: email
                        },
                        success: function() {

                            alert("Password reset email sent successfully!");

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