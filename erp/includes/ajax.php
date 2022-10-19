<?php
session_start();
include('class.php');
$class = new baseClass();
 $user_id = $_SESSION['sess_user_id'];

if(isset($_POST['month']))
{
	$month_date = $_POST['month'];
	$wo_id = $_POST['wo_id'];
	
	//$qry = mysqli_query($class->conn,"SELECT * FROM attandace INNER JOIN emp_details ON attandace.at_emp_id = emp_details.emp_id WHERE attandace.at_month = '$month_date' AND emp_details.emp_work_order = '$wo_id'");
	//$numrow = mysqli_num_rows($qry);
}
if(isset($_POST['addItem']))
{
    $item_id = $_POST['item_id'];
    $item_name = $_POST['item_name'];
    $item_uom = $_POST['item_uom'];
    $item_hsn = $_POST['item_hsn'];

    $sql = "item_name = '$item_name',
		item_uom= '$item_uom',
        item_hsn= '$item_hsn',
		status = 'Active'";

        if($item_id=='')
        {
            if($class->insertData('item',$sql))
            {
                print json_encode(array('type' => 'success', 'msg' => 'Item Inserted Successfully'));
                exit;
            }else{
                print json_encode(array('type' => 'error', 'msg' => 'Item Insert Failed'));
                exit;
            }
        }else{
            $where = "id= '$item_id'";

            if($class->updateData('item',$sql, $where))
            {
                print json_encode(array('type' => 'success', 'msg' => 'Item Updated Successfully'));
                exit;
            }else{
                print json_encode(array('type' => 'error', 'msg' => 'Item Insert Failed'));
                exit;
            }

        }
    

}
if(isset($_POST['customerSubmit']))
{
@extract($_POST);

    $email = trim($email);
    if($customer_id =='')
    {
        $res = $class->selectWhere("customers", "email = '$email'");
        if(mysqli_num_rows($res) > 0)
        {
            print json_encode(array('type' => 'error', 'msg' => 'This customer already in our database.'));
            exit;
        }
    }

    $sql = "
    added_by ='$user_id',
    name = '$name',
		email= '$email',
		phone = '$phone',
		company = '$company',
		address1 = '$address1',
		address2 = '$address2',
		state = '$state',
		zipcode = '$zipcode',
		country = '$country',
		gst = '$gst',
		agent = '$agent'";
    if($customer_id =='')
    {
        if($class->insertData('customers',$sql))
        {
            print json_encode(array('type' => 'success', 'msg' => 'Customer Inserted Successfully'));
            exit;
        }else{
            print json_encode(array('type' => 'error', 'msg' => 'Customer Insert Failed'));
            exit;
        }

    }else{
        $where = "customer_id = '$customer_id'";
        if($class->updateData('customers',$sql, $where))
        {
            print json_encode(array('type' => 'success', 'msg' => 'Customer Updated Successfully'));
            exit;
        }else{
            print json_encode(array('type' => 'error', 'msg' => 'Customer Insert Failed'));
            exit;
        }

    }


    unset($_POST);

}
if (isset($_POST['getcustomer']))
{
    $customer_id = $_POST['customer_id'];


    $res= mysqli_query($class->conn,"SELECT * FROM customers where customer_id = $customer_id");
    $res = mysqli_fetch_array($res);

    $address = $res['address1']." <br>".$res['state']. "," .$res['zipcode'] ." ".$res['country'];
    echo $address;
    exit;
}
if (isset($_POST['getItem']))
{
    $item_id = $_POST['item_id'];


    $res= mysqli_query($class->conn,"SELECT * FROM item where id = $item_id");
    $res = mysqli_fetch_array($res);

    $item_name = $res['item_name'];
    $item_uom = $res['item_uom'];
    $item_hsn = $res['item_hsn'];

    $data = array();
    $data['id'] = $res['id'];
    $data['item_name'] = $res['item_name'];
    $data['item_uom'] = $res['item_uom'];
    $data['item_hsn'] = $res['item_hsn'];

    print json_encode($data);
    exit;

}
if (isset($_POST['addPayment']))
{
    $invoice_id = $_POST['invoice_id'];

    $res= mysqli_query($class->conn,"SELECT * FROM invoice where in_id = $invoice_id");
    $res = mysqli_fetch_array($res);

    $amount = json_decode($res['amount']);
    $finalamount = 0;
    foreach ($amount as $amt)
    {
        $finalamount = $finalamount + $amt;
    }
    echo $finalamount;
    exit;

}

if(isset($_POST['paymentSubmit']))
{
    @extract($_POST);
    $payment_date = $class->userToSql_DateTime($payment_date);
    $added_at = date("Y-m-d H:i:s");
    $sql = "invoice_id = '$invoice_id',
		payment_date = '$payment_date',
		note = '$note',
		transaction_id = '$transaction_id',
		payment_mode = '$payment_mode',
		payment_amount = '$payment_amounts',
		added_at = '$added_at',
		added_by = '$user_id'";


    if($class->insertData('payment',$sql))
    {
        print json_encode(array('type' => 'success', 'msg' => 'Payment saved Successfully'));
        exit;
    }else{
        print json_encode(array('type' => 'error', 'msg' => 'Payment Failed'));
        exit;
    }
    unset($_POST);

}


// if(isset($_POST['paymentSubmit']))
// {
    // @extract($_POST);
    // $payment_date = $class->userToSql_DateTime($payment_date);
    // $added_at = date("Y-m-d H:i:s");
    // $sql = "invoice_id = '$invoice_id',
        // payment_date = '$payment_date',
        // note = '$note',
        // transaction_id = '$transaction_id',
        // payment_mode = '$payment_mode',
        // payment_amount = '$payment_amounts',
        // added_at = '$added_at',
        // added_by = '$user_id'";


    // if($class->insertData('payment',$sql))
    // {
        // print json_encode(array('type' => 'success', 'msg' => 'Payment saved Successfully'));
        // exit;
    // }else{
        // print json_encode(array('type' => 'error', 'msg' => 'Payment Failed'));
        // exit;
    // }
    // unset($_POST);

// }




//vendor


if(isset($_POST['vendorSubmit']))
{
@extract($_POST);
    $email = trim($email);
    if($vendor_id =='') {
        $res = $class->selectWhere("vendor", "email = '$email'");
        if (mysqli_num_rows($res) > 0) {
            print json_encode(array('type' => 'error', 'msg' => 'This Vendor already in our database.'));
            exit;
        }
    }


    $sql = "
    name = '$name',
        email= '$email',
        phone = '$phone',
        company = '$company',
        address1 = '$address1',
        address2 = '$address2',
        state = '$state',
        zipcode = '$zipcode',
        country = '$country',
        gst = '$gst',
        added_by = '$user_id'";


    if($vendor_id =='') {
        if ($class->insertData('vendor', $sql)) {
            print json_encode(array('type' => 'success', 'msg' => 'Vendor Inserted Successfully'));
            exit;
        } else {
            print json_encode(array('type' => 'error', 'msg' => 'Vendor Insert Failed'));
            exit;
        }
    }else{
        $where = "vendor_id = '$vendor_id'";
        if ($class->updateData('vendor', $sql, $where)) {
            print json_encode(array('type' => 'success', 'msg' => 'Vendor updated successfully'));
            exit;
        } else {
            print json_encode(array('type' => 'error', 'msg' => 'Vendor updating Failed'));
            exit;
        }

    }
    unset($_POST);

}


// group

if(isset($_POST['add_group']))
{
    $group = $_POST['group'];

    $data = "group_name = '$group'";

    if($class->insertData('group_id',$data))
    {
        print json_encode(array('type' => 'success', 'msg' => 'Group inserted Successfully.'));
        exit;
    }else{
        print json_encode(array('type' => 'Error', 'msg' => 'Server Error! Due to heavy Load'));
        exit;
    }
}
 //filter.php  
 // if(isset($_POST["FROM_date"], $_POST["To_date"]))  
 // {  
 //      $output = '';  
 //      $query = "  
 //           SELECT * FROM invoice  
 //           WHERE in_date BETWEEN '".$_POST["FROM_date"]."' AND '".$_POST["To_date"]."'  
 //      ";  
 //      $result = mysqli_query($class->conn, $query);  
 //      $output .= '  
 //           <table class="table table-bordered">  
 //                <tr>  
 //                     <th width="5%">ID</th>  
 //                     <th width="30%">Customer Name</th>  
 //                     <th width="43%">Item</th>  
 //                     <th width="10%">Value</th>  
 //                     <th width="12%">Order Date</th>  
 //                </tr>  
 //      ';  
 //      if(mysqli_num_rows($result) > 0)  
 //      {  
 //           while($row = mysqli_fetch_array($result))  
 //           {  
 //                $output .= '  
 //                     <tr>  
 //                          <td>'. $row["order_id"] .'</td>  
 //                          <td>'. $row["order_customer_name"] .'</td>  
 //                          <td>'. $row["order_item"] .'</td>  
 //                          <td>$ '. $row["order_value"] .'</td>  
 //                          <td>'. $row["order_date"] .'</td>  
 //                     </tr>  
 //                ';  
 //           }  
 //      }  
 //      else  
 //      {  
 //           $output .= '  
 //                <tr>  
 //                     <td colspan="5">No Order Found</td>  
 //                </tr>  
 //           ';  
 //      }  
 //      $output .= '</table>';  
 //      echo $output;  
 // } 
if(isset($_POST['submitUpload']))
{

    $file = $_FILES['file']['tmp_name'];

    $allowed =  array('csv');
    $filename = $_FILES['file']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(!in_array($ext,$allowed) ) {
        print json_encode(array('type' => 'Error', 'msg' => 'Only CSV file Allowed!'));
        exit;
    }
    $handle = fopen($file,"r");
    $count = 0;
    $csv_count = 0;
    while(($filesop = fgetcsv($handle,1000,',')) !== false)

    {
        if($count == 0)
        { $count++;
            continue;
        }
        $csv_count++;
        $Name = $filesop[0];
        $Email = $filesop[1];
        $Phone = $filesop[2];
        $Company = $filesop[3];
        $Address = $filesop[4];
        $Address1 = $filesop[5];
        $State = $filesop[6];
        $Pincode = $filesop[7];
       $Country = $filesop[8];
        $Gstnumber = $filesop[9];

        $data = "
        name='$Name',
        email='$Email',
        phone='$Phone',
        company='$Company',
        address1='$Address',
        address2='$Address1',
        state='$State',
        zipcode='$Pincode',
        country='$Country',
        gst='$Gstnumber',
        user_id = '$user_id'";



 //     echo $data;
 // exit();

        if($class->insertData('customers',$data))
        {
            $count++;
        }else{
            $error[] = "server error!";
            $csv_count--;
        }


    }
  // echo $count;
   // echo "<br>";
   // echo $csv_count;

    if($count > 0)
    {

        print json_encode(array('type' => 'success', 'msg' =>'records inserted Successfully.'));
        exit;
    }else{
        print json_encode(array('type' => 'Error', 'msg' => 'Server Error! Due to heavy Load'));
        exit;
    }

}

if (isset($_POST['purchaseDetails']))
{
    $purchase_id = $_POST['purchase_id'];
    $res= mysqli_query($class->conn,"SELECT purchase_products.*, vendor.`name` AS vendor_name FROM purchase_products INNER JOIN vendor ON purchase_products.vendor = vendor.`vendor_id` WHERE purchase_products.id = $purchase_id");
    $res = mysqli_fetch_array($res);
    echo json_encode($res);
    exit;
}
if (isset($_POST['paymentDetails']))
{
    $payment_id = $_POST['payment_id'];
    $res= mysqli_query($class->conn,"SELECT * FROM payment WHERE id = '$payment_id'");
    $res = mysqli_fetch_array($res);
    echo json_encode($res);
    exit;
}
if (isset($_POST['customerDetails']))
{
    $customer_id = $_POST['customer_id'];


    $res= mysqli_query($class->conn,"SELECT * FROM customers where customer_id = $customer_id");
    $res = mysqli_fetch_array($res);

    echo json_encode($res);
    exit;
}
if (isset($_POST['vendorDetails']))
{
    $vendor_id = $_POST['vendor_id'];
    $res= mysqli_query($class->conn,"SELECT * FROM vendor WHERE vendor_id = $vendor_id");
    $res = mysqli_fetch_array($res);
    echo json_encode($res);
    exit;
}


if(isset($_POST['reminder_mail']))
{
    
	$id = $_POST['id'];
	$qry = mysqli_query($class->conn, "SELECT * FROM invoice INNER JOIN customers ON invoice.customer_id = customers.customer_id INNER JOIN jk_user ON invoice.`agent` = `jk_user`.`user_id` WHERE in_id = $id");
	$res = mysqli_fetch_array($qry);
    @extract($res);
    
    $user_name = $user_name;
    $user_email_id = $user_email_id;
     $amount = json_decode($amount);
    $finalamount = 0;
    foreach ($amount as $amt) {
        $finalamount = $finalamount + $amt;
        
        
    }
    $fileamount = $class->moneyFormatIndia(round($finalamount));
    


            include('class.phpmailer.php');
            
		        $mail = new PHPMailer();
				$mail->SMTPDebug = 2; //Alternative to above constant
				$mail->IsSMTP();
				$mail->Host = "send.one.com";
				$mail->SMTPAuth = true;
				$mail->SMTPSecure = "ssl";
				$mail->Port = 465;
				$mail->Username = "reminder@maujitrip.com";
				$mail->Password = "reminder@321";
                $mail->From = "reminder@maujitrip.com";
				$mail->FromName = "MaujiTrip Accounts";
			    $mail->AddAddress($email, $name);
			    $mail->addBCC($user_email_id, $user_name);

			    //$mail->AddAddress('prince@sbcinfotech.com', 'prince kumar');
				$mail->IsHTML(true);
				$mail->Subject = 'Invoice | MaujiTrip Accounts';
				$mail->Body = "Dear ".$name.",<br><br>
                    How are things going.<br><br>
                    
                    We wanted to remind you of the Invoice# MT".$in_id." balance on your most recent invoice that's due amount is Rs. -".$class->moneyFormatIndia(round($finalamount - $class->paymentTotal($in_id)))."<br><br>
                    
                    Let us know if you have any concern and whether everything's on track for payment.<br><br>
                    
                    Thank you in advance for your cooperation. We hope to continue doing business with you in the future.<br><br>
                    
                    Warm Regards,<br><br>
                    Team MaujiTrip.com<br><br>
                    ";
                    
	            if(!$mail->Send())
				{
					echo 'Reminder Mail not sent due to some technical error. please refresh page and try again.';
					exit;
				}else{
					echo 'Mail Send Successfully.';
					exit;
				}
				
				
    			
}


 // ?>