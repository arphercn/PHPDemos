<?php  
class Cart{  
    protected $goods = array();

    public function addCart(Goods $goods,$number = 1){
        $i = count($this -> goods);
        $this -> goods[$i]['goods'] = $goods;
        $this -> goods[$i]['number'] = $number;
    }

    public function getCart(Sales $sales){
        if(!$this -> goods)
            throw new Exception("Cart is empty");
        foreach($this -> goods as $goods){
            $sales -> sales($goods);
        }
        return $this -> goods;
    } 

}