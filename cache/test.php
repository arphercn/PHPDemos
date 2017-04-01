<?php
/**
 * output_buffering = off 情况下测试
 */
ob_start();  //开启ob缓存
echo 'hello1'; //存入ob缓存
header('content-type:text/html;charset=utf-8');//存入程序缓存
// ob_end_clean(); //ob_end_clean — 清空（擦除）缓冲区并关闭输出缓冲
// ob_clean(); //ob_clean — 清空（擦掉）输出缓冲区
echo 'hello2'; //存入ob缓存
$str = ob_get_contents(); //返回ob缓存的数据（不清除缓冲内容）
file_put_contents('ob.txt', $str); //把$str保存到文件
echo 'hello3'; //存入ob缓存
echo 'hello4'; //存入ob缓存
// 首先,命名好ob.txt文件
/* 此脚本将,ob.txt文件存入hello1hello2，浏览器输出hello1hello2hello3hello4 */
/* 若ob_clean()注释打开，ob.txt文件存入hello1hello2，，浏览器输出hello3hello4 */
/* 若ob_end_clean()注释打开，那么ob.txt中依然没有内容，因为关闭了ob缓存，浏览器输出hello2hello3hello4 */