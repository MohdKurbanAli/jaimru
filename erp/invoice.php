<?php
include('includes/top_inc.php');
include_once('includes/class.php');
$class = new baseClass;
$es_id = '';
 $user_id = $_SESSION['sess_user_id'];
 $user_department = $_SESSION['sess_user_department'];

$error = array();
if (isset($_POST['submit'])) {
   // echo "<pre>";
   // var_dump($_POST);
   // echo "</pre>";
   // echo "<br>";
   // exit;
    @extract($_POST);
    $es_date = $class->changeUserToSql_DateFromat($es_date);
    $ex_date = $class->changeUserToSql_DateFromat($ex_date);

    if ($customer_id == '') {
        $error[] = "Customer is a require field";
    }

   // $in_number = "MT0".$class->last_id('invoice', 'in_id');

    if($gst_applicable == true)
    {
        $gst_applicable = "Yes";
        $tax = $final_amount *18/100;
    }else{
        $gst_applicable = "No";
        $tax = 0;
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
        trip_ids = '$customer_id',
		in_date = '$es_date',
		ex_date = '$ex_date',
		items = '$item',
		oum = '$oum',
		hsn = '$hsn',
		price = '$price',
		qty = '$qty',
		amount = '$amount',
        gst_applicable= '$gst_applicable',
        tax = '$tax',
        added_by = '$user_id',
		added_at = '$now'";

       // echo $sql;
       // exit;

        // shipto_name = '$shipto_name',
        // shipto_address = '$shipto_address',
        // shipto_state = '$shipto_state',
        // shipto_zipcode = '$shipto_zipcode',

        if ($es_id !== '') {
            $qry = mysqli_query($class->conn, "UPDATE invoice SET $sql WHERE in_id = '$es_id'") or die(mysqli_error($class->conn));
        } else {
            $qry = mysqli_query($class->conn, "INSERT into invoice SET $sql") or die(mysqli_error($class->conn));
        }

        if ($qry) {
            //$class->mail('jai.kashyap@prakharsoftwares.com','Email notification from SBC export ltd.','maujitrip','test mail from maujitrip','jai.kashyap@prakharsoftwares.com');
            echo "<script> alert('Invoice has been saved.');
				window.location = 'invoice.php';
			</script>";
        } else {
            $error[] = 'Please fill a valid details';

        }
    } else {
        //$error[] = 'Please correct the above error';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Invoice</title>
    <meta charset="utf-8"/>
    <meta name="viewport"content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
          rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
    <link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
    <link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color"/>
												    <link rel="stylesheet" href="src/fstdropdown.css">

</head>
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
                            <h1 class="mainTitle">Invoice</h1>
                            <span class="mainDescription">Create Invoice</span>
                        </div>
                    </div>
                </section>
                <!-- end: PAGE TITLE -->
                <!-- start: YOUR CONTENT HERE -->
                <section>
                    <div class="panel-body">
                        <form action="invoice.php" method="post" class="form-horizontal">
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

                                        <select name="customer_id" id="customer" required class='fstdropdown-select'>
                                            <option value="">Select</option>
                                            <?php
											
											$wqry = mysqli_query($class->conn, "SELECT * FROM customers");	
											
                                            while ($wres = mysqli_fetch_array($wqry)) { ?>

											<option value="<?php echo $wres['customer_id'] ?>"  > <?php echo $wres['name']."(".$wres['phone'].")" ?> </option>
                                            <?php }

                                        

                                            // echo $class->wo_list(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Bill To</label>
                                        <div id="customer_address">
                                            <p>......<br>......</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Invoice Number</label>
                            <input type="text" name="in_number" class="form-control" value="JMRT/21-22/000<?php echo $class->last_id('invoice', 'in_id'); ?>" required>
                                   
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Invoice Date</label>
                                                <input type="text" name="es_date" id="estimate_date" class="form-control datepicker" data-date-format="dd/mm/yyyy" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Due Date</label>
                                                <input type="text" name="ex_date" id="expiry_date" class="form-control datepicker" data-date-format="dd/mm/yyyy" required>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6 padding-30">
                                    <h5><input type="checkbox" name="gst_applicable" id="gst_applicable" checked=""> <label for="gst_applicable"> GST Applicable</label></h5>

                                    
                                </div>
								<div class="col-md-6 padding-30" style="margin-top: 20px;">
                                    <!-- <h5><input type="checkbox" name="shipto" id="shipto"> <label for="shipto">Ship To</label></h5> -->

                               <!--     <div class="form-group">
                                        <label>Destination</label>
										 <input type="text" name="destination" class="form-control" >

                                         
                                    </div>  -->
                                </div>
                            </fieldset>
                            <fieldset>
								<legend>		
                                    Items
                                </legend>
                                <div class="row margin-bottom-10">
                                    <div class="col-md-6">
                                        <select name="add_item" id="add_item" class="form-control">
                                            <option value="">Select Item</option>
                                            <?php
                                            $iqry = mysqli_query($class->conn, "SELECT * FROM item");
                                            while ($items = mysqli_fetch_array($iqry )) { ?>

                                                <option value="<?php echo $items['id'] ?>"  > <?php echo $items['item_name'] ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="invoice_table" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>Items</th>
                                                <th>HSN/SAC</th>
<!--                                                 <th>HSN/SAC</th>
 -->
                                                <th>Price</th>
                                                <th>Qty</th>
                                                <th>Amount</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr id="item_first_row">
                                                <td><input type="text" name="item[]" class="form-control" required></td>
                                                <!--<td><input type="text" name="oum[]" class="form-control" required></td>  -->
                                                 <td><input type="text" name="hsn[]" class="form-control" required></td>
                                                 <td><input type="number" name="price[]" class="form-control price" min="1" required></td>
                                                <td><input type="number" name="qty[]" class="form-control qty" min="1"></td>
                                                <td><input type="number" name="amount[]" class="form-control amount"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <table class="table text-right">
                                            <tbody>
                                            <tr>
                                                <td class="text-bold">Sub Total</td>
                                                <td id="sub_total">0</td>
                                                <input type="hidden" name="final_amount" id="final_amount">
                                            </tr>

                                            <tr id="cgst_field">
                                                <td class="text-bold">CGST</td>
                                                <td id="cgst"> 0</td>
                                            </tr>
                                            <tr id="sgst_field">
                                                <td class="text-bold">SGST</td>
                                                <td id="sgst"> 0</td>
                                            </tr>  
                                            <tr>
                                                <td class="text-bold">Total</td>
                                                <td id="total"> 0</td>
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
                   <?php include('includes/right_setting.php'); ?>
                                <!-- end: SETTINGS -->
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
<!-- start: MAIN JAVASCRIPTS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/modernizr/modernizr.js"></script>
<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="vendor/switchery/switchery.min.js"></script>
<!-- end: MAIN JAVASCRIPTS -->
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="vendor/autosize/autosize.min.js"></script>
<script src="vendor/selectFx/classie.js"></script>
<script src="vendor/selectFx/selectFx.js"></script>
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<!-- start: CLIP-TWO JAVASCRIPTS -->
<script src="assets/js/main.js"></script>

<!-- start: JavaScript Event Handlers for this page -->
<script src="assets/js/form-elements.js"></script>
<script>
    jQuery(document).ready(function () {
        Main.init();
        FormElements.init();
    });
</script>
<!-- end: JavaScript Event Handlers for this page -->
<script>
    $(document).ready(function() {





        $('#customer').on('change', function () {
            var customer = this.value;
            $.ajax({
                url:'includes/ajax.php',
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
                url:'includes/ajax.php',
                type:'post',
                data:{item_id:item_id, getItem:true},
                cache:false,
                success:function (e) {
                    $('#item_first_row').remove();
                    var rowCount = $('#invoice_table tr').length;
                    //console.log(e);   // return false;
                    var data = JSON.parse(e);
                    var html_row = '<tr><td><input type="item" name="item[]" class="form-control" value="'+ data.item_name +'"></td><td><input type="text" name="oum[]" class="form-control" value="'+ data.item_hsn +'"></td><td><input type="item" name="price[]" class="price form-control" value="0"></td><td><input type="number" name="qty[]" class="qty form-control" value="1"></td><td><input type="number" name="amount[]" class=" amount form-control" value="0"></td></tr>';;

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
                $("#final_amount").val(sub_total);

                if($('input[name="gst_applicable"]').is(':checked'))
                {
                    var cgst = (sub_total) * 9 /100;
                     $("#cgst").text(cgst);
                     $("#sgst").text(cgst);
                    var total = sub_total + cgst + cgst;
                  
                }else
                {
                    var total = sub_total;
                }
                 
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
                $("#final_amount").val(sub_total);
                 
                 if($('input[name="gst_applicable"]').is(':checked'))
                {
                    var cgst = (sub_total) * 9 /100;
                     $("#cgst").text(cgst);
                     $("#sgst").text(cgst);
                    var total = sub_total + cgst + cgst;
                  
                }else
                {
                    var total = sub_total;
                }
                $("#total").text(total);
            });
        });

        $('#gst_applicable').click(function() {
            $("#cgst_field").toggle(this.checked);
            $("#sgst_field").toggle(this.checked);
        });

    });


    $(document).delegate('.amount', 'keypress', function(e){
        e.preventDefault();
        return false;
    });
    $("#estimate_date").datepicker('setDate', new Date());
    $("#expiry_date").datepicker('setDate', '+15d');
</script>

<!-- end: CLIP-TWO JAVASCRIPTS -->

</body>
</html>