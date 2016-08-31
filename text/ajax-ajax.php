<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/4
 * Time: 10:08
 */

//header("Content-Type:application/x-www-form-urlencoded;charset=utf-8");//文件传输
header("Content-Type:application/json;charset=utf-8");//JSON语法传输数据
//header("Content-Type:text/html;charset=utf-8");//超文本传输
//header("Content-Type:text/plain;charset=utf-8");//纯文本传输
$Arrays = array
(
    array("name" => "啊1", "number" => "1", "job" => "文秘"),
    array("name" => "啊2", "number" => "2", "job" => "老板"),
    array("name" => "啊3", "number" => "3", "job" => "总经理"),
    array("name" => "啊4", "number" => "4", "job" => "程序员")
);

//echo $_SERVER["REQUEST_METHOD"];
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    search();
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    create();
}

function search()
{
    if (!isset($_GET['number']) || empty($_GET['number'])) {
        echo '{"success":"false","msg":"参数错误"}';
        return;
    }
    $get = $_GET["number"];
    $result = '{"success":"false","msg":"找不到员工"}';
    global $Arrays;
    foreach ($Arrays as $Array) {
        if ($Array['number'] == $get) {
            $result =
                '{
                    "success":true,
                    "msg":"找到员工:账号为:' . $Array["number"] . ',姓名为:' . $Array["name"] . ',职位为:' . $Array["job"] . '"
                }';
            break;
        }

    }
    echo $result;
    return;
}

function create()
{

}