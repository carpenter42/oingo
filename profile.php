<?php
//edit user's profile

session_start();
require_once("functions.php");
$server="localhost";
$db_username="root";
$db_password="";
$db_name="proj1"; 
$con=mysqli_connect($server, $db_username, $db_password, $db_name);
if(!$con)
{
	die("can't connect".mysqli_error());
}
$userid=$_SESSION['userid'];
$state=$_POST['state'];
$password=$_POST['password'];
$confirm=$_POST['confirm'];
$gender=$_POST['gender'];
$birthdate=$_POST['birthdate'];
$region=$_POST['region'];

if($password=$confirm) 
{
	//update state
	$sql1="update state set state='$state' where userID='$userid'";
	$result1=mysqli_query($con, $sql1);
	//update profile
	$sql2="update user set password='$password', gender='$gender', birthdate='$birthdate', region='$region' where userID='$userid'";
	$result2=mysqli_query($con, $sql2);
	if($result1&&$result2)
	{
		echo"<script type='text/javascript'>alert('You have changed profile successfully!');location='setting.php';</script>";
	}
}
else
{
	echo"<script type='text/javascript'>alert('The passwords you typed do not match. Please enter again.');location='setting.php';</script>";
}

?>
