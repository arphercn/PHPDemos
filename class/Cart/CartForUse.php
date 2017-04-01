<?php
header("Content-type:text/html;charset=utf-8");
session_start();
$cart = Cart::getCat('_test');
//cart经过一次实例化之后，任意页面都可以通过$_SESSION['cat_test']调用cart类的相关方法
$_SESSION['cat_test']->addItem('1','苹果','1','8.03');
$cart->addItem('2','香蕉','3','6.5');
echo '<pre>';
print_r($_SESSION);
echo '获取购物车商品名称：'.$_SESSION['cat_test']->item[1]['name'],';',$_SESSION['cat_test']->item[2]['name'];
echo '<br />';
echo '购物车中共有商品总数：',$cart->getNumber();
echo '<br />';
echo '购物车中商品总价：',$_SESSION['cat_test']->getPrice();
//session_destroy();
//$_SESSION['cat_test']->emptyItem();