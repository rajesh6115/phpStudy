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
$formemail = $_POST["useremail"];
$formpass = $_POST["userpass"];
$usersecret = sha1($formemail.$formpass);
// Create Connection
$mysqlconn = new mysqli($serverip, $username, $userpass, $dbname);
// Check Connection
if($mysqlconn->connect_error){
	die("Connection Failed:". $mysqlconn->connect_error);
}else{
	echo "Connected To Mysql Data Base";
}

// sql query formation
$sqlquery = "SELECT vcFirstName,vcLastName,vcEmailId,vcMobileNo,dtRegistrationDate FROM UserMaster WHERE vcUserPassword='$usersecret'";

$sql_result = $mysqlconn->query($sqlquery);

if($sql_result === FALSE){
	echo "Fail To Execute Query". $mysqlconn->error;
	$mysqlconn->close();
	die("SELECT of Record Fail.");
}

if($sql_result->num_rows > 0){
	while($result_row = $sql_result->fetch_assoc()){
		echo "<br/>NAME: ".$result_row["vcFirstName"]." ".$result_row["vcLastName"];
		echo "<br/>EMAIL: ".$result_row["vcEmailId"];
		echo "<br/>MOB: ".$result_row["vcMobileNo"];
	}
}else{
	echo '0 Records';
}

$mysqlconn->close();
?>
