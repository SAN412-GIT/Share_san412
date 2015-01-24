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