<?php
if(empty($_GET['page']) or $_GET['page']=='0'){
    $thispage=1;
}else{
    $thispage=$_GET['page'];
}
if($thispage<1){
    $thispage=1;
}
$pagerow=4;
$pagestart=($thispage-1)*$pagerow;

//sql查询条件
$countsql="select count(*) as count from aijiacms_sale_5
          where itemid>0 ";
$sql="select * from aijiacms_sale_5
      where itemid>0
      order by edittime desc
      limit $pagestart,$pagerow ";
$count=$db->get_one($countsql);
$arr=$db->get_all($sql);

$pagecount=ceil($count['count']/$pagerow);
$pager=get_pages($thispage,$pagecount);

//HTML输出分页
<p><?php echo $pager;?></p>
//函数
function get_pages($currentpage,$pagecount,$parameter = '')
{
    global $PHP_SELF;
    $start = $currentpage-4;
    $end   = $currentpage+5;
    if($start<1) $start=1;
    if($currentpage<5 && $pagecount>=10) $end=10;
    if($end>$pagecount) $end=$pagecount;
    $pagelinks='<a href="'.$PHP_SELF.'?'.$parameter.'&page=1">首页</a> ';
    for($i=$start; $i<=$end; $i++)
    {
        if($currentpage==$i)
        {
            $pagelinks.='<span style="color:red">'.$i.'</span>';
        }
        else
        {
            $pagelinks.='<a href="'.$PHP_SELF.'?'.$parameter.'&page='.$i.'">['.$i.']</a>&nbsp;';
        }
    }
    $pagelinks.="<span>共有".$pagecount."页</span>";
    return $pagelinks;
}