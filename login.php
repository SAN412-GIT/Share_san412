<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>欢迎登录SAN412分享平台</title>
<link type="text/css" rel="stylesheet" href="styles/reset.css">
<link type="text/css" rel="stylesheet" href="styles/main.css">
<!--[if IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript" src="js/ie6Fixpng.js"></script>
<![endif]-->
<script type="text/javascript" src="scripts/login.js"></script>
</head>

<body>
<div class="headerBar">
	<div class="logoBar login_logo">
		<div class="comWidth">
			<div class="logo fl">
				<a href="#"><img src="images/san412_logo.png" alt="分享你的故事"></a>
			</div>
			<h3 class="welcome_title">欢迎登陆</h3>
		</div>
	</div>
</div>
<div class="share"></div>
<form action="doLogin.php" method="post">
<div class="loginBox">
	<div class="login_cont">
		<ul class="login">
			<li class="l_tit">邮箱/用户名/手机号</li>
			<li class="mb_10"><input type="text" name="username" class="login_input user_icon"></li>
			<li class="l_tit">密码</li>
			<li class="mb_10"><input type="password" name="password" class="login_input user_icon"></li>
			<li class="l_tit">验证码</li>
			<li class="mb_10"><input type="text" name="verify" class="login_input user_icon"></li>
			<li><img id="imgNumber" src="getVerify.php" alt="" onmouseup="changeImage()"/><span id="lsc">点击图片换一张</span></li>
			<li class="autoLogin"><input type="checkbox" id="a1" class="checked"><label for="a1">自动登陆&nbsp;&nbsp;&nbsp;</label><input type="checkbox" id="a2" class="checked"><label for="a2">保存密码</label></li>
			<li><input type="submit" value="" class="login_btn"/></li>
		</ul>
		<div class="login_partners">
			<p class="l_tit">使用合作方账号登陆网站</p>
			<ul class="login_list clearfix">
				<li><a href="#">QQ</a></li>
				<li><span>|</span></li>
				<li><a href="#">网易</a></li>
				<li><span>|</span></li>
				<li><a href="#">新浪微博</a></li>
				<li><span>|</span></li>
				<li><a href="#">腾讯微薄</a></li>
				<li><span>|</span></li>
				<li><a href="#">新浪微博</a></li>
			</ul>
		</div>
	</div>
	<a class="reg_link" href="register.php"></a>
</div>
</form>

<div class="hr_25"></div>
<div class="footer">
	<p><a href="#">San412简介</a><i>|</i><a href="#">San412公告</a><i>|</i> <a href="#">招纳贤士</a><i>|</i><a href="#">联系我们</a></p>
</div>
</body>
</html>
