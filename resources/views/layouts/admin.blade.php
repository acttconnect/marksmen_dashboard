<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
>
    <title>
        @yield('title', 'Admin Panel') - Marksmen
    </title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f9;
            color: #243447;
        }

        a {
            text-decoration: none;
        }


        /*
        ==========================
        SIDEBAR
        ==========================
        */

        .sidebar {

            position: fixed;

            left: 0;
            top: 0;

            width: 240px;
            height: 100vh;

            background: #10243a;

            color: white;

            overflow-y: auto;

        }


        .brand {

            padding: 24px 20px;

            border-bottom:
                1px solid rgba(255,255,255,.08);

        }


        .brand h2 {

            color: #d7ae3b;

            font-size: 24px;

            letter-spacing: 1px;

        }


        .brand span {

            font-size: 12px;

            color: #b8c2cc;

            display: block;

            margin-top: 5px;

        }


        .menu-title {

            color: #8fa0b3;

            font-size: 11px;

            letter-spacing: 1px;

            margin:

                28px 20px
                10px;

        }


        .sidebar a {

            display: block;

            color: #dce4ec;

            padding:

                12px
                20px;

            font-size: 15px;

            transition: .2s;

        }


        .sidebar a:hover {

            background: #1a344f;

            color: #d7ae3b;

            border-left:
                4px solid #d7ae3b;

        }


        .sidebar a.active {

            background: #1a344f;

            color: #d7ae3b;

            border-left:
                4px solid #d7ae3b;

        }


        /*
        ==========================
        MAIN
        ==========================
        */

        .main {

            margin-left: 240px;

            min-height: 100vh;

        }


        /*
        ==========================
        HEADER
        ==========================
        */

        .topbar {

            height: 75px;

            background: white;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding:

                0
                35px;

            border-bottom:
                1px solid #e5e7eb;

        }


        .topbar h3 {

            font-size: 20px;

        }


        .admin-info {

            display: flex;

            align-items: center;

            gap: 20px;

        }


        .logout-btn {

            background: #dc3545;

            color: white;

            border: none;

            padding:

                10px
                16px;

            border-radius: 7px;

            cursor: pointer;

        }


        /*
        ==========================
        CONTENT
        ==========================
        */

        .content {

            padding: 35px;

        }


        .page-header {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 25px;

        }


        .page-header h1 {

            font-size: 28px;

            font-weight: 600;

        }


        /*
        ==========================
        CARD
        ==========================
        */

        .card {

            background: white;

            border-radius: 12px;

            padding: 25px;

            box-shadow:

                0 3px 15px
                rgba(0,0,0,.05);

            margin-bottom: 25px;

        }


        /*
        ==========================
        BUTTONS
        ==========================
        */

        .btn {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding:

                10px
                18px;

            border-radius: 7px;

            border: none;

            cursor: pointer;

            font-size: 14px;

            font-weight: 500;

        }


        .btn-primary {

            background: #c89b2c;

            color: white;

        }


        .btn-primary:hover {

            background: #a87c16;

        }


        .btn-success {

            background: #198754;

            color: white;

        }


        .btn-danger {

            background: #dc3545;

            color: white;

        }


        .btn-secondary {

            background: #6c757d;

            color: white;

        }


        .btn-warning {

            background: #ffc107;

            color: #222;

        }


        .btn-sm {

            padding:

                7px
                12px;

            font-size: 12px;

        }


        /*
        ==========================
        FILTER
        ==========================
        */

        .filter-form {

            display: flex;

            gap: 12px;

            flex-wrap: wrap;

        }


        .form-control {

            height: 42px;

            padding:

                0
                12px;

            border:

                1px solid #d1d5db;

            border-radius: 7px;

            min-width: 180px;

            outline: none;

        }


        .form-control:focus {

            border-color: #c89b2c;

        }


        /*
        ==========================
        TABLE
        ==========================
        */

        .table-responsive {

            overflow-x: auto;

        }


        table {

            width: 100%;

            border-collapse: collapse;

        }


        table thead {

            background: #f8fafc;

        }


        table th {

            padding: 15px;

            text-align: left;

            font-size: 13px;

            color: #64748b;

            text-transform: uppercase;

            border-bottom:

                1px solid #e5e7eb;

        }


        table td {

            padding: 16px;

            border-bottom:

                1px solid #edf0f2;

            font-size: 14px;

        }


        table tr:hover {

            background: #fafafa;

        }


        /*
        ==========================
        BADGES
        ==========================
        */

        .badge {

            display: inline-block;

            padding:

                6px
                10px;

            border-radius: 20px;

            font-size: 11px;

            font-weight: 600;

        }


        .badge-success {

            background: #d1fae5;

            color: #047857;

        }


        .badge-danger {

            background: #fee2e2;

            color: #b91c1c;

        }


        .badge-warning {

            background: #fef3c7;

            color: #92400e;

        }


        .badge-info {

            background: #dbeafe;

            color: #1d4ed8;

        }


        .badge-dark {

            background: #e5e7eb;

            color: #374151;

        }


        /*
        ==========================
        ACTIONS
        ==========================
        */

        .actions {

            display: flex;

            gap: 7px;

            align-items: center;

        }


        /*
        ==========================
        ALERT
        ==========================
        */

        .alert {

            padding: 15px;

            border-radius: 8px;

            margin-bottom: 20px;

        }


        .alert-success {

            background: #d1fae5;

            color: #065f46;

        }


        .alert-danger {

            background: #fee2e2;

            color: #991b1b;

        }


        /*
        ==========================
        EMPTY
        ==========================
        */

        .empty-state {

            text-align: center;

            padding: 45px;

            color: #64748b;

        }


        /*
        ==========================
        PAGINATION
        ==========================
        */

        .pagination {

            margin-top: 20px;

        }


        /*
        ==========================
        IMAGE
        ==========================
        */

        .table-image {

            width: 55px;

            height: 55px;

            border-radius: 8px;

            object-fit: cover;

        }


        /*
        ==========================
        MOBILE
        ==========================
        */

        @media(max-width: 768px) {

            .sidebar {

                width: 210px;

            }

            .main {

                margin-left: 210px;

            }

            .content {

                padding: 20px;

            }

            .topbar {

                padding:

                    0
                    20px;

            }

            .page-header {

                flex-direction: column;

                align-items: flex-start;

                gap: 15px;

            }

        }

    </style>

</head>


<body>


<!-- SIDEBAR -->

<div class="sidebar">


    <div class="brand">

        <h2>MARKSMEN</h2>

        <span>
            Admin Panel
        </span>

    </div>


    <div class="menu-title">

        MAIN

    </div>


    <a
        href="{{ route('admin.dashboard') }}"
        class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
    >

        Dashboard

    </a>


    <div class="menu-title">

        CONTENT

    </div>


    <a
        href="{{ route('admin.categories.index') }}"
        class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}"
    >

        Categories

    </a>


    <a
        href="{{ route('admin.galleries.index') }}"
        class="{{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}"
    >

        Gallery

    </a>


    <a
        href="{{ route('admin.blogs.index') }}"
        class="{{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}"
    >

        Blogs

    </a>


    <div class="menu-title">

        ENQUIRIES

    </div>


    <a
        href="{{ route('admin.product-enquiries.index') }}"
        class="{{ request()->routeIs('admin.product-enquiries.*') ? 'active' : '' }}"
    >

        Product Enquiries

    </a>


    <a
        href="{{ route('admin.contact-enquiries.index') }}"
        class="{{ request()->routeIs('admin.contact-enquiries.*') ? 'active' : '' }}"
    >

        Contact Enquiries

    </a>


    <div class="menu-title">

        CAREERS

    </div>


    <a
        href="{{ route('admin.jobs.index') }}"
        class="{{ request()->routeIs('admin.jobs.*') ? 'active' : '' }}"
    >

        Job Openings

    </a>


    <a
        href="{{ route('admin.applications.index') }}"
        class="{{ request()->routeIs('admin.applications.*') ? 'active' : '' }}"
    >

        Applications

    </a>


    <div class="menu-title">

        ACCOUNT

    </div>


    <a
        href="{{ route('admin.change-password') }}"
    >

        Change Password

    </a>


</div>


<!-- MAIN -->

<div class="main">


    <!-- TOPBAR -->

    <div class="topbar">

        <h3>

            @yield('title', 'Dashboard')

        </h3>


        <div class="admin-info">

            <span>

                {{ auth()->user()->name }}

            </span>


            <form
                method="POST"
                action="{{ route('admin.logout') }}"
            >

                @csrf

                <button
                    class="logout-btn"
                >

                    Logout

                </button>

            </form>

        </div>

    </div>


    <!-- CONTENT -->

    <div class="content">


        @if(session('success'))

            <div class="alert alert-success">

                {{ session('success') }}

            </div>

        @endif


        @if(session('error'))

            <div class="alert alert-danger">

                {{ session('error') }}

            </div>

        @endif


        @yield('content')


    </div>


</div>


</body>

</html>