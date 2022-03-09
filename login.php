<?php 


$username = $_POST['username'];
$password = $_POST['password'];


$db_host = "127.0.0.1";
$charset = "utf8";
$dbname = "www_test_com";
$dbuser = "sql";
$dbpass = "111111";
$tbname = "user";
$db_port = 3306;

$con = mysqli_connect($db_host,$dbuser,$dbpass,$dbname,$db_port);
// 连接错误
if(!$con){
	die("error:".mysqli_connect_error());
	exit();
}

// 空名
if($username == null||$password == null){
	echo "<script>alert(error)</script>";
	die("null");
	exit();
}

// 查找
	$sql = 'select * from user where username='."'{$username}' and password="."'$password';";
	$res= mysqli_query($con,$sql);
	$row=$res->num_rows;
	if($row != 0){
		echo "<h1>成功</h1>";
		setcookie("username","$username",time() + 36000);
		header("Location: person.html");
		exit;
	}
	else
	{
		echo"账号错误";
	}



 ?>