<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Centre d'analyse</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport"/>

    <script src="{{ asset("assets/js/plugin/webfont.min.js") }}"></script>
    <script>
        WebFont.load({
            google: {families: ["Public Sans: 300, 400, 500, 600, 700"]},
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["{{ asset("assets/css/fonts.min.css") }}"],
            },
            active: () => { sessionStorage.fonts = true; },
        });
    </script>

    <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("assets/css/plugins.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("assets/css/kaiadmin.min.css") }}"/>
</head>
<body>
<div class="wrapper">
    @include("sidebar")

    <div class="main-panel">
        @include("header")

        <div class="container">
            <div class="page-inner">
                <div class="page-header">
                    <h3 class="fw-bold mb-3">@yield("page_header_title")</h3>
                    @yield("page_header_content")
                </div>
                @yield("content")
            </div>
        </div>
    </div>
</div>

<script src="{{ asset("assets/js/core/jquery-3.7.1.min.js") }}"></script>
<script src="{{ asset("assets/js/core/popper.min.js") }}"></script>
<script src="{{ asset("assets/js/core/bootstrap.min.js") }}"></script>

<script src="{{ asset("assets/js/plugin/datatables.min.js") }}"></script>
<script src="{{ asset("assets/js/plugin/jquery.scrollbar.min.js") }}"></script>
<script src="{{ asset("assets/js/plugin/jquery.sparkline.min.js") }}"></script>
<script src="{{ asset("assets/js/plugin/sweetalert.min.js") }}"></script>

<script src="{{ asset("assets/js/plugin/kaiadmin.min.js") }}"></script>
@yield("scripts")
</body>
</html>
