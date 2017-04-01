<?
/*******************************
* author:http://www.phpernote.com/php-function/708.html
* date:2013 年 04 月 11 日
*******************************/
class Cart{
    static protected $ins; //实例变量
    public $item=array(); //放商品容器
    //禁止外部调用
    final protected function __construct(){}
    //禁止克隆
    final protected function __clone(){}
    //类内部实例化
    static protected function getIns(){
        if(!(self::$ins instanceof self)){
            self::$ins=new self();
        }
            return self::$ins;
    }
    //为了能使商品跨页面保存，把对象放入session里，这里为了防止冲突，设置了一个session后缀参数
    public static function getCat($sesSuffix='phpernote'){
        if(!isset($_SESSION['cat'.$sesSuffix])
            ||!($_SESSION['cat'.$sesSuffix] instanceof self)){
            $_SESSION['cat'.$sesSuffix]=self::getIns();
        }
        return $_SESSION['cat'.$sesSuffix];
    }
    //入列时的检验，是否在$item里存在
    public function inItem($goods_id){
        if($this->getTypes()==0){
            return false;
        }
        //这里检验商品是否相同是通过goods_id来检测，并未通过商品名称name来检测，具体情况可做修改
        if(!(array_key_exists($goods_id,$this->item))){
            return false;
        }else{
            return $this->item[$goods_id]['num']; //返回此商品个数
        }
    }
    //添加一个商品
    /*
    * goods_id 唯一id
    * name 名称
    * num 数量
    * price 单价
    */
    public function addItem($goods_id,$name,$num,$price){
        if($this->inItem($goods_id)!=false){
            $this->item[$goods_id]['num']+=$num;
            return;
        }
        $this->item[$goods_id]=array(); //一个商品为一个数组
        $this->item[$goods_id]['num']=$num; //这一个商品的购买数量
        $this->item[$goods_id]['name']=$name; //商品名字
        $this->item[$goods_id]['price']=floatval($price); //商品单价
    }
    //减少一个商品
    public function reduceItem($goods_id,$num){
        if($this->inItem($goods_id)==false){
            return;
        }
        if($num>$this->getNum($goods_id)){
            unset($this->item[$goods_id]);
        }else{
            $this->item[$goods_id]['num']-=$num;
        }
    }
    //去掉一个商品
    public function delItem($goods_id){
        if($this->inItem($goods_id)){
            unset($this->item[$goods_id]);
        }
    }
    //返回购买商品列表
    public function itemList(){
        return $this->item;
    }
    //一共有多少种商品
    public function getTypes(){
        return count($this->item);
    }
    //获得一种商品的总个数
    public function getNum($goods_id){
        return $this->item[$goods_id]['num'];
    }
    // 查询购物车中有多少个商品
    public function getNumber(){
        $num=0;
        if($this->getTypes()==0){
            return 0;
        }
        foreach($this->item as $k=>$v){
            $num+=$v['num'];
        }
        return $num;
    }
    //计算总价格
    public function getPrice(){
        $price=0;
        if($this->getTypes()==0){
            return 0;
        }
        foreach($this->item as $k=>$v){
            $price+=floatval($v['num']*$v['price']);
        }
        return $price;
    }
    //清空购物车
    public function emptyItem(){
        $this->item=array();
    }
}