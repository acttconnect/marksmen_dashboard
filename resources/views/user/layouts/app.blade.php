<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}">

    <title>
        @yield('title', 'User Dashboard') - Marksmen Group
    </title>


    {{-- Bootstrap CSS --}}

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    {{-- Bootstrap Icons --}}

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >


    <style>

        :root {

            --navy: #071a2d;

            --navy-light: #0d2944;

            --gold: #c9a227;

            --gold-light: #e0c35a;

            --light-bg: #f5f7fa;

            --text-color: #212529;

        }


        * {

            box-sizing: border-box;

        }


        body {

            margin: 0;

            background: var(--light-bg);

            font-family: Arial, sans-serif;

            color: var(--text-color);

        }


        /*
        |--------------------------------------------------------------------------
        | Sidebar
        |--------------------------------------------------------------------------
        */

        .sidebar {

            position: fixed;

            top: 0;

            left: 0;

            width: 250px;

            height: 100vh;

            background: var(--navy);

            color: #ffffff;

            z-index: 1050;

            overflow-y: auto;

            transition: all .3s ease;

        }


        /*
        |--------------------------------------------------------------------------
        | Brand
        |--------------------------------------------------------------------------
        */

        .brand {

            height: 70px;

            display: flex;

            align-items: center;

            padding: 0 22px;

            border-bottom: 1px solid rgba(255,255,255,.1);

        }


        .brand strong {

            color: var(--gold-light);

            font-size: 21px;

            letter-spacing: 1px;

        }


        .brand small {

            display: block;

            color: #aab7c4;

            font-size: 10px;

            margin-top: 2px;

            letter-spacing: 1px;

        }


        /*
        |--------------------------------------------------------------------------
        | Sidebar Sections
        |--------------------------------------------------------------------------
        */

        .sidebar-section {

            color: #8899aa;

            font-size: 11px;

            text-transform: uppercase;

            padding: 22px 20px 8px;

            letter-spacing: 1px;

            font-weight: 600;

        }


        /*
        |--------------------------------------------------------------------------
        | Sidebar Links
        |--------------------------------------------------------------------------
        */

        .sidebar a {

            display: flex;

            align-items: center;

            gap: 12px;

            color: #dce4eb;

            text-decoration: none;

            padding: 12px 20px;

            transition: all .2s ease;

            border-left: 3px solid transparent;

        }


        .sidebar a:hover {

            background: var(--navy-light);

            color: var(--gold-light);

        }


        .sidebar a.active {

            background: var(--navy-light);

            color: var(--gold-light);

            border-left-color: var(--gold);

        }


        .sidebar a i {

            width: 20px;

            font-size: 17px;

        }


        /*
        |--------------------------------------------------------------------------
        | Logout Button
        |--------------------------------------------------------------------------
        */

        .logout-btn {

            width: 100%;

            border: 0;

            background: transparent;

            color: #dce4eb;

            text-align: left;

            padding: 12px 20px;

            transition: all .2s ease;

        }


        .logout-btn:hover {

            background: rgba(220,53,69,.15);

            color: #ff8c98;

        }


        /*
        |--------------------------------------------------------------------------
        | Main Content
        |--------------------------------------------------------------------------
        */

        .main {

            margin-left: 250px;

            min-height: 100vh;

            transition: all .3s ease;

        }


        /*
        |--------------------------------------------------------------------------
        | Topbar
        |--------------------------------------------------------------------------
        */

        .topbar {

            height: 70px;

            background: #ffffff;

            border-bottom: 1px solid #e5e7eb;

            display: flex;

            justify-content: space-between;

            align-items: center;

            padding: 0 25px;

        }


        .topbar-left {

            display: flex;

            align-items: center;

            gap: 15px;

        }


        .page-title {

            font-size: 20px;

            font-weight: 600;

            color: var(--navy);

            margin: 0;

        }


        .menu-toggle {

            display: none;

            border: 0;

            background: transparent;

            font-size: 24px;

            color: var(--navy);

        }


        /*
        |--------------------------------------------------------------------------
        | User Dropdown
        |--------------------------------------------------------------------------
        */

        .user-button {

            border: 1px solid #e5e7eb;

            background: #ffffff;

            padding: 8px 14px;

            border-radius: 8px;

            color: var(--navy);

        }


        .user-button:hover {

            background: #f8f9fa;

        }


        .dropdown-menu {

            border: 0;

            box-shadow: 0 5px 25px rgba(0,0,0,.12);

            border-radius: 10px;

            padding: 8px;

        }


        .dropdown-item {

            border-radius: 6px;

            padding: 9px 12px;

        }


        .dropdown-item:hover {

            background: #f5f7fa;

            color: var(--navy);

        }


        /*
        |--------------------------------------------------------------------------
        | Content
        |--------------------------------------------------------------------------
        */

        .content {

            padding: 30px;

        }


        /*
        |--------------------------------------------------------------------------
        | Cards
        |--------------------------------------------------------------------------
        */

        .card {

            border: 0;

            border-radius: 12px;

            box-shadow: 0 4px 20px rgba(0,0,0,.05);

        }


        .stat-card {

            padding: 20px;

        }


        .stat-icon {

            width: 50px;

            height: 50px;

            border-radius: 10px;

            background: rgba(201,162,39,.12);

            color: var(--gold);

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 22px;

        }


        /*
        |--------------------------------------------------------------------------
        | Buttons
        |--------------------------------------------------------------------------
        */

        .btn-gold {

            background: var(--gold);

            border-color: var(--gold);

            color: #ffffff;

        }


        .btn-gold:hover {

            background: #ad8919;

            border-color: #ad8919;

            color: #ffffff;

        }


        .btn-navy {

            background: var(--navy);

            border-color: var(--navy);

            color: #ffffff;

        }


        .btn-navy:hover {

            background: var(--navy-light);

            border-color: var(--navy-light);

            color: #ffffff;

        }


        /*
        |--------------------------------------------------------------------------
        | Alerts
        |--------------------------------------------------------------------------
        */

        .alert {

            border: 0;

            border-radius: 10px;

        }


        /*
        |--------------------------------------------------------------------------
        | Responsive Tablet
        |--------------------------------------------------------------------------
        */

        @media (max-width: 991px) {

            .sidebar {

                width: 220px;

            }


            .main {

                margin-left: 220px;

            }

        }


        /*
        |--------------------------------------------------------------------------
        | Responsive Mobile
        |--------------------------------------------------------------------------
        */

        @media (max-width: 768px) {

            .sidebar {

                width: 250px;

                transform: translateX(-100%);

            }


            .sidebar.show {

                transform: translateX(0);

            }


            .main {

                margin-left: 0;

            }


            .menu-toggle {

                display: block;

            }


            .content {

                padding: 15px;

            }


            .topbar {

                padding: 0 15px;

            }


            .page-title {

                font-size: 17px;

            }

        }

    </style>


    @stack('styles')

</head>


<body>


{{-- ================================================================
     SIDEBAR
================================================================ --}}

<div
    class="sidebar"
    id="sidebar"
>


    {{-- BRAND --}}

    <div class="brand">

        <div>

            <strong>
                MARKSMEN
            </strong>

            <small>
                USER PORTAL
            </small>

        </div>

    </div>



    {{-- ============================================================
         MAIN
    ============================================================ --}}

    <div class="sidebar-section">

        Main

    </div>


    <a
        href="{{ route('user.dashboard') }}"
        class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}"
    >

        <i class="bi bi-speedometer2"></i>

        <span>
            Dashboard
        </span>

    </a>



    {{-- ============================================================
         CAREERS
    ============================================================ --}}

    <div class="sidebar-section">

        Careers

    </div>


    <a
        href="{{ route('user.jobs.index') }}"
        class="{{ request()->routeIs('user.jobs.*') ? 'active' : '' }}"
    >

        <i class="bi bi-briefcase"></i>

        <span>
            Job Openings
        </span>

    </a>



    <a
        href="{{ route('user.applications.index') }}"
        class="{{ request()->routeIs('user.applications.*') ? 'active' : '' }}"
    >

        <i class="bi bi-file-earmark-person"></i>

        <span>
            My Applications
        </span>

    </a>



    {{-- ============================================================
         ACCOUNT
    ============================================================ --}}

    <div class="sidebar-section">

        Account

    </div>


    <a
        href="{{ route('user.profile') }}"
        class="{{ request()->routeIs('user.profile*') ? 'active' : '' }}"
    >

        <i class="bi bi-person"></i>

        <span>
            My Profile
        </span>

    </a>



    <a
        href="{{ route('user.change-password') }}"
        class="{{ request()->routeIs('user.change-password*') ? 'active' : '' }}"
    >

        <i class="bi bi-key"></i>

        <span>
            Change Password
        </span>

    </a>



    {{-- ============================================================
         LOGOUT
    ============================================================ --}}

    <form
        action="{{ route('user.logout') }}"
        method="POST"
        class="m-0"
    >

        @csrf


        <button
            type="submit"
            class="logout-btn"
        >

            <i class="bi bi-box-arrow-right me-2"></i>

            Logout

        </button>

    </form>


</div>



{{-- ================================================================
     MAIN
================================================================ --}}

<div class="main">


    {{-- ============================================================
         TOPBAR
    ============================================================ --}}

    <div class="topbar">


        {{-- LEFT --}}

        <div class="topbar-left">


            {{-- MOBILE MENU --}}

            <button
                type="button"
                class="menu-toggle"
                id="menuToggle"
            >

                <i class="bi bi-list"></i>

            </button>


            <h5 class="page-title">

                @yield('page-title', 'Dashboard')

            </h5>


        </div>



        {{-- RIGHT USER DROPDOWN --}}

        @auth

            <div class="dropdown">


                <button
                    type="button"
                    class="user-button dropdown-toggle"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                >

                    <i class="bi bi-person-circle me-2"></i>

                    {{ auth()->user()->name }}

                </button>



                <ul class="dropdown-menu dropdown-menu-end">


                    {{-- USER NAME --}}

                    <li>

                        <h6 class="dropdown-header">

                            {{ auth()->user()->name }}

                        </h6>

                    </li>


                    <li>

                        <span class="dropdown-item-text small text-muted">

                            {{ auth()->user()->email }}

                        </span>

                    </li>


                    <li>

                        <hr class="dropdown-divider">

                    </li>


                    {{-- PROFILE --}}

                    <li>

                        <a
                            class="dropdown-item"
                            href="{{ route('user.profile') }}"
                        >

                            <i class="bi bi-person me-2"></i>

                            My Profile

                        </a>

                    </li>


                    {{-- CHANGE PASSWORD --}}

                    <li>

                        <a
                            class="dropdown-item"
                            href="{{ route('user.change-password') }}"
                        >

                            <i class="bi bi-key me-2"></i>

                            Change Password

                        </a>

                    </li>


                    <li>

                        <hr class="dropdown-divider">

                    </li>


                    {{-- LOGOUT --}}

                    <li>

                        <form
                            action="{{ route('user.logout') }}"
                            method="POST"
                        >

                            @csrf


                            <button
                                type="submit"
                                class="dropdown-item text-danger"
                            >

                                <i class="bi bi-box-arrow-right me-2"></i>

                                Logout

                            </button>

                        </form>

                    </li>


                </ul>


            </div>

        @endauth


    </div>



    {{-- ============================================================
         PAGE CONTENT
    ============================================================ --}}

    <div class="content">


        {{-- SUCCESS MESSAGE --}}

        @if(session('success'))

            <div
                class="alert alert-success alert-dismissible fade show"
                role="alert"
            >

                <i class="bi bi-check-circle me-2"></i>

                {{ session('success') }}


                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                ></button>

            </div>

        @endif



        {{-- ERROR MESSAGE --}}

        @if(session('error'))

            <div
                class="alert alert-danger alert-dismissible fade show"
                role="alert"
            >

                <i class="bi bi-exclamation-circle me-2"></i>

                {{ session('error') }}


                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                ></button>

            </div>

        @endif



        {{-- VALIDATION ERRORS --}}

        @if($errors->any())

            <div
                class="alert alert-danger"
            >

                <strong>

                    Please fix the following errors:

                </strong>


                <ul class="mb-0 mt-2">


                    @foreach($errors->all() as $error)

                        <li>

                            {{ $error }}

                        </li>

                    @endforeach


                </ul>


            </div>

        @endif



        {{-- PAGE CONTENT --}}

        @yield('content')


    </div>


</div>



{{-- ================================================================
     BOOTSTRAP JS
================================================================ --}}

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>



{{-- ================================================================
     MOBILE SIDEBAR
================================================================ --}}

<script>

    const menuToggle = document.getElementById('menuToggle');

    const sidebar = document.getElementById('sidebar');


    if (menuToggle && sidebar) {

        menuToggle.addEventListener('click', function () {

            sidebar.classList.toggle('show');

        });

    }

</script>



@stack('scripts')


</body>

</html>