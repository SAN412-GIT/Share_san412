<?php

/**
 * descript:创建新文件
 * @param  $filename：文件名  $filepath ：文件存储的路径
 * @return  $fp ：返回文件句柄
 */
function create_newfile($filename,$filepath){
    if(!file_exists($filepath)){
        mkdir($filepath, 0777, true);
        chmod($filepath, 0777);
    }
    $destination = $filepath . $filename;
    $fp = fopen($destination, "w+");
    return $fp;
}

/**
 * descript: 写入文件
 * @param  $fp
 * @param  $content
 */
function file_write($fp,$content){
        fwrite($fp, $content);
}

/**
 * descript: 读取文件
 * @param  $fp $filename $filepath
 * @return  $content
 */
function file_read($fp,$destination){
    if(file_exists($destination)){
        $content = fread($fp,filesize($destination) );
    }else {
        echo "文件不存在";
    }
    return $content;
}