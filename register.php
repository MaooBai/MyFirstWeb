<?php 

$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

$db_host = "127.0.0.1";
$charset = "utf8";
$dbname = "www_test_com";
$dbuser = "sql";
$dbpass = "111111";
$tbname = "user";
$db_port = 3306;

$con = mysqli_connect($db_host,$dbuser,$dbpass,$dbname,$db_port);
if(!$con){
	die("error:".mysqli_connect_error());
	exit();
}


if($username == null||$password == null){
	echo "<script>alert(error)</script>";
	die("null");
	exit();
}
$sql = "select * from user where username='{$username}';";
$res1 = mysqli_query($con,$sql);
$row = $res1->num_rows;
if($row){
	echo "<script>alert(该用户已经存在)</script>";
	header("Location:register.html");
}
else{
	$sql1 = "insert into user(username,password) values('{$username}','{$password}')";
	$res = mysqli_query($con,$sql1);
	if(!$res){
		echo"fall";
	}
	else{
		echo "success";
		header("Location: person.html");
		exit();
	}
}

mysqli_close($con);
?>
