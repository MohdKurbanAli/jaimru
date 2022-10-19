<?php 
include('includes/class.php');
$class = new baseClass;

if(isset($_POST['wo']))
{ 
	$emp_work_order = $_POST['wo'];
	
	$qry = mysqli_query($class->conn, "SELECT * FROM emp_details WHERE emp_work_order = '$emp_work_order' AND emp_status ='Active'");
	$res = mysqli_fetch_array($qry);
	echo $res['emp_id'];
//	echo $res['emp_doj'];
//	echo $res['emp_name'];

	
	$emp_doj = $class->sqlToUser_DateTime($res['emp_doj']);
	
	$data = array(
	'Name'=>$res['emp_name'],
	'Doj'=>$emp_doj,
	'emp_designation'=>$res['emp_designation']
	
	
	);
	//print_r($data);
//	echo json_encode($data);
	//echo $data;

}




?>