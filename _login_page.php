<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
<title>Ninja-Blog Admin Area</title>

<style type="text/css">
	* {
		margin: 0;
		padding: 0;
	}
	
	.login_box {
		width: 220px;
		padding: 10px;
		border: 3px solid #CCC;
		font-family:Arial, Helvetica, sans-serif;
		font-size: 10px;
		margin: 100px auto 10px auto;	
	}
	
	.login_title {
		font-size: 12px;
		font-weight: bold;
	}
	
	.login_text {
		font-size: 18px;
		font-weight: bold;
		color: #999;
	}
	
	.login_input {
		width: 210px;
		padding: 5px;
		margin: 2px 0 2px 0;
		border: 1px solid #999; 
		font-size: 16px;
	}
	
	.error {
		font-weight: bold;
		color: #C30;
	}
</style>
</head>
<body>
<form action="" method="post">
<div class="login_box">
    <span class="login_title">Please Login</span><br>
    Welcome to the Ninja-Blog Admin Area, Enter your username and password below to continue.<br /><br />
    
    <?php $login->error_login(); ?>
    
    <span class="login_text">Username :</span><br>
    <input name="username" type="text" class="login_input"><br><br>
    <span class="login_text">Password :</span><br>
    <input name="password" type="password" class="login_input" /><br><br>
	<div align="right"><input name="login" type="submit" value="Login" class="btn btn-primary"></div>
</div>
</form>
</body>
</html>