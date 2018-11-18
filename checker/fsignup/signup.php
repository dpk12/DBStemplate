<html>
<body>
<?php  
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$re_password=$_POST['re_password'];
	$address=$_POST['address'];
	$country=$_POST['country'];
	$phone=$_POST['phone'];
	$_SESSION["uname"]=$name;
	//$password = $_POST['userPassword'];
	//$username = $_POST['userNameInput'];
	//$_SESSION["uname"]=$username;
	$conn=new mysqli("localhost", "root", "", "dbs");
	$insertquery="insert into signup values('".$name."','".$email."','".$password."','".$phone."','".$address."','".$country."')";
	$conn->query($insertquery);
	$sqlquery="select * from signup";
	$result=$conn->query($sqlquery);
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			echo "username:".$row["name"]."  password:".$row["password"]."  email:".$row["email"]."  phone:".$row["phone"];
		}
	}
?>
</body>
</html>