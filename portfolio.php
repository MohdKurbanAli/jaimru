<?php // if (substr_count($_SERVER[‘HTTP_ACCEPT_ENCODING’], ‘gzip’)) ob_start(“ob_gzhandler”); else ob_start();

include ("includes/baseclass.php");
$class = new baseClass();

?>
<!doctype html>
<html lang="en-us">



<head>
	

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Owl Default CSS -->
    <link rel="stylesheet" href="assets/css/owl.default.min.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <!-- Owl Magnific CSS -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- Boxicons CSS -->
    <link rel="stylesheet" href="assets/css/boxicons.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="assets/css/meanmenu.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <!-- Odometer CSS-->
    <link rel="stylesheet" href="assets/css/odometer.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="assets/css/responsive.css">

    <title>Portfolio | Jaimru Technology Private Limited</title>
	<meta name="keywords" content="website designing company in delhi ncr, website designing company in Delhi, website design company in India, website designing company in south delhi, 
          web designing company in delhi, website designing in delhi, web design delhi, best website designing company in delhi, 
          website designing services in delhi, website designing companies, Web designing company, Website Designing Company, 
          website desinging service, website designing company in India, best website Development Company India,
          website development company in Delhi, best web development company Delhi, best website development company in India, delhi Coder delhi, Jaimru Technology, Jaimru Technology Pvt Ltd, Jaimru Technology Private Limited">
    </meta>

    <meta name="description" content="Jaimru Technology Private Limited is a group of trusted website designing in Delhi NCR specialized in Web-Designing, Web-Development, eCommerce, Travel & Mobile App.">
    </meta>
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-B046SNG251"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-B046SNG251');
	</script>
	
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KPT2D85');</script>
<!-- End Google Tag Manager -->


</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KPT2D85"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <!-- Start Preloader Area -->
    <div class="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- End Preloader Area -->

    <!-- Start Navbar Area -->
    <?php include_once('header.php'); ?>
    <!-- End Navbar Area -->

    <!-- Sidebar Modal -->
    <?php include_once('right-sidebar.php'); ?>
    <!-- End Sidebar Modal -->

    <!-- Start Page Title Area -->
    <div class="page-title-area item-bg-1">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h1>Jaimru Technology Private Limited <br> Portfolio</h1>
                        <ul>
                            <li><a href="index">Home</a></li>
                            <li>Portfolio</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start Projects Area -->
    <section class="projects-section pt-100 pb-70">
        <div class="container-fluid">
            <div class="section-title">
                <h2>Projects</h2>
                <p>Our Recent work portfolio</p>
                <div class="bar"></div>
            </div>



            <div class="row">
                <?php

                $qry = mysqli_query($class->conn, "SELECT * FROM `portfolio` ORDER BY id DESC");
                while($res = mysqli_fetch_array($qry))
                {
                    ?>

                <div class="col-lg-4">
                    <div class="single-projects">
                        <div class="projects-image">
                            <img src="erp/uploads/portfolio/<?php echo $res['img'] ?>" alt="image">
                        </div>

                        <div class="projects-content">
                            <a href="http://www.aighana.org/">
                                <h3><?php echo $res['type'] ?></h3>
                            </a>

                            <a href="<?php echo $res['link'] ?>" target="_blank">
                                <span><?php echo $res['name'] ?></span>
                            </a>
                        </div>
                    </div>
                </div>
                <?php } ?>









             
            </div>
        </div>
    </section>
    <!-- End Projects Area -->

    <!-- Start Footer Area -->
    <?php include_once('footer.php'); ?>
    <!-- End Footer Area -->



    <!-- Start Go Top Section -->
    <div class="go-top">
        <i class="bx bx-chevron-up"></i>
        <i class="bx bx-chevron-up"></i>
    </div>
    <!-- End Go Top Section -->

    <!-- Jquery Slim JS -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="assets/js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Meanmenu JS -->
    <script src="assets/js/jquery.meanmenu.js"></script>
    <!-- Owl Carousel JS -->
    <script src="assets/js/owl.carousel.js"></script>
    <!-- Owl Magnific JS -->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Nice Select JS -->
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <!-- Appear JS -->
    <script src="assets/js/jquery.appear.js"></script>
    <!-- Odometer JS -->
    <script src="assets/js/odometer.min.js"></script>
    <!-- Form Ajaxchimp JS -->
    <script src="assets/js/jquery.ajaxchimp.min.js"></script>
    <!-- Form Validator JS -->
    <script src="assets/js/form-validator.min.js"></script>
    <!-- Contact JS -->
    <script src="assets/js/contact-form-script.js"></script>
    <!-- Wow JS -->
    <script src="assets/js/wow.min.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/main.js"></script>
</body>



</html>