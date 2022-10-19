<?php 
$Agent = $_POST['Agent'];
$from_date = $_REQUEST['from_date'];
$to_date = $_REQUEST['to_date'];
include('top_inc.php');
include('class.php');
$class = new baseClass;
$user_id = $_SESSION['sess_user_id'];
$user_department = $_SESSION['sess_user_department'];
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
);  
	if($Agent !='')
{
    $where_party .= " invoice.added_by  = '$Agent'";
}else{
    $where_party = '1=1';
}	
  if($from_date !='' && $to_date != '')
    {
        $from_date = $class->userToSql_DateTime($from_date);
        $to_date = $class->userToSql_DateTime($to_date);

    $where_party.= " AND invoice.in_date BETWEEN '$from_date' AND '$to_date'";

    }else if($from_date =='' && $to_date == ''){
//        $where .= " AND transaction1_date BETWEEN '$from_date' AND '$to_date'";
    }


$totalamount=0;
$totalpurchase=0;

	$query = mysqli_query($class->conn, "SELECT * FROM `invoice` WHERE $where_party");
	while ($row = mysqli_fetch_array($query))
{
	@extract($row);
	 $amount = json_decode($amount);
	  foreach ($amount as $amt) 
	{
		$totalamount = $totalamount + $amt;
	}
		//$totalamount = $totalamount + $finalamount;
					//$totalpurchase = $totalpurchase + $class->purchasepaymentTotal($row[0]);					

}

	
	
										
$sql ="SELECT  * FROM invoice INNER JOIN customers ON invoice.customer_id = customers.customer_id INNER JOIN jk_user ON invoice.`agent` = `jk_user`.`user_id` WHERE $where_party";
$query=mysqli_query($class->conn,$sql);
$totalData1=mysqli_num_rows($query);
$totalFilter=$totalData1;

//Search
$sql ="SELECT * FROM invoice INNER JOIN customers ON invoice.customer_id = customers.customer_id INNER JOIN jk_user ON invoice.`agent` = `jk_user`.`user_id` WHERE $where_party";
if(!empty($request['search']['value'])){
    $sql.=" AND (invoice.in_id Like '%".$request['search']['value']."%'";
    $sql.=" OR customers.name Like '%".$request['search']['value']."%'";
    $sql.=" OR customers.destination Like '%".$request['search']['value']."%'";
    $sql.=" OR customers.user_name Like '%".$request['search']['value']."%'";
    $sql.=" OR customers.amount Like '%".$request['search']['value']."%'";
    $sql.=" OR customers.customer_id Like '%".$request['search']['value']."%'";
	
    $sql.=" OR invoice.in_date Like '%".$request['search']['value']."%'";
	$sql.=" OR invoice.ex_date Like '%".$request['search']['value']."%')";
}
$query=mysqli_query($class->conn,$sql);
$totalData=mysqli_num_rows($query);

$totalpayment=0;
$totaldueamount=0;
$totalprofitamount=0;
while($row=mysqli_fetch_array($query)){
	$amount1 = json_decode($row[15]);
$finalamount = 0;
	foreach ($amount1 as $amt) {
		$finalamount = $finalamount + $amt;
	}
	
			$totalpayment = $totalpayment + $class->paymentTotal($row[0]);
			$totalpurchase = $totalpurchase + $class->purchasepaymentTotal($row[0]);					
			 $totaldueamount = $totaldueamount + $finalamount - $class->paymentTotal($row[0]);
			 $totalprofitamount = $totalprofitamount + $class->paymentTotal($row[0]) - $class->purchasepaymentTotal($row[0]);
}	

$sql.=" ORDER BY invoice.in_id desc LIMIT ".$request['start']."  ,".$request['length']."  ";
$query=mysqli_query($class->conn,$sql);

while($row=mysqli_fetch_array($query)){
	$amount = json_decode($row['15']);
	// var_dump($amount);
	$finalamount = 0;
	foreach ($amount as $amt) {
		$finalamount = $finalamount + $amt;
	}
		 // $totaldueamount = $totaldueamount + $finalamount - $class->paymentTotal($row[0]);

	$fileamount = $class->moneyFormatIndia(round($finalamount));
   // var_dump($fileamount);
    $subdata=array();
    //$subdata[]= '<input type="checkbox" name="ids[]" value="'.$row[0].'">'; //id
    $subdata[]= "<a href='invoice_view.php?id=".$row[0]."' target='_blank'>". $row[0] ."</a>"; //id
    $subdata[]= "<a href='all_invoice.php?id=".$row[1] ."' target='_blank'>" .ucfirst(strtolower($row[27])) ."</a>"; //name
	$subdata[]=$row[4]; //in_date
    $subdata[]=$row[5]; //name
    $subdata[]=$row[43]; //name
    $subdata[]= $fileamount; //name
    $subdata[]= "<a href='payment-list?inv=".$row[0] ."' class='text-bold' style='color:#4cd137' target='_blank'>" .$class->moneyFormatIndia(round($class->paymentTotal($row[0])))."</a>"; //name
    $subdata[]= "<a href='purchase-list?inv=".$row[0] ."' target='_blank' class='text-bold' style='color:#d35400'>".$class->moneyFormatIndia(round($class->purchasepaymentTotal($row[0])))."</a>"; //name
    $subdata[]= "<p class='text-bold' style='color: red'>".$class->moneyFormatIndia(round($finalamount - $class->paymentTotal($row[0])))."</p>";  //name
    $subdata[]=  "<p class='text-bold' style='color: #009432'>".round($class->paymentTotal($row[0]) - $class->purchasepaymentTotal($row[0]))."</p>"; //name
    $subdata[]= '<a href="invoice-edit?inv='.$row[0].'" title="Edit" class="btn btn-file"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'; //name
    $subdata[]= '<a href="Add-payment.php?inv='.$row[0].'" title="payment" class="btn btn-file"><i class="fa fa-plus" aria-hidden="true"></i></a>'; //name
    $subdata[]= '<a href="Add-purchase.php?inv='.$row[0].'" title="purchase" class="btn btn-file" style="color: green;"><i class="fa fa-plus" aria-hidden="true"></i></a>'; //name
	
    // $subdata[]= '<button type="button" class="btn btn-info payment" value="'.$row[0].'">Add Payment</button>'; //name
    // $subdata[]= '<button type="button" class="btn btn-info btn-lg addPurchase" value="'.$row[0].'">Add Purchase</button>'; //name
   $data[]=$subdata;
}

$json_data=array(
    "draw"              =>  intval($request['draw']),
    "recordsFiltered"      =>  intval($totalFilter),
    "recordsTotal"   =>  intval($totalData),
    "data"              =>  $data,
	"final_total"   =>    round($totalamount),
	"totalpayment"    =>  round($totalpayment), 
	"totalpurchase"    =>  round($totalpurchase), 
	"totaldueamount"    =>  round($totaldueamount), 
	"totalprofitamount"    =>  round($totalprofitamount) 
);
echo json_encode($json_data);

?>
