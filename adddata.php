<?php
session_start();
$servername="localhost";
$username="";
$password="";
$dbname="login";
$tbl_name="administrtaor";
$conn=mysqli_connect($servername,$username,$password,$dbname) or die(Mysqli_error());
$select_db=mysqli_select_db($conn,$dbname) or die(mysqli_error($conn));
$sql="SELECT * FROM $tbl_name";
$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
if(isset($_POST['submit']))
{
    $user=$_POST['username'];
    $mail=$_POST['email'];
    $pass=$_POST['password'];
    $q="SELECT username from administrator where username='$user'";
    $cq=mysqli_query($conn,$q) or die(mysqli_error($conn));
    $ret=mysqli_num_rows($cq);
    if($ret==TRUE)
    {
        echo "<center><h2 style='color:red'>Username already exists</h2></center>";
    }
    else
    {
        $query="INSERT INTO admnistrator VALUES('$user','$mail','$pass')";
        mysqli_query($conn,$query) or die(mysqli_error($conn));
        echo "<center><h2 style='color:green'>Details Saved!</h2></center>";
    }
}
Mysqli_close($conn);
if($cq==1){
    header('Location:mainlogin.html');
}
?>