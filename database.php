<?php

$servername="localhost";
$dbusername="root";
$dbpassword="";
$dbname="signup_api";

$conn=mysqli_connect($servername,$dbusername,$dbpassword,$dbname);
if ($conn)
 {
	//echo "connection established";
}
else
{
	echo "failed";
}


?>