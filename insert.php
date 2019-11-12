<?php
session_start();
$servername="localhost";
$username="";
$password="";
$dbname="students";
$tbl_name="details";
$conn=mysqli_connect($servername,$username,$password,$dbname) or die(mysqli_error());
$select_db=mysqli_select_db($conn,$dbname)or die(mysqli_error($conn));
$sql="SELECT * FROM $tbl_name";
$result=mysqli_query($conn,$sql)or die(mysqli_error($conn));


if(isset($_POST['Submit']))
{
   $usn=$_POST['usn'];
   $name=$_POST['name'];
   $sem=$_POST['sem'];
   $age=$_POST['age'];
   $addr=$_POST['addr'];
   $dob=$_POST['dob'];
   $q="SELECT usn FROM registration WHERE usn='$usn'";
   $cq=mysqli_query($conn,$q) or die(mysqli_error($conn));
   $ret=mysqli_query($conn,$cq);
   if($ret==true)
     {
       echo"<center><h2 style='color:red'>usn already exists</h2></center>";
     }
     else
     {
     $query="INSERT INTO registration VALUES('$usn','$name','$sem','$age','$addr','$dob')";
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
<td>label for="id">university seat number:</label></td>
<td><input id="id" maxlength="50" name="usn" type="text"/></td>
</tr>

<tr>
<td><label for="name">NAME:</label></td>
<td><input id="name"maxlength="50" name="name" type="text"/></td>
</tr>

<tr>
<td><label for="sem">SEMESTER:</label></td>
<td><input id="sem"maxlength="50" name="sem" type="number_format"/></td>
</tr>

<tr>
<td><label for="age">AGE:</label></td>
<td><input id="age"maxlength="50" name="age" type="number_format"/></td>
</tr>

<tr>
<td><label for="addr">ADDRESS:</label></td>
<td><input id="addr"maxlength="90" name="addr" type="text"/></td>
</tr>

<tr>
<td><label for="dob">DATE OF BIRTH:</label></td>
<td><input id="dob"maxlength="50" name="dob" type="date_create"/></td>
</tr>


<tr>
<td align="right"><input name="Submit" type="Submit" value="Add"/>&nbsp;<input type="reset" on click="refresh()"></p></td>
</tr>


</tbody>
</table>
</form>
</html>	 