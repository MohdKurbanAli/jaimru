<?php
include('includes/top_inc.php');
include_once('includes/class.php');
$class = new baseClass;

$user_id = $_SESSION['sess_user_id'];
$error = array();


if (isset($_POST['submit'])) {
    @extract($_POST);
    $es_date = $class->changeUserToSql_DateFromat($es_date);
    $ex_date = $class->changeUserToSql_DateFromat($ex_date);
    if ($customer_id == '') {
        $error[] = "Customer is a require field";
    }

    $now = date("Y-m-d H:i:s");

    $item = json_encode($item);
    $oum = json_encode($oum);
    $hsn = json_encode($hsn);
    $price = json_encode($price);
    $qty = json_encode($qty);
    $amount = json_encode($amount);


    if (count($error) == '0') {
        $sql = "customer_id = '$customer_id',
		in_number = '$in_number',
		in_date = '$es_date',
		ex_date = '$ex_date',
		items = '$item',
		oum = '$oum',
		hsn = '$hsn',
		price = '$price',
		qty = '$qty',
		amount = '$amount',
		updated_by = '$user_id',
		updated_at = '$now'";
		
        if ($in_id !== '') {
            $qry = mysqli_query($class->conn, "UPDATE invoice SET $sql WHERE in_id = '$in_id'") or die(mysqli_error($class->conn));
        } 
		// else {
            // $qry = mysqli_query($class->conn, "INSERT into invoice SET $sql") or die(mysqli_error($class->conn));
        // }

        if ($qry) {
            //$class->mail('jai.kashyap@prakharsoftwares.com','Email notification from SBC export ltd.','maujitrip','test mail from maujitrip','jai.kashyap@prakharsoftwares.com');
            echo "<script> alert('Invoice has been updated.');
				window.location = 'invoice.php';
			</script>";
        } else {
			echo "<script> alert('Invalid method to edit invoice. please logout and login again');</script>";
            $error[] = 'Please fill a valid details';

        }
    } else {
        //$error[] = 'Please correct the above error';
    }
}
if(isset($_GET['inv']))
{
   $in_id = $_GET['inv'];
    $eqry = mysqli_query($class->conn,"SELECT * FROM invoice INNER JOIN customers ON invoice.customer_id = customers.customer_id WHERE in_id = '$in_id';");
    $eres = mysqli_fetch_array($eqry);
    @extract($eres);
	
}


?>
<!DOCTYPE html>
<!--[if IE 8]>
<html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]>
<html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- start: HEAD -->
<head>
    <title>Edit Invoice</title>
    <!-- start: META -->
    <!--[if IE]>
    <meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1"/><![endif]-->
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">

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
    <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
    <link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
    <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    <!-- start: CLIP-TWO CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color"/>
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
        <div class="main-content">
            <div class="wrap-content container" id="container">
                <!-- start: PAGE TITLE -->
                <section id="page-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h1 class="mainTitle">MT0<?php echo $in_id; ?></h1>
                            <span class="mainDescription">Edit Invoice</span>
                        </div>
                    </div>
                </section>
                <!-- end: PAGE TITLE -->
                <!-- start: YOUR CONTENT HERE -->
                <section>
                    <div class="panel-body">
                        <form action="invoice-edit" method="post" class="form-horizontal">
                            <input type="hidden" name="in_id" value="<?php echo $in_id ?>">
                            <div class="text-danger">
                                <?php
                                if (count($error) > 0) {
                                    echo implode('<br>', $error);
                                } ?>
                            </div>

                            <fieldset>
                                <legend>
                                    Customer
                                </legend>

                                <div class="col-md-6 padding-30">
                                    <div class="form-group">
                                        <label class="" for="organisation">Customer</label>

                                        <select name="customer_id" id="customer" required class="form-control">
                                            <option value="">Select</option>
                                            <?php
                                            if(isset($customer_id))
                                            { ?>
                                                <option value="<?php echo $customer_id ?>" selected > <?php echo $name ?> </option>
                                            <?php }
                                            if ($_SESSION['sess_user_type'] == 'Agent'){
                                            $wqry = mysqli_query($class->conn, "SELECT * FROM customers WHERE added_by = $user_id");
											}else{
											$wqry = mysqli_query($class->conn, "SELECT * FROM customers");	
											}
                                            while ($wres = mysqli_fetch_array($wqry)) { ?>

                                                <option value="<?php echo $wres['customer_id'] ?>"  > <?php echo $wres['name'] ?> </option>
                                            <?php }

                                            // echo $class->wo_list(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Bill To</label>
                                        <div id="customer_address">
                                            <p>
                                                <?php
													echo $address1." <br>".$state. "," .$zipcode." ".$country;
                                                ?>
                                            </p>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label>Invoice Number</label>
                            <input type="text" name="in_number" class="form-control" value="<?php echo $in_number; ?>" required>
                                   
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Invoice Date</label>
                                                <input type="text" name="es_date" id="estimate_date" class="form-control datepicker" data-date-format="dd/mm/yyyy" value="<?php echo $class->sqlToUser_DateTime($in_date); ?>" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Departure Date</label>
                                                <input type="text" name="ex_date" id="expiry_date" class="form-control datepicker" data-date-format="dd/mm/yyyy" value="<?php echo $class->sqlToUser_DateTime($ex_date); ?>" required>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6 padding-30">
                                  <!-- <h5><input type="checkbox" name="gst_applicable" id="gst_applicable" checked=""> <label for="gst_applicable"> GST Applicable</label></h5>  -->
								  
                                   
                                </div>
								
                            </fieldset>
                            <fieldset>

                                <div class="row margin-bottom-10">
                                    <div class="col-md-6">
                                        <select name="add_item" id="add_item" class="form-control">
                                            <option value="">Select Item</option>
                                            <?php
                                            $iqry = mysqli_query($class->conn, "SELECT * FROM item");
                                            while ($item = mysqli_fetch_array($iqry )) { ?>

                                                <option value="<?php echo $item['id'] ?>"  > <?php echo $item['item_name'] ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
										
                                        $items = json_decode($items);
                                        $oum = json_decode($oum);
                                        $hsn = json_decode($hsn);
                                        $price = json_decode($price);
                                        $qty = json_decode($qty);
                                        $amount = json_decode($amount);
										
										

                                        ?>
                                        <table id="invoice_table" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>Items</th>
                                                <th>HSN/SAC</th>
                                                <th>Price</th>
                                                <th>Qty</th>
                                                <th>Amount</th>
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
											    <td><input type="text" name="item[]" class="form-control" value="<?php echo $items[$k]; ?>" required></td>
                                                <td><input type="text" name="oum[]" class="form-control" value="<?php echo $oum[$k]; ?>" required></td>
                                                <td><input type="number" name="price[]" class="form-control price" min="1" value="<?php echo $price[$k]; ?>" required></td>
                                                <td><input type="number" name="qty[]" class="form-control qty" min="1" value="<?php echo $qty[$k]; ?>"></td>
                                                <td><input type="number" name="amount[]" class="form-control amount" value="<?php echo $amount[$k]; ?>"></td>
                                            </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                        <table class="table text-right">
                                            <tbody>
                                            <tr>
                                                <td class="text-bold">Sub Total</td>
                                                <td id="sub_total"><?php echo $subtotal ?></td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="text-bold">Total</td>
                                                <td id="total"> <?php echo $class->moneyFormatIndia($subtotal); ?>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <button type="submit" name="submit" class="btn btn-info pull-right">Save</button>
                                    </div>
                                    <div class="col-md-6">

                                    </div>
                                </div>
                            </fieldset>
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
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/modernizr/modernizr.js"></script>
<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="vendor/switchery/switchery.min.js"></script>
<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="vendor/autosize/autosize.min.js"></script>
<script src="vendor/selectFx/classie.js"></script>
<script src="vendor/selectFx/selectFx.js"></script>
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/form-elements.js"></script>
<script>
    jQuery(document).ready(function () {
        Main.init();
        FormElements.init();
    });


    $(document).ready(function() {
		$('#customer').on('change', function () {
            var customer = this.value;
            $.ajax({
                url:'includes/ajax',
                type:'post',
                data:{customer_id:customer, getcustomer:true},
                cache:false,
                success:function (e) {
                    console.log(e);
                    $('#customer_address').html(e);
                }
            });
        });

        $('#add_item').on('change', function () {
            var item_id = this.value;

            $.ajax({
                url:'includes/ajax',
                type:'post',
                data:{item_id:item_id, getItem:true},
                cache:false,
                success:function (e) {
                    // $('#item_first_row').remove();
                    var rowCount = $('#invoice_table tr').length;
                    //console.log(e);   // return false;
                    var data = JSON.parse(e);
                    var html_row = '<tr><td><input type="item" name="item[]" class="form-control" value="'+ data.item_name +'"></td><td><input type="text" name="oum[]" class="form-control" value="'+ data.item_uom +'"></td><td><input type="item" name="price[]" class="price form-control" value="0"></td><td><input type="number" name="qty[]" class="qty form-control" value="1"></td><td><input type="number" name="amount[]" class=" amount form-control" value="0"></td></tr>';;

                    $('#invoice_table tbody').append(html_row);
                    // console.log(html_row);
                }
            });
        });


        $(document).delegate('.price', 'change', function(){
            var price = this.value;
            $(this).parent().next('td').find(".qty").each(function() {
                var qty = this.value;
                var amount = price * qty;
                $(this).parent().next('td').find(".amount").val(amount);
                var sub_total = 0;
                $('#invoice_table tr td').find('.amount').each(function () {
                    sub_total = sub_total + parseInt(this.value);
                });

                $("#sub_total").text(sub_total);
                // var cgst = (sub_total) * 9 /100;
                // $("#cgst").text(cgst);
                // $("#sgst").text(cgst);
                var total = sub_total;
                $("#total").text(total);


            });
        });

        $(document).delegate('.qty', 'change', function(){
            var qty = this.value;

            $(this).parent().prev('td').find(".price").each(function() {
                var price = this.value;
                var amount = price * qty;
                $(this).parent().next('td').next('td').find(".amount").val(price * qty)

                var sub_total = 0;
                $('#invoice_table tr td').find('.amount').each(function () {
                    sub_total = sub_total + parseInt(this.value);
                });

                $("#sub_total").text(sub_total);
                // var cgst = (sub_total) * 9 /100;
                // $("#cgst").text(cgst);
                // $("#sgst").text(cgst);
                var total = sub_total;
                $("#total").text(total);
            });
        });
        $('#shipto').click(function() {
            $("#shiptofiled").toggle(this.checked);
        });
    });
    $(document).delegate('.amount', 'keypress', function(e){
        e.preventDefault();
        return false;
    });
    // $("#estimate_date").datepicker('setDate', new Date());
    // $("#expiry_date").datepicker('setDate', '+15d');
</script>
</body>
</html>
