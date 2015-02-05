<?php 
require_once 'include.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>注册</title>
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
		<div class="logoBar red_logo">
			<div class="comWidth">
				<div class="logo fl">
					<a href="#"><img src="images/icon/san412_logo.png" alt="分享你的故事"></a>
				</div>
				<h3 class="welcome_title">欢迎注册</h3>
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
	                               if(isset($_SESSION['username2'])){
		                                   echo "value={$_SESSION['username2']}";
	                               } 
                         ?>></li>
					<li class="l_tit">密码</li>
					<li class="mb_10"><input type="password" name="password"
						class="login_input user_icon" 
						<?php
	                               if(isset($_SESSION['password2'])){
		                                   echo "value={$_SESSION['password2']}";
	                               } 
                         ?>></li>
					<li class="l_tit">确认密码</li>
					<li class="mb_10"><input type="password" name="password1"
						class="login_input user_icon" 
						<?php
	                               if(isset($_SESSION['password3'])){
		                                   echo "value={$_SESSION['password3']}";
	                               } 
                         ?>></li>
					<li class="l_tit">验证码</li>
					<li class="mb_10"><input type="text" name="verify"
						class="login_input user_icon"></li>
					<li><img id="imgNumber" src="getVerify.php" alt=""
						onmouseup="changeImage()" /><span id="lsc">点击图片换一张</span></li>
					<li><input type="hidden"  name="execution" /></li>
					<li><input type="submit" value="" class="reg_btn" /></li>
				</ul>
			</form>
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
    $password1 = $_POST['password1'];
    $verify = $_POST['verify'];
    $verify1 = $_SESSION['verify'];
    if ($verify == $verify1) {
        $sql = "select * from san412_user where username='{$username}'";
        if ($password == $password1) {
            if (checkUser($sql)) {
                echo "<script>alert('用户名已存在');</script>";
                echo "<script>window.location='register.php';</script>";
            } else {
                date_default_timezone_set("PRC");
                $time = date("Y-m-d",time());  //此处有问题，由于数据库中regTime类型为int(10)整形，所以只能记录下2015
                $array = array(
                    "username" => $username,
                    "password" => $password,
                    "regTime" => $time
                );
                if(registerUser($array)){
                    echo "<script>alert('注册成功');</script>";
                    echo "<script>window.location='login.php';</script>";
                }
            }
        } else {
            $_SESSION['username2'] = $username;
            if(isset($_SESSION['password2'])){
                    unset($_SESSION['password2']);
            }
            if(isset($_SESSION['password3'])){
                    unset($_SESSION['password3']);
            }
            echo "<script>alert('两次密码输入不一致');</script>";
            echo "<script>window.location='register.php';</script>";
        }
    } else {
        $_SESSION['username2'] = $username;
        $_SESSION['password2'] = $password;
        $_SESSION['password3'] = $password1;
        echo "<script>alert('验证码错误');</script>";
        echo "<script>window.location='register.php';</script>";
    }
}
?>