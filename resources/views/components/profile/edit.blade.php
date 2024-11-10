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
    <link rel="icon" href="{{ asset('html/favicons.png') }}" sizes="16x16" type="image/png">
    <!-- animate -->
    <link rel="stylesheet" href="{{ asset('html/assets/css/animate.css') }}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('html/assets/css/bootstrap.min.css') }}">
    <!-- All Icon -->
    <link rel="stylesheet" href="{{ asset('html/assets/css/icon.css') }}">
    <!-- slick carousel  -->
    <link rel="stylesheet" href="{{ asset('html/assets/css/slick.css') }}">
    <!-- Select2 Css -->
    <link rel="stylesheet" href="{{ asset('html/assets/css/select2.min.css') }}">
    <!-- Sweet alert Css -->
    <link rel="stylesheet" href="{{ asset('html/assets/css/sweetalert.css') }}">
    <!-- Flatpickr Css -->
    <link rel="stylesheet" href="{{ asset('html/assets/css/flatpickr.min.css') }}">
    <!-- Fancy box Css -->
    <link rel="stylesheet" href="{{ asset('html/assets/css/fancybox.css') }}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('html/assets/css/dashboard.css') }}">

    <!-- dark css -->

</head>

<body>

    <!-- preloader area start -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="loader_bars">
                <span></span>
            </div>
        </div>
    </div>
    <!-- preloader area end -->

    <!-- Dashboard start -->
    <div class="body-overlay"></div>
    <div class="dashboard__area">
        <div class="container-fluid p-0">
            <div class="dashboard__contents__wrapper">
                <div class="dashboard__left dashboard-left-content">
                    <div class="dashboard__left__main">
                        <div class="dashboard__left__close close-bars"><i class="fa-solid fa-times"></i></div>
                        <div class="dashboard__top">
                            <div class="dashboard__top__logo">
                                <a href="#">
                                    <img class="main_logo" src="{{ asset('html/assets/img/logo.webp') }}" alt="logo">
                                    <img class="iocn_view__logo" src="{{ asset('html/assets/img/Favicon.png') }}" alt="logo_icon">

                                </a>
                            </div>
                        </div>
                        <div class="dashboard__bottom mt-5">

                            <ul class="dashboard__bottom__list dashboard-list">
                                <li class="dashboard__bottom__list__item has-children show open active">
                                    <a href="javascript:void(0)"><i class="material-symbols-outlined">dashboard</i> <span class="icon_title">Dashboard</span></a>
                                    <ul class="submenu">
                                        <li class="dashboard__bottom__list__item selected">
                                            <a href="{{route('dashboard')}}">Default</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dashboard__bottom__list__item has-children">
                                    <a href="javascript:void(0)"><span class="icon_title">Add Form</span></a>
                                    <ul class="submenu">
                                        <li class="dashboard__bottom__list__item">
                                            <a href="{{route('countries.create')}}">Country Add</a>
                                        </li>
                                        <li class="dashboard__bottom__list__item">
                                            <a href="{{route('states.create')}}">State Add</a>
                                        </li>
                                        <li class="dashboard__bottom__list__item">
                                            <a href="{{route('cities.create')}}">City Add</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dashboard__bottom__list__item has-children">
                                    <a href="javascript:void(0)"><i class="material-symbols-outlined">groupTable</i> <span class="icon_title">Tables</span></a>
                                    <ul class="submenu">
                                        <li class="dashboard__bottom__list__item">
                                            <a href="{{route('countryPage')}}">Country Table</a>
                                        </li>
                                        <li class="dashboard__bottom__list__item">
                                            <a href="{{route('statesPage')}}">State Table</a>
                                        </li>
                                        <li class="dashboard__bottom__list__item">
                                            <a href="{{route('citiesPage')}}">City Table</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dashboard__bottom__list__item has-children">

                                </li>
                                <li class="dashboard__bottom__list__item">
                                    <form id="logout-form1" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                    <a href="#" onclick="document.getElementById('logout-form1').submit();" class="dashboard__header__author__wrapper__list__item">
                                        Log Out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="dashboard__right">
                    <div class="dashboard__header single_border_bottom">
                        <div class="row gx-4 align-items-center justify-content-between">
                            <div class="col-sm-2">
                                <div class="dashboard__header__left">
                                    <div class="dashboard__header__left__inner">
                                        <span class="dashboard__sidebarIcon d-none d-lg-block"></span>
                                        <span class="dashboard__sidebarIcon__mobile sidebar-icon d-lg-none"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 d-none d-sm-block">
                                <div class="dashboard__header__middle">
                                    <div class="dashboard__header__middle__search">

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="dashboard__header__right">
                                    <div class="dashboard__header__right__flex">
                                        <div class="dashboard__header__right__item responsive_search">

                                        </div>
                                        <div class="dashboard__header__right__item">
                                            <a href="javascript:void(0)" class="dashboard__header__notification__icon lightMode" id="mode_change"> <i class="material-symbols-outlined">wb_sunny</i> </a>
                                        </div>
                                        <div class="dashboard__header__right__item">
                                        </div>
                                        <div class="dashboard__header__right__item">
                                            <div class="dashboard__header__author">
                                                <a href="javascript:void(0)" class="dashboard__header__author__flex flex-btn">
                                                    <div class="dashboard__header__author__thumb">
                                                        <img src="{{asset('html/assets/img/author_nav_new.jpg')}}" alt="authorImg">
                                                    </div>
                                                </a>
                                                <div class="dashboard__header__author__wrapper">
                                                    <div class="dashboard__header__author__wrapper__list">
                                                        <a href="{{route('profile.edit')}}" class="dashboard__header__author__wrapper__list__item">Profile</a>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>

                                                        <a href="#" onclick="document.getElementById('logout-form').submit();" class="dashboard__header__author__wrapper__list__item">
                                                            Log Out
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard__body">
                        <div class="dashboard__inner">
                            <div class="row g-4">
                                <div class="col-xxl-6 col-lg-12">
                                    <div class="container mt-5">

                                        <!-- Profile Information Update Form -->
                                        <div class="dashboard__card bg__white shadow-sm  rounded-3 p-4 mb-4">

                                            <div class="card-body">
                                                <header>
                                                    <h2 class="h5 fw-semibold text-gray-900">
                                                        {{ __('Profile Information') }}
                                                    </h2>
                                                    <p class="mt-2 text-muted">
                                                        {{ __("Update your account's profile information and email address.") }}
                                                    </p>
                                                </header>

                                                <form method="post" action="{{ route('profile.update') }}" class="mt-4">
                                                    @csrf
                                                    @method('patch')

                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">{{ __('Full Name') }}</label>
                                                        <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
                                                        @error('name')
                                                        <div class="text-danger mt-2">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                                        <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="email" />
                                                        @error('email')
                                                        <div class="text-danger mt-2">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                                    <div class="mt-3">
                                                        <p class="text-muted">
                                                            {{ __('Your email address is unverified.') }}
                                                            <button form="send-verification" class="btn btn-link p-0 m-0 align-baseline text-decoration-none">
                                                                {{ __('Click here to re-send the verification email.') }}
                                                            </button>
                                                        </p>

                                                        @if (session('status') === 'verification-link-sent')
                                                        <div class="mt-2 text-success">
                                                            {{ __('A new verification link has been sent to your email address.') }}
                                                        </div>
                                                        @endif
                                                    </div>
                                                    @endif

                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

                                                        @if (session('status') === 'profile-updated')
                                                        <p class="text-success m-0">
                                                            {{ __('Saved.') }}
                                                        </p>
                                                        @endif

                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <!-- Password Update Form -->
                                        <div class="dashboard__card bg__white shadow-sm  rounded-3 p-4">

                                            <div class="card-body">
                                                <header>
                                                    <h2 class="h5 fw-semibold text-gray-900">
                                                        {{ __('Update Password') }}
                                                    </h2>
                                                    <p class="mt-2 text-muted">
                                                        {{ __('Ensure your account is using a long, random password to stay secure.') }}
                                                    </p>
                                                </header>

                                                <form method="post" action="{{ route('password.update') }}" class="mt-4">
                                                    @csrf
                                                    @method('put')

                                                    <div class="mb-3">
                                                        <label for="current_password" class="form-label">{{ __('Current Password') }}</label>
                                                        <input id="current_password" name="current_password" type="password" class="form-control" required autocomplete="current-password" />
                                                        @error('current_password')
                                                        <div class="text-danger mt-2">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">{{ __('New Password') }}</label>
                                                        <input id="password" name="password" type="password" class="form-control" required autocomplete="new-password" />
                                                        @error('password')
                                                        <div class="text-danger mt-2">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                                                        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" required autocomplete="new-password" />
                                                        @error('password_confirmation')
                                                        <div class="text-danger mt-2">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

                                                        @if (session('status') === 'password-updated')
                                                        <p class="text-success m-0">
                                                            {{ __('Password Updated.') }}
                                                        </p>

                                                        @else

                                                        <p class="text-success m-0">
                                                            {{ __('Password Not Updated.') }}
                                                        </p>
                                                        @endif
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <!-- Delete User Form -->
                                        <div class="dashboard__card bg__white shadow-sm  rounded-3 p-4 mb-4">

                                            <div class="card-body">
                                                <header>
                                                    <h2 class="h5 fw-semibold text-gray-900">
                                                        {{ __('Delete Account') }}
                                                    </h2>
                                                    <p class="mt-2 text-muted">
                                                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                                                    </p>
                                                </header>

                                                <!-- Button to trigger modal -->
                                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                                                    {{ __('Delete Account') }}
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Delete Account Modal -->
                                        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="confirmDeleteModalLabel">{{ __('Confirm Account Deletion') }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h2 class="h5 fw-semibold text-gray-900">
                                                            {{ __('Are you sure you want to delete your account?') }}
                                                        </h2>
                                                        <p class="mt-2 text-muted">
                                                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                                                        </p>

                                                        <form method="post" action="{{ route('profile.destroy') }}">
                                                            @csrf
                                                            @method('delete')

                                                            <!-- Password Input -->
                                                            <div class="mb-3">
                                                                <label for="password1" class="form-label">{{ __('Password') }}</label>
                                                                <input type="password" name="password" id="password1" class="form-control" placeholder="{{ __('Enter your password') }}" required>
                                                                @error('password')
                                                                <div class="text-danger mt-2">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <!-- Cancel Button -->
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                                        <!-- Delete Button -->
                                                        <button type="submit" class="btn btn-danger">
                                                            {{ __('Delete Account') }}
                                                        </button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>


                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dashboard end -->


    <!-- jquery -->
    <script src="{{ asset('html/assets/js/jquery-3.6.0.min.js') }}"></script>
    <!-- jquery Migrate -->
    <script src="{{ asset('html/assets/js/jquery-migrate.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('html/assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Slick Slider -->
    <script src="{{ asset('html/assets/js/slick.js') }}"></script>
    <!-- Plugins Js -->
    <script src="{{ asset('html/assets/js/plugin.js') }}"></script>

    <!-- Fancy Box Js -->
    <script src="{{ asset('html/assets/js/fancybox.umd.js') }}"></script>

    <!-- main js -->
    <script src="{{ asset('html/assets/js/main.js') }}"></script>



</body>

</html>