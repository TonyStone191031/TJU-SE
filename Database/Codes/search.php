<html>
<head>
	<title>同济大学学生一卡通系统信息查询修改及删除页面</title>
</head>
<body>
	<style>
	body{
			background-image: url(https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1545548942238&di=ffb5e7543c78ca2ffab603a9495b719f&imgtype=0&src=http%3A%2F%2Fhbimg.b0.upaiyun.com%2F51a388871e9a667de0a6e2d335a58270bc90dfe7551b-kVvrPE_fw658);
		}
	</style>
	<p align = "center"><font size = 5><b>同济大学学生一卡通系统信息查询修改及删除页面</b></font></p>
	<p align = "center"><font color = red>我们提供两种方式查询一卡通信息<br>如果你想修改或删除信息，须采用输入密码的方式，否则你将没有此类权限</font></p>
	<br>
	<p align = "center"><font color = blue>不需要密码，查询所有人的一卡通部分信息</font></p>
	<center>
		<form action = "allman_info_part.php"><!--allman_info_part.php显示所有人的信息,不需要密码,所以只显示student和cardinfo的信息-->
			<div><input type = "submit" value = "查询所有人的部分信息"></div>
		</form>
	</center>
	<br>
	<p align = "center"><font color = blue>需要密码：输入你要查询的学号及其对应的卡密码<br>你将可以进行信息的修改及删除操作</font></p>
	<table border = 0 align = "center">
		<tr>
			<td>
				<left>
					<form action = "oneman_info_all.php" method = "post"><!--oneman_info_all.php里显示所查找的人的所有信息-->
						<div>学号：<input type = "text" size = 12 name = "sno"/><br></div>
						<div>卡密码：<input type = "text" size = 12 name = "pass"/><br></div>
						<br>
						<div><input type = "submit" value = "查询"></div>
					</form>
				</left>
			</td>
		</tr>
	</table>
	<br><br>
	<p align = "center"><a href = index.php><font color = blue>返回一卡通首页</font></a></p>
</body>
</html>




