<?php 
include('includes/top_inc.php');
include_once('includes/class.php');
$class = new baseClass;
$user_id = $_SESSION['sess_user_id'];
$error = array();
if(isset($_GET['inv']))
{
   $in_id = $_GET['inv'];
    $eqry = mysqli_query($class->conn,"SELECT * FROM invoice INNER JOIN customers ON invoice.customer_id = customers.customer_id INNER JOIN jk_user ON invoice.`agent` = `jk_user`.`user_id` WHERE in_id = '$in_id';");
    $eres = mysqli_fetch_array($eqry);
    @extract($eres);
	
} 
if(isset($_POST['submit']))
{
    @extract($_POST);
    //$payment_date = $class->userToSql_DateTime($payment_date);
    $added_at = date("Y-m-d H:i:s");
    $sql = "invoice_id = '$invoice_id',
		payment_date = '$payment_date',
		note = '$note',
		transaction_id = '$transaction_id',
		payment_mode = '$payment_mode',
		payment_amount = '$payment_amounts',
		added_at = '$added_at',
		added_by = '$user_id'";
		
		
	
	


    if($class->insertData('payment',$sql))
    {
      echo "<script> alert('Payment added successfully..'); window.location = 'invoice-list'; </script>";

    }else{
      echo "<script> alert('Something Wrong !');</script>";

    }
    unset($_POST);

}



?>
<!DOCTYPE html>
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title>maujitrip :: | Create User</title>
		<!-- start: META -->
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
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
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
                                
                                
									<h1 class="mainTitle">Add Payment</h1>
									
								</div>
								
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: YOUR CONTENT HERE -->
						<section>
						  <div class="modal-body">
                                 <form id="FormPurchase" action="" method="post" enctype="multipart/form-data">
                                    <div id="payment_res"></div>
                                    <input type="hidden" id="invoice_id" name="invoice_id" value="<?php echo $in_id ?>">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="name" class="col-form-label">Payment Date</label>
                                                <input type="Date" data-required="true" class="form-control datepicker" name="payment_date" id="payment_date" data-date-format="dd/mm/yyyy">
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
							<div class="modal-footer">
							              <button type="submit" class="btn btn-success" name="submit" id="submitPurchase" class="btn">Save Payment</button>

                            </div>
                                </form>
                            </div>
                           
						</section>
						
						
						<!-- end: YOUR CONTENT HERE -->
					</div>
				</div>
			</div>
			<?php include('includes/footer.php'); ?>
			
			<!-- start: OFF-SIDEBAR -->
			<?php include('includes/right_sidebar.php'); ?>
			<!-- end: OFF-SIDEBAR -->
			<!-- start: SETTINGS -->
			<?php include('includes/right_setting.php'); ?>
			<!-- end: SETTINGS -->
		</div>
		
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