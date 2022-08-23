<!DOCTYPE html>
<html lang="zxx" class="js">
<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->

    <link rel="shortcut icon" href="{{asset('backend/images/favicon.png')}}">
    <!-- Page Title  -->
    <title>Result Management</title>
    <!-- StyleSheets  -->

    <link rel="stylesheet" href="  {{asset('backend/assets/css/dashlite.css?ver=2.4.0')}}">
    <link id="skin-default" rel="stylesheet" href="{{asset('backend/assets/css/theme.css?ver=2.4.0')}}">

    <style>

.logo-img {
    max-height: 65px;
}

    </style>
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
       @include('admin.includes.sideNav') 
            <!-- sidebar @e -->

            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
             @include('admin.includes.nav') 
          <!-- content @s -->
                <div class="nk-content ">
                <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                            
                            
                       @yield('content')


                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @s -->
                <div class="nk-footer">
                @include('admin.includes.footer')
                
                @yield('additional')
                </div>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->

    <script src="{{asset('backend/assets/js/bundle.js?ver=2.4.0')}}"></script>
    <script src="{{asset('backend/assets/js/scripts.js?ver=2.4.0')}}"></script>
    <script src="{{asset('backend/assets/js/charts/gd-default.js?ver=2.4.0')}}"></script>

    @yield('js')
</body>

</html>