<?php
/**
 * 购物车类
 */
session_start();
class Cart{

    private static $ins = null;
    private $items = array();

    protected function __construct(){}

    // 获取实例
    protected static function getIns(){
        if(!(self::$ins instanceof self)){
            self::$ins = new self();
        }
        return self::$ins;
    }

    // 把购物车的单例对象放到session中
    public static function getCart(){
        if(!isset($_SESSION['cart']) || !($_SESSION['cart'] instanceof self)){
            $_SESSION['cart'] = self::getIns();
        }
        return  $_SESSION['cart'];
    }

    /**
     * 添加商品
     * @param int $id 商品ID
     * @param string $name 商品名称
     * @param float $price 商品价格
     * @param int $num 购买商品数量
     */
    public function addItem($id,$name,$price,$num=1){
        # 商品已经在购物中,就添加其数量
        if($this->hasItem($id)){
            $this->incCartNum($id,$num);
            return true;
        }
        $this->items[$id] = array(
            'id'    => $id,
            'name'  => $name,
            'price' => $price,
            'num'   => $num
        );
        return true;
    }

    /**
     * 清空购物车
     */
    public function clearCart(){
        $this->items = array();
    }

    /**
     * 判断一个商品是否存在
     * @param int $id 商品ID
     */
    public function hasItem($id){
        return array_key_exists($id,$this->items);
    }

    /**
     * 修改购物车中的商品数量
     * @param int $id 商品ID
     * @param int $num 某个商品修改后的数量,即直接把某商品的数量改为$num
     */
    public function modifyCartNum($id,$num=1){
        if(!$this->hasItem($id)){
            return false;
        }
        $this->items[$id]['num'] = $num;
    }

    /**
     * 商品数量增加1
     */
    public function incCartNum($id,$num=1){
        if($this->hasItem($id)){
            $this->items[$id]['num'] += $num;
        }
    }

    /**
     * 商品数量减少1
     */
    public function decCartNum($id,$num=1){
        if($this->hasItem($id)){
            $this->items[$id]['num'] -= $num;
        }
        if($this->items[$id]['num'] < 1){
            $this->deleteCartGoods($id);
        }
    }

    /**
     * 删除商品
     */
    public function deleteCartGoods($id){
        return unset($this->items[$id]);
    }

    /**
     * 查询购物车商品种类的数量
     */
    public function getCount(){
        return count($this->items);
    }

    /**
     * 查询购物车商品的个数
     */
    public function getGoodsNum(){
        if($this->getCount == 0) return 0;

        $sum = 0;
        foreach($this->items as $item){
            $sum += $item['num'];
        }

        return $sum;
    }

    /**
     * 查询购物车商品的总金额
     */
    public function getGoodsPriceTotal(){
        if($this->getCount == 0) return 0;

        $price = 0.0;
        foreach($this->items as $item){
            $price += $item['num']*$item['price'];
        }

        return $price;
    }

    /**
     * 返回购物车的所有商品
     */
    public function getCartList(){
        if($this->getCount == 0) return false;

        return $this->items;
    }

}