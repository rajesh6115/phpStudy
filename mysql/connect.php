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
// Create Connection
$mysqlconn = new mysqli($serverip, $username, $userpass);
// Check Connection
if($mysqlconn->connect_error){
	die("Connection Failed:". $mysqlconn->connect_error);
}

echo "Connected To Mysql Data Base";
$mysqlconn->close();
?>
