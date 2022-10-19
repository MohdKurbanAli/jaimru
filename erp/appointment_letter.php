<?php include('includes/top_inc.php');
include('includes/class.php');
$class = new baseclass;

require_once 'includes/numbertoword/NTWIndia.php';
require_once 'includes/numbertoword/Exception/NTWIndiaInvalidNumber.php';
require_once 'includes/numbertoword/Exception/NTWIndiaNumberOverflow.php';

$ntw = new \NTWIndia\NTWIndia();
$success_msg ="";

if(isset($_POST['send_appointment']) && count($_POST['ids']) > 0 ){

$ids = implode(',' , $_POST['ids']);

    $emp_qry = mysqli_query($class->conn, "SELECT * FROM emp_details WHERE emp_id IN ($ids)");
    while($emp_res = mysqli_fetch_array($emp_qry))
    {
        $sender_email[]= $emp_res['emp_email_first'];
       // $sender_email[]= $emp_res['emp_email_second'];
    }
    $sender_email = implode(',' , $sender_email);

    $format_id = $_POST['format'];
    //echo $format_id;
    $format_qry = mysqli_query($class->conn, "SELECT * FROM appointment_format WHERE id = '$format_id'");
    $format_res = mysqli_fetch_array($format_qry);
}

//submit form
if(isset($_POST['send_mail']))
{
    @extract($_POST);
    $emp_sender_qry = mysqli_query($class->conn, "SELECT * FROM emp_details WHERE emp_id IN ($ids)");
    while($emp_sender_res = mysqli_fetch_array($emp_sender_qry))
    {
        $from;
        //$send_to;
		$receiver_email = $emp_sender_res['emp_email_first'];
        $send_subject;
        $message;
		$message_2;

		$message_header = '<table>
                                <tbody>
                                    <tr>
                                        <td style="text-align:left; width:100%"><img src="images/prkh_lh.jpg" /></td>
                                     
                                    </tr>
                                </tbody>
                            </table>';

		$today_date = date("d/m/Y");
        $emp_name = $emp_sender_res['emp_name'];
        $emp_work_order = $emp_sender_res['emp_work_order'];
        $posting_location = $emp_sender_res['emp_place_of_posting'];
        $designation = $emp_sender_res['emp_designation'];
        $emp_city = $emp_sender_res['emp_city'];
        $doj = $class->changeSqlToUser_DateFromat($emp_sender_res['emp_doj']);
        $emp_code = $emp_sender_res['emp_code'];
        $emp_name = $emp_sender_res['emp_name'];
        $emp_name = $emp_sender_res['emp_name'];
		
		$message_new = str_replace('{{today_date}}',$today_date,$message);
		$message_new = str_replace('{{candidate_name}}',$emp_name,$message_new);
		$message_new = str_replace('{{designation}}',$designation,$message_new);
		$message_new = str_replace('{{emp_code}}',$emp_code,$message_new);
		$message_new = str_replace('{{address}}',$emp_city,$message_new);
		$message_new = str_replace('{{posting_location}}',$posting_location,$message_new);
		$message_new = str_replace('{{doj}}',$doj,$message_new);
		
		$wo_qry = mysqli_query($class->conn, "SELECT * FROM wo_details WHERE wo_number = '$emp_work_order'");
		$wo_res = mysqli_fetch_array($wo_qry);
		
		$wo_project_name = $wo_res['wo_project_name'];
		$wo_start_date = $class->changeSqlToUser_DateFromat($wo_res['wo_start_date']);
		$wo_end_date = $class->changeSqlToUser_DateFromat($wo_res['wo_end_date']);
		
		$message_new = str_replace('{{project_name}}',$wo_project_name,$message_new);
		$message_new = str_replace('{{from}}',$wo_start_date,$message_new);
		$message_new = str_replace('{{to}}',$wo_end_date,$message_new);
		
		$sl_qry = mysqli_query($class->conn, "SELECT * FROM salary WHERE sl_emp_code = '$emp_code'; ");
		$sl_res = mysqli_fetch_array($sl_qry);
		
		$sal_ctc = $sl_res['sal_ctc'];
		$sal_gross = $sl_res['sal_gross'];
		$sal_net = $sl_res['sal_net'];
		$sal_basic = $sl_res['sal_basic'];
		$sal_hra = $sl_res['sal_hra'];
		$sal_conveyance = $sl_res['sal_conveyance'];
		$sal_telephone = $sl_res['sal_telephone'];
		$sal_pa = $sl_res['sal_pa'];
		$sal_special_allowance = $sl_res['sal_special_allowance'];
		$sal_pf_emmployee = $sl_res['sal_pf_emmployee'];
		$sal_pf_employer = $sl_res['sal_pf_employer'];
		$sal_esi_employee = $sl_res['sal_esi_employee'];
		$sal_esi_employer = $sl_res['sal_esi_employer'];
		$sal_tax = $sl_res['sal_tax'];
		$sal_management_allowense = $sl_res['sal_management_allowense'];
        $sal_bonus = $sl_res['sal_bonus'];

        $ctc_pa = $sal_ctc*12;
        $message_new = str_replace('{{sal_ctc}}',$sal_ctc,$message_new);
        $message_new = str_replace('{{ctc_pa}}',$ctc_pa,$message_new);

		$message_new = str_replace('{{basic}}',$sal_basic,$message_new);
		$message_new = str_replace('{{hra}}',$sal_hra,$message_new);
		$message_new = str_replace('{{conveyance}}',$sal_conveyance,$message_new);
		$message_new = str_replace('{{sal_telephone}}',$sal_telephone,$message_new);
		$message_new = str_replace('{{sal_pa}}',$sal_pa,$message_new);
		$message_new = str_replace('{{sal_special_allowance}}',$sal_special_allowance,$message_new);
		$message_new = str_replace('{{sal_gross}}',$sal_gross,$message_new);
		
		$message_new = str_replace('{{sal_net}}',$sal_net,$message_new);
		$message_new = str_replace('{{sal_pf_emmployee}}',$sal_pf_emmployee,$message_new);
		$message_new = str_replace('{{sal_pf_employer}}',$sal_pf_employer,$message_new);
        $message_new = str_replace('{{sal_esi_employer}}',$sal_esi_employer,$message_new);
        $message_new = str_replace('{{sal_esi_employee}}',$sal_esi_employee,$message_new);
        $message_new = str_replace('{{sal_bonus}}',$sal_bonus,$message_new);
        //$word = $class->numberTowords($sal_net);
		$word =  $ntw->numToWord($sal_net);
        $message_new = str_replace('{{word}}',$word,$message_new);

        $deduction = $sal_pf_emmployee + $sal_esi_employee;
        $message_new = str_replace('{{deduction}}',$deduction,$message_new);


        $html = '
                    <page backimg="background.jpg" backtop="25mm" backleft="10mm" backright="10mm" backbottom="25mm">
                        <page_header>
                            <div class="header">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                        <img src="images/prkh_lh.jpg" />                                        
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </page_header>
                         <page_footer>
                        <div class="footer">
                            <table>
                                <tbody>
                                    <td>                                        
                                        <img src="images/prkhr_lhb.png" />                                        
                                    </td>
                                </tbody>
                            </table>
                            </div>
                        </page_footer>
                        '.$message_new.'
                       
                    </page>
                    <page backimg="background.jpg" backtop="20mm" backleft="10mm" backright="10mm" backbottom="30mm">
                    <page_header>
                            <div class="header">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                        <img src="images/prkh_lh.jpg" class="img-responsive" />                                 
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </page_header>
                         <page_footer>
                        <div class="footer">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>                                        
                                        <img src="images/prkhr_lhb.png" class="img-responsive"/>                                        
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </page_footer>
                    '.$message_2.'
                    </page>';


//			echo $html;

//			exit;
		require_once('phpmailwithattachment/html2pdf/html2pdf.class.php');
		
		$html2pdf = new HTML2PDF('P', 'A4', 'en');

        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($html, isset($_GET['vuehtml']));

        $html2pdf = new HTML2PDF('P', 'A4', 'en');
        $html2pdf->WriteHTML($html);

		
		
		//$to = "jai.kashyap@prakharsoftwares.com";
		$to = $send_to." ,jaikashyap22@gmail.com";
        //$from = "jai.kashyap@prakharsoftwares.com";
		$from = $from;
        $subject = $send_subject;

        $content = "<p>Please see the attachment.</p>";
        $separator = md5(time());
        $eol = PHP_EOL;
        $filename = "maujitrip-appointment-letter.pdf";
        $pdfdoc = $html2pdf->Output('', 'S');
        $attachment = chunk_split(base64_encode($pdfdoc));


        $headers = "From: " . $from . $eol;
        $headers .= "MIME-Version: 1.0" . $eol;
        $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol . $eol;

        $body = '';

        $body .= "Content-Transfer-Encoding: 7bit" . $eol;
        $body .= "This is a MIME encoded message." . $eol; //had one more .$eol


        $body .= "--" . $separator . $eol;
        $body .= "Content-Type: text/html; charset=\"iso-8859-1\"" . $eol;
        $body .= "Content-Transfer-Encoding: 8bit" . $eol . $eol;
        $body .= $content . $eol;


        $body .= "--" . $separator . $eol;
        $body .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
        $body .= "Content-Transfer-Encoding: base64" . $eol;
        $body .= "Content-Disposition: attachment" . $eol . $eol;
        $body .= $attachment . $eol;
        $body .= "--" . $separator . "--";

        if (mail($receiver_email, $subject, $body, $headers)) {

            //$msgsuccess = 'Mail Send Successfully';
			echo "<script> alert('Mail Send Successfully'); </script>";
        } else {

            //$msgerror = 'Main not send';
			echo "<script> alert('Mail Send Failed'); </script>";
        }
		
		

       // echo $html;
	//	echo "<hr>";
	//	echo $message_2;
		
	//	echo $msgsuccess;
	//	$message_new = str_replace('{{from}}',$from,$message_new);
		
		//$message_new = str_replace('{{to}}',$to,$message_new);
		//$message_new = str_replace('{{project_name}}',$project_name,$message_new);
		
		
		

        // Always set content-type when sending HTML email
    //    $headers = "MIME-Version: 1.0" . "\r\n";
      //  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
       // $headers .= 'From: <jai.kashyap@prkharsoftwares.com>' . "\r\n";
       // $headers .= 'Cc: jai.kashyap@prkharsoftwares.com' . "\r\n";

     /*   if(mail($send_to, $subject,$message, $headers))
        {
            echo "Your data has been successfully e-mailed";
        }else{
            echo "there is some problem";
        }
	*/
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
		<title>maujitrip Invoice</title>
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

		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
		<style>
			.cke_editable {
				line-height: normal !important; 
			}
			P {
				-webkit-margin-before: 0em;
				-webkit-margin-after: 0em;
				-webkit-margin-start: 0px;
				-webkit-margin-end: 0px;
			}
			
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
									<h1 class="mainTitle">Welcome to maujitrip </h1>
									<span class="mainDescription">Invoice Software</span>
								</div>
								
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: DYNAMIC TABLE -->
						<div class="container-fluid container-fullw">
							<div class="row">
								<div class="col-md-12">

									<form class="form-horizontal" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="ids" value="<?php echo $ids ?>">
                                        <div class="form-group">
                                            <div class="col-md-2">
                                                <label class="" for="organisation">From</label>
                                            </div>
                                            <div class="col-md-10">
                                                <select name="from" id="from" class="form-control" >
                                                    <option value="hr@prakharsoftwares.com">hr@prakharsoftwares.com</option>
                                                    <option value="deo.kumar@prakharsoftwares.com">deo.kumar@prakharsoftwares.com</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-2">
                                                <label class="" for="organisation">To</label>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" name="send_to" id="send_to" class="form-control" value="<?php if(isset($sender_email)) { echo $sender_email; } ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-2">
                                                <label class="" for="organisation">Subject</label>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" name="send_subject" id="send_subject" value="Mail from Prakhar Software Solution Pvt. Ltd." class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-2">
                                                <label class="" for="organisation">Message</label>
                                            </div>
                                            <div class="col-md-10">
                                                <textarea class="ckeditor form-control" name="message" id="message" cols="10" rows="10"><?php if(isset($format_res['format'])) { echo $format_res['format']; } ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-2">
                                                <label class="" for="organisation">Message 2</label>
                                            </div>
                                            <div class="col-md-10">
                                                <textarea class="ckeditor form-control" name="message_2" id="message_2" cols="10" rows="10"><?php if(isset($format_res['format_2'])) { echo $format_res['format_2']; } ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-2">

                                            </div>
                                            <div class="col-md-10">
                                                <button type="submit" name="send_mail" class="btn btn-success" >Send Mail</button>
                                                <div id="result"></div>
                                            </div>

                                        </div>
									</form>

								</div>
							</div>
						</div>
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
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script src="vendor/ckeditor/ckeditor.js"></script>
		<script src="vendor/ckeditor/adapters/jquery.js"></script>
        
		<!-- start: CLIP-TWO JAVASCRIPTS -->
        <script src="assets/js/main.js"></script>
        
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->

		<!-- start: JavaScript Event Handlers for this page -->

		<script>
			jQuery(document).ready(function() {
				Main.init();
               
			});
			
CKEDITOR.replace( '.ckeditor', {
		toolbar : 'MyToolbar'
	});
		</script>
      
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
