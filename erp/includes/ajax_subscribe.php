<?php 
include('top_inc.php');
include('class.php');
$class = new baseClass;
$user_id = $_SESSION['sess_user_id'];
$user_department = $_SESSION['sess_user_department'];

// <?php
// $class->conn=mysqli_connect('localhost','root','','dbphpserverside')
    // or die("connection failed".mysqli_errno());

$request=$_REQUEST;
$col =array(
    0   =>  'invoice.in_id',
    27   =>  'customers.name',
	4   =>  'invoice.in_date',
    5   =>  'invoice.ex_date',
    6   =>  'invoice.destination',
    43   =>  'jk_user.user_name',
    15   =>  'invoice.amount',
    1   =>  'invoice.customer_id'

);  //create column like table in database
$sql ="SELECT * FROM `newsletter`";

$query=mysqli_query($class->conn,$sql);
$totalData1=mysqli_num_rows($query);
$totalFilter=$totalData1;

//Search
$sql ="SELECT * FROM `newsletter` WHERE 1=1";
if(!empty($request['search']['value'])){
    $sql.=" AND (name Like '%".$request['search']['value']."%'";
    $sql.=" OR user_name Like '%".$request['search']['value']."%'";
    $sql.=" OR in_id Like '%".$request['search']['value']."%'";
	$sql.=" OR amount Like '%".$request['search']['value']."%')";

}
$query1=mysqli_query($class->conn,$sql);
$totalData=mysqli_num_rows($query1);

//Order
//$sql.=" ORDER BY ".$col[$request['order'][0]['column']]."   ".$request['order'][0]['dir']."  LIMIT ".
    //$request['end']."  ,".$request['length']."  ";
	
	
	
	$sql.=" ORDER BY id desc LIMIT ".$request['start']."  ,".$request['length']."  ";

	// echo $sql;

$query=mysqli_query($class->conn,$sql);



while($row=mysqli_fetch_array($query)){
	
	
   // var_dump($fileamount);
    $subdata=array();
    $subdata[]= '<input type="checkbox" name="ids[]" value="'.$row[0].'">'; //id
    $subdata[]= $row[0]; //id
    $subdata[]= $row[1]; //Name
	
   
	
    // $subdata[]= '<button type="button" class="btn btn-info payment" value="'.$row[0].'">Add Payment</button>'; //name
    // $subdata[]= '<button type="button" class="btn btn-info btn-lg addPurchase" value="'.$row[0].'">Add Purchase</button>'; //name
   $data[]=$subdata;
}

$json_data=array(
    "draw"              =>  intval($request['draw']),
    "recordsTotal"      =>  intval($totalData),
    "recordsFiltered"   =>  intval($totalFilter),
    "data"              =>  $data
);

echo json_encode($json_data);

?>
