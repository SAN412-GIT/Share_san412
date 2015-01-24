<?php
/**
*descript:连接数据库
*@return $link:数据库的句柄
*/
function connect(){
   $link=mysqli_connect(DB_HOST,DB_USER,DB_PWD) or die("Erorr connecting to MySQL.");
   mysqli_set_charset($link,DB_CHARSET);
   mysqli_select_db($link,DB_DBNAME) or die("Erorr connecting to MySQL Database.");
   return $link;
}
/**
*descript:插入新记录
*$table:表名 $array:想要插入的数据的数组array(keys=>values);
*@return mysql_insert_id():返回插入的数据在表中对应的ID号
*/
function insert( $link,$table,$array){
    $key=join(",", array_keys($array));
    $vals="'".join("','",array_values($array))."'";
    $sql="insert into $table ($key) values($vals)";
    mysqli_query($link,$sql);
    return mysqli_insert_id( $link);
}
/**
*descript:更新记录
*$table:表名 $array:想要插入的数据的数组array(keys=>values); $where:筛选的条件
*@return mysql_affected_rows():更新数据的数量
*/
function update( $link,$table,$array,$where=NULL){
    $str=null;
    foreach($array as $key=>$val){
        if($str==null){
            $sep="";
        }else {
            $sep=",";
        }
        $str.=$sep.$key."='".$val."'";
    }
    $sql="update $table set $str ".($where==null?null:"where ".$where);
    mysqli_query( $link,$sql);
    return mysqli_affected_rows( $link);
}
/**
*descript:删除记录
*$table:表名 $where:筛选的条件
*@return mysql_affected_rows():删除记录的数量
*/
function delete( $link,$table,$where=NULL){
    $where=$where==null?null:"where ".$where;
    $sql="delete from $table $where";
    mysqli_query( $link,$sql);
    return mysqli_affected_rows( $link);
}
/**
*descript:得到指定的一条记录
*$sql:SQL语句 $result_type:返回结果类型
*@return $row
*/
function fetchOne( $link,$sql,$result_type=MYSQL_ASSOC){
    $result=mysqli_query( $link,$sql);
    $row=mysqli_fetch_array($result,$result_type);
    return $row;
}
/**
*descript:得到结果集中的所有记录
*$sql:SQL语句 $result_type:返回结果类型
*@return $row
*/
function fetchAll( $link,$sql,$result_type=MYSQL_ASSOC){
    $result=mysqli_query( $link,$sql);
    while (@$row=mysqli_fetch_array($result,$result_type)){
        $rows[]=$row;
    }
    return $rows;
}
/**
 *descript:得到结果集中的所有记录的条数
 *$sql:SQL语句 $result_type:返回结果类型
 *@return mysql_num_rows($result):结果集中的所有记录的条数
 */
function getResultNum( $link,$sql){
    $result=mysqli_query( $link,$sql);
    return mysqli_num_rows($result);
}

