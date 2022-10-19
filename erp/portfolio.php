<?php include('includes/top_inc.php');

include('includes/class.php');
$class = new baseClass;
$msg = '';
$user_id = $_SESSION['sess_user_id'];


if(isset($_POST['delete']))
{
    if(count($_POST['ids']) > 0) {
        $ids = implode(',', $_POST['ids']);
        $dl_qry = mysqli_query($class->conn, "DELETE FROM portfolio WHERE  id in ($ids)") or die(mysqli_error());
        if($dl_qry)
        {
            $msg = "Data deleted successfully";
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
    <title>Portfolio | ERP</title>
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
    <link href="vendor/sweetalert/sweet-alert.css" rel="stylesheet" media="screen">
    <link href="vendor/sweetalert/ie9.css" rel="stylesheet" media="screen">
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
                            <h1 class="mainTitle">Portfolio </h1>
                            <span class="mainDescription">Portfolio List</span>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <span>Home</span>
                            </li>
                            <li class="active">
                                <span>Portfolio</span>
                            </li>
                        </ol>
                    </div>
                </section>
                <div class="container-fluid container-fullw bg-white">
                    <div class="row">
                        <div class="col-md-12">
                            <div>
                                <button type="button" class="btn btn-info" id="addVendorModel" >Add Portfolio</button>
            </div>
                            <?php if($msg !=''){ echo '<div class="margin-top-15"><label class="alert alert-dismissible alert-success" > '.$msg.' </label></div>'; } ?>
                        </div>
                        <div class="col-sm-12 margin-top-15">
    <?php if($_SESSION['sess_user_type'] =='AGENT')
            {
                            ?>
                                    <form action="customer" method="post" enctype="multipart/form-data">
                                        <div style="overflow-x:auto;">
                                            <table class="table table-sm table-responsive table-striped table-bordered table-hover table-full-width" id="sample_1">

                                                <thead>
                                                <tr>
                                                    <td><input type="checkbox" name="all" id="all" ># </td>
                                                    <td>Image</td>
                                                    <td>Name</td>
                                                    <td>Type</td>
                                                    <td>Link</td>
                                                    <td>added_at</td>
                                                    <td>updated_at</td>
                                                    <td>Status</td>
                                                    <td>Action</td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $qry = mysqli_query($class->conn,"SELECT * FROM portfolio");
                                                while($res = mysqli_fetch_array($qry))
                                                {   @extract($res);
                                                    ?>
                                                    <tr>
                                                        <td><input type="checkbox" name="ids[]"  value="<?php echo $id ?>" > </td>
                                                        <td><img src="uploads/portfolio/<?php echo $img ?>" width="50" height="50" ></td>
                                                        <td><?php echo $name ?></td>
                                                        <td><?php echo $type ?></td>
                                                        <td><?php echo $link ?></td>
                                                        <td><?php echo $added_at ?></td>
                                                        <td><?php echo $updated_at ?></td>
                                                        <td><?php echo $status ?></td>
                                                        <td><button type="button" class="portfolioEdit" title="Edit" value="<?php echo $id ?>" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                        </td>

                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>

                                         <button name="delete" class="btn btn-danger" >Delete</button>
 -->                                    </form>
<?php }else{?>
<form action="portfolio" method="post" enctype="multipart/form-data">
                                        <div style="overflow-x:auto;">
                                            <table class="table table-sm table-responsive table-striped table-bordered table-hover table-full-width" id="sample_1">

                                                <thead>
                                                <tr>
                                                    <td><input type="checkbox" name="all" id="all" ># </td>
                                                    <td>Image</td>
                                                    <td>Name</td>
                                                    <td>Type</td>
                                                    <td>Link</td>
                                                    <td>added_at</td>
                                                    <td>updated_at</td>
                                                    <td>Status</td>
                                                    <td>Action</td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $qry = mysqli_query($class->conn,"SELECT * FROM portfolio");
                                                while($res = mysqli_fetch_array($qry))
                                                {   @extract($res);
                                                    ?>
                                                    <tr>
                                                        <td><input type="checkbox" name="ids[]"  value="<?php echo $id ?>" > </td>
                                                        <td><img src="uploads/portfolio/<?php echo $img ?>" width="50" height="50" ></td>
                                                        <td><?php echo $name ?></td>
                                                        <td><?php echo $type ?></td>
                                                        <td><?php echo $link ?></td>
                                                        <td><?php echo $added_at ?></td>
                                                        <td><?php echo $updated_at ?></td>
                                                        <td><?php echo $status ?></td>
                                                        <td><button type="button" class="portfolioEdit" title="Edit" value="<?php echo $id ?>" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                        </td>

                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <button name="delete" class="btn btn-danger" >Delete</button>
                                    </form>

<?php }?>
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
    <div class="modal fade" id="vendorModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-4">Add Portfolio </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <form id="FormProject" action="includes/ajax.php" method="post" enctype="multipart/form-data">
                        <input type="hidden"  class="form-control" name="portfolio_id" id="portfolio_id" >
                        <div id="payment_res"></div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="email" class="col-form-label">Website Name</label>
                                    <input type="text" data-required="true" class="form-control" name="name" id="name">
                                </div>
                                <div class="col-md-6">
                                    <label for="type" class="col-form-label">Project Type</label>
                                    <input type="text" data-required="true" class="form-control" name="type" id="type">
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="link" class="col-form-label">Link</label>
                                    <input type="text" data-required="true" class="form-control" name="link" id="link">
                                </div>
                                <div class="col-md-6">
                                    <label for="link" class="col-form-label">Status</label>
                                    <select name="status" class="form-control" >
                                        <option value="Active" >Active</option>
                                        <option value="Inactive" >Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name"  class="col-form-label">Image</label>
                                    <input type="file" data-required="true" class="form-control" name="file" id="file">
                                </div>
<!--                                <div class="col-md-6">-->
<!--                                    <label for="email" class="col-form-label">Website Name</label>-->
<!--                                    <input type="text" data-required="true" class="form-control" name="name" id="name">-->
<!--                                </div>-->
                            </div>

                        </div>

                       


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="addProject">Add Project</button>
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

<script src="vendor/sweetalert/sweet-alert.min.js"></script>
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

$("#addVendorModel").click(function (e) {
			$('#FormCustomer').trigger("reset");
		$('#vendorModel').modal().show();
		});


    $(document).ready(function () {
        $("#addProject").click(function (e) {
            e.preventDefault();

            var error = false;
            //simple input validation
            $($('#FormProject').find("input[data-required=true], textarea[data-required=true]")).each(function(){
                if(!$.trim($(this).val())){ //if this field is empty
                    $(this).css('border-color','red'); //change border color to red
                    $(this).focus();
                    error = true; return false;
                }
                //check invalid email
                // if($('input[type=email]') && !validateEmail($('input[type=email]').val())){
                //     $('input[type=email]').css('border-color', 'red'); //change border color to red
                //     error = true; return false;
                // }
            }).on("input", function(){ //change border color to original
                $(this).css('border-color', '');
            });

            if(error) { return false; }
            else {
                var data = new FormData($('#FormProject')[0]);
                data.append('portfolioSubmit', 'submit');

                var action = $('#FormProject').attr('action');
                var method = $('#FormProject').attr('method');

                $.ajax({
                    url: action,
                    type: method,
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data); // return false;
                        var obj = JSON.parse(data);
                        if(obj.type == 'success') {


                            swal({
                                title: obj.msg,
                                text: "Portfolio Details Saved!",
                                type: "success",
                                confirmButtonColor: "#007AFF"
                            });
                            setTimeout(function(){
                                location.reload();
                            }, 1000);
                            $('#FormCustomer').trigger("reset");
                            $('#vendorModel').modal().hide();

                        } else {
                            swal({
                                title: obj.msg,
                                text: "Try Again!",
                                type: "warning",
                                confirmButtonColor: "#007AFF"
                            });
                        }
                    }
                })
            }
        });

    });

    /* Validate Email */
    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }


    //    Edit Vendor
    $('.portfolioEdit').click(function () {
        var portfolio_id = $(this).val();


        $.ajax({
            url: 'includes/ajax.php',
            type: 'POST',
            data: {portfolio_id: portfolio_id, portfolioDetails: true},
            cache: false,
            success: function (data) {
                console.log(data); // return false;
                var obj = JSON.parse(data);
                $('#portfolio_id ').val(portfolio_id);
                $('#name').val(obj.name);
                $('#type').val(obj.type);
                $('#link').val(obj.link);

                $('#file').attr('data-required', false);

                $('#vendorModel').modal('show');


            }
        });
    });
</script>
<!-- end: JavaScript Event Handlers for this page -->
<!-- end: CLIP-TWO JAVASCRIPTS -->
</body>
</html>
