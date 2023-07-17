<html>
<head>
	<title>个人所有信息页面</title>
</head>
<body>
	<style>
	body{
			background-image: url(https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1545548942238&di=ffb5e7543c78ca2ffab603a9495b719f&imgtype=0&src=http%3A%2F%2Fhbimg.b0.upaiyun.com%2F51a388871e9a667de0a6e2d335a58270bc90dfe7551b-kVvrPE_fw658);
		}
	</style>
	<p align = "center"><a href = index.php><font color = blue>返回一卡通首页</font></a></p>
	<br>

<?php
$con = mysqli_connect("localhost","root","root"); //mysqli_connect()函数打开非持久的mysql连接,如果成功,则返回一个mysql连接标识
$sql = "set names utf8";
$res = mysqli_query($con,$sql);
$sql = "use a";
$res = mysqli_query($con,$sql);


$sno = $_POST["sno"];
$res1 = "select * from student where sno = $sno";
$res2 = "select * from cardinfo where sno = $sno";
$res3 = "select * from study where sno = $sno";
$res1 = mysqli_query($con,$res1); //mysqli_query是执行函数，仅对 SELECT，SHOW，EXPLAIN 或 DESCRIBE 语句返回一个资源标识符，查询执行不正确则返回 FALSE
$res2 = mysqli_query($con,$res2);
$res3 = mysqli_query($con,$res3);
$r1 = mysqli_fetch_assoc($res1);//mysqli_fetch_assoc返回一个满足执行语句的数组r
$r2 = mysqli_fetch_assoc($res2);
$r3 = mysqli_fetch_assoc($res3);
$pass = $r2["pass"];  //把数组r中的pass值赋给pass
if($res1 == true && $res2 == true && $res3 == true && $pass == $_POST["pass"]) //表示执行成功并且数据库中的pass与网页中用户输入的pass相同
{
	$sno = $r1["sno"];
	$name = $r1["name"];
	$sex = $r1["sex"];
	$year = $r1["year"];
	$pass = $r2["pass"];
	$money = $r2["money"];
	$credit = $r2["credit"];
	$phone = $r2["phone"];
	$dept = $r3["dept"];
	$room = $r3["room"];

	echo"
	<p align ='center'><font size = 5 color = blue>您的所有信息</font></p>
	<table border = 2 align = 'center'>
		<tr>
			<th>学号</th>
			<th>姓名</th>
			<th>性别</th>
			<th>入学年份</th>
			<th>卡密码</th>
			<th>余额</th>
			<th>绑定银行卡</th>
			<th>绑定手机号</th>
			<th>所属学院</th>
			<th>宿舍楼房间号</th>
		</tr>
		<tr>
			<td>$sno</td>
			<td>$name</td>
			<td>$sex</td>
			<td>$year</td>
			<td>$pass</td>
			<td>$money</td>
			<td>$credit</td>
			<td>$phone</td>
			<td>$dept</td>
			<td>$room</td>
		</tr>
	";
}
else
{
	echo"
	<script>alert('学号或卡密码错误，将返回原页面')</script>;
	<html>
		<head>
			<meta http-equiv=\'Refresh\' content=\'3 ;url= search.php\' >
		</head>
	</html>
	";
}

?>


	<center>
	<form action = 'alter.php' method = 'post'>
		<div><input type = 'hidden' size =12 name = 'sno' value=<?php echo "$sno" ?>></div> <!--设置修改的代码不能放在php语言中，要放在html中，否则无法传值$sno-->
		<div><input type = 'submit' value = '点击前往修改你的信息''></div>
	</form>
	</center>
	<br>
	<center>
	<form action = 'delete.php' method = 'post'>
		<div><input type = 'hidden' size =12 name = 'sno' value=<?php echo "$sno" ?>></div> <!--设置删除的代码不能放在php语言中，要放在html中，否则无法传值$sno-->
		<div><input type = 'submit' value = '点击删除你的所有信息'></div>
	</form>
	</center>
	<br><br><br>
</body>
</html>

