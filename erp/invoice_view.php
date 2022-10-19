<?php include('includes/top_inc.php');

include('includes/class.php');
$class = new baseClass;
$msg = '';
if(isset($_GET['id']))
{
    $id = $_GET['id'];
}

$qry = mysqli_query($class->conn,"SELECT * FROM invoice INNER JOIN customers ON invoice.customer_id = customers.customer_id WHERE in_id = $id;");
$res = mysqli_fetch_array($qry);
@extract($res);

$peyment_qry = mysqli_query($class->conn, "SELECT SUM(payment_amount) FROM payment WHERE invoice_id = $id");
$payment_res = mysqli_fetch_array($peyment_qry);
$payment_amount = $payment_res[0];



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
    <title>Invoice | Jaimru Technology Pvt. Ltd. </title>
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
    <style>
        .container-fullw {
            margin-left: -15px;
            margin-right: -15px;
            padding-left: 30px;
            padding-right: 30px;
            padding-top: 0px;
            padding-bottom: 0px;
            border-bottom: 1px solid #eee;
        }
        .form-actions {
    margin: 0;
    background-color: transparent;
    text-align: center;
}
    </style>
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
                    <div class="row" style="text-align: center" >
                        <?php if($gst_applicable =="Yes"){ ?>
                        <h4><u>TAX INVOICE</u></h4>
                        <?php }else{ ?>
                            <h4><u>INVOICE</u></h4>
                        <?php } ?>
						<h5 style="right: 10px;  top: 0 !important; margin-top: -2px;
    position: absolute;"><u>Original Invoice</u></h5>
						<!--  <img alt="" src="images/logo-invert.png" style="width: 25%;">  -->
						<h2 style="margin-bottom: 0px !important;"> JAIMRU TECHNOLOGY PRIVATE LIMITED</h2>
                        <p style="margin-top: 13px;">
						| Website Design | Web Application | Mobile Application | Digital Marketing | Bulk SMS |
						
						</p>
                            
							<!-- <p>We Trust On God</p> -->
                      <!--   <h2 >
                    
                            <label style="color:#2C2C81">Maujitrip<br><small style="color:#2C2C81" > ( a unit of SBC Exports Limited )</small></label></h2> -->

                            
							
                        <p style="margin-top: 13px;">CIN: U72900DL2021PTC375738, GSTIN: 07AAFCJ0729D1ZW<br>
                            Address: Plot No. 178 M-33 A-1, Ward No 2, Garhwal Colony, Mehrauli, New Delhi, 110030<br>
                        <strong>Phone: </strong> 7838153420
						<strong>Email: </strong> info@jaimru.com,
						<strong>Website: </strong> www.jaimru.com
						</p>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">


                            <div class="invoice">
                                <div class="row">
                                    <div class="col-md-6" style="width: 50%; float: left">

                                        <div class="">
                                            <p>Bill To:</p>
												<strong class="text-dark"><?php echo $name; ?></strong><br>
                                                <strong class="text-dark"><?php if(isset($company)){ echo $company; } ?></strong>

                                                <?php echo "<br>". ($address1) ? $address1 : '' . ",".($address2)? $address2 : ''; ?>

                                            <?php echo "<br>". ($state)? $state : ''.",".($zipcode)? $zipcode : ''.",".($country)? $country : ''; ?>
                                                <?php // echo $state."-".$zipcode.", ". $country ?>
                                            <p>
                                                <strong class="text-dark">E-mail:</strong>
                                                    <?php echo $email ?> <br>
                                                <strong class="text-dark">Phone:</strong>
                                                <?php echo $phone ?>
                                            </p>
                                            <?php if($gst !=''){  ?>
                                                <p>
                                                    <strong class="text-dark">GST No:</strong>
                                                    <?php echo $gst ?>

                                                </p>
                                            <?php }  ?>
                                        </div>
                                    </div>

                                <!--    <div class="col-md-6" style="width: 50%; float: left; display: none;">
                                        
                                        <?php if(trim($shipto_name) != '' or $shipto_name !=NULL)
                                            { ?>
                                        <p>Ship To:</p>
                                        <ul class="list-unstyled text-dark" style="list-style-type: none;">
                                            <li>
                                                <strong><?php echo $shipto_name ?></strong>
                                            </li>
                                            <li>
                                                <?php echo $shipto_address ?>
                                            </li>
                                            <li>
                                                <?php echo $shipto_state ?>
                                            <li>
                                                <?php echo $shipto_zipcode ?>
                                            </li>

                                        </ul>
                                        <?php } ?>
                                    </div>  -->
                                    <div class="col-sm-6" style="width: 50%; float: right;">
                                        <ul style="list-style-type: none;">
                                            <li>
                                                <strong>Invoice No.: </strong> <?php echo $in_number; ?>
                                            </li>
                                            <li>
                                                <strong>Invoice Date.: </strong> <?php echo $class->changeSqlToUser_DateFromat($in_date) ?>
                                            </li>
                                            <li>
                                                <strong>Due Date.: </strong> <?php echo $class->changeSqlToUser_DateFromat($ex_date) ?>
                                            </li>
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
                                                <th style="border: solid 1px #000;"> Particular </th>
                                                <th style="border: solid 1px #000; text-align:right"> HSN/SAC </th>
                                                <th style="border: solid 1px #000; text-align:right"> Quantity </th>
                                                <th style="border: solid 1px #000; text-align:right"> Unit Price </th>
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
                                                    <td style="border: solid 1px #000; "> <?php echo $k+1; ?> </td>
                                                    <td style="border: solid 1px #000;"> <?php echo $items[$k]; ?></td>
                                                    <td style="border: solid 1px #000; text-align:right"> <?php echo $oum[$k]; ?></td>
                                                    <td style="border: solid 1px #000; text-align:right"><?php echo $qty[$k]; ?></td>
<!--                                                     <td style="border: solid 1px #000; text-align:right"> <?php echo $oum[$k]; ?></td>
 -->                                                    <td style="border: solid 1px #000; text-align:right"><?php echo $price[$k]; ?></td>
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
                                        <ul class="list-unstyled amounts text-small" style="list-style-type: none;">
                                            <li>
                                                <strong>Sub-Total:</strong> Rs. <?php echo $subtotal ?>
                                            </li>
                                           <?php 
                                                if($gst_applicable =="Yes"){
                                                if($state == 'Delhi' || $state == 'delhi' || $state == 'DELHI'){
                                                $total =  $subtotal + ($subtotal * 18 / 100);
                                                 ?>
                                            <li>
                                                <strong>SGST (9%):</strong> <?php echo $subtotal * 9/100 ?>
                                            </li>
                                            <li>
                                                <strong>CGST (9%):</strong> <?php echo $subtotal * 9/100 ?>
                                            </li>
                                            <?php }else{ 
                                                $total =  $subtotal + ($subtotal * 18 / 100);?>
                                                <li>
                                                    <strong>IGST (18%):</strong> <?php echo $subtotal * 18/100 ?>
                                                </li>
                                            <?php } 

                                        }else{
                                                $total =  $subtotal;

                                            } ?>
                                            <li class="text-extra-large  margin-top-15">
                                                
                                                <strong >Bill Amount: </strong> Rs. <?php echo $total; ?>
                                            </li>
                                            <?php if($payment_amount ){
                                                $total = $total-$payment_amount;
                                                ?>
                                            <li class="text-extra-large  margin-top-15">

                                                <strong >Advance Payment: </strong> Rs. <?php echo $payment_amount; ?>
                                            </li>
                                            <?php } ?>
											<li class="text-extra-large  margin-top-15">
                                                
                                                <strong >Total Amount(Rounded): </strong> Rs. <?php echo $class->moneyFormatIndia(round($total)); ?>
                                            </li>
                                            <li>
                                                <?php echo $class->numberTowords(round($total))." Only"; ?>
                                            </li>
                                        </ul>
                                        <br>
<!--                                        <a onclick="javascript:window.print();" class="btn btn-lg btn-primary hidden-print">-->
<!--                                            Print <i class="fa fa-print"></i>-->
<!--                                        </a>-->
                                        <div class="pull-right">
                                            <h4>For Jaimru Technology Pvt Ltd</h4>
											<br>
											<br>
											<br>
                                           <!-- <img src="images/jaimru_company_stamp with_jai.png" style="width:150px; height:140px"> -->
                                            <p>Authorised Signatory</p>
                                        </div>
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
                                            <strong>MICR Code:</strong> 110532047
                                        </li>
										<li>
                                            <strong>RTGS/NEFT IFSC Code:</strong> YESB0000237
                                        </li>
										<li>
                                            <strong>Pan Number:</strong> AAFCJ0729D
                                        </li>

                                    </ul>
                                    <ul>
                                        <strong>Note*:</strong>
                                        <li>Tax may be deducted at Source (TDS) @ 2% under section 194C of the Income Tax Act, 1961.</li>
                                        <li> Unless otherwise stated, tax on this invoice is not payable under reverse charge. Supplies under reverse charge are to be
mentioned separately.</li>
                                        <li>Tax should not be deducted on the GST component charged on the invoice as per circular no. 23 of 2017 dated 19 July 2017 issued by
the Central Board of Direct Taxes, Ministry of Finance, Govt of India.
</li>
                                        
                                        <li>Payment will be favor of JAIMRU TECHNOLOGY PRIVATE LIMITED.</li>
                                        <li>This is computer generated Tax Invoice.</li>
                                    </ul>

                                </div>

                                <div class="form-actions">
                                            <a onclick="PrintDiv();" class="btn btn-lg btn-primary b_middle hidden-print">
                                            Print <i class="fa fa-print"></i>
                                        </a></div>
                                        

                                <div class="row" style="bottom: 0; right: 0; left: 0;">
                                    

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
