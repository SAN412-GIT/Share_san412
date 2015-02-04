<?php 
require_once 'include.php';
if (!isset($_SESSION['username'])) {
    echo "<script>alert('请先登录');</script>";
    echo "<script>window.location='login.php';</script>";
}
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<title>SAN412分享平台</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link type="text/css" rel="stylesheet" href="styles/reset.css">
<link type="text/css" rel="stylesheet" href="styles/main.css">
<link type="text/css" rel="stylesheet" href="styles/homepage.css">
</head>
<body>
         <div>
              <form action="doSend.php" method="post">
                <ul>
					<li class="l_tit">文章标题</li>
					<li class="mb_10"><input type="text" name="title" class="send_title user_icon text_10"></li>
					<li class="l_tit">文章摘要（少于200字）</li>
					<li class="mb_10"><textarea name="summary" class="send_summary user_icon text_10"></textarea> </li>
					<li class="l_tit">文章内容</li>
					<li class="mb_10"><textarea name="content" class="send_content user_icon text_10"></textarea></li>
					<li><input type="submit"  value="发帖" class="sub"></li>
				</ul>
			</form>
         </div>
</body>
</html>
