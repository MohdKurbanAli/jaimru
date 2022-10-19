<?php 
include('includes/class.php');
$class = new baseClass;

if(isset($_POST['emp_id']))
{ 
	$emp_id = $_POST['emp_id'];
	
	$qry = mysqli_query($class->conn, "SELECT * FROM emp_details WHERE emp_id = $emp_id AND emp_status ='Active'");
	$res = mysqli_fetch_array($qry);
//	echo $res['emp_id'];
//	echo $res['emp_doj'];
//	echo $res['emp_name'];

	
	$emp_doj = $class->sqlToUser_DateTime($res['emp_doj']);
	
	$data = array(
	'emp_code'=>$res['emp_code'],
	'Name'=>$res['emp_name'],
	'Doj'=>$emp_doj,
	'emp_designation'=>$res['emp_designation']
	
	
	);
	//print_r($data);
	echo json_encode($data);
	//echo $data;

}




?>