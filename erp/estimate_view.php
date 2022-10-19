<?php include('includes/top_inc.php');

include('includes/class.php');
$class = new baseClass;
$msg = '';
if(isset($_GET['id']))
{
    $id = $_GET['id'];
}

$qry = mysqli_query($class->conn,"SELECT * FROM estimate INNER JOIN customers ON estimate.customer_id = customers.customer_id WHERE es_id = $id;");
$res = mysqli_fetch_array($qry);
@extract($res);

?>
<!DOCTYPE html>
<!-- Template Name: Clip-Two - Responsive Admin Template build with Twitter Bootstrap 3.x | Author: ClipTheme -->
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- start: HEAD -->
<head>
    <title>Quotation | Jaimru Technology Private Limited</title>
    <!-- start: META -->
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- end: META -->
    <!-- start: GOOGLE FONTS -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <!-- end: GOOGLE FONTS -->
    <!-- start: MAIN CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
    <link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
    <link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
    <!-- end: MAIN CSS -->
    <!-- start: CLIP-TWO CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
    <!-- end: CLIP-TWO CSS -->
    <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
    <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
</head>
<!-- end: HEAD -->
<body>
<div id="app">
    <!-- sidebar -->
    <?php include('includes/left_sidebar.php'); ?>
    <!-- / sidebar -->
    <div class="app-content">
        <!-- start: TOP NAVBAR -->
        <?php include('includes/top_header.php'); ?>
        <!-- end: TOP NAVBAR -->
        <div class="main-content" >
            <div class="wrap-content container" id="container">
                <!-- start: PAGE TITLE -->

                <!-- end: PAGE TITLE -->
                <!-- start: INVOICE -->
                <div class="container-fluid container-fullw bg-white" id="divToPrint">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="invoice">
                                 <div class="row" style="text-align: center" >
                        <h4><u>QUOTATION</u></h4>
                        
                        <h2 style="margin-bottom: 0px !important;"> JAIMRU TECHNOLOGY PRIVATE LIMITED</h2>
                        
                        
                            
                            
                        <p style="margin-top: 13px;">CIN: U72900DL2021PTC375738, GSTIN: 07AAFCJ0729D1ZW<br>
                            Address: Plot No. 178 M-33 A-1, Ward No 2, Garhwal Colony, Mehrauli, New Delhi, 110030<br>
                        <strong>Phone: </strong> 7838153420
                        <strong>Email: </strong> info@jaimru.com,
                        <strong>Website: </strong> www.jaimru.com
                        </p>
                    </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-6" style="width: 50%; float: left">
                                        <h4>Client:</h4>
                                        <div class="well">
                                            <address>
                                                <strong class="text-dark"><?php echo $company ?></strong>
                                                <br>
                                                <?php echo $address1 ?>
                                                <br>
                                                <?php echo $address2." ". $state. " ". $zipcode." ". $country ?>
                                                <br>
												 <?php if($phone !='9999999999'){  ?>
                                                <abbr title="Phone">P:</abbr> <?php echo $phone ?>
												<?php }  ?>
                                            </address>
                                            <p>
                                                <strong class="text-dark">E-mail:</strong>
                                                <a href="mailto:<?php echo $email ?>">
                                                    <?php echo $email ?>
                                                </a>
                                            </p>
                                            <?php if($gst !=''){  ?>
                                            <p>
                                                <strong class="text-dark">GST Number:</strong>
                                                <?php echo $gst ?>
                                            </p>
                                            <?php }  ?>
                                        </div>
                                    </div>

                                    <div class="col-sm-4 pull-right" style="width: 40%; float: right">
                                        <h4>Quotation Details:</h4>
                                        <ul class="list-unstyled invoice-details padding-bottom-30 padding-top-10 text-dark">
                                            <p>
                                                <strong>Quotation No. :</strong>  <?php echo $es_number; ?>
                                            <br>
                                                <strong>Quotation Date:</strong> <?php echo $class->changeSqlToUser_DateFromat($es_date); ?>
                                            <br>
                                                <strong>Due Date.:</strong> <?php echo $class->changeSqlToUser_DateFromat($ex_date); ?>
                                            </p>
                                            
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php
                                        $items = json_decode($items);
                                    $oum = json_decode($oum);
                                    $hsn = json_decode($hsn);
                                    $price = json_decode($price);
                                    $qty = json_decode($qty);
                                    $amount = json_decode($amount);

                                    ?>
                                    <div class="col-sm-12">
                                        <table class="table table-striped" width="100%" style="border: solid 1px #000; border-collapse: collapse;">
                                            <thead>

                                            <tr>
                                                <th style="border: solid 1px #000;"> # </th>
                                                <th style="border: solid 1px #000;"> Item </th>
                                                <!-- <th style="border: solid 1px #000;"> OUM </th> -->
                                                <th style="border: solid 1px #000; text-align:right"> HSN </th>
                                                <th style="border: solid 1px #000; text-align:right"> Unit Price </th>
                                                <th style="border: solid 1px #000; text-align:right"> Quantity </th>
                                                <th style="border: solid 1px #000; text-align:right"> Total </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $subtotal = 0;
                                            foreach ($items as $k => $v)
                                            {
                                                $subtotal = $subtotal + $amount[$k];
                                            ?>
                                            <tr>
                                                <td style="border: solid 1px #000;"> <?php echo $k+1; ?> </td>
                                                <td style="border: solid 1px #000;"> <?php echo $items[$k]; ?></td>
                                                <!-- <td style="border: solid 1px #000;"> <?php echo $oum[$k]; ?></td> -->
                                                <td style="border: solid 1px #000; text-align:right"> <?php echo $hsn[$k]; ?></td>
                                                <td style="border: solid 1px #000; text-align:right"><?php echo $price[$k]; ?></td>
                                                <td style="border: solid 1px #000; text-align:right"><?php echo $qty[$k]; ?></td>
                                                <td style="border: solid 1px #000; text-align:right"><?php echo $amount[$k]; ?></td>
                                            </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" style="width: 50%; float: left">

                                    
                                    </div>
                                    <div class="col-md-6 invoice-block" style="width: 50%; float: right; text-align: right">
                                        <ul class="list-unstyled amounts text-small">
                                            <p>
                                                <strong>Sub-Total:</strong> Rs. <?php echo $subtotal ?>
                                            <br>
											<?php 
                                                if($state == 'Delhi' || $state == 'delhi' || $state == 'DELHI'){
                                                $total =  $subtotal + ($subtotal * 18 / 100);
                                                 ?>
                                                <strong>SGST (9%):</strong> <?php echo $subtotal * 9/100 ?>
                                            <br>
                                                <strong>CGST (9%):</strong> <?php echo $subtotal * 9/100 ?>
                                            <br>
											 <?php }else{ 
                                                 $total =  $subtotal + ($subtotal * 18 / 100); ?>
												 
												 <li>
                                                    <strong>IGST (18%):</strong> <?php echo $subtotal * 18/100 ?>
                                                </li>
                                            <?php } ?>	
                                                <strong >Total:</strong> Rs. <?php echo $class->moneyFormatIndia($total); ?>
                                            <br>
                                                <?php echo $class->numberTowords($total)." Only"; ?>
                                            </p>
                                        </ul>
                                        <br>
                                        <a onclick="PrintDiv();" class="btn btn-lg btn-primary hidden-print">
                                            Print <i class="fa fa-print"></i>
                                        </a>

                                    </div>
                                </div>

                                <div class="row" style="bottom: 0; right: 0; left: 0;">
                                    <ul class="list-unstyled amounts text-small" style="list-style-type: none;">
                                        <li class="">
                                            <strong >BANK DETAILS:</strong>
                                        </li>
                                        <li>
                                            <strong>Bank Name:</strong> Yes Bank
                                        </li>
                                        <!--                                            <li>-->
                                        <!--                                                <strong>Owner Name:</strong> Shiv Network Solutions-->
                                        <!--                                            </li>-->
                                        <li>
                                            <strong>Account Number:</strong> 023763300005597
                                        </li>
                                        <li>
                                            <strong>RTGS/NEFT IFSC Code:</strong> YESB0000237
                                        </li>

                                    </ul>
                                    <ul>
                                        <strong>TERMS & CONDITION:</strong>
                                        <li><strong>Delivery & Services</strong> will start 3 Days after the order.</li>
                                        <li> <strong>18%</strong> tax will be applicable on all services as per Govt T&C*</li>
                                        <li>Extra work charges be Extra Actual</li>
                                        <li>Payment will be favor of JAIMRU TECHNOLOGY PRIVATE LIMITED.</li>
                                        <li>This is computer generated Quotation.</li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end: INVOICE -->
            </div>
        </div>
    </div>
    <!-- start: FOOTER -->
    <footer>
        <div class="footer-inner">
            <div class="pull-left">
                &copy; <span class="current-year"></span><span class="text-bold text-uppercase"> Maujitrip a unit of SBC Exports Limited</span>. <span>All rights reserved</span>
            </div>
            <div class="pull-right">
                <span class="go-top"><i class="ti-angle-up"></i></span>
            </div>
        </div>
    </footer>
    <!-- end: FOOTER -->
    <!-- start: OFF-SIDEBAR -->

    <!-- end: OFF-SIDEBAR -->
    <!-- start: SETTINGS -->

    <!-- end: SETTINGS -->
</div>
<!-- start: MAIN JAVASCRIPTS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/modernizr/modernizr.js"></script>
<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="vendor/switchery/switchery.min.js"></script>
<!-- end: MAIN JAVASCRIPTS -->
<!-- start: CLIP-TWO JAVASCRIPTS -->
<script src="assets/js/main.js"></script>
<!-- start: JavaScript Event Handlers for this page -->
<script>
    jQuery(document).ready(function() {
        Main.init();
    });
</script>
<script type="text/javascript">
    function PrintDiv() {
        var divToPrint = document.getElementById('divToPrint');
        var popupWin = window.open('', '_blank', 'width=300,height=300');
        popupWin.document.open();
        popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }
</script>
<!-- end: JavaScript Event Handlers for this page -->
<!-- end: CLIP-TWO JAVASCRIPTS -->
</body>
</html>
