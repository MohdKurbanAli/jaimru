<?php
include_once('includes/class.php');
date_default_timezone_set("Asia/kolkata");
date_default_timezone_get();
$class = new baseClass;
$date_now =date("Y-m-d");

$time_now =date("H:i");
$qry = mysqli_query($class->conn,"SELECT * FROM reminder");
while($res = mysqli_fetch_array($qry))
{
    @extract($res);


    $date = $rm_datetime;
    $time =  $rm_time;
    $notes =  $rm_notes;

    if($date_now == $date)
    {
        if($time_now == $time)
        {
            echo $notes;
        }
    }

}
 ?>