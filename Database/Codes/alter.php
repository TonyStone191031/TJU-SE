<html>
<head>
	<title>修改个人信息页面</title>
</head>
<body>
	<style>
	body{
			background-image: url(https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1545548942238&di=ffb5e7543c78ca2ffab603a9495b719f&imgtype=0&src=http%3A%2F%2Fhbimg.b0.upaiyun.com%2F51a388871e9a667de0a6e2d335a58270bc90dfe7551b-kVvrPE_fw658);
		}
	</style>
	<p align = "center"><font size = 8><b>修改个人信息页面</b></font></p>
	<p align = "center"><font color = blue>标示有*的项为非必填项，其余项为必填项</font></p>
	<p align = "center"><font size = 5 color = red>由于管理要求，学号、余额均不可更改</font></p>
	<p align = "center"><font size = 1 color = red>注意：选择性别</font></p>
	<p align = "center"><font color = green><br>如果你希望充值，请在前往一卡通充值页面</font></p>
	<p align = "center"><a href = recharge.php><font color = green>充值一卡通</font></a></p>
</body>


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
if($res1 == true && $res2 == true && $res3 == true) //表示执行成功并且数据库中的pass与网页中用户输入的pass相同
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
}
else
{
	echo"
	<script>alert('出现错误，将返回原页面')</script>;
	<html>
		<head>
			<meta http-equiv=\'Refresh\' content=\'3 ;url= search.php\' >
		</head>
	</html>
	";
}

?>


<table border = 0 align = "center">
	<tr>
		<td>
			<left>
			<form action = "alter_finish.php" method = "post">
			<font color = green>学生信息</font>
			<div><input type = "hidden" size = 12 name = "sno" value = <?php echo "$sno" ?>></div>
			<div>姓名：<input type = "text" size = 12 name = "name" value = <?php echo"$name" ?>><br></div> <!--设置默认值-->
			<div>性别：<input type = "radio" value = "男" name = "sex"/>男 
    		     <input type = "radio" value = "女" name = "sex"/>女 </div> <!--并未设置默认值，需要重新填入-->
			<div>入学年份：<select name = "year" id = "name_pointer1">
				<option value = "入学年份">入学年份</option>
				<option value = <?php echo"$year" ?> selected><?php echo"$year" ?></option>  <!--设置默认值-->
				<option value = "2002">2002</option>
				<option value = "2003">2003</option>
				<option value = "2004">2004</option>
				<option value = "2005">2005</option>
				<option value = "2006">2006</option>
				<option value = "2007">2007</option>
				<option value = "2008">2008</option>
				<option value = "2009">2009</option>
				<option value = "2010">2010</option>
				<option value = "2011">2011</option>
				<option value = "2012">2012</option>
				<option value = "2013">2013</option>
				<option value = "2014">2014</option>
				<option value = "2015">2015</option>
				<option value = "2016">2016</option>
				<option value = "2017">2017</option>
				<option value = "2018">2018</option>
				<option value = "2019">2019</option>
				<option value = "2020">2020</option>
				<option value = "2021">2021</option>
			var myselect = document.getElementById("name_pointer1");
			index = myselect.selectIndex;
			myselect.options[index].value;
			myselect.options[index].name_pointer1;
			</select></div>
			<br>
			<font color = green>学生卡信息</font>
			<div>卡密码：<input type = "text" size = 12 name = "pass" value = <?php echo"$pass" ?>><br></div> <!--设置默认值-->
			<div><input type = "hidden" size =12 name = "money" value = <?php echo "$money" ?>></div>
			<div>*绑定银行卡：<input type = "text" size = 15 name = "credit" value = <?php echo"$credit" ?>><br></div> <!--设置默认值-->
			<div>绑定手机号：<input type = "text" size = 12 name = "phone" value = <?php echo"$phone" ?>><br></div> <!--设置默认值-->
			<br>
			<font color = green>学习生活信息</font>
			<div>所属学院：<select name = "dept" id = "name_pointer2">
				<option value = "所属学院">所属学院</option>
				<option value = <?php echo"$dept" ?> selected><?php echo"$dept" ?></option> <!--设置默认值-->
				<option value = "建筑与城市规划学院">建筑与城市规划学院</option>
				<option value = "土木工程学院">土木工程学院</option>
				<option value = "机械与能源工程学院">机械与能源工程学院</option>
				<option value = "经济与管理学院">经济与管理学院</option>
				<option value = "环境科学与工程学院">环境科学与工程学院</option>
				<option value = "材料科学与工程学院">材料科学与工程学院</option>
				<option value = "电子与信息工程学院">电子与信息工程学院</option>
				<option value = "人文学院">人文学院</option>
				<option value = "外国语学院">外国语学院</option>
				<option value = "法学院">法学院</option>
				<option value = "马克思主义学院">马克思主义学院</option>
				<option value = "政治与国际关系学院">政治与国际关系学院</option>
				<option value = "理学部">理学部</option>
				<option value = "海洋与地球科学学院">海洋与地球科学学院</option>
				<option value = "航空航天与力学学院">航空航天与力学学院</option>
				<option value = "数学科学学院">数学科学学院</option>
				<option value = "物理科学与工程学院">物理科学与工程学院</option>
				<option value = "化学科学与工程学院">化学科学与工程学院</option>
				<option value = "汽车学院">汽车学院</option>
				<option value = "交通运输工程学院">交通运输工程学院</option>
				<option value = "软件学院">软件学院</option>
				<option value = "测绘与地理信息学院">测绘与地理信息学院</option>
				<option value = "生命科学与技术学院">生命科学与技术学院</option>
				<option value = "医学院">医学院</option>
				<option value = "设计创意学院">设计创意学院</option>
				<option value = "口腔医学院">口腔医学院</option>
				<option value = "艺术与传媒学院">艺术与传媒学院</option>
				<option value = "体育教学部">体育教学部</option>
				<option value = "铁道与城市轨道交通研究院">铁道与城市轨道交通研究院</option>
				<option value = "女子学院">女子学院</option>
				<option value = "职业技术教育学院">职业技术教育学院</option>
				<option value = "国际文化交流学院">国际文化交流学院</option>
				<option value = "中德学院">中德学院</option>
				<option value = "中法工程和管理学院">中法工程和管理学院</option>
				<option value = "中德工程学院">中德工程学院</option>
				<option value = "中意学院">中意学院</option>
				<option value = "联合国环境署-同济大学环境与可持续发展研究所">联合国环境署-同济大学环境与可持续发展研究所</option>
				<option value = "中芬中心">中芬中心</option>
				<option value = "中西学院">中西学院</option>
				<option value = "新农村发展研究院">新农村发展研究院</option>
				<option value = "国际足球学院">国际足球学院</option>
				<option value = "上海国际知识产权学院">上海国际知识产权学院</option>
				<option value = "创新创业学院">创新创业学院</option>
			var myselect = document.getElementById("name_pointer2");
			index = myselect.selectIndex;
			myselect.options[index].value;
			myselect.options[index].name_pointer2;
			</select></div>
			<div>*宿舍楼房间号：<input type = "text" size = 15 name = "room" value = <?php echo"$room" ?>><br></div> <!--设置默认值-->
			<br>
			<div><input type = "submit" value = "确认提交"></div>
			</form>
			</left>
		</td>
	</tr>
</table>
</html>









