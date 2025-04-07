<!DOCTYPE html>
<html class=''>

<head>
    <meta charset='UTF-8'>
    <meta name="robots" content="noindex">
    <meta name="selected_contact" content="">
    <meta name="base_url" content="{{ url('/') }}">



   
       
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>

<body>

 {{ $slot }}

 <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
    <link rel='stylesheet prefetch'
        href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
        <script type="module" src="https://cdn.jsdelivr.net/npm/ldrs/dist/auto/square.js"></script>
 <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    {{ $scripts ?? '' }}
</body>

</html>




{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <title>Document</title>
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="{{ asset('assets-e-commerce/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-e-commerce/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets-e-commerce/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-e-commerce/css/select2.min.css') }}">

    <link rel="stylesheet" href="{{asset('assets-e-commerce/css/spacing.css')}}">
    <link rel="stylesheet" href="{{ asset('assets-e-commerce/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-e-commerce/css/responsive.css')}}">
</head>

<body>

   @include('layouts.navbar')

    {{ $slot }}


   @include('layouts.footer')


    <!--jquery library js-->
    <script src="{{ asset('assets-e-commerce/js/jquery-3.7.1.min.js') }}"></script>
    <!--bootstrap js-->
    <script src="{{ asset('assets-e-commerce/js/bootstrap.bundle.min.js') }}"></script>
    <!--font-awesome js-->
    <script src="{{ asset('assets-e-commerce/js/Font-Awesome.js') }}"></script>
    <script src="{{ asset('assets-e-commerce/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets-e-commerce/js/select2.min.js') }}"></script>

    <script src="{{ asset('assets-e-commerce/js/tinymce/tinymce.js') }}"></script>
    <!--main/custom js-->
    <script src="{{ asset('assets-e-commerce/js/main.js') }}"></script>

    {{ $scripts ?? '' }}

</body>

</html> --}}

{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html> --}}

