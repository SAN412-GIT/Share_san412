<?php 
require_once 'include.php';
?>
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
	<div>
		<div class="logoBar login_logo">
			<div class="comWidth">
				<div class="logo fl">
					<a href="#"><img src="images/icon/san412_logo.png" alt="分享你的故事"></a>
				</div>
				<h3 class="welcome_title">欢迎登陆</h3>
			</div>
		</div>
	</div>
	<div class="share"></div>
	<div class="loginBox">
		<div class="login_cont">
			<form method="post">
				<ul>
					<li class="l_tit">邮箱/用户名/手机号</li>
					<li class="mb_10"><input type="text" name="username"
						class="login_input user_icon"
						<?php
	if(isset($_SESSION['username1'])){
	    echo "value={$_SESSION['username1']}";
	}else if (isset($_COOKIE['username'])) {
        echo "value={$_COOKIE['username']}";
    } else {
    }
    ?>></li>
					<li class="l_tit">密码</li>
					<li class="mb_10"><input type="password" name="password"
						class="login_input user_icon"
						<?php
	if(isset($_SESSION['username1'])){
		echo "value={$_SESSION['username1']}";
	}else if (isset($_COOKIE['password'])) {
        echo "value={$_COOKIE['password']}";
    } else {}
    ?>></li>
					<li class="l_tit">验证码</li>
					<li class="mb_10"><input type="text" name="verify"
						class="login_input user_icon"></li>
					<li><img id="imgNumber" src="getVerify.php" alt=""
						onmouseup="changeImage()" /><span id="lsc">点击图片换一张</span></li>
					<li class="autoLogin"><input name="autoLogin" type="checkbox"
						id="a1" class="checked"><label for="a1">自动登陆&nbsp;&nbsp;&nbsp;</label><input
						name="savepasswd" type="checkbox" id="a2" class="checked"
						<?php
    if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
        echo "checked=\"checked\"";
    } else {}
    ?>><label for="a2">保存密码</label></li>
					<li><input type="hidden" " name="execution"></input></li>
					<li><input type="submit" value="" class="login_btn" /></li>
				</ul>
			</form>
			<div class="reg_1">
				<a href="register.php"> 没有账号？免费注册</a>
			</div>
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
	</div>

	<div class="hr_25"></div>
	<div class="footer">
		<p>
			<a href="#">San412简介</a><i>|</i><a href="#">San412公告</a><i>|</i> <a
				href="#">招纳贤士</a><i>|</i><a href="#">联系我们</a>
		</p>
	</div>
</body>
</html>
<?php
if (isset($_POST['execution'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $verify = $_POST['verify'];
    $verify1 = $_SESSION['verify'];
    if ($verify == $verify1) {
        $sql = "select * from san412_user where username='{$username}' and password='{$password}'";
        if (checkUser($sql)) {
            echo "<script>alert('登陆成功');</script>";
            $_SESSION['username'] = $username;
            echo "<script>window.location='index.php';</script>";
//             unset($_POST['execution']);
            if (isset($_POST['autoLogin'])) {}
            if (isset($_POST['savepasswd'])) {
                setcookie("username", $username, time() + 7 * 24 * 3600);
                setcookie("password", $password, time() + 7 * 24 * 3600);
            } else {
                setcookie("username", "", time() - 3600);
                setcookie("password", "", time() - 3600);
            }
        } else {
            setcookie("username1", $username, time());
            echo "<script>alert('用户名或密码错误');</script>";
//             unset($_POST['execution']);
        }
    } else {
       $_SESSION['username1'] = $username;
       $_SESSION['password1'] = $password;
        echo "<script>alert('验证码错误');</script>";
//         unset($_POST['execution']);
    }
}
?>
