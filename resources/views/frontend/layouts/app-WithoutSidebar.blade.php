<!doctype html>
<html lang="{{ htmlLang() }}" @langrtl dir="rtl" @endlangrtl>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ appName() }} | @yield('title')</title>
    <meta name="description" content="@yield('meta_description', appName())">
    <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
    @yield('meta')

    @stack('before-styles')
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{ mix('css/frontend.css') }}" rel="stylesheet">

    <style>
        html {
          scroll-behavior: smooth !important;
        }
            </style>
    <livewire:styles />
    @stack('after-styles')
</head>

<body>
    
    @include('includes.partials.read-only')
    @include('includes.partials.logged-in-as')
 
    <div id="app">
        @include('includes.partials.messages')      
    </div><!--app-->
    <main>
        @include('frontend.includes.nav')
        @yield('content')

    </main>

    @stack('before-scripts')
    <script src="{{ mix('js/frontend.js') }}"></script>
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <livewire:scripts />
    @stack('after-scripts')
</body>

</html>