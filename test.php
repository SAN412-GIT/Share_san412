<?php
require_once 'include.php';
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
$sql = "select * from san412_passage where id='3'";
$row = checkUser($sql);
$filename = $row['filePath'];
$fp = fopen($filename, "r");
$subject = file_read($fp, $filename);
fclose($fp);
//echo $subject;
$pattern = '/^title:.*/';
// $pattern = '/summary:.*/';
// $pattern = '/content:.*/';
preg_match($pattern, $subject, $matches);
$tiltle = substr($matches[0], "6");
echo $tiltle;
?>