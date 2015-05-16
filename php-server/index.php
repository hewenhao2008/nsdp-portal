<!DOCTYPE html>
<html>
<head>
<title>NSDP 协议演示PORTAL页面</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<script src="jquery-1.7.2.js"></script>
<script type="text/javascript">
$(function(){
	$('#go').click(function(){
		var name=$('#username').val();
		var pwd=$('#userpasswd').val();
			
		var search = location.search;
		if (search.indexOf("?") !=-1) {
			var query = search.substring(search.indexOf("?")+1);
			var datas=query+"&"+"username=" + name + "&" + "userpasswd=" + pwd;
		} else{
			var datas="username=" + name + "&" + "userpasswd=" + pwd;
		}
		$.ajax({
		   type: "POST",
		   url: "http://<?php echo $_GET['wlanapip'];?>:14150/action/auth",
		   data: datas,
		   dataType: "json",
		   success: function(msg){
			   alert(msg);
				var code = msg.code;
				code = code*1;
				switch (code) {
					case 0 :
						msg = "认证成功";break;
					case 1 :
						msg = "用户名或密码错误";break;
					case 2 :
						msg = "认证超时";break;
					case 3 :
						msg = "用户正在认证中";break;
					case 4  :
						msg = "用户已认证";break;
					default :
						msg = "未知返回码！";break;
				}
				alert(msg);
		   }
		});
	});
});


	
</script>

</head>
<body>
	<div  style="width:100px;margin-left:35%;margin-right:auto;margin-top:15%">
		<fieldset border:2px style="width:300px;hight:auto;border-color:#0000CD">
			<legend>用户登录</legend>
				账&nbsp;&nbsp;号&nbsp;&nbsp;<input type="text" id="username" name="username" maxlength="18" autofocus required />  <br />
				密&nbsp;&nbsp;码&nbsp;&nbsp;<input type="password" id="userpasswd" name="userpasswd" maxlength="18" required style="margin-top:5px" />  <br />
				<button type="button" id="go" style="width:60px;hight:30px;margin-top:10px;margin-left:150px;">登&nbsp;录</button> 
		</fieldset>
	</div>
</body>
</html>
