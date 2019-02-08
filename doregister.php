<html>
<head>
<title>首页</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
</head>

<body>
<?php
	//用户名
	$username=$_POST["username"];
	//密码不MD5加密
	$pwd=$_POST["pwd"];
	//$pwd=MD5($_POST["pwd"]);	//md5加密情况下
	//确认秘密
	$confirmpwd=$_POST["confirmpwd"];
	//性别
	$gender=$_POST["gender"];
	//年龄
	$age=$_POST["age"];
	//兴趣
	$hobby=$_POST["hobby"];
	$myhobby=join(",",$hobby);
	//城市
	$city=$_POST["city"];
	//备注信息
	$sign=$_POST["sign"];
	
	//echo $username.'<br/>';
	//echo $pwd.'<br/>';
	//echo $confirmpwd.'<br/>';
	//echo $gender.'<br/>';
	//echo $age.'<br/>';	
	//echo $hobby.'<br/>';	
	//echo $city.'<br/>';
	//echo $sign.'<br/>';
	//mysql_connect('数据库服务器'，'用户名'，'密码');
	$conn=mysql_connect('localhost','root','');
	
	//设置编码集
	mysql_query("set names utf8");
	
	//选择数据库。相当于执行了use vip1命令。
	mysql_select_db('vip',$conn);
	
	//根据业务的需要，构建好业务SQL。此时是没有执行的。
	$sql="insert into user_info(username,password,sex,age,city,hobby,info) values('$username','$pwd','$gender',$age,'$city','$myhobby','$sign')";
	
	//执行业务逻辑。定义一个变量来存储查询语句的结果。非查询语句，则mysql_query的返回值是boolean型的。
	if(mysql_query($sql,$conn)){
		echo $username."注册成功！<br/>";
		echo '<a href="login.html">返回首页</a><br/>';
	}
	else{
		echo "注册失败！<br/>";
		echo '<a href="register.html">返回注册页</a><br/>';
	}
	
	mysql_close($conn);
?>

</body>
</html>