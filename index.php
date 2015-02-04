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
	<div id="top-navigation">
		<p class="text_1">分享你的故事，分享你的知识</p>
	</div>
	<div class="border_1"></div>
	<div class="back body-content">
	<div class="menu">
	                    <div class="long_string">
	                             <?php
	                             require_once 'include.php';
	                             if(isset($_COOKIE['username']) and $_COOKIE['password']){
	                                 $username = $_COOKIE['username'];
	                                 $password = $_COOKIE['password'];
	                                 $sql = "select * from san412_user where username='{$username}' and password='{$password}'";
	                                 if (checkUser($sql)) {
	                                     $_SESSION['username'] = $username;
	                                 }
	                             }   
	                             if(isset($_SESSION['username'])){
	                                 echo "<p class=\"text_2 pos_1\">您好，".$_SESSION['username']."<span>&nbsp;<a class=\"text_2 pos_4\" href=\"logout.php\">退出</a></span></p>";
	                              //   echo "<a class=\"text_2 pos_4\" href=\"#\">退出</a>";
	                             }else{
	                                  echo "<a href=\"login.php\" class=\"text_2 pos_2\">登录</a>";
	                             }
	                             ?>
	                              <a href="sendpassage.php" class="text_2 pos_3">发帖</a>
	                    </div>
	    </div>
	    <div class="border_2"> </div>
	    <div class="caption">
			<div class="left">
				<a href="#"><img src="images/user_pic/pic_1.png"></a>
			</div>
			<div class="right text_3">
				<a href="#">MakuluLinux 2.0 “Cinnamon” 发布</a>
				<p>Makulu （发音 “Ma-Cool-Loo”）在祖鲁语里是“大酋长”的意思。MakuluLinux 是一个 Debian 系的
					Linux 发行版，提供在各种计算机上的平滑、稳定的用户操作体验。 MakuluLinux 2.0 "Cinnamon"
					版本发布，作为1.0版本的延续，2.0版本进一步打磨、 优化，并修复了1.0版本中大量的问题。许多小的改进使系统运行起来更加流畅。</p>
			</div>
		</div>
		<?php 
		$pageSize = 5;
		$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
		$rows = getOffsetRows($pageSize,$page);
		foreach ($rows as $values){?>
        <div class="border-section"></div>
		<div class="caption">
		<div class="left">
				<a href="#"><img src="images/user_pic/pic_1.png"></a>
			</div>
			<div class="right text_3">
				<a href="#"><?php 
				$filename = $values['filePath'];
				$fp = fopen($filename, "r");
				$subject = file_read($fp, $filename);
				fclose($fp);
				$pattern = '/^title:.*/';
               preg_match($pattern, $subject, $matches);
               $tiltle = substr($matches[0], "6");
               echo $tiltle;?></a>
				<p><?php 
				$filename = $values['filePath'];
				$fp = fopen($filename, "r");
				$subject = file_read($fp, $filename);
				fclose($fp);
				 $pattern = '/summary:.*/';
               preg_match($pattern, $subject, $matches);
               $tiltle = substr($matches[0], "8");
               echo $tiltle;?></p>
			</div>
		</div>
		<?php }?>
		<div>
		      <?php 
		                     $url = $_SERVER['PHP_SELF'];
		                    $totalPage = getotalPage($pageSize);
		                    for($i=1;$i<=$totalPage;$i++){
 		                         if($page==$i){
 		                             echo "<p class=\"left\">[".$i."]</p>";
 		                         }else{
		                             echo "<a href=\"{$url}?page={$i}\"  class=\"left\">[".$i."]</a>"; 
 		                         }
 		                    }  
 		       ?>
		</div>
		</div>
</body>
</html>