<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Human Welfare - Fundraising and Charity HTML Template | Donate Now</title>
<!-- Stylesheets -->
<link href="/css/bootstrap.css" rel="stylesheet">
<link href="/css/style.css" rel="stylesheet">
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="/images/favicon.ico" type="image/x-icon">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="/css/responsive.css" rel="stylesheet">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>

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
                <h1>DONATE NOW</h1>
                <ul class="bread-crumb">
                	<li><a href="/">Home</a></li>
                    <li>DONATE NOW</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    
    <!--Donate Section-->
    <section class="donate-now">
    	<div class="auto-container">
        	<section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Agung Siaga.
            <small class="pull-right">{{ $date['now'] }}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong>Agung Siaga.</strong><br>
            STMIK STIKOM BALI<br>
            Phone: (081) 123-5432<br>
            Email: info@agungsiaga.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong>{{ $data['donator_name'] }}</strong><br>
            Phone: {{ $data['phone_number'] }}<br>
            Email: {{ $data['email'] }}<br>
            Description: {{ $data['description'] }}<br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice #{{ $invoice_code }}</b><br>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Campaign Name</th>
              <th>Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>1</td>
              <td>{{ $campaign[0]->campaign_name }}</td>
              <td>{!! str_limit($campaign[0]->description, $limit = 80, $end = '...') !!}</td>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Payment Methods:</p>
          <img src="/dashboard_as/dist/img/credit/visa.png" alt="Visa">
          <img src="/dashboard_as/dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="/dashboard_as/dist/img/credit/american-express.png" alt="American Express">
          <img src="/dashboard_as/dist/img/credit/paypal2.png" alt="Paypal">

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Transfer limit until {{ $date['tomorrow'] }}</p>

          <div class="table-responsive">
            <table class="table">
              <tbody><tr>
                <th style="width:50%">Amount Donation:</th>
                <td>Rp. {{ $amounts['amount_transfer'] }}</td>
              </tr>
              <tr>
                <th>Unique Code (will be donated)</th>
                <td>Rp. {{ $amounts['unique_number'] }}</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>Rp. {{ $amounts['total_transfer'] }}</td>
              </tr>
            </tbody></table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
    </section>
        </div>
    </section>
    
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
                                    <figure class="image-box"><a href="/images/resource/featured-image-1.jpg" class="lightbox-image" title="Image Title Here" data-fancybox-group="footer-gallery"><img src="/images/gallery/footer-gallery-thumb-1.jpg" alt=""></a></figure>
                                    <!--Image Box-->
                                    <figure class="image-box"><a href="/images/resource/featured-image-2.jpg" class="lightbox-image" title="Image Title Here" data-fancybox-group="footer-gallery"><img src="/images/gallery/footer-gallery-thumb-2.jpg" alt=""></a></figure>
                                    <!--Image Box-->
                                    <figure class="image-box"><a href="/images/resource/featured-image-3.jpg" class="lightbox-image" title="Image Title Here" data-fancybox-group="footer-gallery"><img src="/images/gallery/footer-gallery-thumb-3.jpg" alt=""></a></figure>
                                    <!--Image Box-->
                                    <figure class="image-box"><a href="/images/resource/featured-image-1.jpg" class="lightbox-image" title="Image Title Here" data-fancybox-group="footer-gallery"><img src="/images/gallery/footer-gallery-thumb-4.jpg" alt=""></a></figure>
                                    <!--Image Box-->
                                    <figure class="image-box"><a href="/images/resource/featured-image-2.jpg" class="lightbox-image" title="Image Title Here" data-fancybox-group="footer-gallery"><img src="/images/gallery/footer-gallery-thumb-5.jpg" alt=""></a></figure>
                                    <!--Image Box-->
                                    <figure class="image-box"><a href="/images/resource/featured-image-3.jpg" class="lightbox-image" title="Image Title Here" data-fancybox-group="footer-gallery"><img src="/images/gallery/footer-gallery-thumb-6.jpg" alt=""></a></figure>
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
                                	<a href="#"><img src="/images/sponsors/footer-sponsor-1.png" alt="" /></a>
                                </div>
                                <div class="slide">
                                	<a href="#"><img src="/images/sponsors/footer-sponsor-2.png" alt="" /></a>
                                </div>
                                <div class="slide">
                                	<a href="#"><img src="/images/sponsors/footer-sponsor-3.png" alt="" /></a>
                                </div>
                                <div class="slide">
                                	<a href="#"><img src="/images/sponsors/footer-sponsor-4.png" alt="" /></a>
                                </div>
                                <div class="slide">
                                	<a href="#"><img src="/images/sponsors/footer-sponsor-1.png" alt="" /></a>
                                </div>
                                <div class="slide">
                                	<a href="#"><img src="/images/sponsors/footer-sponsor-2.png" alt="" /></a>
                                </div>
                                <div class="slide">
                                	<a href="#"><img src="/images/sponsors/footer-sponsor-3.png" alt="" /></a>
                                </div>
                                <div class="slide">
                                	<a href="#"><img src="/images/sponsors/footer-sponsor-4.png" alt="" /></a>
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

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-long-arrow-up"></span></div>


<script src="/js/jquery.js"></script> 
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/js/jquery.fancybox.pack.js"></script>
<script src="/js/jquery.fancybox-media.js"></script>
<script src="/js/wow.js"></script>
<script src="/js/owl.js"></script>
<script src="/js/script.js"></script>
</body>
</html>