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
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <link href="{{ mix('css/backend.css') }}" rel="stylesheet">
    <livewire:styles />
    @stack('after-styles')
</head>
<body class="c-app">
    <div id="admin-sidebar-div">
        @include('backend.includes.sidebar')
    </div>
    <div class="c-wrapper c-fixed-components">
        @include('backend.includes.header')
        @include('includes.partials.read-only')
        @include('includes.partials.logged-in-as')

        <div class="c-body" id="admin-body-color">
            <main class="c-main pt-0">
                <div class="container-fluid p-0">
                    <div class="fade-in p-4">
                        @include('includes.partials.messages')
                        @yield('content')

                        </div>
                    </div><!--fade-in-->
                </div><!--container-fluid-->
                 <!--CKEDITOR-->

            </main>
        </div><!--c-body-->


        <!-- @include('backend.includes.footer') -->
    </div><!--c-wrapper-->

    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script> --}}

    @stack('before-scripts')
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/backend.js') }}"></script>
    <livewire:scripts />
    @stack('after-scripts')
</body>
{{-- <script>
    ClassicEditor
    .create( document.querySelector( '#content' ) )
    .catch( error => {
        console.error( error );
    } );
    </script> --}}
   


<script>
    if (screen.width < 769) {
        var sidebar = false;
    }
    else{
        var sidebar = true;
    }
    function openSidebar() {
        if (sidebar) {
            document.getElementById("admin-sidebar-div").style.marginLeft = "-250px";
            sidebar = false;
        }
        else{
            document.getElementById("admin-sidebar-div").style.marginLeft = "0px";
            sidebar = true;
        }
    }
</script>
</html>
