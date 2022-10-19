<?php include('includes/top_inc.php');

include('includes/class.php');
$class = new baseClass;
$msg = '';

if(isset($_GET['id']))
{
     $customer_id = $_GET['id'];
 
    $qry = mysqli_query($class->conn,"SELECT * FROM invoice INNER JOIN jk_user ON invoice.added_by = jk_user.user_id WHERE invoice.customer_id = $customer_id");
                                              
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
    <title>Payment List | ERP</title>
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
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
    <link href="vendor/DataTables/css/DT_bootstrap.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
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
                <section id="page-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h1 class="mainTitle">Invoice List </h1>
                            <span class="mainDescription">Single Customer Invoice List</span>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <span>Home</span>
                            </li>
                            <li class="active">
                                <span>Payment</span>
                            </li>
                        </ol>
                    </div>
                </section>
                <div class="container-fluid container-fullw bg-white">
                    <div class="row">

                        <div class="col-sm-12">


                                    <form action="customer.php" method="post" enctype="multipart/form-data">
                                        <div style="overflow-x:auto;">
                                            <table class="table table-sm table-responsive table-striped table-bordered table-hover table-full-width" id="sample_1">

                                                <thead>
                                                <tr>
                                                    <td>Invoice Number</td>

                                                    <td>Invoice date</td>
                                                    <td>Departure date</td>
                                                    <td>agent</td>
                                                    <td>amount</td> 
                                                    <td>Payment Receive</td>
                                                   <td>Purchase Amount</td>
                                                    <td>Due Amount</td>
                                                   
                                                   
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                while($res = mysqli_fetch_array($qry))
                                                {	@extract($res);
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $in_id ?></td>
                                                        
                                                        <td><?php echo $in_date ?></td>
                                                        <td><?php echo $ex_date ?></td>
                                                         
                                                        <td><?php echo $user_name ?></td>
														<td>
														<a href="payment-list.php?inv=<?php echo $in_id ?>"><?php
                                                            $amount = json_decode($amount);
                                                            $finalamount = 0;
                                                            foreach ($amount as $amt)
                                                            {
                                                                $finalamount = $finalamount + $amt;
                                                            }
                                                            
                                                            $total_amount = $finalamount;
                                                            ?>
                                                            <p class="text-bold"><?php echo "Rs. ".$class->moneyFormatIndia($total_amount); ?></p>

                                                        </td>
														
														
														 <td>
                                                            <a href="payment-list.php?inv=<?php echo $in_id ?>" class="text-bold" style="color:#4cd137" target="_blank"><?php echo $class->moneyFormatIndia(round($class->paymentTotal($in_id))); ?> </a>
                                                        </td>
                                                        <td>
                                                            <a href="purchase-list.php?inv=<?php echo $in_id ?>" target="_blank" class="text-bold" style="color:#d35400"><?php echo $class->moneyFormatIndia(round($class->purchasepaymentTotal($in_id))); ?></a>
                                                        </td>
															<td><p class="text-bold" style="color: red"><?php echo $class->moneyFormatIndia(round($finalamount - $class->paymentTotal($in_id))); ?></p>
                                                        </td>
                                                       

                                                  
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>

                                    </form>

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
                                    <label for="name"  class="col-form-label">Payment Date</label>
                                    <input type="text" data-required="true" class="form-control datepicker" name="payment_date" id="payment_date" data-date-format="dd/mm/yyyy">
                                </div>
                                <div class="col-md-6">
                                    <label for="company" class="col-form-label">Amount</label>
                                    <input type="number" data-required="true" class="form-control" name="payment_amount" id="payment_amount">
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
                                    <textarea name="note" id="note" class="form-control"></textarea>
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
    <!--        Model ENd-->
    <?php include('includes/footer.php'); ?>

    <!-- start: OFF-SIDEBAR -->
    <?php include('includes/right_sidebar.php'); ?>
    <!-- end: OFF-SIDEBAR -->
    <!-- start: SETTINGS -->
    <?php include('includes/right_setting.php'); ?>
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
</script>
<script>
    $("#all").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

</script>
<script>



        $(".payment").click(function () {
            var invoice_id =  $(this).val();
            $.ajax({
                url: 'includes/ajax.php',
                type: 'POST',
                data: {invoice_id : invoice_id, addPayment:true },
                cache: false,
                success: function (data) {
                    // console.log(data); return false;
                    if ($.isNumeric(data)) {
                        $('#payment_amount').val(data);
                        $('#invoice_id').val(invoice_id);
                        $(".datepicker").datepicker('setDate', new Date());
                        $('#paymentModel').modal('show');
                    } else {
                        alert('Invalid Amount. Need to recreate invoice.');
                    }
                }
            });
        });


        $(document).ready(function () {
            $("#addPayment").click(function (e) {
                e.preventDefault();
                var error = false;
                //simple input validation
                $($('#FormCustomer').find("input[data-required=true], textarea[data-required=true]")).each(function(){
                    if(!$.trim($(this).val())){ //if this field is empty
                        $(this).css('border-color','red'); //change border color to red
                        error = true; return false;
                    }
                    //check invalid email
                    if($('input[type=email]') && !validateEmail($('input[type=email]').val())){
                        $('input[type=email]').css('border-color', 'red'); //change border color to red
                        error = true; return false;
                    }
                }).on("input", function(){ //change border color to original
                    $(this).css('border-color', '');
                });

                if(error) { return false; }
                else {
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
                            if(obj.type == 'success') {
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

        });





</script>
<!-- end: JavaScript Event Handlers for this page -->
<!-- end: CLIP-TWO JAVASCRIPTS -->
</body>
</html>
