<?php include('includes/top_inc.php');

include('includes/class.php');
$class = new baseClass;
$user_id = $_SESSION['sess_user_id'];
$user_department = $_SESSION['sess_user_department'];


$msg = '';

if (isset($_POST['delete'])) {
    if (count($_POST['ids']) > 0) {
        $ids = implode(',', $_POST['ids']);
        $dl_qry = mysqli_query($class->conn, "DELETE FROM newsletter WHERE  id in ($ids)") or die(mysqli_error());
        if ($dl_qry) {
			
			 echo "<script> alert('Email deleted successfully.');
                     window.location = 'subscriber.php';

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
        <title>Newsletter | ERP</title>
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
                                            <h1 class="mainTitle">Newsletter </h1>
                                            <span class="mainDescription">Newsletter List</span>
                                        </div>
                                        <ol class="breadcrumb">
                                            <li>
                                                <span>Home</span>
                                            </li>
                                            <li class="active">
                                                <span>Newsletter</span>
                                            </li>
                                        </ol>
                                    </div>
                                </section>

                                

                                    <div class="container-fluid container-fullw bg-white">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div>

                                                    
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
													<td>#ID</td>
                                                    <td>Email</td>
                                                    
                                                    
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


                          

                                        <!-- end: PAGE TITLE -->
                                        <!-- start: YOUR CONTENT HERE -->
                                        <!-- end: YOUR CONTENT HERE -->
                            </div>
                        </div>
                </div>
                

                <!-- Trigger the modal with a button -->

                    
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
    
	
	
        $(document).ready(function(){
            var dataTable=$('#example1').DataTable({
                "processing": true,
                "serverSide":true,
                "ajax":{
					"url": "includes/ajax_subscribe.php",
                    type:"post"
                }
            });
        });
    </script>
  
    				
				

 <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
 
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

                             

                                <script>
                                    $("#all").click(function() {
                                        $('input:checkbox').not(this).prop('checked', this.checked);
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
								
    
    </body>
    </html>