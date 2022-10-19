<?php include('includes/top_inc.php');

include('includes/class.php');
$class = new baseClass;
$user_id = $_SESSION['sess_user_id'];
$user_department = $_SESSION['sess_user_department'];


$msg = '';

if (isset($_POST['delete'])) {
    if (count($_POST['ids']) > 0) {
        $ids = implode(',', $_POST['ids']);
        $dl_qry = mysqli_query($class->conn, "DELETE FROM invoice WHERE  in_id in ($ids)") or die(mysqli_error());
        if ($dl_qry) {
			
			 echo "<script> alert('Invoice deleted successfully.');
                     window.location = 'invoice-list.php';

            </script>";
            // $msg = "Invoice deleted successfully";
        }
    }
}

// if(isset($_POST['purchase_invoice_id']))
// {
if (isset($_POST['submit'])) {
    $purchase_invoice_id = $_POST['purchase_invoice_id'];
    $purchase_payment_date = $class->userToSql_DateTime($_POST['purchase_payment_date']);

    $purchase_note = $_POST['purchase_note'];

    $purchase_payment_mode = $_POST['purchase_payment_mode'];
    $purchase_transaction_id = $_POST['purchase_transaction_id'];
    $purchase_payment_amount = $_POST['purchase_payment_amount'];
    $vendor = $_POST['vendor'];

    if ($purchase_invoice_id != '' && $purchase_payment_date != '' && $purchase_payment_amount != '' && $purchase_payment_mode != '' && $vendor != '') {
        $result = mysqli_query($class->conn, "INSERT INTO  purchase_products (purchase_invoice_id,purchase_payment_date,purchase_note,purchase_transaction_id,purchase_payment_mode,purchase_payment_amount,vendor, added_by)
 VALUES('$purchase_invoice_id',
 '$purchase_payment_date',
 '$purchase_note',
 '$purchase_transaction_id',
  '$purchase_payment_mode',
 '$purchase_payment_amount',
 '$vendor', '$user_id')");
 
 				echo "<script> alert('Purchase added successfully..'); window.location = 'invoice-list'; </script>";

 
  // echo "<script> alert('Purchase added successfully.');
                     // window.location = 'invoice-list.php';

            // </script>";
        // $msgs = "<script> alert('Purchase added successfully !'); window.location = 'invoice-list.php'; </script>";

    } else {

        $msgs = "Something Wrong !";
    }
}
//filter 
?>
    <!DOCTYPE html>

    <html lang="en">

    <head>
        <title>Invoice List | ERP</title>
        <!-- start: META -->
        <!--[if IE]>
    <meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1"/><![endif]-->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">

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
        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
        <link href="vendor/DataTables/css/DT_bootstrap.css" rel="stylesheet" media="screen">
        <link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
        <link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


        <style type="text/css">
            button.btn.btn-info.btn-lg 
			{
                display: inline-block;
                padding: 6px 12px;
                margin-bottom: 0;
                font-size: 14px;
                font-weight: 400;
                line-height: 1.42857143;
                text-align: center;
                white-space: nowrap;
                vertical-align: middle;
                -ms-touch-action: manipulation;
                touch-action: manipulation;
                cursor: pointer;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                background-image: none;
                border: 1px solid transparent;
                border-radius: 4px;
                background: #5d8a5d;
            }
        </style>
        <!--formden.js communicates with FormDen server to validate fields and submit via AJAX -->
        <script type="text/javascript" src="https://formden.com/static/cdn/formden.js"></script>

        <!-- Special version of Bootstrap that is isolated to content wrapped in .bootstrap-iso -->
        <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

        <!--Font Awesome (added because you use icons in your prepend/append)
        <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
-->
        <!-- Inline CSS based on choices in "Settings" tab -->
        <style>
            .bootstrap-iso .formden_header h2,
            .bootstrap-iso .formden_header p,
            .bootstrap-iso form {
                font-family: Arial, Helvetica, sans-serif;
                color: black
            }
            
            .bootstrap-iso form button,
            .bootstrap-iso form button:hover {
                color: white !important;
            }
            
            .asteriskField {
                color: red;
            }
        </style>


        <style type="text/css" class="init">
            th {
                white-space: nowrap;
            }
        </style>
									    <link rel="stylesheet" href="src/fstdropdown.css">

   
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
                        <div class="main-content">
                            <div class="wrap-content container" id="container">
                                <!-- start: PAGE TITLE -->
                                <section id="page-title">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <h1 class="mainTitle">Invoice </h1>
                                            <span class="mainDescription">Invoice List</span>
                                        </div>
                                        <ol class="breadcrumb">
                                            <li>
                                                <span>Home</span>
                                            </li>
                                            <li class="active">
                                                <span>Invoice</span>
                                            </li>
                                        </ol>
                                    </div>
                                </section>

                                <?php if ($_SESSION['sess_user_type'] == 'Agent')

                { ?>
                                   
                                    <div class="container-fluid container-fullw bg-white">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div>

                                                    <a href="invoice.php" class="btn btn-azure">Create New Invoice</a>
                                <button type="button" id="filter" class="btn btn-info">Filters</button>

                                                </div>
                                               
                                            </div>
                                                                                        <br>
                                            <br>


                                            <center>
                                                <p style="color:red;">
                                                    <?php echo $msgs; ?>
                                                </p>
                                            </center>
                                            <form action="" id="catForm" method="post" enctype="multipart/form-data" style="display: none">

                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" class="form-control" name="FROM_date" id="from_date" placeholder="From Date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" class="form-control" name="To_date" id="to_date" placeholder="To Date">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">

                                        <button class="btn btn-raised btn-success waves-effect" type="submit"
                                                name="filter" id="filter">Search
                                        </button>

                                    </div>
                                </div>
                            </div>


                        </form>

                                            <div class="col-sm-12">
                                                <div class="panel panel-white no-radius">
                                                    <div class="panel-body">

                                                        <form action="" method="post" enctype="multipart/form-data">
                                                            <div style="overflow-x:auto;">
                                                                <table id="example" class="display" cellspacing="0" width="100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <td>
                                                                                <input type="checkbox" name="all" id="all">
                                                                            </td>
                                                    <td>Invoice Number</td>
                                                    <td>Customer Name</td>
                                                    <td>GST</td>
                                                    <td>InvoiceDate</td>
                                                    <td>Due Date</td>
                                                    <td>Amount</td>
                                                    <td>Edit </td>
													<td>Reminder</td>
                                                  
                                                                        </tr>
                                                                    </thead>
                    <!--                                                     <tfoot>
            <tr><th colspan="6" style="text-align:right" rowspan="1">Total:</th><th rowspan="1" colspan="1"></th></tr>
           </tfoot> -->
                                                <tbody>

                                                                     <?php

                                                // if (isset($_POST['filter'])) {
                                                //     $FROM_date = $_POST['FROM_date'];
                                                //     $To_date = $_POST['To_date'];


                                                //     $query = mysqli_query($class->conn, "SELECT * FROM invoice INNER JOIN customers ON invoice.customer_id = customers.customer_id INNER JOIN jk_user ON invoice.`agent` = `jk_user`.`user_id`  WHERE in_date BETWEEN '" . $_POST["FROM_date"] . "' AND '" . $_POST["To_date"] . "' ORDER BY invoice.`in_id` DESC")
                                                //     or die();


                                                // } else {

                                                //     $query = mysqli_query($class->conn, "SELECT jk_user.*,customers.*,invoice.* FROM jk_user INNER JOIN customers ON jk_user.`user_id`=customers.`added_by` INNER JOIN invoice ON invoice.`agent`=customers.`added_by` WHERE `manage_user` = '$user_id' OR user_id = '$user_id';");



                                                    // $query = mysqli_query($class->conn, "SELECT * FROM invoice INNER JOIN customers ON invoice.customer_id = customers.customer_id INNER JOIN jk_user ON invoice.`agent` = `jk_user`.`user_id` ORDER BY invoice.`in_id` DESC;");

                                                // }
                                                                    $qry = mysqli_query($class->conn, "SELECT * FROM invoice INNER JOIN customers ON invoice.customer_id = customers.customer_id WHERE  invoice.added_by ='$user_id';");
                                                    while ($res = mysqli_fetch_array($qry)) {
                                                        @extract($res);
                                                        
                                                // while ($res = mysqli_fetch_array($query)) {
                                                //     @extract($res)
                                                    ?>
                                                    <tr>
                                                        <td><input type="checkbox" name="ids[]"
                                                                   value="<?php echo $in_id ?>"></td>
                                                        <td>
                                                            <a href="invoice_view.php?id=<?php echo $in_id ?>" target="_blank"> <?php echo $in_id ?></a>
                                                        </td>
                                                        <td>
                                                            <a href="all_invoice.php?id=<?php echo $customer_id ?>" target="_blank"><?php echo ucfirst(strtolower($name)); ?></a>
                                                        </td>

                                                        <td><?php echo $class->sqlToUser_DateTime($in_date); ?></td>
                                                        <td><?php echo $class->sqlToUser_DateTime($ex_date); ?></td>
                                                        

                                                            <?php
                                                            $amount = json_decode($amount);
                                                            $finalamount = 0;
                                                            foreach ($amount as $amt) {
                                                                $finalamount = $finalamount + $amt;
                                                            }
															
															if($gst_applicable =='Yes')
															{
																$finalamount = $finalamount + $tax;
															}
                                                            $fileamount = $class->moneyFormatIndia(round($finalamount));

                                                            ?>
                                                        <td>
                                                           <?php echo ($fileamount); ?> 
                                                        </td> 
                                                        <td>
                                                            <a href="invoice-edit?inv=<?php echo $in_id ?>" title="Edit"
                                                               class="btn btn-file"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        </td>
														
														<td>
														    <button type="button" class="btn btn-info send_offer" id="reminder" value="<?php echo $in_id ?>" title="Reminder send till now"> <i class="fa fa-bell" aria-hidden="true"></i> </button>
                                                        </td>
                                                        
                                                    </tr>
                                                                            <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                <button name="delete" class="btn btn-danger" >Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                         <?php    } else
                        if($_SESSION['sess_user_type'] =='MANAGER')
                        {

                        ?>
                                        
       <div class="container-fluid container-fullw bg-white">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div>

                                                    <a href="invoice.php" class="btn btn-azure">Create New Invoice</a>
                                <button type="button" id="filter" class="btn btn-info">Filters</button>


                                                </div>
                                               
                                            </div>
                                                                                        <br>
                                            <br>


                                            <center>
                                                <p style="color:red;">
                                                    <?php echo $msgs; ?>
                                                </p>
                                            </center>
                                            <form action="" id="catForm" method="post" enctype="multipart/form-data" style="display: none">

                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" class="form-control" name="FROM_date" id="from_date" placeholder="From Date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" class="form-control" name="To_date" id="to_date" placeholder="To Date">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">

                                        <button class="btn btn-raised btn-success waves-effect" type="submit"
                                                name="date_search" id="date_search">Search
                                        </button>

                                    </div>
                                </div>
                            </div>


                        </form>

                                            <div class="col-sm-12">
                                                <div class="panel panel-white no-radius">
                                                    <div class="panel-body">
                                                        <form action="" method="post" enctype="multipart/form-data">
                                                            <div style="overflow-x:auto;">

                                                                <?php 
                                                  if ($user_department == '1'){
                                                    ?>
									<table id="example1" class="display" cellspacing="0" width="100%">
										<thead>
										<tr>
											<td><input type="checkbox" name="all" id="all"></td>
											<td>Invoice Number</td>
                                                    <td>Customer Name</td>
                                                    <td>GST</td>
                                                    <td>InvoiceDate</td>
                                                    <td>Due Date</td>
													<td>Destination</td>
                                                    <td>Agent</td>
                                                    <td>Amount</td>
                                                    <td>Payment Receive</td>
                                                    <td>Purchase Amount</td>
                                                    <td>Due Amount</td>
                                                    <td>Gross Profit</td>
                                                    <td>Edit </td>
                                                    <td>Add Payment</td>
                                                    <td>Add Purchase</td>
										
										</tr>
										</thead>
										
									</table>
									<button name="delete" class="btn btn-danger" >Delete</button>
									<!--create modal dialog for display detail info for edit on button cell click-->
									
							


                                                                <?php
                                                                 } else if ($user_department == '2') {
                                                    ?>

                                                                 <table id="example" class="display" cellspacing="0" width="100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <td>
                                                                                <input type="checkbox" name="all" id="all">
                                                                            </td>
                                                   <td>Invoice Number</td>
                                                    <td>Customer Name</td>
                                                                            <td>GST</td>
                                                    <td>InvoiceDate</td>
                                                    <td>DepartureDate</td>
													<td>Destination</td>
                                                    <td>Agent</td>
                                                    <td>Amount</td>
                                                    <td>Payment Receive</td>
                                                    <td>Purchase Amount</td>
                                                    <td>Due Amount</td>
                                                    <td>Gross Profit</td>
                                                    <td>Edit </td>
                                                    <td>Add Payment</td>
                                                    <td>Add Purchase</td>
                                                    <td>Reminder</td>

                                                                        </tr>
                                                                    </thead>
                                                                        <tfoot>
                                                <tr>
                                                    <th colspan="8" style="text-align:right" rowspan="1">Total:</th>
                                                    <th rowspan="1" colspan="1"></th>
                                                </tr>
                                                      </tfoot>
                                                <tbody>

                                                                     <?php

                                                if (isset($_POST['filter'])) {
                                                    $FROM_date = $_POST['FROM_date'];
                                                    $To_date = $_POST['To_date'];


                                                    $query = mysqli_query($class->conn, "SELECT * FROM invoice INNER JOIN customers ON invoice.customer_id = customers.customer_id INNER JOIN jk_user ON invoice.`agent` = `jk_user`.`user_id`  WHERE in_date BETWEEN '" . $_POST["FROM_date"] . "' AND '" . $_POST["To_date"] . "' ORDER BY invoice.`in_id` DESC")
                                                    or die();


                                                } else {

                                                    $query = mysqli_query($class->conn, "SELECT * FROM invoice INNER JOIN customers ON invoice.customer_id = customers.customer_id INNER JOIN jk_user ON invoice.`agent` = `jk_user`.`user_id` WHERE jk_user.`user_department` = $user_department AND (jk_user.`manage_user` = '$user_id' || customers.`added_by` = '$user_id') ORDER BY invoice.`in_id` DESC;");


                                                    // $query = mysqli_query($class->conn, "SELECT * FROM invoice INNER JOIN customers ON invoice.customer_id = customers.customer_id INNER JOIN jk_user ON invoice.`agent` = `jk_user`.`user_id` ORDER BY invoice.`in_id` DESC;");

                                                }
                                                while ($res = mysqli_fetch_array($query)) {
                                                    @extract($res)
                                                    ?>
                                                    <tr>
                                                        <td><input type="checkbox" name="ids[]"
                                                                   value="<?php echo $in_id ?>"></td>
                                                        <td>
                                                            <a href="invoice_view?id=<?php echo $in_id ?>" target="_blank"> <?php echo $in_id ?></a>
                                                        </td>
                                                        <td>
                                                            <a href="all_invoice?id=<?php echo $customer_id ?>" target="_blank"><?php echo ucfirst(strtolower($name)); ?></a>
                                                        </td>

                                                        <td><?php echo $class->sqlToUser_DateTime($in_date); ?></td>
                                                        <td><?php echo $class->sqlToUser_DateTime($ex_date); ?></td>
                                                                                                                <td><?php echo ucfirst(strtolower($destination)); ?></td>

                                                        <td><?php echo ucfirst(strtolower($user_name)); ?></td>
                                                            <?php
                                                            $amount = json_decode($amount);
                                                            $finalamount = 0;
                                                            foreach ($amount as $amt) {
                                                                $finalamount = $finalamount + $amt;
                                                                
                                                                
                                                            }
															if($gst_applicable =='Yes')
															{
																$finalamount = $finalamount + $tax;
															}
                                                            $fileamount = $class->moneyFormatIndia(round($finalamount));

                                                            ?>
                                                        <td>
                                                           <?php echo ($fileamount); ?> 
                                                        </td>                                                         
                                                        <td>
                                                            <a href="payment-list?inv=<?php echo $in_id ?>" class="text-bold" style="color:#4cd137" target="_blank"><?php echo $class->moneyFormatIndia(round($class->paymentTotal($in_id))); ?> </a>
                                                        </td>
                                                        <td>
                                                            <a href="purchase-list?inv=<?php echo $in_id ?>" target="_blank" class="text-bold" style="color:#d35400"><?php echo $class->moneyFormatIndia(round($class->purchasepaymentTotal($in_id))); ?></a>
                                                        </td>
                                                        
                                                        <td><p class="text-bold" style="color: red"><?php echo $class->moneyFormatIndia(round($finalamount - $class->paymentTotal($in_id))); ?></p>
                                                        </td>
                                                        
                                                        <td><p class="text-bold" style="color: #009432">
                                                                <?php echo $class->moneyFormatIndia(round($finalamount - $class->purchasepaymentTotal($in_id))); ?></p>
                                                        </td>
                                                             

                                                        <td><a href="invoice-edit?inv=<?php echo $in_id ?>" title="Edit"
                                                               class="btn btn-file"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                                        <td>
                                                            <button type="button" class="btn btn-info payment" value="<?php echo $in_id ?>">Add Payment</button>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-info btn-lg addPurchase" value="<?php echo $in_id ?>">Add Purchase</button>
                                                        </td>
                                                        <td>
														    <button type="button" class="btn btn-info send_offer" id="reminder" value="<?php echo $in_id ?>" title="Reminder send till now"> <i class="fa fa-bell" aria-hidden="true"></i> </button>
                                                        </td>
                                                    </tr>
                                                                            <?php } ?>
                                                                    </tbody>
                                                                </table>
																	<button name="delete" class="btn btn-danger">Delete</button>  
																	

                                                            <?php
                                                         } 
                                                           else if ($user_department == '3')
                                                         {

                                                           ?>
                                                     <table id="example" class="display" cellspacing="0" width="100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <td>
                                                                                <input type="checkbox" name="all" id="all">
                                                                            </td>
                                                   <td>Invoice Number</td>
                                                    <td>Customer Name</td>
                                                    <td>GST</td>
                                                    <td>InvoiceDate</td>
                                                    <td>Due Date</td>
                                                    <td>Destination</td>
                                                    <td>Agent</td>
                                                    <td>Amount</td>
                                                    <td>Payment Receive</td>
                                                    <td>Purchase Amount</td>
                                                    <td>Due Amount</td>
                                                    <td>Gross Profit</td>
                                                    <td>Edit </td>
                                                    <td>Add Payment</td>
                                                    <td>Add Purchase</td>
                                                    <td>Reminder</td>
                                                                        </tr>
                                                                    </thead>
                                                                        <tfoot>
            <tr><th colspan="8" style="text-align:right" rowspan="1">Total:</th><th rowspan="1" colspan="1"></th></tr>
           </tfoot>
                                                <tbody>

                                                                       <?php

                                                if (isset($_POST['filter'])) {
                                                    $FROM_date = $_POST['FROM_date'];
                                                    $To_date = $_POST['To_date'];


                                                    $query = mysqli_query($class->conn, "SELECT * FROM invoice INNER JOIN customers ON invoice.customer_id = customers.customer_id INNER JOIN jk_user ON invoice.`agent` = `jk_user`.`user_id`  WHERE in_date BETWEEN '" . $_POST["FROM_date"] . "' AND '" . $_POST["To_date"] . "' ORDER BY invoice.`in_id` DESC")
                                                    or die();


                                                } else {
                                                    $query = mysqli_query($class->conn, "SELECT * FROM invoice INNER JOIN customers ON invoice.customer_id = customers.customer_id INNER JOIN jk_user ON invoice.`agent` = `jk_user`.`user_id`
												 ORDER BY invoice.`in_id` DESC;");

                                                }
                                                while ($res = mysqli_fetch_array($query)) {
                                                    @extract($res)
                                                    ?>
                                                    <tr>
                                                        <td><input type="checkbox" name="ids[]"
                                                                   value="<?php echo $in_id ?>"></td>
                                                        <td>
                                                            <a href="invoice_view?id=<?php echo $in_id ?>" target="_blank"> <?php echo $in_id ?></a>
                                                        </td>
                                                        <td>
                                                            <a href="all_invoice?id=<?php echo $customer_id ?>" target="_blank"><?php echo ucfirst(strtolower($name)); ?></a>
                                                        </td>

                                                        <td><?php echo $class->sqlToUser_DateTime($in_date); ?></td>
                                                        <td><?php echo $class->sqlToUser_DateTime($ex_date); ?></td>
                                                                                                                <td><?php echo ucfirst(strtolower($destination)); ?></td>

                                                        <td><?php echo ucfirst(strtolower($user_name)); ?></td>
                                                            <?php
                                                            $amount = json_decode($amount);
                                                            $finalamount = 0;
                                                            foreach ($amount as $amt) {
                                                                $finalamount = $finalamount + $amt;
                                                                
                                                                
                                                            }
															if($gst_applicable =='Yes')
															{
																$finalamount = $finalamount + $tax;
															}
                                                            $fileamount = $class->moneyFormatIndia(round($finalamount));

                                                            ?>
                                                        <td>
                                                           <?php echo ($fileamount); ?> 
                                                        </td>                                                         
                                                        <td>
                                                            <a href="payment-list?inv=<?php echo $in_id ?>" class="text-bold" style="color:#4cd137" target="_blank"><?php echo $class->moneyFormatIndia(round($class->paymentTotal($in_id))); ?> </a>
                                                        </td>
                                                        <td>
                                                            <a href="purchase-list?inv=<?php echo $in_id ?>" target="_blank" class="text-bold" style="color:#d35400"><?php echo $class->moneyFormatIndia(round($class->purchasepaymentTotal($in_id))); ?></a>
                                                        </td>
                                                        <td><p class="text-bold" style="color: red"><?php echo $class->moneyFormatIndia(round($finalamount - $class->paymentTotal($in_id))); ?></p>
                                                        </td>
                                                        <td><p class="text-bold" style="color: #009432">
                                                                <?php echo $class->moneyFormatIndia(round($finalamount - $class->purchasepaymentTotal($in_id))); ?></p>
                                                        </td>
                                                             

                                                        <td><a href="invoice-edit?inv=<?php echo $in_id ?>" title="Edit"
                                                               class="btn btn-file"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                                        <td>
                                                            <button type="button" class="btn btn-info payment" value="<?php echo $in_id ?>">Add Payment</button>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-info btn-lg addPurchase" value="<?php echo $in_id ?>">Add Purchase</button>
                                                        </td>
                                                        <td>
														    <button type="button" class="btn btn-info send_offer" id="reminder" value="<?php echo $in_id ?>" title="Reminder send till now"> 
														    <i class="fa fa-bell" aria-hidden="true"></i> </button>
                                                        </td>
                                                    </tr>
                                                                  
                                                                            <?php } ?>
                                                                    </tbody>
                                                                </table>
																<button name="delete" class="btn btn-danger" >Delete</button>


                                                            <?php } ?>


                                                      
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } else{ ?>

                                    <div class="container-fluid container-fullw bg-white">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div>

                                                    <a href="invoice" class="btn btn-azure">Create New Invoice</a>
                                <button type="button" id="filter" class="btn btn-info">Filters</button>


                                                </div>
                                              
                                            </div>
                                            <br>
                                            <br>

                                            <form action="" id="catForm" method="post" enctype="multipart/form-data" style="display: none">

                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" class="form-control" name="FROM_date" id="from_date" placeholder="From Date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" class="form-control" name="To_date" id="to_date" placeholder="To Date">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">

                                        <button class="btn btn-raised btn-success waves-effect" type="submit"
                                                name="filter" id="filter">Search
                                        </button>

                                    </div>
                                </div>
                            </div>


                        </form>

                                            <center>
                                                <p style="color:red;">
                                                    <?php echo $msgs; ?>
                                                </p>
                                            </center>

                                            <div class="col-sm-12">
                                                <div class="panel panel-white no-radius">
                                                    <div class="panel-body">

                                                        <form action="" method="post" enctype="multipart/form-data">
                                                            <div style="overflow-x:auto;">
                                                                <table id="example1" class="display" cellspacing="0" width="100%">
																	<thead>
																	<tr>
																		<td><input type="checkbox" name="all" id="all"></td>
																		<td>#</td>
																		<td>Invoice Number</td>
																		<td>Customer Name</td>
                                                                        <td>GST</td>
																		<td>InvoiceDate</td>
																		<td>Due Date</td>
																		<td>Amount</td>
																		<td>Payment Receive</td>
																		<td>Purchase Amount</td>
																		<td>Due Amount</td>
																		<td>Gross Profit</td>
																		<td>Edit </td>
																		<td>Add Payment</td>
																		<td>Add Purchase</td>
																	</tr>
																	</thead>
																	
																</table>

                                                            </div>
                                    <button name="delete" class="btn btn-danger" >Delete</button>
                                             
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                                                 <?php
                        }
                        ?>

                                        <!-- end: PAGE TITLE -->
                                        <!-- start: YOUR CONTENT HERE -->
                                        <!-- end: YOUR CONTENT HERE -->
                            </div>
                        </div>
                </div>
                <!-- MOdel Start-->
                <div class="modal fade" id="paymentModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel-4">Add Payment </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                            </div>
                            <div class="modal-body">
                                <form id="FormPayment" action="includes/ajax.php" method="post" enctype="multipart/form-data">
                                    <div id="payment_res"></div>
                                    <input type="hidden" id="invoice_id" name="invoice_id">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="name" class="col-form-label">Payment Date</label>
                                                <input type="text" data-required="true" class="form-control datepicker" name="payment_date" id="payment_date" data-date-format="dd/mm/yyyy">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="company" class="col-form-label">Amount</label>
                                                <input type="text" data-required="true" class="form-control" name="payment_amounts" id="payment_amounts">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="name" class="col-form-label">Mode</label>
                                                <select name="payment_mode" class="form-control">
                                                    <option value="Cash">Cash</option>
                                                    <option value="Bank">Bank</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="email" class="col-form-label">Transaction ID</label>
                                                <input type="text" class="form-control" name="transaction_id" id="transaction_id" required>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="address1" class="col-form-label">Note</label>
                                                <textarea name="note" id="notes" class="form-control"></textarea>
                                            </div>

                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" id="addPayment">Add Payment</button>
                                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Trigger the modal with a button -->

                <!-- Modal -->
                <div class="modal fade" id="purchaseModal" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel-4">Add Purchase </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="FormPurchase"  method="post" enctype="multipart/form-data">
                                    <div id="payment_res"></div>
                                    <input type="hidden" id="purchase_invoice_id" name="purchase_invoice_id">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="name" class="col-form-label">Purchase Date</label>

                                                <input class="form-control datepicker" name="purchase_payment_date" id="purchase_payment_date" data-date-format="mm/dd/yyyy" placeholder="dd/mm/yyyy" type="text" autocomplete="off">

                                            </div>
                                            <div class="col-md-6">
                                                <label for="company" class="col-form-label">Amount</label>
                                                <input type="text" data-required="true" class="form-control" name="purchase_payment_amount" id="purchase_payment_amount" required="">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="name" class="col-form-label">Mode</label>
                                                <select name="purchase_payment_mode" class="form-control">
                                                    <option value="Cash">Cash</option>
                                                    <option value="Bank">Bank</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="email" class="col-form-label">Transaction ID</label>
                                                <input type="text" class="form-control" name="purchase_transaction_id" id="transaction_ids" required>

                                            </div>
                                        </div>
                                    </div>

									 
  
  
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="vendor" class="col-form-label">Vendor</label>
                                              <select name="vendor" id="vendor" multiple="multiple" required class='fstdropdown-select'>
                                                    <option value="">Select</option>
                                                    <?php
                                        $wqry = mysqli_query($class->conn, "SELECT * FROM vendor");
                                        while ($wres = mysqli_fetch_array($wqry)) { ?>

                                                        <option value="<?php echo $wres['vendor_id'] ?>">
                                                            <?php echo $wres['name'] ?>
                                                        </option>
                                                        <?php }

                                        // echo $class->wo_list(); ?>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="address1" class="col-form-label">Note</label>
                                                <textarea name="purchase_note" id="purchase_note" class="form-control"></textarea>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success" name="submit" id="submitPurchase" class="btn">Save Purchase</button>

                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                    <?php include('includes/footer.php'); ?>

                        <!--start: OFF - SIDEBAR -->
                        <?php include('includes/right_sidebar.php'); ?>
                            <!--end: OFF - SIDEBAR -->
                            <!--start: SETTINGS -->
                            <?php include('includes/right_setting.php'); ?>
                                <!-- end: SETTINGS -->
  
                               
				 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script>
    	 $(document).on('click','#reminder',function(e){
            e.preventDefault();
			var id = $(this).val();
		if (confirm('are you sure to reminder mail?')) {
		$.ajax({
            url: 'includes/ajax.php',
            type: 'POST',
            data: {id:id, reminder_mail: true },
			beforeSend: function() {
			},
            success: function(data) {
                console.log(data);  //return false;
				//$(".page-loader-wrapper").css('display','none');
				alert(data);
                // var obj = JSON.parse(data);
                // if( obj.type == 'success') {
                    // alert( obj.msg );
					
					
                // } else {
                    // alert( obj.msg);
                // }
            }
        });
		}else{
			
		}
	});
	
	
        $(document).ready(function(){
            var dataTable=$('#example1').DataTable({
                "processing": true,
                "serverSide":true,
                "ajax":{
					"url": "includes/ajaxfile_reports",
                    type:"post"
                }
            });
        });
    </script>
    <!--script js for get edit data-->
    <script>
        $(document).on('click','payment',function(e){
            e.preventDefault();
            var per_id=$(this).data('id');
            //alert(per_id);
            $('#content-data').html('');
            $.ajax({
                url:'editdata.php',
                type:'POST',
                data:'id='+per_id,
                dataType:'html'
            }).done(function(data){
                $('#content-data').html('');
                $('#content-data').html(data);
            }).fial(function(){
                $('#content-data').html('<p>Error</p>');
            });
        });
    </script>				
				

 <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
 <script>
								
	// $(document).ready(function(){
        // fetch_data('No');
        // function fetch_data(is_date_search, FROM_date ='', To_date=''){
            // $('#empTable').DataTable({
                // 'processing': true,
                // 'serverSide': true,
                // 'serverMethod': 'post',
                // 'ajax': {
                    // 'url':'includes/ajaxfile_reports.php',
                    // 'data':{is_date_search:is_date_search , FROM_date:FROM_date, To_date:To_date}
                // },
                // 'columns': [
                    // { data: 'checkbox' },
                    // { data: 'Invoice' },
                    // { data: 'customer_name' },
                    // { data: 'InvoiceDate' },
                    // { data: 'DepartureDate' },
                    // { data: 'Destination' },
                    // { data: 'Agent' },
                    // { data: 'Amount' },
                    // { data: 'Payment' },
                    // { data: 'Purchase' },
                    // { data: 'Due' },
                    // { data: 'Gross' },
                    // { data: 'edit' },
                  
                   
                // ]
            // });
        // }

        // $("#date_search").click(function () 
		// {
            // var FROM_date = $("#FROM_date").val();
            // var To_date = $("#To_date").val();

            // if(FROM_date !='' && To_date !='')
            // {
                // $("#empTable").DataTable().destroy();
                // fetch_data('Yes',FROM_date, To_date );

            // }else
            // {
                // alert('Both date required!');
                // return false;
            // }
        // });
    // });


                                    $(document).ready(function() {
                                        $('#example').DataTable({
                                            "footerCallback": function(row, data, start, end, display) {
                                                var api = this.api(),
                                                    data;

                                                // Remove the formatting to get integer data for summation
                                                var intVal = function(i) {
                                                    return typeof i === 'string' ?
                                                        i.replace(/[\rs,]/g, '') * 1 :
                                                        typeof i === 'number' ?
                                                        i : 0;
                                                };

                                                // Total over all pages
                                                total = api
                                                    .column(7)
                                                    .data()
                                                    .reduce(function(a, b) {
                                                        return intVal(a) + intVal(b);
                                                    }, 0);

                                                // Total over this page
                                                pageTotal = api
                                                    .column(7, {
                                                        page: 'current'
                                                    })
                                                    .data()
                                                    .reduce(function(a, b) {
                                                        return intVal(a) + intVal(b);
                                                    }, 0);

                                                // Update footer
                                                $(api.column(8).footer()).html(
                                                    'Amount ' + pageTotal.toFixed(1) + ' From ' + total.toFixed(1)
                                                );
                                            }
                                        });
                                    });
									
									
									// $(".payment").click(function() {
										// alert('working');
										// return false;
									// });
								
                                </script>
                                    <!-- start: MAIN JAVASCRIPTS -->
                                <script src="vendor/jquery/jquery.min.js"></script>
                                <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
                                <script src="vendor/modernizr/modernizr.js"></script>
                                <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
                                <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
                                <script src="vendor/switchery/switchery.min.js"></script>
                                <!-- end: MAIN JAVASCRIPTS -->
                                <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
                                <script src="vendor/select2/select2.min.js"></script>
                                <script src="vendor/DataTables/jquery.dataTables.min.js"></script>
                                <script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

                                <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
                                <!-- start: CLIP-TWO JAVASCRIPTS -->
                                <script src="assets/js/main.js"></script>
                                <!-- start: JavaScript Event Handlers for this page -->
                                <script src="assets/js/table-data.js"></script>
                                <script>
                                    jQuery(document).ready(function() {
                                        Main.init();
                                        TableData.init();
                                    });
                                    $("body").on('focus', '.datepicker', function() {
                                        $(this).bootstrapMaterialDatePicker({
                                            format: 'DD/MM/YYYY',
                                            clearButton: true,
                                            weekStart: 1,
                                            time: false
                                        });
                                    });

                                    $('#filter').click(function() {
                                        $('#catForm').toggle();
                                    });
                                </script>

                                <!--  <script>
         $(function(){
         $('#contact-frm').submit(function(e){
             e.preventDefault();
             $.ajax({
                 url:'includes/ajax.php',
                 type:'post',
                 data:{
                     invoice_id      : $('#invoice_id').val().trim(),
                     payment_dates      : $('#payment_dates').val().trim(),
                     payment_amount  :    $('#payment_amount').val().trim(),
                     payment_modes:    $('#payment_modes').val().trim(),
                     transaction_ids  :    $('#transaction_ids').val().trim(),
                     notes:    $('#notes').val().trim(),
                 },
                 beforeSend:function(){
                     display_msg('Wait: Processing','info');
                 },
                 success:function(response){
                     if(response.toLowerCase().indexOf('error')>=0){
                         display_msg(response,'danger');
                     }else{
                         display_msg(response,'success');
                         $('#contact-frm')[0].reset();
                     }
                 },
                 error:function(){
                     display_msg('Some error occured','danger');

                 }
             });
         });
     });

     function display_msg(str,type){
         $('.result').html('<div class="alert alert-'+type+'">'+str+'</div>').slideDown();
     }</script> -->

                                <script>
                                    $("#all").click(function() {
                                        $('input:checkbox').not(this).prop('checked', this.checked);
                                    });

                                    $(".payment").click(function() {
										// alert('working');
										// return false;
                                        var invoice_id = $(this).val();
                                        // var payment_amounts =  $(this).val();

                                        $.ajax({
                                            url: 'includes/ajax.php',
                                            type: 'POST',
                                            data: {
                                                invoice_id: invoice_id,
                                                addPayment: true
                                            },
                                            cache: false,
                                            success: function(data) {
                                                // console.log(data); return false;
                                                if ($.isNumeric(data)) {
                                                    // $('#payment_amounts').val(payment_amounts);
                                                    $('#invoice_id').val(invoice_id);
                                                    $(".datepicker").datepicker('setDate', new Date());
                                                    $('#paymentModel').modal('show');
                                                } else {
                                                    alert('Invalid Amount. Need to recreate invoice.');
                                                }
                                            }
                                        });
                                    });

                                    $("#addPayment").click(function(e) {
                                        e.preventDefault();
                                        var error = false;
                                        //simple input validation
                                        $($('#FormCustomer').find("input[data-required=true], textarea[data-required=true]")).each(function() {
                                            if (!$.trim($(this).val())) { //if this field is empty
                                                $(this).css('border-color', 'red'); //change border color to red
                                                error = true;
                                                return false;
                                            }
                                            //check invalid email
                                            if ($('input[type=email]') && !validateEmail($('input[type=email]').val())) {
                                                $('input[type=email]').css('border-color', 'red'); //change border color to red
                                                error = true;
                                                return false;
                                            }
                                        }).on("input", function() { //change border color to original
                                            $(this).css('border-color', '');
                                        });

                                        if (error) {
                                            return false;
                                        } else {
                                            var data = new FormData($('#FormPayment')[0]);
                                            data.append('paymentSubmit', 'submit');

                                            var action = $('#FormPayment').attr('action');
                                            var method = $('#FormPayment').attr('method');
                                            $.ajax({
                                                url: action,
                                                type: method,
                                                data: data,
                                                cache: false,
                                                contentType: false,
                                                processData: false,
                                                success: function(data) {
                                                    // console.log(data); return false;
                                                    var obj = JSON.parse(data);
                                                    if (obj.type == 'success') {
                                                        alert(obj.msg);
                                                        window.location.reload();
                                                        //console.log(data);
                                                    } else {
                                                        alert(obj.msg);
                                                    }
                                                }
                                            })
                                        }
                                    });

                                    $(".addPurchase").click(function() {
                                        var invoice_id = $(this).val();
                                        $('#purchase_invoice_id').val(invoice_id);
                                        // $(".datepicker").datepicker('setDate', new Date());
                                        $("#purchase_payment_date").datepicker({
                                            format: 'dd/mm/yyyy',
                                            'setDate': new Date(),
                                            "autoclose": true
                                        });
                                        $('#purchaseModal').modal('show');

                                    });

                                    $(document).ready(function() {
                                        $.datepicker.setDefaults({
                                            dateFormat: 'dd-mm-yy'
                                        });
                                        $(function() {
                                            $("#from_date").datepicker();
                                            $("#to_date").datepicker();
                                        });
                                        $('#filter').click(function() {
                                            var from_date = $('#from_date').val();
                                            var to_date = $('#to_date').val();
                                            if (from_date != '' && to_date != '') {
                                                $.ajax({
                                                    url: "filter.php",
                                                    method: "POST",
                                                    data: {
                                                        from_date: from_date,
                                                        to_date: to_date
                                                    },
                                                    success: function(data) {
                                                        $('#order_table').html(data);
                                                    }
                                                });
                                            } else {
                                                alert("Please Select Date");
                                            }
                                        });
                                    });
										
									// $('#submitPurchase').click(function(){
										
									// $('#submitPurchase').prop('disabled', true);
									
									// $('#FormPurchase')[0].submit();
								// });


// $('#booking_save1').click(function(){
	// $('#booking_save1').prop('disabled', true);
	// $('#booking_save_form1')[0].submit();
// });
									
									
									
                                </script>
								<script src="src/fstdropdown.js"></script>
    <script>
        function setDrop() {
            if (!document.getElementById('third').classList.contains("fstdropdown-select"))
                document.getElementById('third').className = 'fstdropdown-select';
            setFstDropdown();
        }
        setFstDropdown();
        function removeDrop() {
            if (document.getElementById('third').classList.contains("fstdropdown-select")) {
                document.getElementById('third').classList.remove('fstdropdown-select');
                document.getElementById("third").fstdropdown.dd.remove();
            }
        }
        function addOptions(add) {
            var select = document.getElementById("fourth");
            for (var i = 0; i < add; i++) {
                var opt = document.createElement("option");
                var o = Array.from(document.getElementById("fourth").querySelectorAll("option")).slice(-1)[0];
                var last = o == undefined ? 1 : Number(o.value) + 1;
                opt.text = opt.value = last;
                select.add(opt);
            }
        }
        function removeOptions(remove) {
            for (var i = 0; i < remove; i++) {
                var last = Array.from(document.getElementById("fourth").querySelectorAll("option")).slice(-1)[0];
                if (last == undefined)
                    break;
                Array.from(document.getElementById("fourth").querySelectorAll("option")).slice(-1)[0].remove();
            }
        }
        function updateDrop() {
            document.getElementById("fourth").fstdropdown.rebind();
        }
    </script>
    </body>
    </html>