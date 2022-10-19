<?php include('includes/top_inc.php');
include('includes/class.php');
$class = new baseClass;
$user_id = $_SESSION['sess_user_id'];
$msg = '';


if (isset($_POST['submit'])) {
    $purchase_invoice_id = $_POST['purchase_invoice_id'];
    $purchase_payment_date = $_POST['purchase_payment_date'];

    $purchase_note = $_POST['purchase_note'];

    $purchase_payment_mode = $_POST['purchase_payment_mode'];
    $purchase_transaction_id = $_POST['purchase_transaction_id'];
    $purchase_payment_amount = $_POST['purchase_payment_amount'];
    $vendor = $_POST['vendor'];
    $now = date("Y-m-d H:i:s");

    if ($purchase_invoice_id != '' && $purchase_payment_date != '' && $purchase_payment_amount != '' && $purchase_payment_mode != '' && $vendor != '')
    {
        $data = "purchase_payment_date = '$purchase_payment_date',
        purchase_note = '$purchase_note',
        purchase_transaction_id = '$purchase_transaction_id',
        purchase_payment_mode = '$purchase_payment_mode',
        purchase_payment_amount = '$purchase_payment_amount',
        vendor = '$vendor',
        updated_at = '$now',
        updated_by = '$user_id'";

        $where = "id = '$purchase_invoice_id'";



    if($class->updateData('purchase_products', $data, $where))
    {
        $msg = "Purchase updated successfully !";
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
        $dl_qry = mysqli_query($class->conn, "DELETE FROM purchase_products WHERE id in ($ids)") or die(mysqli_error());
        if ($dl_qry) {
            $msg = "Purchase deleted successfully";
        }
    }
}

if(isset($_GET['inv']))
{
    $invoice_id = $_GET['inv'];
    $qry = mysqli_query($class->conn,"SELECT * FROM purchase_products INNER JOIN jk_user ON purchase_products.added_by = jk_user.user_id INNER JOIN vendor ON purchase_products.vendor = vendor.`vendor_id` WHERE purchase_products.purchase_invoice_id = $invoice_id");
}else{
    $qry = mysqli_query($class->conn,"SELECT * FROM purchase_products INNER JOIN jk_user ON purchase_products.added_by = jk_user.user_id INNER JOIN vendor ON purchase_products.vendor = vendor.`vendor_id`;");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Purchase List | ERP</title>
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
                            <h1 class="mainTitle"><?php echo "MT0".$invoice_id ?> </h1>
                            <span class="mainDescription">Purchase Details</span>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <span>Home</span>
                            </li>
                            <li>
                                <span>Invoice</span>
                            </li>
                            <li class="active">
                                <span>Purchase</span>
                            </li>
                        </ol>
                    </div>
                </section>
                <div class="container-fluid container-fullw bg-white">
                    <div class="row">
                        <?php if (isset($msg)) {
                            echo '<div class="margin-top-15"><label class="alert alert-dismissible alert-success" > ' . $msg . ' </label></div>';
                        } ?>
                        <div class="col-sm-12">
									<form action="" method="post" enctype="multipart/form-data">
                                        <div style="overflow-x:auto;">
                                            <table class="table table-sm table-responsive table-striped table-bordered table-hover table-full-width" id="sample_1">
                                                <thead>
                                                <tr>
													<td><input type="checkbox" name="all" id="all"></td>
													<td>Purchase ID</td>
                                                    <td>Purchase Date</td>
                                                    <td>Vendor</td>
                                                    <td>Purchase Amount</td>
                                                    <td>Purchase Mode</td>
                                                    <td>Transaction ID</td>
													 <td>Remarks</td>
                                                    <td>Added By</td>
                                                    <td>Action</td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                while($res = mysqli_fetch_array($qry))
                                                {	@extract($res);
                                                    ?>
                                                    <tr>
														<td><input type="checkbox" name="ids[]" value="<?php echo $id ?>"></td>
                                                        <td><?php echo $id ?></td>
                                                        <td><p class="text-azure"><?php echo $class->sqlToUser_DateTime($purchase_payment_date); ?></p></td>
                                                        <td><?php echo ucfirst($name) ?></td>
														<td><a href="javascript:void(0)" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo $purchase_note ?>">
															<?php echo "Rs. ".$purchase_payment_amount ?></a>
														</td>
                                                        <td><?php echo $purchase_payment_mode ?></td>
                                                        <td><?php echo $purchase_transaction_id ?></td>
                                                        <td><?php echo $purchase_note ?></td>
                                                        <td><?php echo $user_name ?></td>
                                                        <td><button type="button" class="btn btn-info addPurchase" value="<?php echo $id ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
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
                <!-- end: PAGE TITLE -->
                <!-- start: YOUR CONTENT HERE -->
                <!-- end: YOUR CONTENT HERE -->
            </div>
        </div>
    </div>
    <!-- MOdel Start-->
    <div class="modal fade" id="purchaseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-4">Edit Purchase </h5>
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
                                    <select name="purchase_payment_mode" id="purchase_payment_mode" class="form-control">
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



    $(".addPurchase").click(function () {
        var purchase_id = $(this).val();
        $('#purchase_invoice_id').val(purchase_id);
        $.ajax({
            url: 'includes/ajax',
            type: 'POST',
            data: {purchase_id: purchase_id, purchaseDetails: true},
            cache: false,
            success: function (data) {
                console.log(data); // return false;
                var obj = JSON.parse(data);
                $('#purchase_payment_date').val(obj.purchase_payment_date);
                $('#purchase_payment_amount').val(obj.purchase_payment_amount);
                $('#purchase_payment_mode').val(obj.purchase_payment_mode);
                $('#transaction_ids').val(obj.purchase_transaction_id);
                $('#vendor').val(obj.vendor);
                $('#purchase_note').text(obj.purchase_note);


            }
        });
        $("#purchase_payment_date").datepicker({
            format: 'yyyy-mm-dd',
            'setDate': new Date(),
            "autoclose": true
        });
        $('#purchaseModal').modal('show');
    });








</script>
<!-- end: JavaScript Event Handlers for this page -->
<!-- end: CLIP-TWO JAVASCRIPTS -->
</body>
</html>
