<!DOCTYPE html>
    <html lang="en">

        <head>
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-188933430-1"></script>
            <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-188933430-1');
            </script>
            
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Comparepk - Compare anything</title>
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" /> <!-- https://fonts.google.com/ -->
            <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" /> <!-- https://getbootstrap.com/ -->
            <link href="{{asset('fontawesome/css/all.min.css')}}" rel="stylesheet" /> <!-- https://fontawesome.com/ -->
            <link href="{{asset('css/templatemo-diagoona.css')}}" rel="stylesheet" />

        </head>

        <body>
            <div class="tm-container">        
                <div>
                    <div class="tm-row pt-4">
                        <div class="tm-col-left">
                            <div class="tm-site-header media">
                                <i class="fas fa-umbrella-beach fa-3x mt-1 tm-logo"></i>
                                <div class="media-body">
                                    <h1 class="tm-sitename text-uppercase">comparePK</h1>
                                    <p class="tm-slogon">Compare anything</p>
                                </div>        
                            </div>
                        </div>
                        <div class="tm-col-right">
                            <nav class="navbar navbar-expand-lg" id="tm-main-nav">
                                <button class="navbar-toggler toggler-example mr-0 ml-auto" type="button" 
                                    data-toggle="collapse" data-target="#navbar-nav" 
                                    aria-controls="navbar-nav" aria-expanded="false" aria-label="Toggle navigation">
                                    <span><i class="fas fa-bars"></i></span>
                                </button>
                                <div class="collapse navbar-collapse tm-nav" id="navbar-nav">
                                    <ul class="navbar-nav text-uppercase">
                                        <li class="nav-item @if(Route::currentRouteName() == 'welcome') {{__('active')}} @endif">
                                            <a class="nav-link tm-nav-link" href="{{route('welcome')}}">Home <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item @if(Route::currentRouteName() == 'aboutus') {{__('active')}} @endif">
                                            <a class="nav-link tm-nav-link" href="{{route('aboutus')}}">About</a>
                                        </li>
                                        <li class="nav-item @if(Route::currentRouteName() == 'aboutus') {{__('active')}} @endif">
                                            <a class="nav-link tm-nav-link" href="{{route('daraztools')}}">Daraz Tools</a>
                                        </li>
                                        <li class="nav-item @if(Route::currentRouteName() == 'blog') {{__('active')}} @endif">
                                            <a class="nav-link tm-nav-link" href="{{route('blog')}}">Blog</a>
                                        </li>                            
                                        <li class="nav-item @if(Route::currentRouteName() == 'contactus') {{__('active')}} @endif">
                                            <a class="nav-link tm-nav-link" href="{{route('contactus')}}">Contact</a>
                                        </li>
                                    </ul>                            
                                </div>                        
                            </nav>
                        </div>
                    </div>
                    @yield('content')
                </div>
                    <div class="tm-row">
                    <div class="tm-col-left text-center">            
                        <ul class="tm-bg-controls-wrapper">
                            <li class="tm-bg-control active" data-id="0"></li>
                            <li class="tm-bg-control" data-id="1"></li>
                            <li class="tm-bg-control" data-id="2"></li>
                        </ul>            
                    </div>        
                    <div class="tm-col-right tm-col-footer">
                        <footer class="tm-site-footer text-right">
                            <p>{{ App\Http\Controllers\FrontendController::getcate() }}</p>
                            <p class="mb-0">Copyright 2021 Comparepk | Design & Develop: <a rel="nofollow" target="_parent" href="https://www.linkedin.com/in/m-nadeem-asghar-82268478/" class="tm-text-link">M Nadeem Asghar</a></p>
                        </footer>
                    </div>  
                </div>
                <!-- Diagonal background design -->
                <div class="tm-bg">
                    <div class="tm-bg-left"></div>
                    <div class="tm-bg-right"></div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLongTitle">Product History</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-dark" id="placedetail">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div> 
            <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
            <script src="{{asset('js/bootstrap.min.js')}}"></script>
            <script src="{{asset('js/jquery.backstretch.min.js')}}"></script>
            <script src="{{asset('js/templatemo-script.js')}}"></script>
            <script>
                function getdetail(url){
                    var xhttp = new XMLHttpRequest();
                    document.getElementById("placedetail").innerHTML = "Data Loading Please Wait ...";
                    xhttp.open("GET", "{{route('url_detail')}}/?url="+url, true);
                    xhttp.send();

                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                        // Typical action to be performed when the document is ready:
                        document.getElementById("placedetail").innerHTML = xhttp.responseText;
                        }
                    };
                }
            </script>
        </body>
    </html>