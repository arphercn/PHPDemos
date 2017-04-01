<?php  
class Sales{  
    protected $callback;

    public function __construct(){}

    public function addCallBack($callback){
        if(!is_callable($callback))
            throw new Exception("$callback is not callable");
        $this -> callback[] = $callback;
    }

    public function sales($goods){
        foreach($this -> callback as $call){
            $good = &$goods;
            call_user_func($call,$good);
        }
    }
}