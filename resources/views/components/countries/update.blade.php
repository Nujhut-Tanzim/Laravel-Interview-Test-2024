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
                                            <div class="dashboard__header__notification">
                                                <a href="javascript:void(0)" class="dashboard__header__notification__icon">
                                                    <i class="material-symbols-outlined">notifications</i>
                                                </a>
                                                <span class="dashboard__header__notification__number">{{ $unreadCount }}</span>
                                                <div class="dashboard__header__notification__wrap">
                                                    <h6 class="dashboard__header__notification__wrap__title"> Notifications </h6>
                                                    <ul class="dashboard__header__notification__wrap__list">
                                                        @foreach($activities as $activity)
                                                        <li class="dashboard__header__notification__wrap__list__item">
                                                            <div class="dashboard__header__notification__wrap__list__flex">
                                                                <div class="dashboard__header__notification__wrap__list__icon">
                                                                    <i class="las la-bell"></i>
                                                                </div>
                                                                <div class="dashboard__header__notification__wrap__list__contents">
                                                                    <span class="dashboard__header__notification__wrap__list__contents__sub">
                                                                        {{ $activity->user->name }}
                                                                    </span>
                                                                    <a class="dashboard__header__notification__wrap__list__contents__title" href="javascript:void(0)">
                                                                        {{ $activity->action }} a {{ $activity->entity_type }}
                                                                    </a>
                                                                    <span class="dashboard__header__notification__wrap__list__contents__sub">
                                                                        {{ $activity->created_at->diffForHumans() }}
                                                                    </span>
                                                                </div>
                                                                @if(!$activity->read)
                                                                <a href="{{ route('notifications.markAsRead', $activity->id) }}" class="mark-as-read">Mark as Read</a>
                                                                @endif
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                    <a href="javascript:void(0)" class="dashboard__header__notification__wrap__btn"> See All Notification </a>
                                                </div>
                                            </div>
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
                                    <div class="dashboard__card bg__white padding-20 radius-10">
                                        <div class="dashboard__card__header">
                                            <h4 class="dashboard__card__header__title">Update Country Details</h4>
                                        </div>
                                        <div class="dashboard__card__inner mt-4">
                                            <div class="form__input">
                                                <form id="countryUpdateForm" enctype="multipart/form-data" action="#">
                                                    <div class="form__input__single">
                                                        <input type="text" id="id" name="id" class="form__control radius-5" value="{{$id}}" style="display:none;">
                                                        <label for="updated_country_name" class="form__input__single__label">Country Name</label>
                                                        <input type="text" id="updated_country_name" name="updated_country_name" class="form__control radius-5" placeholder="Country Name...">
                                                    </div>
                                                    <div class="form__input__single">
                                                        <label for="updated_code" class="form__input__single__label">Country Code</label>
                                                        <input type="text" id="updated_code" name="updated_code" class="form__control radius-5" placeholder="Country Code...">
                                                    </div>
                                                    <div class="form__input__single">
                                                        <label for="img" class="form__input__single__label">Country Flag</label>
                                                        <input type="file" id="img" name="img" class="form__control radius-5" onchange="previewImage(event)">
                                                        <br>
                                                        <!-- Image preview -->
                                                        <img id="updated_flagImagePreview" alt="Flag Preview" style="max-width: 200px; margin-top: 10px;">
                                                        <input type="text" id="filePath" name="file_path" style="display:none;">
                                                    </div>
                                                    <div class="form__input__single w-100">
                                                        <button type="submit" class="btn btn-primary w-100" style="margin-top: 10px;">Update</button>
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
    <script>
        // Function to get query parameters


        $(document).ready(function() {
            const countryId = $('#id').val();


            if (countryId) {
                $.ajax({
                    url: `/countries/${countryId}`,
                    method: 'GET',
                    success: function(data) {
                        // Populate the form fields with the retrieved data
                        $('#updated_country_name').val(data.country_name);
                        $('#updated_code').val(data.code);
                        let flagImageUrl = data.flag_image ? `{{ asset('${data.flag_image}') }}` : '{{ asset("html/assets/download.png") }}';
                        $('#updated_flagImagePreview').attr('src', flagImageUrl).show();
                        $('#filePath').val(data.flag_image);

                    },
                    error: function(xhr) {
                        alert('Error retrieving country details.');
                    }
                });
            }


            // Setup CSRF token for all AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Update country Details
            $('#countryUpdateForm').on('submit', function(e) {
                e.preventDefault();
                const name = $('#updated_country_name').val().trim();
                const code = $('#updated_code').val().trim();

                if (name === "") {
                    alert("Country name is required.");

                } else if (code === "") {
                    alert("Country code is required.");

                } else {

                    const formData = new FormData(this);
                    formData.append('_method', 'PUT');
                    console.log(formData);
                    console.log(name);
                    console.log(countryId);

                    $.ajax({
                        url: `/countries/${countryId}`,
                        method: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function() {
                            alert('Country updated successfully!');

                        },
                        error: function(xhr) {
                            alert('Error: ' + xhr.responseJSON.message);
                        }
                    });
                }
            });
        });



        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('updated_flagImagePreview');

            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            } else {
                preview.style.display = 'none';
            }
        }
    </script>


</body>

</html>