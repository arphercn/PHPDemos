<?php 
// http://www.kisshc.com/php-oop-cart/ 
include "./cart.php";  
include "./goods.php";  
include "./sales.php";

$pc = new Goods("Lenovo g470",4700.00,"electron");
$phone = new Goods("iphone 6plues s",5800.00,"electron");
$sofa = new Goods("QiangLi 4529",14000.00,"furniture");

$cart = new Cart();
$cart -> addCart($pc,2);
$cart -> addCart($phone,3);
$cart -> addCart($sofa,1);

//单个商品满两个以上8折
$sales1 = function(&$goods){
    $number = $goods['number'];
    $goods = $goods['goods'];
    if($number > 1){
        $price = $goods -> getPrice();
        $price *= 0.8;
        $goods -> setSalesPrice($price);
    }
};


//促销
$sales = new Sales();
$sales -> addCallBack($sales1);

//促销后的物品价格
$goods = $cart -> getCart($sales);

echo '<pre>';  
print_r($goods);