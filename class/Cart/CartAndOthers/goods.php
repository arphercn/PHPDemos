<?php  
class Goods{  
    protected $name = '';
    protected $price = 0.00;
    protected $class = null;
    protected $salesPrice = 0.00;

    public function __construct($name,$price,$class){
        $this -> name = $name;
        $this -> price = $price;
        $this -> class = $class;
    }

    public function setSalesPrice($price){
        $this -> salesPrice = $price;
    }

    public function getPrice(){
        return $this -> price;
    }

}