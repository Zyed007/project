<?php
session_start();
$servername="localhost";
$username="";
$password="";
$dbname="login";
$tbl_name="administrator";
$conn=mysqli_connect($servername,$username,$password,$dbname) or die(mysqli_error());
$select_db=mysqli_select_db($conn,$dbname)or die(mysqli_error($conn));
$sql="SELECT * FROM $tbl_name";
$result=mysqli_query($conn,$sql)or die(mysqli_error($conn));


if(isset($_POST['submit']))
{
   $email=$_POST['Username'];
   $password=$_POST['Password'];
   $q="SELECT Username FROM administrator WHERE Username='$email'";
   $cq=mysqli_query($conn,$q) or die(mysqli_error($conn));
   $ret=mysqli_query($conn,$cq);
   if($ret==true)
     {
       echo"<center><h2 style='color:red'>Email already exists</h2></center>";
     }
     else
     {
     $query="INSERT INTO administrator VALUES('$email','$password')";
     mysqli_query($conn,$query)or die(mysqli_error($conn));
     echo"<center><h2 style='color:green'>Details Saved!</h2></center>";
     }
}
Msqli_close($conn);
?>

<html>
<head>
<body style="background-color:#E5E5E5">
<title>registration form</title>
</head>
<h1 ALIGN="CENTER">registration form</h2>
<form action="" method="post">
<table border="0" align="center">
<tbody>
<tr>
<td>
<td>label for="id">administrator sign up form:</label></td>
<td><input id="id" maxlength="50" name="usn" type="text"/></td>
</tr>

<tr>
<td><label for="name">user name:</label></td>
<td><input id="name"maxlength="50" name="name" type="text"/></td>
</tr>

<tr>
<td><label for="sem">password:</label></td>
<td><input id="sem"maxlength="50" name="sem" type="number_format"/></td>
</tr>


<tr>
<td align="right"><input name="Submit" type="Submit" value="Add"/>&nbsp;<input type="reset" on click="refresh()"></p></td>
</tr>


</tbody>
</table>
</form>
</html>	 