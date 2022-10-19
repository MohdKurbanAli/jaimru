<?php include('includes/top_inc.php');

include('includes/class.php');
$class = new baseClass;
$user_id = $_SESSION['sess_user_id'];
//$msg = '';
$msgs = "";
if (isset($_POST['filter'])) {
   @extract($_POST);
   $from_date = $class->changeUserToSql_DateFromat($from_date);
    $to_date = $class->changeUserToSql_DateFromat($to_date);
	
   $query = mysqli_query($class->conn, "SELECT * FROM invoice INNER JOIN customers ON invoice.customer_id = customers.customer_id INNER JOIN jk_user ON invoice.`agent` = `jk_user`.`user_id`  WHERE $Agent BETWEEN '$from_date' AND '$to_date' ORDER BY invoice.`in_id` DESC");

}else{
	$query = mysqli_query($class->conn, "SELECT * FROM invoice INNER JOIN customers ON invoice.customer_id = customers.customer_id INNER JOIN jk_user ON invoice.`agent` = `jk_user`.`user_id` ORDER BY invoice.`in_id` DESC;");
}
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <title>Reports | ERP</title>
    <!-- start: META -->
    <!--[if IE]>
    <meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1"/><![endif]-->
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- end: META -->
    <!-- start: GOOGLE FONTS -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
          rel="stylesheet" type="text/css"/>
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
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color"/>
    <!-- end: CLIP-TWO CSS -->
    <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
    <link href="vendor/DataTables/css/DT_bootstrap.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
    <style type="text/css">
        button.btn.btn-info.btn-lg {
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
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css"/>

    <!--Font Awesome (added because you use icons in your prepend/append)-->
    <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css"/>

    <!-- Inline CSS based on choices in "Settings" tab -->
    <style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form {
            font-family: Arial, Helvetica, sans-serif;
            color: black
        }

        .bootstrap-iso form button, .bootstrap-iso form button:hover {
            color: white !important;
        }

        .asteriskField {
            color: red;
        }
		.col-sm-2 {
    width: 19.666667%;
}</style>
		
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<style type="text/css" class="init">
	
	th { white-space: nowrap; }

	</style>

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
                            <h1 class="mainTitle">Reports</h1>
                        </div>
                       
                    </div>
                </section>

                <div class="container-fluid container-fullw bg-white">
                    <div class="row">
                        <div class="col-md-12">
						<div class="row">
								<div class="col-sm-2">
									<div class="panel panel-white no-radius text-center" style="background-color: #008080;">
										 <div class="panel-body">
											<h2 class="StepTitle" style="color: #fff;">Total<br> Sale</h2>
											<p class="text-small">
                                            </p><h4 class="text-bold" style="color:#fff" id="final_total"></h4><p></p>
										</div>
                       				</div>
								</div>
								<div class="col-sm-2">
									<div class="panel panel-white no-radius text-center" style="background-color: #5ac18e">
																
										<div class="panel-body">
											<h2 class="StepTitle" style="color: #fff;">Payment Receive</h2>
											<p class="text-small">
											</p><h4 class="text-bold" style="color:#fff" id="totalpayment"></h4><p></p>

										</div>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="panel panel-white no-radius text-center" style="background-color: #ff7373">
										<div class="panel-body">
											<h2 class="StepTitle" style="color: #fff;">Purchase Amount</h2>
											<p class="text-small">
												</p><h4 class="text-bold" style="color:#fff" id="totalpurchase"></h4>
											<p></p>
										</div>
																				
									</div>
								</div><div class="col-sm-2">
									<div class="panel panel-white no-radius text-center" style="background-color: #800000">
										<div class="panel-body">
											<h2 class="StepTitle" style="color: #fff;">Due Amount</h2>
											<p class="text-small">
												</p><h4 class="text-bold" style="color:#fff" id="totaldueamount"></h4>
										</div>
																				
									</div>
								</div><div class="col-sm-2">
									<div class="panel panel-white no-radius text-center" style="background-color: #008000">
										<div class="panel-body">
											<h2 class="StepTitle" style="color: #fff;">Gross Profit</h2>
											<p class="text-small">
												</p><h4 class="text-bold" style="color:#fff" id="totalprofitamount">23031049.86</h4>
										</div>
																				
									</div>
								</div>
							</div>
                            <div>
                                <button type="button" id="filter" class="btn btn-info">Filters</button>
                            </div>
                            <br>
                            <?php if ($msg !='') {
                                echo '<div class="margin-top-15"><label class="alert alert-dismissible alert-success" > ' . $msg . ' </label></div>';
                            } ?>
                        </div>

                        <?php
                        if ($error != '') { ?>
                            <label class="alert alert-danger"><?php echo $error; ?></label>
                        <?php } ?>

                        <form action="" id="catForm" method="post" enctype="multipart/form-data" style="display: none">

                            <div class="row clearfix">
                                   <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
										 <select name="Agent" id="Agent" class="form-control">
                                        <option value="">Select Agent</option>
                                        <?php
                                        $wqry = mysqli_query($class->conn, "SELECT * FROM jk_user");
                                        while ($wres = mysqli_fetch_array($wqry)) { ?>

                                            <option value="<?php echo $wres['user_id'] ?>"> <?php echo $wres['user_name'] ?> </option>
                                        <?php }

                                        // echo $class->wo_list(); ?>
                                    </select>
                                        </div>
                                    </div>
                                </div>
								<div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control datepicker" data-date-format="dd/mm/yyyy"  name="from_date" id="from_date" placeholder="From Date" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control datepicker" data-date-format="dd/mm/yyyy"  name="to_date" id="to_date" placeholder="To Date" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
								  
                                <div class="col-sm-3">
                                    <div class="form-group">

                                        <button class="btn btn-raised btn-success waves-effect" type="button"
                                                name="filters" id="filters">Search
                                        </button>

                                    </div>
                                </div>
                            </div>


                        </form>
                       


                        <div style="clear:both"></div>
                        <br/>

                        <center><p style="color:red;"><?php echo $msgs; ?></p></center>
                        <div class="col-sm-12">
                            <div class="panel panel-white no-radius">
                                <div class="panel-body">

                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div style="overflow-x:auto;">
										
	
										 <table id="customer_data" class="table table-bordered table-striped">
										 <thead>
										<tr>
													<td>Invoice Number</td>
                                                    <td>Customer Name</td>
                                                    <td>InvoiceDate</td>
                                                    <td>DepartureDate</td>
                                                    <td>Agent</td>
                                                    <td>Amount</td>
                                                    <td>Payment Receive</td>
                                                    <td>Purchase Amount</td>
                                                    <td>Due Amount</td>
                                                    <td>Gross Profit</td>
												</tr>
										 </thead>
									
										</table>
										
	                                      </div>

                                        
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
    <!-- MOdel Start-->
    <div class="modal fade" id="paymentModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-4">Add Payment </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <form id="FormPayment" action="includes/ajax" method="post" enctype="multipart/form-data">
                        <div id="payment_res"></div>
                        <input type="hidden" id="invoice_id" name="invoice_id">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name" class="col-form-label">Payment Date</label>
                                    <input type="text" data-required="true" class="form-control datepicker"
                                           name="payment_date" id="payment_date" data-date-format="dd/mm/yyyy">
                                </div>
                                <div class="col-md-6">
                                    <label for="company" class="col-form-label">Amount</label>
                                    <input type="text" data-required="true" class="form-control" name="payment_amounts"
                                           id="payment_amounts">
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
                                    <input type="text" class="form-control" name="transaction_id" id="transaction_id"
                                           required>
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
                    <form id="FormPurchase" action="#" method="post" enctype="multipart/form-data">
                        <div id="payment_res"></div>
                        <input type="hidden" id="purchase_invoice_id" name="purchase_invoice_id">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name" class="col-form-label">Purchase Date</label>

                                    <input class="form-control datepicker" name="purchase_payment_date" id="purchase_payment_date" data-date-format="mm/dd/yyyy"
                                           placeholder="dd/mm/yyyy" type="text" autocomplete="off">


                                </div>
                                <div class="col-md-6">
                                    <label for="company" class="col-form-label">Amount</label>
                                    <input type="text" data-required="true" class="form-control"
                                           name="purchase_payment_amount" id="purchase_payment_amount" required="">
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
                                    <input type="text" class="form-control" name="purchase_transaction_id"
                                           id="transaction_ids" required>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="vendor" class="col-form-label">Vendor</label>
                                    <select name="vendor" id="vendor" required class="form-control">
                                        <option value="">Select</option>
                                        <?php
                                        $wqry = mysqli_query($class->conn, "SELECT * FROM vendor");
                                        while ($wres = mysqli_fetch_array($wqry)) { ?>

                                            <option value="<?php echo $wres['vendor_id'] ?>"> <?php echo $wres['name'] ?> </option>
                                        <?php }

                                        // echo $class->wo_list(); ?>
                                    </select></div>

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
                            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
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

    <script type="text/javascript" language="javascript" >
 $(document).ready(function(){
  
  fill_datatable();
  
  function fill_datatable(Agent = '', from_date = '', to_date = '')
  {
   var dataTable = $('#customer_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "searching" : true,
    "ajax" : {
     url:"includes/report.php",
     type:"POST",
     data:{
      Agent:Agent,from_date:from_date, to_date:to_date
     }
    },
				drawCallback:function(settings)
				{
				 $('#final_total').html(settings.json.final_total);
				 $('#totalpayment').html(settings.json.totalpayment);
				 $('#totalpurchase').html(settings.json.totalpurchase);
				 $('#totaldueamount').html(settings.json.totaldueamount);
				 $('#totalprofitamount').html(settings.json.totalprofitamount);
				}
   });
  }
  
  $('#filters').click(function(){
   var Agent = $('#Agent').val();
   //alert(Agent);
   var from_date = $('#from_date').val();
   var to_date = $('#to_date').val();
    $('#customer_data').DataTable().destroy();
    fill_datatable(Agent, from_date, to_date );
	
   
   
  });
  
  
 });
 
</script>
	<script>
	$(document).ready(function() {
    $('#example').DataTable( {
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\rs,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 7 ).footer() ).html(
                'Amount ' + pageTotal.toFixed(1) +' From ' + total.toFixed(1)
            );
        }
    } );
} );
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
            jQuery(document).ready(function () {
                Main.init();
                TableData.init();
            });

            $("body").on('focus', '.datepicker', function () {
                $(this).bootstrapMaterialDatePicker({
                    format: 'DD/MM/YYYY',
                    clearButton: true,
                    weekStart: 1,
                    time: false
                });
            });
            

            $('#filter').click(function () {
                $('#catForm').toggle();
            });


        </script>

       

        <script>
      
          
                    $("#from_date").datepicker();
                    $("#to_date").datepicker();
               


        </script>
        <!-- end: JavaScript Event Handlers for this page -->
        <!-- end: CLIP-TWO JAVASCRIPTS -->
</body>
</html>