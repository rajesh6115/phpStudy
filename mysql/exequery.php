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
// Create Connection
$mysqlconn = new mysqli($serverip, $username, $userpass, $dbname);
// Check Connection
if($mysqlconn->connect_error){
	die("Connection Failed:". $mysqlconn->connect_error);
}else{
	echo "Connected To Mysql Data Base";
}

// sql query formation
$sqlquery = "CREATE TABLE UserMaster (
iUserId INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
vcFirstName VARCHAR(32) NOT NULL,
vcLastName VARCHAR(32) NOT NULL,
vcEmailId VARCHAR(64) NOT NULL,
vcMobileNo VARCHAR(16) NOT NULL,
dtRegistrationDate TIMESTAMP)";

if($mysqlconn->query($sqlquery) === TRUE){
	echo "Table UserMaster Created Sucess Fully";
}else{
	echo "Error In Creating Table: " . $mysqlconn->error;
}

$mysqlconn->close();
?>
