<?php
$page = basename($_SERVER['PHP_SELF']); 
if($page=='index.php' && !isset($_GET['p'])){ 
	echo '<meta HTTP-EQUIV="REFRESH" content="0; url=index.php?p=home">'; 
} 
$p = (isset($_GET['p'])?$_GET['p']:'home'); 
if (file_exists("pages/{$p}.php")) { 
	include("pages/{$p}.php"); 
}
?>
