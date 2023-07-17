<?php
$con = mysqli_connect("localhost","root","root"); //mysqli_connect()函数打开非持久的mysql连接,如果成功,则返回一个mysql连接标识
$sql = "set names utf8";
$res = mysqli_query($con,$sql);
$sql = "use a";
$res = mysqli_query($con,$sql);


$sno = $_POST["sno"];
$name = $_POST["name"];
$sex = $_POST["sex"];
$year = $_POST["year"];

$pass = $_POST["pass"];
$money = 0;
$credit = $_POST["credit"];
$phone = $_POST["phone"];

$dept = $_POST["dept"];
$room = $_POST["room"];

$sql_1 = "insert into student values('$sno','$name','$sex','$year')";
$sql_2 = "insert into cardinfo values('$sno','$pass','$money','$credit','$phone')";
$sql_3 = "insert into study values('$sno','$dept','$room')";
$result_1 = $con->query($sql_1);
$result_2 = $con->query($sql_2);
$result_3 = $con->query($sql_3);
echo mysqli_error($con); //检验错误
if($result_1 & $result_2 & $result_3)
{
	echo "
		<script>alert('新增信息成功！将返回首页')</script>
		<html>
			<head>
				<meta http-equiv=\"Refresh\" content=\"3 ;url= index.php\" >
			</head>
		</html>
		";
}
else
{
    echo "
    	<script>alert('新增信息失败!将返回原页面')</script>
    	<html>
			<head>
				<meta http-equiv=\"Refresh\" content=\"3 ;url= add.php\" >
			</head>
		</html>
    	";
}

?>



<html>
<head>
	<title>新增信息后的跳转页面</title>
</head>
<body>
	<style>
	body{
			background-image: url(https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1545548942238&di=ffb5e7543c78ca2ffab603a9495b719f&imgtype=0&src=http%3A%2F%2Fhbimg.b0.upaiyun.com%2F51a388871e9a667de0a6e2d335a58270bc90dfe7551b-kVvrPE_fw658);
		}
	</style>
	<p align = "center"><font size = 10 color = red>感谢您使用一卡通系统<br>正在为您跳转页面，请稍等片刻</font></p><br><br><br>
	<p align = "center"><font size = 5 color =blue>我爱软件技术！</font></p>
</body>
</html>