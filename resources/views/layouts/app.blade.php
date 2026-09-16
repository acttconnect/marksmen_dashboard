<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Admin Dashboard')
        - Marksmen Admin
    </title>

    <link
        rel="stylesheet"
        href="{{ asset('css/admin.css') }}"
    >
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
>
</head>

<body>


<div class="admin-wrapper">


    {{-- SIDEBAR --}}
    @include('admin.partials.sidebar')


    <div class="main-content">


        {{-- HEADER --}}
        @include('admin.partials.header')


        {{-- PAGE CONTENT --}}
        <main class="content-area">


            {{-- SUCCESS MESSAGE --}}

            @if(session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif


            {{-- ERROR MESSAGE --}}

            @if(session('error'))

                <div class="alert alert-danger">

                    {{ session('error') }}

                </div>

            @endif


            {{-- VALIDATION ERRORS --}}

            @if($errors->any())

                <div class="alert alert-danger">

                    <strong>
                        Please fix the following errors:
                    </strong>

                    <ul>

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- PAGE --}}
            @yield('content')


        </main>


    </div>


</div>


<script>

    setTimeout(function () {

        const alerts =
            document.querySelectorAll('.alert-success');

        alerts.forEach(function (alert) {

            alert.style.opacity = '0';

            setTimeout(function () {

                alert.remove();

            }, 500);

        });

    }, 3000);

</script>


@stack('scripts')

</body>

</html>