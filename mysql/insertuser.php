<?php
/*****************************************
 * AUTHOR  : Rajesh6115                  *
 * DATE    : Sun Feb 15 11:16:10 IST 2015*
 * DESC    : Just A PHP Program to       *
 *         : Connect a mysql data base.  *
 *****************************************
 */
$serverip = 'localhost';
$username = 'phpclient';
$userpass = 'google123';
$dbname = 'smstest';
$user_first_name = 'Rajesh Kumar';
$user_last_name = 'Sahoo';
$user_email = 'sahoorajesh.d@gmail.com';
$user_mobile_no = '8884882772';
$user_password = 'padmapur';
$user_crypt_password = sha1($user_email.$user_password);
// Create Connection
$mysqlconn = new mysqli($serverip, $username, $userpass, $dbname);
// Check Connection
if($mysqlconn->connect_error){
	die("Connection Failed:". $mysqlconn->connect_error);
}else{
	echo "Connected To Mysql Data Base";
}

// sql query formation
$sqlquery = "INSERT INTO `UserMaster`
( `vcFirstName`, `vcLastName`, `vcEmailId`, `vcMobileNo`, `dtRegistrationDate`, `vcUserPassword`) 
VALUES ('$user_first_name','$user_last_name','$user_email','$user_mobile_no',NOW(),'$user_crypt_password')";

if($mysqlconn->query($sqlquery) === TRUE){
	echo "One Record Inserted in Table UserMaster Sucessfully";
}else{
	echo "Error In Inserting Record to Table: " . $mysqlconn->error;
}

$mysqlconn->close();
?>
