<html>

    <head>
        <link rel="stylesheet" href="/css/bootstrap.min.css" />
        <link rel="stylesheet" href="/css/custom.css" />

        <script src="https://kit.fontawesome.com/1beaf03f22.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/css/member.css?version=1.1" />

        @if($client->directory->seo_title)
            <title>{{ $client->directory->seo_title }}</title>
            <meta name="og:title" property="og:title" content="{{ $client->directory->seo_title }}">
        @else
            <title>{{ $client->title }} | Coach Hire | MiniBus Hire | {{ $client->address_4 }}</title>
            <meta name="og:title" property="og:title" content="Save The Highstreet">
        @endif

		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" type="image/png" href="/CoachHireDirectory-Favicon.png" />

        @if($client->directory->seo_title)
            <meta name="description" content="Coach Hire Directory, Coach, MiniBus, Excursions, Private Hire, UK">
            <meta name="og:description" content="Coach Hire Directory, Coach, MiniBus, Excursions, Private Hire, UK">
        @else
            <meta name="description" content="{{ $client->directory->seo_keywords }}">
            <meta property="og:description" content="{{ $client->directory->seo_keywords }}">
        @endif

        @if($client->directory->background)
            <meta property="og:image" content="{{ $client->directory->background->filename }}">
        @endif

        <!--
        <meta name="robots" content="index" />
        -->
    </head>

    <style>
        .btn-primary{
            background-color: {{ $client->directory->colour_1 }}!important;
            border: 0;
        }

        a{
            color: {{ $client->directory->colour_1 }}!important;
        }

        .image{
            margin-top: 1em;
        }

        img, iframe{
            max-width: 100%;
            border-radius: 20px;
        }
    </style>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            @if($client->logo)
                <img src="{{ $client->logo->filename }}"/>
            @else
              {{ $client->title }}
            @endif
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ml-auto">

                <div class="nav-group">
                    @if($client->facebook)
                    <li class="nav-item">
                        <a class="nav-link" style="color: {{ $client->directory->colour_1 }}!important" href="{{ $client->facebook }}" target="_blank">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    @endif

                    @if($client->twitter)
                    <li class="nav-item">
                        <a class="nav-link" style="color: {{ $client->directory->colour_1 }}!important" href="{{ $client->twitter }}" target="_blank">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    @endif

                    @if($client->domain)
                    <li class="nav-item">
                        <a class="nav-link" style="color: {{ $client->directory->colour_1 }}!important" href="{{ $client->domain }}" target="_blank">
                            <i class="fa fa-internet-explorer"></i>
                        </a>
                    </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link" style="color: {{ $client->directory->colour_1 }}!important" href="tel:{{ $client->phone }}" target="_blank">
                            {{ $client->phone }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: {{ $client->directory->colour_1 }}!important" href="mailto:{{ $client->email }}" target="_blank">
                            {{ $client->email }}
                        </a>
                    </li>
                </div>

                <div class="nav-group">
                    <li class="nav-item">
                        <a class="nav-link" href="welcome">Welcome</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shop">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shop">Checkout</a>
                    </li>
                </div>

            </ul>

        </div>
    </nav>

    <body>
        @yield('content')
    </body>

    <footer>
        <hr>
        <div class="row">
            <div class="col-md-6">
                @if($client->logo)
                    <img src="{{ $client->logo->filename }}" style="width: 75%"/>
                @else
                    <a href="#"><b style="font-size: 2em; font-weight: bold;">{{ $client->title }}</b></a>
                @endif

                <ul class="footer-links list-group list-group-horizontal-sm mt-3 mb-3">
                    <li><a href="">Welcome</a></li>
                    <li><a href="">Shop</a></li>
                    <li><a href="{{ env('APP_URL') }}/privacy" target="_newtab">Privacy</a></li>
                </ul>

                <span class="copyright">&copy;<a href="#" style="color: rgba(0,0,0,.5)!important;">{{ date('Y') }} {{ $client->title }}</a></span>
            </div>

            <div class="col-md-6 text-right">
                <div class="buttons">
                    <li><a href="">Contact</a></li>
                </div>
                <div class="mt-2">
                    <a target="_newtab" href="tel:{{ $client->phone }}"><b style="font-size: 2em; font-weight: bold;">{{ $client->phone }}</b></a><br>
                    <a href="mailto:{{ $client->email }}" target="_newtab"><span style="font-size: 2em;  word-wrap: break-word;">{{ $client->email }}</span></a>
                </div>

                <span>{{ $client->address }}</span>

            </div>
        </div>

    </footer>

</html>

<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/bootbox.min.js"></script>

<script>
    $(document).ready(function(){
        $('input').attr('autocomplete', 'off');

        if(!$('.banner').length){
            var navbar_height = ($('.navbar').outerHeight() + 50);
            $('.content').css('padding-top', navbar_height);
        }

        // Posted messages from the iFrame!
        var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
        var eventer = window[eventMethod];
        var messageEvent = eventMethod == "attachEvent" ? "onmessage" : "message";

        // Listen to message from child window
        eventer(messageEvent,function(e) {
            if(e.data.task == 'scroll_top'){
                window.scrollTo(0,0);
            }else{

                var key = e.message ? "message" : "data";
                var data = e[key];

                $('iframe').css('height', data);
            }

        },false);
    });
</script>

@yield('scripts')
