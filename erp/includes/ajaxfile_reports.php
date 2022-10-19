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
$sql ="SELECT * FROM invoice INNER JOIN customers ON invoice.customer_id = customers.customer_id";

$query=mysqli_query($class->conn,$sql);
$totalData1=mysqli_num_rows($query);
$totalFilter=$totalData1;

//Search
$sql ="SELECT * FROM invoice INNER JOIN customers ON invoice.customer_id = customers.customer_id  WHERE 1=1";
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
	
	
	
	$sql.=" ORDER BY invoice.in_id desc LIMIT ".$request['start']."  ,".$request['length']."  ";

	// echo $sql;

$query=mysqli_query($class->conn,$sql);




while($row=mysqli_fetch_array($query)){
	
	$amount = json_decode($row['15']);
	// var_dump($amount);
	$finalamount = 0;
	foreach ($amount as $amt) {
		$finalamount = $finalamount + $amt;
	}
	if($row['gst_applicable'] == 'Yes')
	{
		$finalamount = $finalamount + $row['tax'];
	}
	$fileamount = $class->moneyFormatIndia(round($finalamount));
   // var_dump($fileamount);
    $subdata=array();
    $subdata[]= '<input type="checkbox" name="ids[]" value="'.$row[0].'">'; //id
    $subdata[]=$row[0]; //id
    $subdata[]= "<a href='invoice_view.php?id=".$row[0]."' target='_blank'>". $row[2] ."</a>"; //id
    $subdata[]= "<a href='all_invoice.php?id=".$row[1] ."' target='_blank'>" .ucfirst(strtolower($row[31])) ."</a>"; //name
	$subdata[]=$row[17]; //GST
    $subdata[]=$row[4]; //in_date
    $subdata[]=$row[5]; //name
   
    $subdata[]= $fileamount; //name
    $subdata[]= "<a href='payment-list?inv=".$row[0] ."' class='text-bold' style='color:#4cd137' target='_blank'>" .$class->moneyFormatIndia(round($class->paymentTotal($row[0])))."</a>"; //name
    $subdata[]= "<a href='purchase-list?inv=".$row[0] ."' target='_blank' class='text-bold' style='color:#d35400'>".$class->moneyFormatIndia(round($class->purchasepaymentTotal($row[0])))."</a>"; //name
    $subdata[]= "<p class='text-bold' style='color: red'>".$class->moneyFormatIndia(round($finalamount - $class->paymentTotal($row[0])))."</p>";  //name
    $subdata[]=  "<p class='text-bold' style='color: #009432'>".$class->moneyFormatIndia(round(($finalamount - $class->purchasepaymentTotal($row[0])) - ($finalamount - $class->paymentTotal($row[0]))))."</p>"; //name
    $subdata[]= '<a href="invoice-edit?inv='.$row[0].'" title="Edit" class="btn btn-file"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'; //name
    $subdata[]= '<a href="Add-payment.php?inv='.$row[0].'" title="payment" class="btn btn-file"><i class="fa fa-plus" aria-hidden="true"></i></a>'; //name
    $subdata[]= '<a href="Add-purchase.php?inv='.$row[0].'" title="purchase" class="btn btn-file" style="color: green;"><i class="fa fa-plus" aria-hidden="true"></i></a>'; //name
	
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
