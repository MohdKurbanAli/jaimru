<?php

date_default_timezone_set("Asia/Kolkata");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class baseClass
{
    private $host = "localhost";
    // private $host = "jaikashyap2204309.ipagemysql.com";
	//  private $host = "jaimrutechnology.ipagemysql.com";
    // private $user = "jaimru";
    private $user = "root";
    // private $password = "Apple@123%";
    private $password = "";
    private $database = "jaimru";

    public $conn = "";
    public $url_base = "https://www.jaimru.com/";
    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
    }
    public function insertData($table, $data)
    {
        $sql = "INSERT INTO " . $table . " SET " . $data;
        if (mysqli_query($this->conn, $sql)) {
            return true;
        } else {
            mysqli_error($this->conn);
        }
    }
    public function updateData($table, $data, $where)
    {
        $sql = "UPDATE " . $table . " SET " . $data . " where " . $where;
        if (mysqli_query($this->conn, $sql)) {
            return true;
        } else {
            mysqli_error($this->conn);
        }
    }
    public function select($table)
    {
        $res = mysqli_query($this->conn, "SELECT * FROM $table");
        return $res;
    }
    public function select_where($table_name, $where)
    {
        $res = mysqli_query($this->conn, "SELECT * FROM $table_name where $where");
        $res = mysqli_fetch_array($res);
        return $res;
    }

    public function delete_data($table, $where, $id)
    {
        $res = mysqli_query($this->conn, "DELETE FROM $table WHERE $where='$id'");
        return $res;
    }
    public function checkRecord($table, $where)
    {
        $qry = mysqli_query($this->conn, "SELECT * FROM $table WHERE $where");

        if (mysqli_num_rows($qry) != 0) {
            return "1";
        } else {
            return "0";
        }
    }

    public function update($table, $id, $fname, $lname, $city)
    {
        $res = mysqli_query($this->conn, "UPDATE $table SET first_name='$fname', last_name='$lname', user_city='$city' WHERE user_id=" . $id);
        return $res;
    }
    function encrypt($string1)
    {
        $key = "mysalt";
        $result = '';
        for ($i = 0; $i < strlen($string1); $i++) {
            $char = substr($string1, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) + ord($keychar));
            $result .= $char;
        }
        return base64_encode($result);
    }
    function decrypt($string1)
    {
        $key = "mysalt";
        $result = '';
        $string1 = base64_decode($string1);
        for ($i = 0; $i < strlen($string1); $i++) {
            $char = substr($string1, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) - ord($keychar));
            $result .= $char;
        }
        return $result;
    }
    /*              Date Format Conversion Functions              */
    function userToSql_DateTime($sqldate)
    {
        // From DD/MM/YYYY
        $date1 = substr($sqldate, 0, 2);
        $month1 = substr($sqldate, 3, 2);
        $year1 = substr($sqldate, 6, 4);
        $time1 = substr($sqldate, 11, 8);

        // To YYYY-MM-DD
        $newdate = $year1 . "-" . $month1 . "-" . $date1 . " " . $time1;
        return $newdate;
    }
    function sqlToUser_DateTime($sqldate)
    {
        // To YYYY-MM-DD
        $date1 = substr($sqldate, 8, 2);
        $month1 = substr($sqldate, 5, 2);
        $year1 = substr($sqldate, 0, 4);
        $time1 = substr($sqldate, 11, 8);

        // From DD/MM/YYYY
        $newdate = $date1 . "-" . $month1 . "-" . $year1 . " " . $time1;
        return $newdate;
    }
    function changeUserToSql_DateFromat($sqldate)
    {
        // From DD/MM/YYYY
        $date1 = substr($sqldate, 0, 2);
        $month1 = substr($sqldate, 3, 2);
        $year1 = substr($sqldate, 6, 4);

        // To YYYY-MM-DD
        $newdate = $year1 . "-" . $month1 . "-" . $date1;
        return $newdate;
    }
    function changeSqlToUser_DateFromat($sqldate)
    {
        // To YYYY-MM-DD
        $date1 = substr($sqldate, 8, 2);
        $month1 = substr($sqldate, 5, 2);
        $year1 = substr($sqldate, 0, 4);

        // From DD/MM/YYYY
        $newdate = $date1 . "-" . $month1 . "-" . $year1;
        return $newdate;
    }

    public function check_email($user_email_id)
    {
        $qry = mysqli_query($this->conn, "SELECT * FROM jk_user WHERE user_email_id = '$user_email_id'");

        if (mysqli_num_rows($qry) != 0) {
            return "1";
        } else {
            return "0";
        }
    }
    public function check_gst($user_id)
    {
        $qry = mysqli_query($this->conn, "SELECT * FROM gst_details WHERE user_id = '$user_id'");

        if (mysqli_num_rows($qry) != 0) {
            return "1";
        } else {
            return "0";
        }
    }
    public function user_email_check($user_email)
    {
        $qry = mysqli_query($this->conn, "SELECT id, email FROM users WHERE email = '$user_email'");

        if (mysqli_num_rows($qry) != 0) {
            $res = mysqli_fetch_array($qry);

            return $res['id'];
        } else {
            return "0";
        }
    }
    public function check_ecode($emp_code)
    {
        $qry = mysqli_query($this->conn, "SELECT * FROM emp_details WHERE emp_code = '$emp_code'");

        if (mysqli_num_rows($qry) != 0) {
            return "1";
        } else {
            return "0";
        }
    }
    public function wo_list()
    {
        $qry = mysqli_query($this->conn, "SELECT * FROM wo_details");
        while ($res = mysqli_fetch_array($qry)) {
            echo '<option value="' . $res['wo_id'] . '">' . $res['wo_number'] . '</option>';
        }
    }
    public function mail($to, $subject, $title, $msg, $from)
    {

        //$to = "jai.kashyap@prakharsoftwares.com";
        //$subject = "Email notification from MaujiTrip.";

        $message = "
		<html>
		<head>
		<title>" . $title . "</title>
		</head>
		<body>
		<p>" . $msg . "</p>
		
		</body>
		</html>
		";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <' . $from . '>' . "\r\n";
        $headers .= 'Cc: jai.kashyap@prakharsoftwares.com' . "\r\n";

        mail($to, $subject, $message, $headers);
    }
    function objectToArray($d)
    {
        if (is_object($d)) {
            // Gets the properties of the given object
            // with get_object_vars function
            $d = get_object_vars($d);
        }

        if (is_array($d)) {
            /*
            * Return array converted to object
            * Using __FUNCTION__ (Magic constant)
            * for recursive call
            */
            return array_map(__FUNCTION__, $d);
        } else {
            // Return array
            return $d;
        }
    }
    public function numberToCurrency($num)
    {
        if (setlocale(LC_MONETARY, 'en_IN'))
            return money_format('%.0n', $num);
        else {
            $explrestunits = "";
            if (strlen($num) > 3) {
                $lastthree = substr($num, strlen($num) - 3, strlen($num));
                $restunits = substr($num, 0, strlen($num) - 3); // extracts the last three digits
                $restunits = (strlen($restunits) % 2 == 1) ? "0" . $restunits : $restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
                $expunit = str_split($restunits, 2);
                for ($i = 0; $i < sizeof($expunit); $i++) {
                    // creates each of the 2's group and adds a comma to the end
                    if ($i == 0) {
                        $explrestunits .= (int)$expunit[$i] . ","; // if is first value , convert into integer
                    } else {
                        $explrestunits .= $expunit[$i] . ",";
                    }
                }
                $thecash = $explrestunits . $lastthree;
            } else {
                $thecash = $num;
            }
            return '₹ ' . $thecash;
        }
    }
    public function MarkupRate($rate, $type)
    {
        $qry = mysqli_query($this->conn, "SELECT * FROM margin_details WHERE NAME = '$type';");
        $res = mysqli_fetch_array($qry);
        $rate = (int)$rate;
        $percentage = $res['value'];

        $markup_rate = $rate * $percentage / 100;

        return round($markup_rate);
    }
    public function calNight($date1, $date2)
    {
        $date1 = new DateTime($date1);
        $date2 = new DateTime($date2);
        // this calculates the diff between two dates, which is the number of nights
        $numberOfNights = $date2->diff($date1)->format("%a");
        echo $numberOfNights;
    }
    public function CheckToken()
    {
        $res = mysqli_query($this->conn, "SELECT * FROM tbo_token");
        $res = mysqli_fetch_array($res);
        $expire_at = $res['expire_at'];
        $datetime = date('Y-m-d H:i:s');
        $date1 = new DateTime($datetime);
        $date2 = new DateTime($expire_at);
        // this calculates the diff between two dates, which is the number of nights
        $since_start  = $date1->diff($date2);
        $minutes = $since_start->format('%r%a') * 24 * 60;
        $minutes += $since_start->format('%r%h') * 60;
        $minutes += $since_start->format('%r%i');

        return array("minutes" => $minutes, "Token" => $res['token']);
    }
    public function CheckToken_demo()
    {
        $res = mysqli_query($this->conn, "SELECT * FROM demo_tbo_token");
        $res = mysqli_fetch_array($res);
        $expire_at = $res['expire_at'];
        $datetime = date('Y-m-d H:i:s');
        $date1 = new DateTime($datetime);
        $date2 = new DateTime($expire_at);
        // this calculates the diff between two dates, which is the number of nights
        $since_start  = $date1->diff($date2);
        $minutes = $since_start->format('%r%a') * 24 * 60;
        $minutes += $since_start->format('%r%h') * 60;
        $minutes += $since_start->format('%r%i');

        return array("minutes" => $minutes, "Token" => $res['token']);
    }
    // base URL
    public function base_url($atRoot = FALSE, $atCore = FALSE, $parse = FALSE)
    {
        if (isset($_SERVER['HTTP_HOST'])) {
            $http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
            $hostname = $_SERVER['HTTP_HOST'];
            $dir =  str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

            $core = preg_split('@/@', str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(dirname(__FILE__))), NULL, PREG_SPLIT_NO_EMPTY);
            $core = $core[0];

            $tmplt = $atRoot ? ($atCore ? "%s://%s/%s/" : "%s://%s/") : ($atCore ? "%s://%s/%s/" : "%s://%s%s");
            $end = $atRoot ? ($atCore ? $core : $hostname) : ($atCore ? $core : $dir);
            $base_url = sprintf($tmplt, $http, $hostname, $end);
        } else $base_url = 'http://localhost/';

        if ($parse) {
            $base_url = parse_url($base_url);
            if (isset($base_url['path'])) if ($base_url['path'] == '/') $base_url['path'] = '';
        }

        return $base_url;
    }
    public function InsertToFile($file, $content1, $content2)
    {
        $file = fopen($file, 'w');
        fwrite($file, "\n\r");
        fwrite($file, $content1);
        fwrite($file, "\n\r");
        fwrite($file, $content2);
        fclose($file);
    }
    public function CountryCode()
    {
        $CountryName = array();
        $CountryCode = array();
        $query = mysqli_query($this->conn, "SELECT country_name, country_code FROM tbo_flights GROUP BY country_name");
        while ($res = mysqli_fetch_array($query)) {
            $CountryName[$res['country_code']] = $res['country_name'];
        }
        return $CountryName;
    }
    function sendsmsGET($mobileNumber, $message)
    {
        $err = '';
        $getData = 'mobileNos=' . $mobileNumber . '&message=' . urlencode($message) . '&senderId=MJTrip&routeId=1';
        //API URL
        $url = "http://msg.msgclub.net/rest/services/sendSMS/sendGroupSms?AUTH_KEY=c791ea8d64f63cf2cc865f126a9d22bd&" . $getData;

        // init the resource
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0
        ));
        //get response
        $output = curl_exec($ch);

        //Print error if any
        if (curl_errno($ch)) {
            $err =  'error:' . curl_error($ch);
        }

        curl_close($ch);

        if ($err != '') {
            return array("type" => "error", "msg" => "cURL Error #:" . $err);
            exit;
        } else {
            return array("type" => "success", "msg" => $output);
            exit;
        }
    }
    public function hourConvert($a)
    {
        //        $a = 1095;
        $b = 60;
        $remainder = $a % $b;
        if ($remainder == 0) {
            $remainder = "00";
        } elseif ($remainder < 10) {
            $remainder = "0" . $remainder;
        }
        $quotient = ($a - $remainder) / $b;
        $quotient = $quotient % 24;
        if ($quotient < 12) {
            $hour = $quotient;
            $time = "AM";
        } elseif ($quotient > 12) {
            $hour = $quotient - 12;
            $time = "PM";
        } elseif ($quotient == 12) {
            $hour = $quotient;
            $time = "PM";
        } else {
            $hour = "00";
            $time = "00";
        }
        //        return array('hours' => $hour, 'time'=>$time);
        return $extact_time = $hour . ":" . $remainder . " " . $time;
    }
    function strposa($haystack, $needles = array(), $offset = 0)
    {
        $chr = array();
        foreach ($needles as $needle) {
            $res = strpos($haystack, $needle, $offset);
            if ($res !== false) $chr[$needle] = $res;
        }
        if (empty($chr)) return false;
        return min($chr);
    }
    function bus_city($id)
    {
        $qry = mysqli_query($this->conn, "SELECT name FROM redbus_cities WHERE id = '$id'");
        $res = mysqli_fetch_array($qry);
        return $res['name'];
    }
    function canPolicy($cancellationPolicy)
    {
        $cancellationPolicy = explode(';', $cancellationPolicy);
        $store = '';
        for ($i = 0; $i < count($cancellationPolicy); $i++) {

            $candivider = explode(':', $cancellationPolicy[$i]);
            $fromTime = $candivider[0];
            $toTime = $candivider[1];
            $CancellationRate = $candivider[2];
            $percentage = $candivider[3];

            if ($fromTime == '0') {
                $store .= "From <b>" . $toTime . "</b> hrs to the time of departure ";

                if ($percentage == 0) {
                    $store .= "<b>" . $CancellationRate . "%</b> will be charged <br>";
                } else {
                    $store .= "Rs.<b> " . $CancellationRate . "</b><br>";
                }
            } elseif ($toTime == '-1') {
                $store .= "Till <b>" . $fromTime . "</b> hrs before the departure time ";
                if ($percentage == 0) {
                    $store .= "<b>" . $CancellationRate . "%</b> will be charged <br>";
                } else {
                    $store .= "Rs. <b></b>" . $CancellationRate . "</b><br>";
                }
            } else {
                $store .= "Anytime before <b>" . $fromTime . "</b> hrs before the departure time ";
                if ($percentage == 0) {
                    $store .= "<b>" . $CancellationRate . "%</b> will be charged <br>";
                } else {
                    $store .= "Rs. <b>" . $CancellationRate . "</b><br>";
                }
            }
        }
        return $store;
    }

    public function senMailSMTP($data = array())
    {

        //Load Composer's autoloader
        // require 'vendor/autoload.php';

        include 'phpmailer/PHPMailer.php';
        include 'phpmailer/Exception.php';
        // include 'phpmailer/POP3.php';
        include 'phpmailer/SMTP.php';

        if (!empty($data)) {
            $mail = new PHPMailer();                              // Passing `true` enables exceptions
            //Server settings
            // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.ipage.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'leads@jaimru.com';                 // SMTP username
            $mail->Password = 'Apple@123';                           // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                                    // TCP port to connect to


            //Recipients
            if (isset($data['page'])) {
                if ($data['page'] == 'contact') {
                    $mail->setFrom('leads@jaimru.com', 'Jaimru.com Contact');
                    $mail->addAddress($data['recipient_email'], $data['recipient_name']);     // Add a recipient
                    //$mail->addReplyTo('jaikashyap22@gmail.com', 'Jai Kashyap);
                    //$mail->addCC('');
                    $mail->addBCC('info@jaimru.com', 'Jaimru.com Contact');
                }
            } else {
                $mail->setFrom($data['sender_email'], $data['sender_name']);
                $mail->addAddress('jaikashyap22@gmail.com', 'jai kashyap');     // Add a recipient
                //$mail->addReplyTo('jaikashyap22@gmail.com', 'Jai Kashyap');
                //$mail->addCC('');
               // $mail->addBCC('jaikashyap22@gmail.com', 'Jai Kashyap');
            }
            //Register Page
            if (isset($data['page'])) {
                if ($data['page'] == 'register') {
                    $mail->setFrom('norply@maujitrip.com', 'MaujiTrip No Reply');
                    $mail->addAddress($data['sender_email'], $data['sender_name']);     // Add a recipient
                    //$mail->addReplyTo('jaikashyap22@gmail.com', 'Jai Kashyap');
                    // $mail->addCC('');
                    $mail->addBCC('jaikashyap22@gmail.com', 'Jai Kashyap');
                }
            } else {
                $mail->setFrom($data['sender_email'], $data['sender_name']);
                $mail->addAddress('jaikashyap22@gmail.com', 'Jai Kashyap');     // Add a recipient
                //$mail->addReplyTo('jaikashyap22@gmail.com', 'Jai Kashyap');
                //$mail->addCC('');
                $mail->addBCC('jaikashyap22@gmail.com', 'Jai Kashyap');
            }

            //Attachments
            if (!empty($data['attach'])) {
                //  $mail->addAttachment($this->base_url() . 'uploads/feedback/' . $data['attach']);
            }

            //Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = $data['subject'];
            $mail->Body    = $data['message'];
            $mail->AltBody = $data['sender_name'];
            if ($mail->send()) {
                return 'sent';
            } else {
                return $mail->ErrorInfo;
            }
        } else {
            return 'error';
        }
    }

    public static function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
}

//testing db
//$db = new baseClass;
//
//echo $db->calNight("2018/07/05", "2019/07/05");
//
//echo $db->MarkupRate("1484","HotelDomestic");

/*
if($db->conn)
{
	echo "connected";	
}
else
{
	echo "failed";
}

$userdate = '02.10.1988';
echo $userdate."<br>";
echo $db->changeUserToSql_DateFromat($userdate);
*/