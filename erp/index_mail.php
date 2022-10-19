




<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="AstonIndia">
    <title>Aston India - Complete Accounting Solution in Delhi</title>
    <link href="assets/images/favicon/favicon.png" rel="shortcut icon" type="image/png">
    <link href="assets/images/favicon/apple-touch-icon-57x57.png" rel="apple-touch-icon" sizes="57x57">
    <link href="assets/images/favicon/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
    <link href="assets/images/favicon/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
    <link href="assets/images/favicon/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">

    <!-- Icon fonts -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/flaticon.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Plugins for this template -->
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/owl.carousel.css" rel="stylesheet">
    <link href="assets/css/owl.theme.css" rel="stylesheet">
    <link href="assets/css/slick.css" rel="stylesheet">
    <link href="assets/css/slick-theme.css" rel="stylesheet">
    <link href="assets/css/owl.transitions.css" rel="stylesheet">
    <link href="assets/css/jquery.fancybox.css" rel="stylesheet">
    <link href="assets/css/bootstrap-select.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
	 <?php  
//error_reporting(E_ALL ^ E_NOTICE);
     if (isset($_POST['call_submit'])) {

         // var_dump($_POST);
         $userName = $_POST['name'];
         $userEmail = $_POST['email'];
         $userPhone = $_POST['phone'];
         $subject = $_POST['subject'];
         $userMsg = $_POST['message'];

         $message = "
<html>
<head>
<title>".$subject."</title>
</head>
<body>
<p>".$userMsg."</p>
<table>
<tr>
<th>Name</th>
<th>".$userName."</th>
</tr>
<tr>
<td>EMail</td>
<td>".$userEmail."</td>
</tr>
<tr>
<td>Phone</td>
<td>".$userPhone."</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
         $headers = "MIME-Version: 1.0" . "\r\n";
         $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
         $headers .= 'From: <deepak.k@prakharsoftwares.com>' . "\r\n";
         $headers .= 'Cc: deepak.k@prakharsoftwares.com' . "\r\n";


         $to = "deepak.k@prakharsoftwares.com";





         if(mail($to,$subject,$message,$headers)) {
             header("Location: /thanks.html");
         } else {
             header("Location: /error.html");
         }
     }


?>

</head>

<body>

    <!-- start page-wrapper -->
    <div class="page-wrapper">

        <!-- start preloader -->
        <div class="preloader">
            <div class="inner">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <!-- end preloader -->

        <!-- Start header -->
        <header id="header" class="site-header header-style-5">
            <div class="topbar">
                <div class="upper-topbar">
                    <div class="container">
                        <div class="row">
                            <div class="col col-sm-9">
                                <div class="upper-topbar-contact">
                                    <ul>
                                        <li><i class="fa fa-envelope"></i>astonindia9@gmail.com</li>
                                        <li><i class="fa fa-phone"></i>+91-9810073334, +918510073334</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col col-sm-3">
                                <div class="upper-topbar-social">
                                    <ul>
                                        <li><a href="https://www.facebook.com/astonindia" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end container -->
                </div>
            </div>
            <!-- end topbar -->

            <nav class="navigation navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="open-btn">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="#" class="navbar-brand">
                            <img src="assets/images/logo-2.png" alt="Aston India, Best Accounting Company in Delhi"></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse navbar-right navigation-holder">
                        <button class="close-navbar"><i class="fa fa-close"></i></button>
                        <ul class="nav navbar-nav">
                            <li><a href="index.html">Home</a> </li>
                            <li><a href="about.html">About Us</a></li>
                            <li class="menu-item-has-children">
                                <a href="#">Our Services</a>
                                <ul class="sub-menu">
                                    <li><a href="company-incorporation.html">Company Incorporation</a></li>
                                    <li><a href="bookkeeping-accounting.html">Bookkeeping Accounting</a></li>
                                    <li><a href="taxation.html">Taxation</a></li>
                                    
                                    <li><a href="income-tax.html">Income Tax</a></li>
                                    <li><a href="roc-matters.html">ROC Matters</a></li>
                                    <li><a href="return-compliance.html">Return Compliance</a></li>
                                    <li><a href="tds-portfolio-management.html">TDS Portfolio Management</a></li>
                                    
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">New Registrations</a>
                                <ul class="sub-menu">
                                    <li><a href="gst-registration.html">GST Registration</a></li>
                                    <li><a href="company-registration.html">Company Registration</a></li>
                                    
                                    
                                    
                                </ul>
                            </li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <!-- end of container -->
            </nav>
        </header>
        <!-- end of header -->


        <!-- start of hero -->
        <section class="hero hero-style-3 hero-slider-wrapper">
            <div class="hero-slider">
                <div class="slide">
                    <img src="assets/images/slider/slide-1.jpg"  class="slider-bg" alt="GST Registration in Rs. 499">
                    <div class="container">
                        <div class="row">
                            <div class="col col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 slide-caption">
                                <h2>Get GST Registration in</h2>
                                <div class="btns">
                                    <a href="#" class="theme-btn" style="font-size: 45px;">Rs. 499/- only</a>
                                    <a href="contact.html" class="theme-btn-s2">Register Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="slide">
                    <img src="assets/images/slider/slide-1.jpg" class="slider-bg" alt="GST Return in Rs. 499">
                    <div class="container">
                        <div class="row">
                            <div class="col col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 slide-caption">
                                <h2>File your GST Return in</h2>
                                <div class="btns">
                                    <a href="#" class="theme-btn" style="font-size: 45px;">Rs. 499/- only</a>
                                    <a href="contact.html" class="theme-btn-s2">File Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <img src="assets/images/slider/slide-2.jpg" alt class="slider-bg">
                    <div class="container">
                        <div class="row">
                            <div class="col col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 slide-caption">
                                <h2>Are you Looking Financial Advisor ?</h2>
                                <div class="btns">
                                    <a href="contact.html" class="theme-btn-s2">Get Quote Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="slide">
                    <img src="assets/images/slider/slide-3.jpg" alt class="slider-bg">
                    <div class="container">
                        <div class="row">
                            <div class="col col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 slide-caption">
                                <h2>Taxation and Consultation on related issues ?</h2>
                                <div class="btns">
                                    <a href="contact.html" class="theme-btn-s2">Get Quote Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of hero slider -->


        <!-- start about-section -->
        <section class="section-padding about-section-s4">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-8 col-md-10">
                        <div class="section-title-s2">
                            <h2>Our goal is to make customers feel they’re secured</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-7">
                        <div class="about-details">
                            <p style="font-size: 15px;">We are  offering Complete Accounting Solutions and Company Registrations under one roof in delhi NCR, India to finalization of all taxation and consultation Registrations on relating issue. We help our clients to set up new business and provide all type on consultation to start new business in Delhi & NCR.  We help our client in day to day transaction and maintaining accounts accordingly we also supervise many company accounts, We arrange all type of help to our client like day to day accounting maintaining accounts documents, Banking, statutory compliance on their door step. </p>
                            
                        </div>
                    </div>

                    <div class="col col-md-5">
                        <div class="about-img">
                            <img src="assets/images/about-s3.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- end container -->
        </section>
        <!-- end about-section -->

        <section class="services-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="section-title">
                            <h2>Our Services</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-xs-12">
                        <div class="service-grids">
                            <div class="grid">
                                <div class="img-details-link">
                                    <div class="details-link">
                                        <a href="gst-registration.html"><i class="fa fa-arrow-right"></i></a>
                                    </div>
                                    <img src="assets/images/services/img-1.jpg" alt>
                                </div>
                                <div class="service-details">
                                    <h3><a href="gst-registration.html">GST Registration</a></h3>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="img-details-link">
                                    <div class="details-link">
                                        <a href="company-incorporation.html"><i class="fa fa-arrow-right"></i></a>
                                    </div>
                                    <img src="assets/images/services/company-incorporation.jpg" alt>
                                </div>
                                <div class="service-details">
                                    <h3><a href="company-incorporation.html">Company Incorporation</a></h3>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="img-details-link">
                                    <div class="details-link">
                                        <a href="bookkeeping-accounting.html"><i class="fa fa-arrow-right"></i></a>
                                    </div>
                                    <img src="assets/images/services/bookkeeping-accounting.jpg" alt>
                                </div>
                                <div class="service-details">
                                    <h3><a href="bookkeeping-accounting.html">BookKeeping Accounting</a></h3>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="img-details-link">
                                    <div class="details-link">
                                        <a href="taxation.html"><i class="fa fa-arrow-right"></i></a>
                                    </div>
                                    <img src="assets/images/services/taxation.jpg" alt>
                                </div>
                                <div class="service-details">
                                    <h3><a href="taxation.html">Taxation</a></h3>
                                </div>
                            </div>
                             
                            <div class="grid">
                                <div class="img-details-link">
                                    <div class="details-link">
                                        <a href="income-tax.html"><i class="fa fa-arrow-right"></i></a>
                                    </div>
                                    <img src="assets/images/services/income-tax.jpg" alt>
                                </div>
                                <div class="service-details">
                                    <h3><a href="income-tax.html">Income Tax</a></h3>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="img-details-link">
                                    <div class="details-link">
                                        <a href="roc-matters.html"><i class="fa fa-arrow-right"></i></a>
                                    </div>
                                    <img src="assets/images/services/roc-matters.jpg" alt>
                                </div>
                                <div class="service-details">
                                    <h3><a href="roc-matters.html">ROC Matters</a></h3>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="img-details-link">
                                    <div class="details-link">
                                        <a href="return-compliance.html"><i class="fa fa-arrow-right"></i></a>
                                    </div>
                                    <img src="assets/images/services/return-compliance.jpg" alt>
                                </div>
                                <div class="service-details">
                                    <h3><a href="return-compliance.html">Return Compliance</a></h3>
                                </div>
                            </div> 
                            <div class="grid">
                                <div class="img-details-link">
                                    <div class="details-link">
                                        <a href="tds-portfolio-management.html"><i class="fa fa-arrow-right"></i></a>
                                    </div>
                                    <img src="assets/images/services/tds-portfolio-management.jpg" alt>
                                </div>
                                <div class="service-details">
                                    <h3><a href="tds-portfolio-management.html">TDS Portfolio Management</a></h3>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- end container -->
        </section>
        <!-- start about-section-s2 -->
        <!-- start fun-fact -->
        <section class="fun-fact">
            <div class="container">
                <div class="row start-count">
                    <div class="col col-md-3 col-xs-6">
                        <div class="grid">
                            <div class="icon">
                                <i class="fi flaticon-handshake"></i>
                            </div>
                            <div class="info">
                                <h3 class="counter" data-count="1366">00</h3>
                                <span>Happy Clients</span>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-3 col-xs-6">
                        <div class="grid">
                            <div class="icon">
                                <i class="fi flaticon-presentation"></i>
                            </div>
                            <div class="info">
                                <h3 class="counter" data-count="4216">00</h3>
                                <span>Great Projects</span>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-3 col-xs-6">
                        <div class="grid">
                            <div class="icon">
                                <i class="fi flaticon-team"></i>
                            </div>
                            <div class="info">
                                <h3 class="counter" data-count="867">00</h3>
                                <span>Team Members</span>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-3 col-xs-6">
                        <div class="grid">
                            <div class="icon">
                                <i class="fi flaticon-internet"></i>
                            </div>
                            <div class="info">
                                <h3 class="counter" data-count="1366">00</h3>
                                <span>Happy Clients</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end container -->
        </section>
        <!-- end fun-fact -->
         
        <!-- end about-section-s2 -->

        <!-- start contact-section -->
        <section class="contact-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-md-6">
                        <div class="contact-location-map" >
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.572625092351!2d77.08612081443653!3d28.612595291735175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d05e8a86f42b3%3A0x939e7ff4aba265f9!2sAston+India!5e0!3m2!1sen!2sin!4v1534481548507" width="100%" height="420" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col col-md-6">
                        <div class="section-title-s4">
                            <h2>Request a call back</h2>
                             
                        </div>
                        <div class="contact-form">
                            <form method="post" action="" class="form row contact-validation-active">
                                <div class="col col-sm-6">
                                    <label for="name">Full Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Your Name" required />
                                </div>
                                <div class="col col-sm-6">
                                    <label for="email">Email</label>
                                     <input type="email" class="form-control" name="email" placeholder="Your email address" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" />
                                </div>
                                <div class="col col-sm-6">
                                    <label for="phone">Mobile No</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Your mobile number" required pattern="(6|7|8|9)\d{9}" maxlength="10" />
                                </div>
                                <div class="col col-sm-6">
                                    <label for="business">Subject</label>
                                   <input type="text" class="form-control" name="subject" placeholder="Subject here" required />
                                </div>
                                 <div class="col col-sm-12">
                                    <label for="business">Message</label>
                                   <textarea class="form-control noresize" name="message" placeholder="Write here.." style="height:100px;"></textarea>
                                </div>
                                <div class="col col-xs-12 submit-btn">
                                   <input type="submit" value="Submit" name="call_submit" id="submit-form" class="btn" />
                                    <div id="loader">
                                        <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
                                    </div>
                                </div>
                                <div class="error-handling-messages">
								<?php if(isset($success)){echo $success; } ?>
                                    <div id="success">Thank you</div>
                                    <div id="error">Error occurred while sending email. Please try again later. </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- end contact-section -->


        <!-- start partners-section -->
        <section class="partners-section">
            <div class="section-title">
                <h2>Our Clients</h2>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="partners-slider">
                            <div class="grid">
                                <img src="assets/images/partners/img-1.png" alt>
                            </div>
                            <div class="grid">
                                <img src="assets/images/partners/img-2.png" alt>
                            </div>
                            <div class="grid">
                                <img src="assets/images/partners/img-3.png" alt>
                            </div>
                            <div class="grid">
                                <img src="assets/images/partners/img-4.png" alt>
                            </div>
                            <div class="grid">
                                <img src="assets/images/partners/img-5.png" alt>
                            </div>
                            <div class="grid">
                                <img src="assets/images/partners/img-3.png" alt>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end container -->
        </section>
        <!-- end partners-section -->


        <!-- start site-footer -->
        <footer class="site-footer">
            <div class="upper-footer">
                <div class="container">
                    <div class="row">
                        <div class="col col-md-3 col-sm-6">
                            <div class="widget about-widget">
                                <div class="footer-logo">
                                    <img src="assets/images/logo-2.png" alt="Aston India, Best Accounting Company in Delhi">
                                </div>
                                <ul class="contact-info">
                                    <li><i class="fa fa-phone"></i>+91-9810073334, +918510073334</li>
                                    <li><i class="fa fa-envelope"></i>astonindia9@gmail.com</li>
                                    <li><i class="fa fa-home"></i>RZ-1-B, First Floor, Syndicate Enclave, near World Brain Centre, Dabri More, Pankha Road, New Delhi-110046</li>
                                </ul>

                            </div>

                        </div>

                        <div class="col col-md-3 col-sm-6">
                            <div class="widget links-widget">
                                <h3>Quick Links</h3>
                                <ul>
                                    <li><a href="company-incorporation.html">Company Incorporation</a></li>
                                    <li><a href="bookkeeping-accounting.html">Bookkeeping Accounting</a></li>
                                    <li><a href="taxation.html">Taxation</a></li>
                                    
                                    <li><a href="income-tax.html">Income Tax</a></li>
                                    <li><a href="roc-matters.html">ROC Matters</a></li>
                                    <li><a href="return-compliance.html">Return Compliance</a></li>
                                    <li><a href="tds-portfolio-management.html">TDS Portfolio Management</a></li>
                                    
                                </ul>
                            </div>
                        </div>

                        <div class="col col-md-3 col-sm-6">
                            <div class="widget links-widget">
                                <h3>New Registrations</h3>
                                <ul>
                                    <li><a href="gst-registration.html">GST Registration</a></li>
                                    <li><a href="company-registration.html">Company Registration</a></li>
                                    
                                    
                                    
                                </ul>
                            </div>
                        </div>

                        <div class="col col-md-3 col-sm-6">
                            <div class="widget twitter-feed-widget">
                                <h3>Like on Facebook</h3>
                                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fastonindia%2F&amp;tabs&amp;width=328&amp;height=214&amp;small_header=false&amp;adapt_container_width=false&amp;hide_cover=false&amp;show_facepile=true&amp;appId=1547668005537121" width="328" height="214" style="border: none; overflow: hidden"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end upper-footer -->
            <div class="copyright-info">
                <div class="container">
                    <div class="row">
                        <div class="col col-xs-4">
                            <div class="copyright-area">
                                <p>2017 &copy; All Rights Reserved by <a href="http://www.astonindia.com/">Aston India</a></p>
                            </div>
                        </div>
                        <div class="col col-xs-4">
                            <div class="footer-social" style="text-align: center !important; float: none">
                                <ul class="social-links" style="float: none; text-align: center !important">
                                    <li><a href="https://www.facebook.com/astonindia" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                    <li><a href="#"><i class="fa fa-rss-square"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col col-xs-4">
                            <div class="copyright-area" style="text-align: right">
                                <p>Designed by <a href="http://www.webartinfotech.com/">Webart Infotech</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end site-footer -->
    </div>
    <!-- end of page-wrapper -->



    <!-- All JavaScript files
    ================================================== -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins for this template -->
    <script src="assets/js/jquery-plugin-collection.js"></script>

    <!-- Google map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key"></script>

    <!-- Custom script for this template -->
    <script src="assets/js/script.js"></script>
</body>

</html>
