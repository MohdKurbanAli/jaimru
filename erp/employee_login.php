<?php session_start();
include_once('includes/class.php');
$class = new baseClass;

if(isset($_POST['employee']))
{
echo "YOYO";

$eusername = $_POST['eusername'];
echo $eusername;
if($eusername != '' && $epassword != ''){
$qry = mysqli_query($class->conn,"SELECT * FROM emp_details WHERE emp_email_first = '$eusername' AND emp_password = '$epassword'") or die(mysqli_error());
//echo mysqli_num_rows($qry);
echo 'yoyo';
			if (mysqli_num_rows($qry) > 0) 
    			{
					$res = mysqli_fetch_array($qry);
					$_SESSION['sess_user_id'] = $res['emp_id'];
					$_SESSION['sess_user_name'] = $res['emp_name'];
					$_SESSION['sess_user_type'] = $res['user_type'];
					
					header("location: welcome.php");
					exit();
				}
				else{
					$error= "User name and password not correct";
					}
			}else
			{
			$error= "Invalid Login Details.";
			}
}