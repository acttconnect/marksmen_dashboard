
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', config('app.name'))
    </title>

    <meta name="description"
          content="@yield('description', '')">

    <link rel="stylesheet"
          href="{{ asset('frontend/css/style.css') }}">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @stack('styles')

</head>

<body>

    @include('frontend.layout.header')

    <main>

        @yield('content')

    </main>



    @include('frontend.layout.footer')



    <script src="{{ asset('frontend/js/main.js') }}"></script>

    @stack('scripts')

</body>

</html>

