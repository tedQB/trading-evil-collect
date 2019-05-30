<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<title>登陆</title>
	<link rel="stylesheet" href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://a.alipayobjects.com/arale/calendar/1.0.0/calendar.css">	
	<link charset="utf-8" rel="stylesheet" href="https://a.alipayobjects.com/arale/dialog/1.2.6/dialog.css" />	
	<script type="text/javascript" src="https://a.alipayobjects.com/seajs/seajs/2.2.0/sea.js"></script>
	<script type="text/javascript" src="https://a.alipayobjects.com/seajs/seajs-style/1.0.2/seajs-style.js"></script>
	<style>
		.input-group{ padding:5px 0; }
	</style>
</head>
<body>	


<form role="form" method="post" id="test-form" name="LoginForm" action="login.php">
	  <div class="input-group">
		<label for="username" class="input-group-addon">账户</label>
		<input type="text" class="form-control" id="username" name="username"/>
	  </div>
	  <div class="input-group">
		<label for="password" class="input-group-addon">密码</label>
		<input type="text" class="form-control" id="passcode" name="passcode"/>
	  </div>
	  <div class="input-group">	  
		<select name="cookie" id="cookie"> 
		<option value="0" selected>浏览器进程</option> 
		<option value="1">保存1天</option> 
		<option value="2">保存30天</option> 
		<option value="3">保存365天</option> </select>
	  </div>
	  
	  <button type="submit" class="btn btn-default" id="submitBtn" >Submit</button>
	  <input type="reset" name="Reset" value="Reset" class="btn btn-default"> 
	</form>

</body>
</html>
