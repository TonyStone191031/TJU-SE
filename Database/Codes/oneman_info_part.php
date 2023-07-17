<?php
$con = mysqli_connect("localhost","root","root"); //mysqli_connect()函数打开非持久的mysql连接,如果成功,则返回一个mysql连接标识
$sql = "set names utf8";
$res = mysqli_query($con,$sql);
$sql = "use a";
$res = mysqli_query($con,$sql);


$sno = $_POST["sno"];
$res1 = "select * from student where sno = $sno";
$res3 = "select * from study where sno = $sno";
$res1 = mysqli_query($con,$res1); //mysqli_query是执行函数，仅对 SELECT，SHOW，EXPLAIN 或 DESCRIBE 语句返回一个资源标识符，查询执行不正确则返回 FALSE
$res3 = mysqli_query($con,$res3);
$r1 = mysqli_fetch_assoc($res1);//mysqli_fetch_assoc返回一个满足执行语句的数组r
$r3 = mysqli_fetch_assoc($res3);
if($res1 == true && $res3 == true) 
{
	$sno = $r1["sno"];
	$name = $r1["name"];
	$sex = $r1["sex"];
	$year = $r1["year"];
	$dept = $r3["dept"];
	$room = $r3["room"];

	echo"
	<p align = 'center'><font size = 5 color = blue>你查询的学生的部分信息</font></p>
	<table border = 2 align = 'center'>
		<tr>
			<th>学号</th>
			<th>姓名</th>
			<th>性别</th>
			<th>入学年份</th>
			<th>所属学院</th>
			<th>宿舍楼房间号</th>
		</tr>
		<tr>
			<td>$sno</td>
			<td>$name</td>
			<td>$sex</td>
			<td>$year</td>
			<td>$dept</td>
			<td>$room</td>
		</tr>
	";
}
else
{
	echo"
	<script>alert('学号错误，将返回原页面')</script>;
	<html>
		<head>
			<meta http-equiv=\"Refresh\" content=\"3 ;url= allman_info_part.php\" >
		</head>
	</html>
	";
}

?>



<html>
<head>
	<title>你查询的学生的部分信息</title>
</head>
<body>
	<style>
	body{
			background-image: url(https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1545548942238&di=ffb5e7543c78ca2ffab603a9495b719f&imgtype=0&src=http%3A%2F%2Fhbimg.b0.upaiyun.com%2F51a388871e9a667de0a6e2d335a58270bc90dfe7551b-kVvrPE_fw658);
		}
	</style>
	<p align ="center"><font color = red size = 3>你没有权限删除或修改这位学生的信息<br>你仅拥有查看其部分信息的权限</font></p>
	<p align = "center"><a href = index.php><font color = blue>返回一卡通首页</font></a></p>
</body>
</html>