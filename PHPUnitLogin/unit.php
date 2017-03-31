<?php
class unit {
    
    public $report;
    
    function report()
    {
        $output = '';
        foreach($this->report as $report)
        {
            $output .= $report;
        }
        return $output;
    }
    
    function run($result,$type,$content){
        $assert = 'Failed';
        if($this->_do_assert($result,$type))
            $assert = 'Passed';    
        $result = array('assert'=>$assert,'type'=>$type,'content'=>$content);
        $report = $this->display($result);
        $this->report[] = $report;
        return $report;
    }
    
    public function display($report){
        ob_start();
        require('unit_display.php');
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
    
    /**
     * [_do_assert description]
     * @param  [string] $func   [待测函数]
     * @param  [string] $type   [eg:is_true,is_false,...]
     * @return [boolean]        [description]
     */
    private function _do_assert($func, $type)
    {
        if(method_exists($this,'_'.$type)){
            $method = '_'.$type;
            return $this->$method($func);
        }
        return FALSE;
    }
    
    private function _is_true($func){
        if($func == TRUE)
            return TRUE;
        return FALSE;
    }
    
    private function _is_false($func){
        if($func == FALSE)
            return TRUE;
        return FALSE;
    }
}
