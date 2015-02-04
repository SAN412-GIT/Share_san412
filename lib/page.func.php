<?php
/**
 * descript:获取当前页记录
 * @param unknown $pageSize:每页文章的数量
 * @return $offset :偏移值
 */
function getOffsetRows($pageSize = 5,$page = 1)
{
    $sql = "select * from san412_passage";
    $link = connect();
    $totalRows = getResultNum($link, $sql);
    $totalPage = ceil($totalRows / $pageSize);
    if ($page < 1 || $page == null || ! is_numeric($page)) {
        $page = 1;
    }
    if ($page >= $totalPage) {
        $page = $totalPage;
    }
    $offset = ($page - 1) * $pageSize;
    $sql = "select * from san412_passage where id between ".($totalRows-$offset-4).
    " and ".($totalRows-$offset) ." order by id desc";
    $rows = getRows($sql);
    return $rows;
}
/**
 * descript:获取总页数
 * @param number $pageSize
 * @return number
 */
function getotalPage($pageSize = 5){
    $sql = "select * from san412_passage";
    $link = connect();
    $totalRows = getResultNum($link, $sql);
    $totalPage = ceil($totalRows / $pageSize);
    return $totalPage;
}