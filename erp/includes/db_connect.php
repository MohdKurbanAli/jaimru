<?php 
if($_SERVER['HTTP_HOST'] = 'localhost'){
	define('SITE_PATH','http://localhost/office/unilearn/');
	define('PHONE','+91 124-498-1567');
	define('ADMIN_EMAIL','info@cloudsasolutions.com ');
	define('SITE_NAME', 'Cloudsa Solution');
	define('SITE_URL','http://www.cloudsasolutions.com/');
	define('DB_USER' , 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'office');
	define('DB_HOST',$_SERVER['HTTP_HOST']);
	
}
else{
	define('SITE_PATH','/');
	define('ADMIN EMAIL','jai@cloudsasolutions.com');
	define('SITE_NAME', 'Cloudsa Solution');
	define('DB_USER' , 'abc');
	define('DB_PASS', 'abc');
	define('DB_NAME', 'abc');
	define('DB_HOST','office');
	define('SITE_URL','http://www.cloudsasolutions.com/');
}
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME) or die(mysql_error());
@session_start();
?>