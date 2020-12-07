<html>
    <head>
        <title>Save The Highstreet</title>
        <meta name="og:title" property="og:title" content="Save The Highstreet">

        <meta name="description" content="">
        <meta name="og:description" content="">

        <meta name="og:image" property="og:image" content="" />

        <link rel="stylesheet" href="/css/bootstrap.min.css" />
        <link rel="stylesheet" href="/css/custom.css" />

        <script src="https://kit.fontawesome.com/1beaf03f22.js" crossorigin="anonymous"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>

    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="/">Save The High Street</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i style="color: white;" class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ml-auto">

                <div class="nav-group">

                    <li class="nav-item active">
                        <a class="nav-link" href="/">Members <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/about">About us</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/news">News</a>
                    </li>

                    @if( Auth::guard('member')->check() || Auth::check() )

                        <li class="nav-item">
                            <a class="nav-link" href="/member">Dashboard</a>
                        </li>

                        <li class="nav-item">
                            <a href="/logout" class="nav-link"><button class="btn btn-danger">Logout</button></a>
                        </li>

                    @else

                    <li class="nav-item">
                        <a href="/login" class="nav-link"><button class="btn btn-dark">Custmer Log in</button></a>
                    </li>

                    <li class="nav-item">
                        <a href="/member/login" class="nav-link"><button class="btn btn-primary">Member Log in</button></a>
                    </li>

                    @endif

                </div>

                <div class="nav-group">
                    <li class="nav-item active">
                        <a class="nav-link">
                            <form method="GET" id="nav_search" action="/search">
                                <input style="line-height: 2.5em;" class="autocomplete search" id="searchbox" name="location" type="text" placeholder="Search..."/><i class="fas fa-search"></i>
                            </form>
                        </a>
                    </li>
                </div>
            </ul>
        </div>
    </nav>

    @yield('content')

    <footer>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <span class="logo">Save The High Street</span>

                <ul class="footer-links list-group list-group-horizontal-sm mt-3 mb-3">
                    <li><a href="/about">About</a></li>
                    <li><a href="https://theworldwide.shop">Shop</a></li>
                    <li><a href="/sitemap">Sitemap</a></li>
                    <li><a href="/privacy">Privacy</a></li>
                </ul>

                <span class="copyright">&copy; {{ date('Y') }} <a href="https://theworldwide.shop" target="_newtab">The Worldwide Shop</a></span>
            </div>

            <div class="col-md-8 text-right">
                <div class="mt-2">
                    <a target="_newtab" href="tel:08455281430"><b style="font-size: 2em; font-weight: bold;">0800 </b></a><br>
                    <a href="mailto:enquiries@coachhire.directory" target="_newtab"><span style="font-size: 2em;  word-wrap: break-word;">enquiries@savethehighstreet.co.uk</span></a>
                </div>

            </div>
        </div>

    </footer>

</body>

</html>

<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/bootbox.min.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API') }}&libraries=places"
async defer></script>

<script>
    $(document).ready(function(){

        if($('.spacer').length){
            $('.spacer').css('height', ($('.navbar').height() + 50));
        }


    });
</script>

@yield('scripts')
