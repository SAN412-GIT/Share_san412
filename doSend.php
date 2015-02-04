<?php
require_once 'include.php';
$title = $_POST['title'];
$summary = $_POST['summary'];
$content = $_POST['content'];
$content1 = "title:" . $title . "\n" . "summary:" . $summary . "\n" . "content:" . $content;
$filename = "passage_" . md5(uniqid(microtime(true), true));
$filepath = "file/";
$destination = $filepath . $filename;
$fp = create_newfile($filename, $filepath);
file_write($fp, $content1);
fclose($fp);
$username = $_SESSION['username'];
$sql = "select * from san412_user where username='{$username}'";
$pid = GetUserId($sql);
$array = array(
    "pid" => $pid,
    "filePath" => $destination
);
if(registerPassage($array)){
    echo "<script>alert('success');</script>";
}else{
    echo "<script>alert('fault');</script>";
}
echo "<script>window.location='index.php';</script>";
