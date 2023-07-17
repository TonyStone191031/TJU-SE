<html>
<title>所有学生的部分一卡通信息</title>
<body>
	<style>
	body{
			background-image: url(https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1545548942238&di=ffb5e7543c78ca2ffab603a9495b719f&imgtype=0&src=http%3A%2F%2Fhbimg.b0.upaiyun.com%2F51a388871e9a667de0a6e2d335a58270bc90dfe7551b-kVvrPE_fw658);
		}
	</style>
	<p align = "center"><font size = 5 color = blue>同济大学一卡通系统<br>所有学生的部分一卡通信息</font></p>
	<p align = "center"><font size = 3 color = red>你没有权限删除或修改任何一位学生的信息<br>你仅拥有查看其部分信息的权限</font></p>
</body>
</html>




<?php 

$con = mysqli_connect("localhost","root","root"); //mysqli_connect()函数打开非持久的mysql连接,如果成功,则返回一个mysql连接标识
$sql = "set names utf8";
$res = mysqli_query($con,$sql); //执行一条mysql查询,返回一个资源标识符
$sql = "use a"; 
$res = mysqli_query($con,$sql);

echo"<table border = 2 align ='center'>
		<tr>
			<th >学号</th>
	        <th>姓名</th>
	        <th>性别</th>
	        <th>入学年份</th>
	        <th>所属学院</th>
	        <th>宿舍楼房间号</th>
	    </tr>";

$sql = "select * from student, study where student.sno = study.sno";
$res = mysqli_query($con,$sql);
while($r = mysqli_fetch_assoc($res))
{
	$sno = $r["sno"];
	$name = $r["name"];
	$sex = $r["sex"];
	$year = $r["year"];
	$dept = $r["dept"];
	$room = $r["room"];

	echo"<tr>
			<td>$sno</td>
			<td>$name</td>
			<td>$sex</td>
			<td>$year</td>
			<td>$dept</td>
			<td>$room</td>
		</tr>
	";
}

echo"</table>"; //注意</table>必须在循环外面，否则在里面第一次循环结束的时候table就结束了，之后的信息无法出现在表格里


?>


<p align = "center"><font color = blue>你可以查询某一位学生的一卡通部分信息</font></p>
	<center>
		<form action = "oneman_info_part.php" method = "post"> <!--oneman_info_part.php里显示某一位学生的一卡通部分信息--> 
			<div>学号：<input type = "text" size = 12 name = "sno"/><br></div>
			<br>
			<div><input type = "submit" value = "查询"></div>
		</form>
	</center>
	
<p align = "center"><a href = index.php><font color = blue>返回一卡通首页</font></a></p>



