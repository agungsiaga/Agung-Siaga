<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Samara - Charity HTML Template | Event Single</title>
<!-- Stylesheets -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/jquery-ui.css" rel="stylesheet">
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="css/responsive.css" rel="stylesheet">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->

<script src="/dashboard_as/bower_components/jquery/dist/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCr2-piW40A6QEcYr6ULvppMvZ6QIg4-84&libraries=places" type="text/javascript"></script>
</head>

<body>
<style>
  #map-canvas-gmap{
    width: 100%;
    height: 450px;
  }
</style>
<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
    <!-- Main Header -->
    <header class="main-header">
        <!-- Header Top One-->
        <div class="header-top-one">
            <div class="auto-container">
                <div class="clearfix">
                    
                    <!--Top Left-->
                    <div class="top-left top-links">
                        <ul class="clearfix">
                            <li><span class="icon fa fa-phone"></span> <a href="#">(+6281) 455667778</a></li>
                            <li><span class="icon fa fa-envelope-o"></span> <a href="#">info@agungsiaga.com</a></li>
                        </ul>
                    </div>
                    
                    <!--Top Right-->
                    <div class="top-right">
                        <div class="social-icon">
                            <a href="#"><span class="fa fa-facebook"></span></a>
                            <a href="#"><span class="fa fa-twitter"></span></a>
                            <a href="#"><span class="fa fa-google-plus"></span></a>
                            <a href="#"><span class="fa fa-youtube"></span></a>
                            <a href="#"><span class="fa fa-instagram"></span></a>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
        <!-- Header Top One End -->
        
        <!-- Header Lower -->
        <div class="header-lower">
            <div class="main-box">
                <div class="auto-container">
                    <div class="outer-container clearfix">
                        <!--Logo Box-->
                        <div class="logo-box">
                            <div class="logo"><a href="/"><img src="images/logo.png" alt=""></a></div>
                        </div>
                        
                        <!--Nav Outer-->
                        <div class="nav-outer clearfix">
                            <!-- Main Menu -->
                            <nav class="main-menu">
                                <div class="navbar-header">
                                    <!-- Toggle Button -->      
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    </button>
                                </div>
                                
                                <div class="navbar-collapse collapse clearfix">
                                    <ul class="navigation clearfix">
                                        <li><a href="/">Home</a></li>
                                        <li><a href="/about-us">About Us</a></li>
                                        <li><a href="/campaigns">Campaigns</a></li>
                                        <li><a href="/contact-us">Contact Us</a></li>
                                        
                                     </ul>
                                </div>
                            </nav><!-- Main Menu End-->
                            
                            
                        </div><!--Nav Outer End-->
                        
                    </div>    
                </div>
            </div>
        </div>
        
        <!--Sticky Header-->
        <div class="sticky-header">
            <div class="auto-container clearfix">
                <!--Logo-->
                <div class="logo pull-left">
                    <a href="/" class="img-responsive"><img src="images/logo-small.png" alt="" title=""></a>
                </div>
                
                <!--Right Col-->
                <div class="right-col pull-right">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <div class="navbar-header">
                            <!-- Toggle Button -->      
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                        </div>
                        
                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                                <li><a href="/">Home</a></li>
                                <li><a href="/about-us">About Us</a></li>
                                <li><a href="/campaigns">Campaigns</a></li>
                                <li><a href="/contact-us">Contact Us</a></li>   
                             </ul>
                        </div>
                    </nav><!-- Main Menu End-->
                </div>
                
            </div>
        </div>
        <!--End Sticky Header-->
    
    </header>
    <!--End Main Header -->
    
    <!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/5.jpg);">
    	<div class="auto-container">
        	<div class="inner-box">
                <h1>event single</h1>
                <ul class="bread-crumb">
                	<li><a href="/">Home</a></li>
                    <li>event single</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    
    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">
            	
                <!--Content Side-->
                <div class="content-side col-lg-12 col-md-12 col-sm-12 col-xs-12">
                	<div class="event-single">
                    	
                        <!--Event Style two-->
                        <div class="event-style-two">
                            <div class="inner">
                                <!--Map Section-->
                                <section class="map-section">
                                    <div class="map-outer">
                                        <div id="map-canvas-gmap"></div>
                                    </div>
                                </section>
                                <!--Lower Content-->
                                <div class="lower-content">
                                    <div class="posted-date"><div id="distance">0</div><span>km</span></div>
                                    <ul class="post-meta">
                                        <span class="icon fa fa-map-marker"></span><li id="map-address"></li><br>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!--Product Info Tabs-->
                        <div class="product-info-tabs">
                            
                            <!--Product Tabs-->
                            <div class="prod-tabs tabs-box" id="product-tabs">
                            
                                <!--Tab Btns-->
                                <ul class="tab-btns tab-buttons clearfix">
                                    <li data-tab="#prod-description" class="tab-btn active-btn">Nearest Posts from your location</li>
                                </ul>
                                
                                <!--Tabs Content-->
                                <div class="tabs-container tabs-content">
                                    
                                    <!--Tab / Active Tab-->
                                    <div class="tab active-tab" id="prod-description">
                                        
                                        <div class="content">
                                        	<!--List Style Two-->
                                            <ul class="list-style-two">
                                                @foreach($nearest as $near)
                                            	   <li><a href="#map-canvas-gmap" onclick="initMap({{ $near->lat }}, {{ $near->lng }}, {{ $near->distance }})">{{ $near->address }}</a></li>
                                                @endforeach
                                            </ul>
                                            
                                            <!--social icon Two-->
                                            <ul class="social-icon-two">
                                            	<li><span class="icon fa fa-share-alt"></span><strong>&ensp; SHARE</strong></li>
                                                <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                                <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                                <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                                                <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                                                <li><a href="#"><span class="fa fa-instagram"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <!--End Product Info Tabs-->
                        
                    </div>
                    
				</div>
            </div>
        </div>
    </div>
    <!--End Sidebar Page Container-->
    
    <!--Main Footer-->
    <footer class="main-footer">
    	<div class="widgets-section">
        	<div class="auto-container">
            	<div class="row clearfix">
                    <!--Footer Column-->
                    <div class="footer-column col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="footer-widget contact-widget">
                            <div class="footer-logo"><a href="/"><img src="images/logo-3.png" alt=""></a></div>
                            <div class="widget-content">
                                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do.</div>
                                <ul class="contact-info">
                                    <li><div class="icon"><span class="flaticon-house"></span></div>Collins Street West,121 King Street, Melbourne.</li>
                                    <li><div class="icon"><span class="flaticon-technology-1"></span></div>+(11)123 456 7890, </li>
                                    <li><div class="icon"><span class="flaticon-envelope-1"></span></div>info@Samara.com</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--Footer Column-->
                    <div class="footer-column col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="footer-widget gallery-widget">
                            <h2>Our GALLERY</h2>
                            <div class="widget-content">
                                <div class="images-outer clearfix">
                                    <!--Image Box-->
                                    <figure class="image-box"><a href="images/resource/featured-image-1.jpg" class="lightbox-image" title="Image Title Here" data-fancybox-group="footer-gallery"><img src="images/gallery/footer-gallery-thumb-1.jpg" alt=""></a></figure>
                                    <!--Image Box-->
                                    <figure class="image-box"><a href="images/resource/featured-image-2.jpg" class="lightbox-image" title="Image Title Here" data-fancybox-group="footer-gallery"><img src="images/gallery/footer-gallery-thumb-2.jpg" alt=""></a></figure>
                                    <!--Image Box-->
                                    <figure class="image-box"><a href="images/resource/featured-image-3.jpg" class="lightbox-image" title="Image Title Here" data-fancybox-group="footer-gallery"><img src="images/gallery/footer-gallery-thumb-3.jpg" alt=""></a></figure>
                                    <!--Image Box-->
                                    <figure class="image-box"><a href="images/resource/featured-image-1.jpg" class="lightbox-image" title="Image Title Here" data-fancybox-group="footer-gallery"><img src="images/gallery/footer-gallery-thumb-4.jpg" alt=""></a></figure>
                                    <!--Image Box-->
                                    <figure class="image-box"><a href="images/resource/featured-image-2.jpg" class="lightbox-image" title="Image Title Here" data-fancybox-group="footer-gallery"><img src="images/gallery/footer-gallery-thumb-5.jpg" alt=""></a></figure>
                                    <!--Image Box-->
                                    <figure class="image-box"><a href="images/resource/featured-image-3.jpg" class="lightbox-image" title="Image Title Here" data-fancybox-group="footer-gallery"><img src="images/gallery/footer-gallery-thumb-6.jpg" alt=""></a></figure>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Footer Column-->
                	<div class="footer-column col-lg-5 col-md-4 col-sm-6 col-xs-12">
                    	<div class="footer-widget partner-widget">
                        	<h2>OUR PARTNERS</h2>
                            <!--footer sponsors slider-->
                            <div class="footer-sponsors-slider owl-carousel owl-theme">
                            	<div class="slide">
                                	<a href="#"><img src="images/sponsors/footer-sponsor-1.png" alt="" /></a>
                                </div>
                                <div class="slide">
                                	<a href="#"><img src="images/sponsors/footer-sponsor-2.png" alt="" /></a>
                                </div>
                                <div class="slide">
                                	<a href="#"><img src="images/sponsors/footer-sponsor-3.png" alt="" /></a>
                                </div>
                                <div class="slide">
                                	<a href="#"><img src="images/sponsors/footer-sponsor-4.png" alt="" /></a>
                                </div>
                                <div class="slide">
                                	<a href="#"><img src="images/sponsors/footer-sponsor-1.png" alt="" /></a>
                                </div>
                                <div class="slide">
                                	<a href="#"><img src="images/sponsors/footer-sponsor-2.png" alt="" /></a>
                                </div>
                                <div class="slide">
                                	<a href="#"><img src="images/sponsors/footer-sponsor-3.png" alt="" /></a>
                                </div>
                                <div class="slide">
                                	<a href="#"><img src="images/sponsors/footer-sponsor-4.png" alt="" /></a>
                                </div>
                            </div>
                            
                            <h2>NEWSLETTTER SIGN-UP</h2>
                            <!--newsletter form-->
                            <div class="newsletter-form">
                                <form method="post" action="contact.html">
                                    <div class="form-group">
                                        <input type="email" name="email" value="" placeholder="Email" required>
                                        <button type="submit" class="theme-btn">Subscribe</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
        	<div class="auto-container">
            	<div class="row clearfix">
                	<div class="column col-md-6 col-sm-6 col-xs-12">
                    	<div class="copyright">&copy; 2017 Samara - The Samara Specialists All Rights Reserved</div>
                    </div>
                    <div class="column col-md-6 col-sm-6 col-xs-12">
                    	<div class="footer-icon">
                            <a href="#"><span class="fa fa-facebook"></span></a>
                            <a href="#"><span class="fa fa-twitter"></span></a>
                            <a href="#"><span class="fa fa-google-plus"></span></a>
                            <a href="#"><span class="fa fa-instagram"></span></a>
                            <a href="#"><span class="fa fa-youtube"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--End Main Footer-->
    
</div>
<!--End pagewrapper-->

<script>

      function showMap(){
          var map = new google.maps.Map(document.getElementById('map-canvas-gmap'),{
            center:{
              lat: {{ $lat }},
              lng: {{ $lng }}
            },
            zoom:15
          });
          var marker = new google.maps.Marker({
            position: {
              lat: {{ $lat }},
              lng: {{ $lng }}
            },
            map: map,
            draggable: true
          });
      }

    function geocodeLatLng(){
        var map = new google.maps.Map(document.getElementById('map-canvas-gmap'),{
            center:{
              lat: {{ $lat }},
              lng: {{ $lng }}
            },
            zoom:15
        });
        var latlng = {lat: parseFloat({{ $lat }}), lng: parseFloat({{ $lng }})};
        var geocoder = new google.maps.Geocoder;
        geocoder.geocode({'location': latlng}, function(results, status) {
          if (status === 'OK') {
            if (results[0]) {
              map.setZoom(11);
              var marker = new google.maps.Marker({
                position: latlng,
                map: map
              });
              console.log(results);
              $('#map-address').html("&nbsp;" + results[0].formatted_address + "&nbsp; (Your Location)");
            } else {
              window.alert('No results found');
            }
          } else {
            window.alert('Geocoder failed due to: ' + status);
            
          }

        });
    }

    function initMap(destLat, destLng, distance){
        var pointA = new google.maps.LatLng({{ $lat }}, {{ $lng }}),
        pointB = new google.maps.LatLng(destLat , destLng),
        map = new google.maps.Map(document.getElementById('map-canvas-gmap'),{
          center: pointA,
          zoom:15
        });
        
        directionsService = new google.maps.DirectionsService,
        directionsDisplay = new google.maps.DirectionsRenderer({
          map: map
        }),
        markerA = new google.maps.Marker({
          position: pointA
        }), 
        markerB = new google.maps.Marker({
          position: pointB
        });

        calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB, distance);    
    }

    function calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB, distance) {
        directionsService.route({
            origin: pointA,
            destination: pointB,
            avoidTolls: true,
            avoidHighways: false,
            travelMode: google.maps.TravelMode.DRIVING
        }, function (response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
                $('#distance').html(Math.round(distance));
            } else {
                window.alert('Directions request failed due to ' + status);
            }
        });
    }

  showMap();
  geocodeLatLng();
</script>

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-long-arrow-up"></span></div> 
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.countdown.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script>
<script src="js/owl.js"></script>
<script src="js/wow.js"></script>
<script src="js/appear.js"></script>
<script src="js/script.js"></script>
</body>
</html>