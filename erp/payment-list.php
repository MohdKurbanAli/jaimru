<?php include('includes/top_inc.php');

include('includes/class.php');
$class = new baseClass;
$user_id = $_SESSION['sess_user_id'];
$user_department = $_SESSION['sess_user_department'];

$msg = '';

if (isset($_POST['updatePayments'])) {
    @extract($_POST);
    $now = date("Y-m-d H:i:s");

    if ($payment_date != '' && $payment_amount != '')
    {
        $data = "payment_date = '$payment_date',
        note = '$note',
        transaction_id = '$transaction_id',
        payment_mode = '$payment_mode',
        payment_amount = '$payment_amount',
        updated_at = '$now',
        updated_by = '$user_id'";
        


        $where = "id = '$payment_id'";


        if($class->updateData('payment', $data, $where))
        {
            $msg = "Payment updated successfully !";
        }else{
            $msg = "Server Error! Please re-check value.";
        }



    } else {

        $msg = "Something Wrong !";


    }


}

if (isset($_POST['delete'])) {
    if (count($_POST['ids']) > 0) {
        $ids = implode(',', $_POST['ids']);
        $dl_qry = mysqli_query($class->conn, "DELETE FROM payment WHERE id in ($ids)") or die(mysqli_error());
        if ($dl_qry) {
            $msg = "Payments deleted successfully";
        }
    }
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
        <div class="main-content" >
            <div class="wrap-content container" id="container">
                <!-- start: PAGE TITLE -->
                <section id="page-title">
                    <div class="row">
                      <div class="col-sm-8">
                             <!--  <h1 class="mainTitle"><?php echo "MT0".$invoice_id ?> </h1>-->
                            <span class="mainDescription">Payment Details</span>
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
                        <?php 
                        if($_SESSION['sess_user_type'] =='MANAGER')
                    {

                        ?>
                <div class="container-fluid container-fullw bg-white">
                    <div class="row">
                        <?php if (isset($msg)) {
                            echo '<div class="margin-top-15"><label class="alert alert-dismissible alert-success" > ' . $msg . ' </label></div>';
                        } ?>
                        <div class="col-sm-12">


                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div style="overflow-x:auto;"> 


                                                                <?php 
                                                  if ($user_department == '1'){
                                                    ?>
                                                                    <table class="table table-sm table-responsive table-striped table-bordered table-hover table-full-width" id="sample_1">

                                                                        <thead>
                                                                            <tr>
                                                                                <td>
                                                                                    <input type="checkbox" name="all" id="all"> </td>
                                                                                  <td>Date</td>
                                                    <td>Payment ID</td>
                                                    <td>Payment Mode</td>
                                                    <td>Transaction ID</td>
                                                    <td>Remarks</td>
                                                    <td>Payment Amount</td>
                                                    <td>Added By</td>
                                                    <td>Action</td>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php   
if(isset($_GET['inv']))
{
    $invoice_id = $_GET['inv'];
    $qry = mysqli_query($class->conn,"SELECT * FROM payment INNER JOIN jk_user ON payment.added_by = jk_user.user_id WHERE payment.invoice_id =  $invoice_id  ORDER BY payment.`payment_date` DESC;");
}else{
    $qry = mysqli_query($class->conn,"SELECT * FROM payment INNER JOIN jk_user ON payment.added_by = jk_user.user_id  ORDER BY payment.`payment_date` DESC;");
}

                                              while($res = mysqli_fetch_array($qry))
                                                { 
                                                  @extract($res);
                                                        ?>
                                                                              <tr>
                                                    <td><input type="checkbox" name="ids[]" value="<?php echo $id ?>"></td>
                                                    <td><?php echo $class->sqlToUser_DateTime($payment_date) ?></td>
                                                        <td><?php echo $id ?></td>
                                                        <td><?php echo $payment_mode ?></td>
                                                        <td><?php echo $transaction_id ?></td>
                                                                                                                 <td><?php echo $note ?></td>
    


                                                      <!--  <td><a href="javascript:void(0)" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo $note ?>">
                                                            <?php echo $payment_amount ?></a>
                                                        </td>-->
                                                        
                                                         <td>
                                                         
                                                            <?php echo $payment_amount ?>
                                                        </td>
                                                        
                                                         
                                                        <td><?php echo ucfirst($user_name) ?></td>
                                                        <td><button type="button" title="Edit" class="btn btn-info updatePayment" value="<?php echo $id ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                        </td>
                                                    </tr>
                                                                                <?php
                                                } 

                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                    <?php

                                                } else if ($user_department == '2') {
                                                    ?>

                                                                        <table class="table table-sm table-responsive table-striped table-bordered table-hover table-full-width" id="sample_1">

                                                                            <thead>
                                                                                <tr>
                                                                                    <td>
                                                                                        <input type="checkbox" name="all" id="all"> </td>
                                                                                     <td>Date</td>
                                                    <td>Payment ID</td>
                                                    <td>Payment Mode</td>
                                                    <td>Transaction ID</td>
                                                    <td>Remarks</td>
                                                    <td>Payment Amount</td>
                                                    <td>Added By</td>
                                                    <td>Action</td>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>

                                                                                <?php

                                                  if(isset($_GET['inv']))
{
    $invoice_id = $_GET['inv'];
    $qry = mysqli_query($class->conn,"SELECT * FROM payment INNER JOIN jk_user ON payment.added_by = jk_user.user_id WHERE payment.invoice_id =  $invoice_id ORDER BY payment.`payment_date` DESC");
}else{
    $qry = mysqli_query($class->conn,"

 SELECT * FROM payment INNER JOIN customers ON payment.added_by = customers.customer_id INNER JOIN jk_user ON payment.added_by = `jk_user`.`user_id` WHERE jk_user.`user_department` = $user_department AND (jk_user.`manage_user` = '$user_id' || customers.`added_by` = '$user_id')
ORDER BY payment.`payment_date` DESC;");
}

                                                        while($res = mysqli_fetch_array($qry))
                                                {   @extract($res);

                                                        ?>

                                                                                  <tr>
                                                    <td><input type="checkbox" name="ids[]" value="<?php echo $id ?>"></td>
                                                    <td><?php echo $class->sqlToUser_DateTime($payment_date) ?></td>
                                                        <td><?php echo $id ?></td>
                                                        <td><?php echo $payment_mode ?></td>
                                                        <td><?php echo $transaction_id ?></td>
                                                                                                                 <td><?php echo $note ?></td>
    


                                                      <!--  <td><a href="javascript:void(0)" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo $note ?>">
                                                            <?php echo $payment_amount ?></a>
                                                        </td>-->
                                                        
                                                         <td>
                                                         
                                                            <?php echo $payment_amount ?>
                                                        </td>
                                                        
                                                         
                                                        <td><?php echo ucfirst($user_name) ?></td>
                                                        <td><button type="button" title="Edit" class="btn btn-info updatePayment" value="<?php echo $id ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                        </td>
                                                    </tr>
                                                                                    <?php
                                                     } 

                                                ?>

                                                                            </tbody>
                                                                        </table>

                                                                        <?php
                                                 } 
 else if ($user_department == '3')

                                                 {
                                                    ?>

                                                                            <table class="table table-sm table-responsive table-striped table-bordered table-hover table-full-width" id="sample_1">

                                                                                <thead>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <input type="checkbox" name="all" id="all"> </td>
                                                                                          <td>Date</td>
                                                    <td>Payment ID</td>
                                                    <td>Payment Mode</td>
                                                    <td>Transaction ID</td>
                                                    <td>Remarks</td>
                                                    <td>Payment Amount</td>
                                                    <td>Added By</td>
                                                    <td>Action</td>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php

if(isset($_GET['inv']))
{
    $invoice_id = $_GET['inv'];
    $qry = mysqli_query($class->conn,"SELECT * FROM payment INNER JOIN jk_user ON payment.added_by = jk_user.user_id WHERE payment.invoice_id =  $invoice_id  ORDER BY payment.`payment_date` DESC;");
}else{
    $qry = mysqli_query($class->conn,"SELECT * FROM payment INNER JOIN jk_user ON payment.added_by = jk_user.user_id  ORDER BY payment.`payment_date` DESC;");
}                                           
                                                while($res = mysqli_fetch_array($qry))
                                                {   @extract($res);
                                                    ?>
                                                                                      <tr>
                                                    <td><input type="checkbox" name="ids[]" value="<?php echo $id ?>"></td>
                                                    <td><?php echo $class->sqlToUser_DateTime($payment_date) ?></td>
                                                        <td><?php echo $id ?></td>
                                                        <td><?php echo $payment_mode ?></td>
                                                        <td><?php echo $transaction_id ?></td>
                                                                                                                 <td><?php echo $note ?></td>
    


                                                      <!--  <td><a href="javascript:void(0)" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo $note ?>">
                                                            <?php echo $payment_amount ?></a>
                                                        </td>-->
                                                        
                                                         <td>
                                                         
                                                            <?php echo $payment_amount ?>
                                                        </td>
                                                        
                                                         
                                                        <td><?php echo ucfirst($user_name) ?></td>
                                                        <td><button type="button" title="Edit" class="btn btn-info updatePayment" value="<?php echo $id ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                        </td>
                                                    </tr>
                                                                                        <?php } } ?>
                                                                                </tbody>
                                                                            </table>


									
                                        </div>
										<button name="delete" class="btn btn-danger">Delete</button>
                                    </form>

                        </div>

                    </div>
                </div>

                <?php

} else
{
if(isset($_GET['inv']))
{
    $invoice_id = $_GET['inv'];
    $qry = mysqli_query($class->conn,"SELECT * FROM payment INNER JOIN jk_user ON payment.added_by = jk_user.user_id WHERE payment.invoice_id =  $invoice_id  ORDER BY payment.`payment_date` DESC;");
}else{
    $qry = mysqli_query($class->conn,"SELECT * FROM payment INNER JOIN jk_user ON payment.added_by = jk_user.user_id  ORDER BY payment.`payment_date` DESC;");
}


 




    
                 ?>

                  <div class="container-fluid container-fullw bg-white">
                    <div class="row">
                        <?php if (isset($msg)) {
                            echo '<div class="margin-top-15"><label class="alert alert-dismissible alert-success" > ' . $msg . ' </label></div>';
                        } ?>
                        <div class="col-sm-12">


                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div style="overflow-x:auto;">
                                        <table id="example" class="display" cellspacing="0" width="100%">

                                                <thead>
                                                <tr>
                                                <td><input type="checkbox" name="all" id="all"></td>
                                                    <td>Date</td>
                                                    <td>Payment ID</td>
                                                    <td>Payment Mode</td>
                                                    <td>Transaction ID</td>
                                                                                                         <td>Remarks</td>

                                                    <td>Payment Amount</td>
                                                    <td>Added By</td>
                                                    <td>Action</td>
                                                </tr>
                                                </thead>
                                                    <tfoot>
            <tr><th colspan="8" style="text-align:right" rowspan="1">Total:</th><th rowspan="1" colspan="1"></th></tr>
           </tfoot>
                                                <tbody>
                                                <?php
                                                while($res = mysqli_fetch_array($qry))
                                                {   @extract($res);
                                                    ?>
                                                    <tr>
                                                    <td><input type="checkbox" name="ids[]" value="<?php echo $id ?>"></td>
                                                    <td><?php echo $class->sqlToUser_DateTime($payment_date) ?></td>
                                                        <td><?php echo $id ?></td>
                                                        <td><?php echo $payment_mode ?></td>
                                                        <td><?php echo $transaction_id ?></td>
                                                                                                                 <td><?php echo $note ?></td>
    


                                                      <!--  <td><a href="javascript:void(0)" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo $note ?>">
                                                            <?php echo $payment_amount ?></a>
                                                        </td>-->
                                                        
                                                         <td>
                                                         
                                                            <?php echo $payment_amount ?>
                                                        </td>
                                                        
                                                         
                                                        <td><?php echo ucfirst($user_name) ?></td>
                                                        <td><button type="button" title="Edit" class="btn btn-info updatePayment" value="<?php echo $id ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <button name="delete" class="btn btn-danger">Delete</button>
                                    </form>

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
    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-4">Add Payment </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <form id="FormPayment" action="" method="post" enctype="multipart/form-data">
                        <div id="payment_res"></div>
                        <input type="hidden" id="payment_id" name="payment_id" >
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name"  class="col-form-label">Payment Date</label>
                                    <input type="text" data-required="true" class="form-control datepicker" name="payment_date" id="payment_date" data-date-format="yyyy-mm-dd" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="payment_amount" class="col-form-label">Amount</label>
                                    <input type="number" data-required="true" class="form-control" name="payment_amount" id="payment_amount" required>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name" class="col-form-label">Mode</label>
                                    <select name="payment_mode" id="payment_mode" class="form-control">
                                        <option value="Cash">Cash</option>
                                        <option value="Bank">Bank</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="col-form-label">Transaction ID</label>
                                    <input type="text" class="form-control" name="transaction_id" id="transaction_id">

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
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" name="updatePayments" id="updatePayments">Update Payment</button>
                            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        </div>

                    </form>
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
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	
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
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 6, { page: 'current'} )
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
    $(".updatePayment").click(function () {
        var payment_id = $(this).val();
        $('#payment_id').val(payment_id);
        $.ajax({
            url: 'includes/ajax',
            type: 'POST',
            data: {payment_id: payment_id, paymentDetails: true},
            cache: false,
            success: function (data) {
               // console.log(data); // return false;
                var obj = JSON.parse(data);
                $('#payment_date').val(obj.payment_date);
                $('#payment_amount').val(obj.payment_amount);
                $('#payment_mode').val(obj.payment_mode);
                $('#transaction_id').val(obj.transaction_id);
                $('#note').val(obj.note);


            }
        });
        $("#payment_date").datepicker({
            format: 'yyyy-mm-dd',
            'setDate': new Date(),
            "autoclose": true
        });
        $('#paymentModal').modal('show');
    });











</script>
<!-- end: JavaScript Event Handlers for this page -->
<!-- end: CLIP-TWO JAVASCRIPTS -->
</body>
</html>
