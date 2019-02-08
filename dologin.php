<html>
<head>
<title>首页</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
</head>

<body>
<?php
	//获取并且处理客户端所提交的数据。
	$username=$_POST["username"];
	$pwd=$_POST["pwd"];  //不加密的情况下
	//$pwd=MD5($_POST["pwd"]);	//md5加密情况下
	
	//echo $username.'<br/>';
	//echo $pwd.'<br/>';
	//连接数据库，php提供了大量和mysql数据库操作有关的函数。
	//mysql_connect('数据库服务器'，'用户名'，'密码');
	$conn=mysql_connect('localhost','root','');
	
	//设置编码集
	mysql_query("set names utf8");
	
	//选择数据库。相当于执行了use vip1命令。
	mysql_select_db('vip',$conn);
	
	//根据业务的需要，构建好业务SQL。此时是没有执行的。
	$sql="select * from user_info where username='$username' and password='$pwd'";
	//echo $sql;
	
	//执行业务逻辑。定义一个变量来存储查询语句的结果。非查询语句，则mysql_query的返回值是boolean型的。
	$result=mysql_query($sql,$conn) or die(mysql_error());
	#如果查询的结果的行数为1行，则表示登录成功。
	if(mysql_num_rows($result)==1){
		echo $username.",登录成功！<br/>";
		echo '<a href="login.html">返回首页</a><br/>';
	}
	else{
		echo "登录失败！<br/>";
		echo '<a href="login.html">返回首页</a> or <a href="register.html">注册新用户</a><br/>';
	}
	
	mysql_close($conn);
?>

</body>
</html>