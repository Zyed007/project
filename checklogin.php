<?php
session_start();
$host="localhost";
$email="";
$password="";
$db_name="login";
$tbl_name="administrator";
$con=mysqli_connect("$host","$email","$password")or die("cannot connect");
$select_db=mysqli_select_db($con,$db_name) or die("cannot select DB");

if(isset($_POST['email']) && isset($_POST['password']))
{
	$email=$_POST['email'];
	$pswd=$_POST['password'];
	$ab="SELECT * FROM administrtaor WHERE email='$email' and password='$password'";
	$result=mysqli_query($con,$ab) or die(mysqli_error($con));
	$cnt=mysqli_num_rows($result);
	if($cnt == true)
	{
		header('Location:21.html');
	}
	else
	{
		echo '<script language="javascript">';
		echo 'alert("Wrong Credentials Entered");';
		echo 'window.location.href="index.html";';
		echo '</script>';
	}
}
ob_end_flush();
?>
	