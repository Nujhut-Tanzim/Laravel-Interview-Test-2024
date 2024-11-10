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
    <div class="desktop-overlay"></div>
    <div class="body-overlay"></div>
    <div class="dashboard__area">
        <div class="container-fluid p-0">
            <div class="dashboard__contents__wrapper">
                <div class="dashboard__left dashboard-left-content">
                    <div class="dashboard__left__main">
                        <div class="dashboard__left__close close-bars"><i class="fa-solid fa-times"></i></div>
                        <div class="dashboard__top">
                            <div class="dashboard__top__logo">
                                <a href="index.html">
                                    <img class="main_logo" src="html/assets/img/logo.webp" alt="logo">
                                    <img class="iocn_view__logo" src="html/assets/img/Favicon.png" alt="logo_icon">
                                </a>
                            </div>
                        </div>
                        <div class="dashboard__bottom mt-5">
                            <div class="dashboard__bottom__search mb-3">
                                <input class="form--control  w-100" type="text" placeholder="Search here..." id="search_sidebarList">
                            </div>
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
                                        <div class="dashboard__header__middle__search__item">
                                            <form class="search__wrapper__form searchForm">
                                                <input class="form--control radius-5 search" name="search" type="text" placeholder="Search anything...">
                                                <button type="submit" class="search_icon"><i class="material-symbols-outlined">search</i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="dashboard__header__right">
                                    <div class="dashboard__header__right__flex">
                                        <div class="dashboard__header__right__item responsive_search">
                                            <a href="javascript:void(0)" class="dashboard__search__icon search__click"> <i class="material-symbols-outlined">search</i> </a>
                                            <div class="search__wrapper">
                                                <form class="search__wrapper__form searchForm">
                                                    <div class="search__wrapper__close"> <i class="fa-solid fa-times"></i> </div>
                                                    <input class="search__wrapper__input search" name="search" type="text" placeholder="Search Here.....">
                                                    <button type="submit"><i class="material-symbols-outlined">search</i></button>
                                                </form>
                                            </div>
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
                                                        <img src="html/assets/img/author_nav_new.jpg" alt="authorImg">
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
                            <div class="dashboard__inner__item dashboard__card bg__white padding-20 radius-10">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="dashboard__inner__item__header__title">State List</h4>
                                    <a href="{{route('states.create')}}" class="btn btn-primary">Add State</a>
                                </div>
                                <!-- Table Design One -->
                                <div class="tableStyle_one mt-4">
                                    <div class="table_wrapper">
                                        <!-- Table -->
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>State Name</th>
                                                    <th>Area{Km square)</th>
                                                    <th>Country</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="statesTable">

                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                                @include('components.states.view')
                                <!-- End-of Table one -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dashboard end -->


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
            let clickSearch = false;
            $(document).on('submit', '.searchForm', function(e) {
                e.preventDefault();
                clickSearch = true;

                console.log("hi");
                let searchQuery = $(this).closest('.searchForm').find('.search').val();
                console.log(searchQuery);

                $.ajax({
                    url: '/states',
                    method: 'GET',
                    data: {
                        search: searchQuery
                    },
                    success: function(data) {
                        const tbody = $('#statesTable');
                        tbody.empty(); // Clear existing rows
                        data.forEach((state, index) => {
                            tbody.append(`
                        <tr>
                            <td>${index+1}</td>
                            <td>${state.state_name}</td>
                            <td>${state.area}</td>
                            <td>${state.country.country_name}</td>
                            <td>
                                <!-- DropDown -->
                                <div class="dropdown custom__dropdown">
                                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton7" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="las la-ellipsis-h"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton7">
                                           <li><a class="dropdown-item view-details"data-id="${state.id}">View</a></li>
                                        <li><a class="dropdown-item"  href="/states/${state.id}/edit">Edit</a></li>
                                        <li><a class="dropdown-item delete_details" data-id="${state.id}">Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    `);
                        });
                    },
                    error: function(xhr) {
                        alert('Error loading countries: ');
                    }
                });
            });

            if (clickSearch == false) {
                loadStates();

            }

            function loadStates() {
                $.ajax({
                    url: '/states',
                    method: 'GET',
                    success: function(data) {
                        const tbody = $('#statesTable');
                        tbody.empty(); // Clear existing rows
                        data.forEach((state, index) => {
                            tbody.append(`
                        <tr>
                            <td>${index+1}</td>
                            <td>${state.state_name}</td>
                            <td>${state.area}</td>
                            <td>${state.country.country_name}</td>
                            <td>
                                <!-- DropDown -->
                                <div class="dropdown custom__dropdown">
                                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton7" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="las la-ellipsis-h"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton7">
                                           <li><a class="dropdown-item view-details"data-id="${state.id}">View</a></li>
                                        <li><a class="dropdown-item"  href="/states/${state.id}/edit">Edit</a></li>
                                        <li><a class="dropdown-item delete_details" data-id="${state.id}">Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    `);
                        });
                    },
                    error: function(xhr) {
                        alert('Error loading states: ');
                    }
                });
            }


            $(document).on('click', '.view-details', function(e) {
                e.preventDefault();

                const stateId = $(this).data('id');
                console.log(stateId);


                $.ajax({
                    url: `/states/${stateId}`,
                    method: 'GET',
                    success: function(data) {

                        $('#state_name').val(data.state_name);
                        $('#area').val(data.area);
                        $('#country').val(data.country.country_name);
                        $('#created_at').val(data.created_at);
                        $('#updated_at').val(data.updated_at);

                        // Show the modal
                        $('#viewStateModal').modal('show');
                    },
                    error: function(xhr) {
                        alert('Error retrieving details.');
                    }
                });
            });

            $(document).on('click', '.delete_details', function(e) {
                e.preventDefault();

                const stateId = $(this).data('id');
                if (confirm('Are you want to delete this state?')) {
                    $.ajax({
                        url: `/states/${stateId}`,
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            alert('State deleted successfully!');
                            loadStates();
                        },
                        error: function(xhr) {
                            alert('Error: ' + xhr.responseJSON.message);
                        }
                    });
                }
            });


        });
    </script>


</body>

</html>