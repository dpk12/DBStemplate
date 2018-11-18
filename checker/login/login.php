<?php
require_once("DBConn.php");
session_start();
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
// echo $password;
// echo $email;
if($password!=NULL){
$sql=mysqli_query($conn,"select name,email,password from signup where name='".$name."' and email='".$email."' and password='".$password."'") or die(mysql_error());
$count = mysqli_num_rows($sql);
if($count>0){
	$row=mysqli_fetch_assoc($sql);
	$_SESSION['vid']=$row['vid'];
	/*echo "<script type='text/javascript'>alert('login successful.');window.location='userservices.php'</script>";*/
	echo "<script type='text/javascript'>alert('login successful.')</script";
	header("location:../payment/payment.html");
	//header("location:userservices.php");
	/*header("location:volunteerhome.php");*/
		header("location:logout.php");
	// echo $_SESSION['vid'];
	// echo "success";
}
else{
	
	echo "<script type='text/javascript'>alert('Invalid username or password');window.location='login.html'</script>";
}
}
else{
	$sql=mysqli_query($conn,"SELECT * FROM signup WHERE name = '$name'") or die(mysql_error());
	$count = mysqli_num_rows($sql);
	if($count==1){
		$r = mysqli_fetch_assoc($sql);
		$password = $r['password'];
		$to = $r['email'];
		$subject = "Your Recovered Password";
 
		$message = "Please use this password to login " . $password;
		$headers = "From : vivek@codingcyber.com";
		if(mail($to, $subject, $message, $headers)){
			echo "Your Password has been sent to your email id";
		}else{
			echo "Failed to Recover your password, try again";
		}
 
	}else{
		echo "User name does not exist in database";
	}
}
?>