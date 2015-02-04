<?php
/**
*descript:检测用户信息
*@return
*/
function checkUser($sql)
{
    $link=connect();
    $row = fetchOne($link,$sql);
    mysqli_close($link);
    return $row;
}
/**
 *descript:获取用户
 *@return
 */
function GetUserId($sql)
{
    $link=connect();
    $row = fetchOne($link,$sql);
    mysqli_close($link);
    return $row['id'];
}
/**
 *descript:注册用户信息
 *@return
 */
function registerUser($array)
{
    $link=connect();
    $id=insert($link,"san412_user",$array);
    mysqli_close($link);
    return $id;
}

/**
 * *descript:记录passage信息
*@return
*/
function registerPassage($array)
{
    $link=connect();
    $id=insert($link,"san412_passage",$array);
    mysqli_close($link);
    return $id;
}
/**
 * descript:获取所有记录数组
 * @param unknown $sql
 * @return $row
 */
function getRows($sql){
    $link=connect();
    $rows = fetchAll($link,$sql);
    return $rows;
}