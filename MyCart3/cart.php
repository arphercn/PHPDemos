<?php
// include('cart.inc.php');
include('header.php');
?>
        <div class="clearfix"></div>
        <ol class="breadcrumb">
            <li><a href="index.php">首页</a></li>
            <li class="active">购物车</li>
        </ol>
        <form id="form">
            <div class="wrap-cart">
                <div class="wrap-rows-top row">
                    <div class="col-md-6">商品名称</div>
                    <div class="col-md-2">单价(元)</div>
                    <div class="col-md-2">
                        购买数量
                    </div>
                    <div class="col-md-2">小计(元)</div>
                </div>
                <div class="wrap-rows row">
                    <div class="col-md-6">ipad</div>
                    <div class="col-md-2">$3.00</div>
                    <div class="col-md-2">
                        <input type="number" id="3" class="price-num col-num btn" value="1">
                    </div>
                    <div class="col-md-2">9.00</div>
                </div>
                <div class="wrap-rows row">
                    <div class="col-md-6">ipad</div>
                    <div class="col-md-2">$3.00</div>
                    <div class="col-md-2">
                        <input type="number" class="col-num btn" value="1">
                    </div>
                    <div class="col-md-2">9.00</div>
                </div>
                <div class="promot-show">
                    暂无优惠券?使用优惠券
                </div>
                <div class="price-total">
                    <span>总价:</span>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="" class="btn btn-warning">去结算</a>
                </div>
            </div>
        </form>
    </div>
</body>
<script type="text/javascript">

    $('.price-num').change(function(){
        var id = $(this).attr('id');
        var num = $(this).val();
        if(num<1){
            $(this).val(1);
            num = 1;
        }
        
        
        $.ajax({
            type: "POST",
            dataType:"json",
            url: "cart.inc.php",
            data: $('#form').serialize(),
            success: function(obj){
                if(obj.code=="1"){
                    alert(obj.msg);
                }else{
                    alert(obj.msg);
                }
            }
        });
    });

</script>
</html>