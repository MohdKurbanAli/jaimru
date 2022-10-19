<?php include('includes/top_inc.php');

include('includes/class.php');
$class = new baseClass;
$msg = '';

if(isset($_POST['delete']))
{
    if(count($_POST['ids']) > 0) {
        $ids = implode(',', $_POST['ids']);
        $dl_qry = mysqli_query($class->conn, "DELETE FROM item WHERE  id in ($ids)") or die(mysqli_error());
        if($dl_qry)
        {
            $msg = "Data deleted successfully";
        }
    }
}
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <title>Items</title>
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
                            <h1 class="mainTitle">Items </h1>
                        </div>
                       
                    </div>
                </section>
                <div class="container-fluid container-fullw bg-white">
                    <div class="row">
                        <div class="col-md-12">
                            <div>
                                <button type="button" class="btn btn-info" id="openItemModel" >Add Item</button>
                            </div>
                            <?php if($msg !=''){ echo '<div class="margin-top-15"><label class="alert alert-dismissible alert-success" > '.$msg.' </label></div>'; } ?>
                        </div>
                        <div class="col-sm-12 margin-top-15">


                                    <form action="item" method="post" enctype="multipart/form-data">
                                        
                                        <div style="overflow-x:auto;">
                                            <table class="table table-sm table-responsive table-striped table-bordered table-hover table-full-width" id="sample_1">

                                                <thead>
                                                <tr>
                                                    <td><input type="checkbox" name="all" id="all" > </td>
                                                    <td>Item Name</td>
                                                    <td>Description</td>
                                                    <td>HSN / SAC</td>
                                                    <td>Status</td>
                                                    <td>Action</td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $qry = mysqli_query($class->conn,"SELECT * FROM item");
                                                while($res = mysqli_fetch_array($qry))
                                                {	@extract($res);
                                                    ?>
                                                    <tr>
                                                        <td><input type="checkbox" name="ids[]"  value="<?php echo $id ?>" > </td>
                                                        <td><?php echo $item_name ?></td>
                                                        <td><?php echo $item_uom ?></td>
                                                         <td><?php echo $item_hsn ?></td>
                                                        <td><?php echo $status ?></td>
                                                        <td><button type="button" class="edit" value="<?php echo $id ?>">Edit</button></td>
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
                <!-- end: PAGE TITLE -->
                <!-- start: YOUR CONTENT HERE -->
                <!-- end: YOUR CONTENT HERE -->
            </div>
        </div>
    </div>
    <!-- MOdel Start-->
    <div class="modal fade" id="itemModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-4">Add Item </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <form id="addItemForm">
                    <input type="hidden" name="item_id" id="item_id" value="">
                        <div id="payment_res"></div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Item Name</label>
                            <input type="text" class="form-control" id="item_name">
                        </div>
                        
                       <!--  <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Item UOM</label>
                            <input type="text" class="form-control" id="item_uom">
                        </div> -->
<div class="form-group">
                            <label for="recipient-name" class="col-form-label">Description</label>
                            <textarea rows="4" cols="50"class="form-control" id="item_uom"></textarea>
                        </div>

                         <div class="form-group">
                            <label for="message-text" class="col-form-label">Item HSN /SAC</label>
                            <input type="text" class="form-control" id="item_hsn">
                        </div> 
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="AddItem">Add Item</button>
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

    $('#openItemModel').click(function(){
        $('#addItemForm').trigger("reset");
        $('#itemModel').modal('show');
    });

    $(document).ready(function () {
        $("#AddItem").click(function () {
            var item_id = $('#item_id').val().trim();
            var item_name = $('#item_name').val().trim();
            var item_uom = $('#item_uom').val().trim();
            var item_hsn = $('#item_hsn').val().trim();
            if(item_name =='' || item_uom =='')
            {
                $('#payment_res').addClass('text-danger').html('All Field Required');
                return false;
            }else{
                $('#payment_res').removeClass('text-danger').html('');
            }

            $.ajax({
                url: 'includes/ajax',
                type: 'POST',
                data: {item_id:item_id, item_name:item_name, item_uom:item_uom, item_hsn: item_hsn, addItem:true},
                cache: false,
                success: function(data) {
                    // console.log(data); return false;
                    var obj = JSON.parse(data);
                    if(obj.type == 'success') {
                        $('#payment_res').removeClass().addClass('text-success').html(obj.msg);
                        window.location.reload();
                        //console.log(data);
                    } else {
                        $('#payment_res').removeClass().addClass('text-danger').html(obj.msg);
                    }
                }
            });
        });

    });

</script>
<!-- end: JavaScript Event Handlers for this page -->
<script>
    
    $('.edit').click(function(){

        var id = $(this).val();
        $.ajax({
                url: 'includes/ajax',
                type: 'POST',
                data: {item_id:id, getItem:true},
                cache: false,
                success: function(data) {
                    console.log(data); // return false;

                    var obj = JSON.parse(data);

                     $('#item_id').val(obj.id);
                     $('#item_name').val(obj.item_name);
                     $('#item_uom').val(obj.item_uom);
                     $('#item_hsn').val(obj.item_hsn);

                    
                    $('#itemModel').modal('show');
                    
                }
            });
        
    })
</script>


</body>
</html>
