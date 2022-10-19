<?php

error_reporting(1);
date_default_timezone_set("Asia/Kolkata");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class baseClass {

	// private $host = "maujitrip.com.mysql";
	// private $host = "jaimrutechnology.ipagemysql.com";
	private $host = "localhost";
	// private $user = "jaikashyap";
	// private $user = "jaimru";
	private $user = "root";
	// private $password = "maujitrip@Sbcel#123";
		// private $password = "Apple@123%";
		private $password = "";

	// private $password = "";
	private $database = "jaimru";
	public $conn = "";
	public function __construct()
	{
		$this->conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		
	}
	public function select($table)
	{
		$res=mysqli_query($this->conn,"SELECT * FROM $table");
		return $res;
	}
    public function selectWhere($table, $where)
    {
        $res=mysqli_query($this->conn,"SELECT * FROM $table where $where");
        return $res;
    }

	public function delete_data($table,$where,$id)
	{
		$res = mysqli_query($this->conn,"DELETE FROM $table WHERE $where='$id'");
		return $res;
	}
	public function insertData($table, $data)
	{
		$sql = "INSERT INTO ".$table." SET ".$data;
		if(mysqli_query($this->conn,$sql))
		{
			return true;	
		}
		else{
			mysqli_error($this->conn);
		}		
		
	}
	
	
	 public function checkRecord($table,$where)
    {
        $qry = mysqli_query($this->conn, "SELECT * FROM $table WHERE $where");

        if(mysqli_num_rows($qry) != 0)
        {
            return "1";
        }
        else
        {
            return "0";
        }
    }
    
	public function updateData($table, $data, $where)
	{
		$sql = "UPDATE ".$table." SET ".$data." where ".$where;
		if(mysqli_query($this->conn,$sql))
		{
			return true;	
		}
		else{
			mysqli_error($this->conn);
		}		
		
	}

	public function update($table,$id,$fname,$lname,$city)
	{
		$res = mysqli_query("UPDATE $table SET first_name='$fname', last_name='$lname', user_city='$city' WHERE user_id=".$id);
		return $res;
	}
	function encrypt($string1)
	{
		$key = "mysalt";
		$result = '';
		for($i=0; $i<strlen($string1); $i++) 
		{
			$char = substr($string1, $i, 1);
			$keychar = substr($key, ($i % strlen($key))-1, 1);
			$char = chr(ord($char)+ord($keychar));
			$result.=$char;
		}
		return base64_encode($result);
	}
	function decrypt($string1) 
	{
		$key = "mysalt";
		$result = '';
		$string1 = base64_decode($string1);
		for($i=0; $i<strlen($string1); $i++) 
		{
			$char = substr($string1, $i, 1);
			$keychar = substr($key, ($i % strlen($key))-1, 1);
			$char = chr(ord($char)-ord($keychar));
			$result.=$char;
		}
		return $result;
	}
	/*              Date Format Conversion Functions              */
	function userToSql_DateTime($sqldate)
	{
		// From DD/MM/YYYY
		$date1 = substr($sqldate,0,2);
		$month1 = substr($sqldate,3,2);
		$year1 = substr($sqldate,6,4);
		$time1 = substr($sqldate,11,8);	
		
		// To YYYY-MM-DD
		$newdate = $year1."-".$month1."-".$date1." ".$time1;
		return $newdate;
	}
	function sqlToUser_DateTime($sqldate)
	{
		// To YYYY-MM-DD
		$date1 = substr($sqldate,8,2);
		$month1 = substr($sqldate,5,2);
		$year1 = substr($sqldate,0,4);
		$time1 = substr($sqldate,11,8);
		
		// From DD/MM/YYYY
		$newdate = $date1."-".$month1."-".$year1." ".$time1;
		return $newdate;
	}
	function changeUserToSql_DateFromat($sqldate)
	{
		// From DD/MM/YYYY
		$date1 = substr($sqldate,0,2);
		$month1 = substr($sqldate,3,2);
		$year1 = substr($sqldate,6,4);
		
		// To YYYY-MM-DD
		$newdate = $year1."-".$month1."-".$date1;
		return $newdate;
	}
	function changeSqlToUser_DateFromat($sqldate)
	{
		// To YYYY-MM-DD
		$date1 = substr($sqldate,8,2);
		$month1 = substr($sqldate,5,2);
		$year1 = substr($sqldate,0,4);
		
		// From DD/MM/YYYY
		$newdate = $date1."-".$month1."-".$year1;
		return $newdate;
	}
	public function check_wo($wo_number)
	{
		$qry = mysqli_query($this->conn, "SELECT * FROM wo_details WHERE wo_number = '$wo_number'");
	
		if(mysqli_num_rows($qry) != 0)
		{
			return "1";
		}
		else
		{
			return "0";
		}		
	}
	public function check_email($user_email_id)
	{
		$qry = mysqli_query($this->conn, "SELECT * FROM jk_user WHERE user_email_id = '$user_email_id'");
	
		if(mysqli_num_rows($qry) != 0)
		{
			return "1";
		}
		else
		{
			return "0";
		}		
	}
	public function check_ecode($emp_code)
	{
		$qry = mysqli_query($this->conn, "SELECT * FROM emp_details WHERE emp_code = '$emp_code'");
	
		if(mysqli_num_rows($qry) != 0)
		{
			return "1";
		}
		else
		{
			return "0";
		}		
	}
	public function wo_list()
	{
		$qry = mysqli_query($this->conn,"SELECT * FROM wo_details");
		while($res = mysqli_fetch_array($qry))
		{
			echo '<option value="'.$res['wo_number'].'">'.$res['wo_number'].'</option>';	
		}
	}
	public function emp_list()
	{
		$qry = mysqli_query($this->conn,"SELECT * FROM emp_details ORDER BY emp_code");
		while($res = mysqli_fetch_array($qry))
		{
			echo '<option value="'.$res['emp_code'].'">'.$res['emp_code'].'</option>';	
		}
	}
	public function mail($to, $subject,$title, $msg, $from)
	{

		//$to = "jai.kashyap@prakharsoftwares.com, jaikashyap22@gmail.com";
		//$subject = "Email notification from SBC export ltd.";

		$message = "
		<html>
		<head>
		<title>".$title."</title>
		</head>
		<body>
		<p>".$msg."</p>
		
		</body>
		</html>
		";

		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// More headers
		$headers .= 'From: <'.$from.'>' . "\r\n";
		$headers .= 'Cc: jaikashyap22@gmail.com' . "\r\n";

		mail($to,$subject,$message,$headers);
	}
	public function sendMail($to, $message)
    {
        ini_set(SMTP, "mail.radicalminds.in");
        ini_set(smtp_port, "25");
        ini_set(sendmail_from, "info@radicalminds.in"); // if you can send from this address it might work
        ini_set(sendmail_path, "/usr/sbin/sendmail"); // possibly
        $to = "jaikashyap22@hotmail.com";
        $subject = '| Auto Generated Mail | Candidate CV |';
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: info@radicalminds.in' . "\r\n" .
            'Reply-To: info@radicalminds.in' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $message, $headers);
    }
    function last_id($table, $column)
    {
        $qry = mysqli_query($this->conn, "SELECT $column FROM $table order by $column desc");
        $res = mysqli_fetch_array($qry);
        echo $res[0] + 1;
    }
	public function total_wo()
	{
		$qry = mysqli_query($this->conn, "SELECT count(*) FROM wo_details");
		$res = mysqli_fetch_array($qry);
		echo $res[0];		
	}
	public function active_wo()
	{
		$qry = mysqli_query($this->conn, "SELECT COUNT(*) FROM wo_details WHERE wo_status ='Active';");
		$res = mysqli_fetch_array($qry);
		echo $res[0];		
	}
	public function total_emp()
	{
		$qry = mysqli_query($this->conn, "SELECT COUNT(*) FROM emp_details");
		$res = mysqli_fetch_array($qry);
		echo $res[0];		
	}
	public function active_emp()
	{
		$qry = mysqli_query($this->conn, "SELECT COUNT(*) FROM emp_details WHERE emp_status = 'Active'");
		$res = mysqli_fetch_array($qry);
		echo $res[0];		
	}
	public function indiaState()
	{
		$qry = mysqli_query($this->conn, "SELECT * FROM india_state");
		while($res = mysqli_fetch_array($qry))
		{
			echo "<option value='$res[0]'>".$res[1]."</option>";
		}
		
		
	}
	


	public function numberTowords($num)
		{ 
		$ones = array( 
		1 => "One", 
		2 => "Two", 
		3 => "Three", 
		4 => "Four", 
		5 => "Five", 
		6 => "Six", 
		7 => "Seven", 
		8 => "Eight", 
		9 => "Nine", 
		10 => "Ten", 
		11 => "Eleven", 
		12 => "Twelve", 
		13 => "Thirteen", 
		14 => "Fourteen", 
		15 => "Fifteen", 
		16 => "Sixteen", 
		17 => "Seventeen", 
		18 => "Eighteen", 
		19 => "Nineteen" 
		); 
		$tens = array( 
		1 => "Ten",
		2 => "Twenty", 
		3 => "Thirty", 
		4 => "Forty", 
		5 => "Fifty", 
		6 => "Sixty", 
		7 => "Seventy", 
		8 => "Eighty", 
		9 => "Ninety" 
		); 
		$hundreds = array( 
		"Hundred", 
		"Thousand", 
		"Million", 
		"Billion", 
		"Trillion", 
		"Quadrillion" 
		); //limit t quadrillion 
		$num = number_format($num,2,".",","); 
		$num_arr = explode(".",$num); 
		$wholenum = $num_arr[0]; 
		$decnum = $num_arr[1]; 
		$whole_arr = array_reverse(explode(",",$wholenum)); 
		krsort($whole_arr); 
		$rettxt = ""; 
		foreach($whole_arr as $key => $i){ 
		if($i < 20){ 
		$rettxt .= $ones[$i]; 
		}elseif($i < 100){ 
		$rettxt .= $tens[substr($i,0,1)]; 
		$rettxt .= " ".$ones[substr($i,1,1)]; 
		}else{ 
		$rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
		$rettxt .= " ".$tens[substr($i,1,1)]; 
		$rettxt .= " ".$ones[substr($i,2,1)]; 
		} 
		if($key > 0){ 
		$rettxt .= " ".$hundreds[$key]." "; 
		} 
		} 
		if($decnum > 0){ 
		$rettxt .= " and "; 
		if($decnum < 20){ 
		$rettxt .= $ones[$decnum]; 
		}elseif($decnum < 100){ 
		$rettxt .= $tens[substr($decnum,0,1)]; 
		$rettxt .= " ".$ones[substr($decnum,1,1)]; 
		} 
		} 
		return $rettxt; 
		} 
		
		public function getIndianCurrency($number)
		{
			$decimal = round($number - ($no = floor($number)), 2) * 100;
			$hundred = null;
			$digits_length = strlen($no);
			$i = 0;
			$str = array();
			$words = array(0 => '', 1 => 'one', 2 => 'two',
				3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
				7 => 'seven', 8 => 'eight', 9 => 'nine',
				10 => 'ten', 11 => 'eleven', 12 => 'twelve',
				13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
				16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
				19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
				40 => 'forty', 50 => 'fifty', 60 => 'sixty',
				70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
			$digits = array('', 'hundred','thousand','lakh', 'crore');
			while( $i < $digits_length ) {
				$divider = ($i == 2) ? 10 : 100;
				$number = floor($no % $divider);
				$no = floor($no / $divider);
				$i += $divider == 10 ? 1 : 2;
				if ($number) {
					$plural = (($counter = count($str)) && $number > 9) ? 's' : null;
					$hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
					$str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
				} else $str[] = null;
			}
			$Rupees = implode('', array_reverse($str));
			$paise = ($decimal) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
			return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise ;
		}
    function moneyFormatIndia($num) {
        $explrestunits = "" ;
        if(strlen($num)>3) {
            $lastthree = substr($num, strlen($num)-3, strlen($num));
            $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
            $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
            $expunit = str_split($restunits, 2);
            for($i=0; $i<sizeof($expunit); $i++) {
                // creates each of the 2's group and adds a comma to the end
                if($i==0) {
                    $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
                } else {
                    $explrestunits .= $expunit[$i].",";
                }
            }
            $thecash = $explrestunits.$lastthree;
        } else {
            $thecash = $num;
        }
        return $thecash; // writes the final format where $currency is the currency symbol.
    }
 function paymentTotal($invoice_id)
 {
 	$qry = mysqli_query($this->conn, "SELECT SUM(payment_amount) as total FROM payment WHERE invoice_id ='$invoice_id'");
 	$res = mysqli_fetch_array($qry);
// 	if($res['total'] != null || $res['total'] != '')
// 	{
// 		return $res['total'];
//        exit;
// 	}else{
// 		return 0;
//        exit;
// 	}
     if($res['total'] == NULL)
     {
         return 0;
     }else{
         return $res['total'];
     }

 	
 	
 }

 function purchasepaymentTotal($purchase_invoice_id)
 {
 	$qry = mysqli_query($this->conn, "SELECT SUM(purchase_payment_amount) as total FROM `purchase_products` WHERE `purchase_invoice_id`='$purchase_invoice_id'");
 	$res = mysqli_fetch_array($qry);
     if($res['total'] == NULL)
     {
         return 0;
     }else{
         return $res['total'];
     }

 	
 	
 }



}

/*
//testing db
$db = new baseClass;

//echo $db->numberTowords(27823);


if($db->conn)
{
	echo "connected";	
}
else
{
	echo "failed";
}

// $userdate = '02.10.1988';
// echo $userdate."<br>";
// echo $db->changeUserToSql_DateFromat($userdate);

*/



?>