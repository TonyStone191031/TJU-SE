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
$money = $_POST["money"];
$credit = $_POST["credit"];
$phone = $_POST["phone"];

$dept = $_POST["dept"];
$room = $_POST["room"];

$sql_1 = "update student set name = '$name', sex = '$sex', year = '$year' where sno = $sno";
$result_1 = mysqli_query($con,$sql_1);
//var_dump($result_1);
echo mysqli_error($con); //检验错误
$sql_2 = "update cardinfo set pass = '$pass', credit = '$credit', phone = '$phone' where sno = $sno";
$result_2 = mysqli_query($con,$sql_2);
$sql_3 = "update study set dept = '$dept', room = '$room' where sno = $sno";
$result_3 = mysqli_query($con,$sql_3);

if($result_1 == true && $result_2 == true && $result_3 == true)
{
	echo"
		<script>alert('修改信息成功！将返回查询修改及删除页面')</script>
		<html>
			<head>
				<meta http-equiv=\"Refresh\" content=\"3 ;url= search.php\" >
			</head>
		</html>
		";
}
else
{
    echo "
    	<script>alert('修改信息失败!将返回查询修改及删除页面')</script>
    	<html>
			<head>
				<meta http-equiv=\"Refresh\" content=\"3 ;url= search.php\" >
			</head>
		</html>
    	";
}

?>



<html>
<head>
	<title>修改信息后的跳转页面</title>
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