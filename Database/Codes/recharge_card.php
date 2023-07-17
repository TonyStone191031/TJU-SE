<?php
$con = mysqli_connect("localhost","root","root"); //mysqli_connect()函数打开非持久的mysql连接,如果成功,则返回一个mysql连接标识
$sql = "set names utf8";
$res = mysqli_query($con,$sql);
$sql = "use a";
$res = mysqli_query($con,$sql);


$sno = $_POST["sno"];
$res = "select * from cardinfo where sno = $sno";
$res = mysqli_query($con,$res);//mysqli_query是执行函数，仅对 SELECT，SHOW，EXPLAIN 或 DESCRIBE 语句返回一个资源标识符，查询执行不正确则返回 FALSE
$r = mysqli_fetch_assoc($res);//mysqli_fetch_assoc返回一个满足执行语句的数组r
$pass = $r["pass"];  //把数组r中的pass值赋给pass
if($res == true && $pass == $_POST["pass"]) //表示执行成功并且数据库中的pass与网页中用户输入的pass相同
{
	$sno = $r["sno"];
	$money = $r["money"];
	$credit = $r["credit"];

	echo"
	<p align ='center'><font size = 5 color = blue>余额查询及充值操作</font></p>
	<table border = 2 align = 'center'>
		<tr>
			<th>学号</th>
			<th>余额</th>
			<th>绑定银行卡</th>
		</tr>
		<tr>
			<td>$sno</td>
			<td>$money</td>
			<td>$credit</td>
		</tr>
	";
}
else
{
	echo"
	<script>alert('学号或卡密码错误，将返回原页面')</script>
	<html>
		<head>
			<meta http-equiv=\"Refresh\" content=\"3 ;url= recharge.php\" >
		</head>
	</html>
	";
}

?>



<html>
<head>
	<title>余额查询及充值操作页面</title>
</head>
<body>
	<style>
	body{
			background-image: url(https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1545548942238&di=ffb5e7543c78ca2ffab603a9495b719f&imgtype=0&src=http%3A%2F%2Fhbimg.b0.upaiyun.com%2F51a388871e9a667de0a6e2d335a58270bc90dfe7551b-kVvrPE_fw658);
		}
	</style>
	<center>
	<form action = "recharge_finish.php" method = "post">
	<font color = green>充值</font>
	<div>充值金额：<input type = "text" size = 12 name = "money"/><br></div>
	<div><input type = "hidden" size =12 name = "sno" value="<?php echo $sno ?>"/></div>
	<br>
	<div><input type = "submit" value = "确认充值"></div>
	</form>
	</center>
	<p align = "center"><a href = index.php><font color = blue>返回一卡通首页</font></a></p>
</body>
</html>