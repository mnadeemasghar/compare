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
    <title>Comparepk - Services Page</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" /> <!-- https://fonts.google.com/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet" /> <!-- https://getbootstrap.com/ -->
    <link href="fontawesome/css/all.min.css" rel="stylesheet" /> <!-- https://fontawesome.com/ -->
    <link href="css/templatemo-diagoona.css" rel="stylesheet" />
<!--

TemplateMo 550 Diagoona

https://templatemo.com/tm-550-diagoona

-->
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
                                <li class="nav-item">
                                    <a class="nav-link tm-nav-link" href="{{route('welcome')}}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tm-nav-link" href="{{route('aboutus')}}">About</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link tm-nav-link" href="{{route('sitemap')}}">Services <span class="sr-only">(current)</span></a>
                                </li>                            
                                <li class="nav-item">
                                    <a class="nav-link tm-nav-link" href="{{route('contactus')}}">Contact</a>
                                </li>
                            </ul>                             
                        </div>                        
                    </nav>
                </div>
            </div>
            
            <div class="tm-row">
                <div class="tm-col-left"></div>
                <main class="tm-col-right">
                    <section class="tm-content">
                        <div class="media my-3 mb-5 tm-service-media tm-service-media-img-l">
                            <img src="img/services-1.jpg" alt="Image" class="tm-service-img">
                            <div class="media-body tm-service-text">
                                <h2 class="mb-4 tm-content-title">Real Time comparision</h2>
                                <p>Compare your desired product in just few click.</p>
                            </div> 
                        </div>
                        <div class="media my-3 mb-5 tm-service-media">                            
                            <div class="media-body tm-service-text">
                                <h2 class="mb-4 tm-content-title">Multidimensional view</h2>
                                <p>Do not compare anything from one side compare it with all aspects.</p>
                            </div> 
                            <img src="img/services-2.jpg" alt="Image" class="tm-service-img-r">
                        </div>
                        <div class="media my-3 tm-service-media tm-service-media-img-l">
                            <img src="img/services-3.jpg" alt="Image" class="tm-service-img">
                            <div class="media-body tm-service-text">
                                <h2 class="mb-4 tm-content-title">Become Partner with Us</h2>
                                <p>If you are passionate just like us, please join us by sending email at <a href="mailto:development@comparepk.com">development@comparepk.com</a> or by <a href="{{route('contactus')}}">contact us form</a>.</p>
                            </div> 
                        </div>                      
                    </section>
                </main>
            </div>
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
                    <p class="mb-0">Copyright 2021 Comparepk 
                    
                    | Design: <a rel="nofollow" target="_parent" href="https://www.linkedin.com/in/m-nadeem-asghar-82268478/" class="tm-text-link">M Nadeem Asghar</a></p>
                </footer>
            </div>  
        </div>        

        <!-- Diagonal background design -->
        <div class="tm-bg">
            <div class="tm-bg-left"></div>
            <div class="tm-bg-right"></div>
        </div>
    </div>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.backstretch.min.js"></script>
    <script src="js/templatemo-script.js"></script>
</body>

</html>