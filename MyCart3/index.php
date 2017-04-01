<?php
include('header.php');
?>
        <div class="wrap-in">
            <ul id="tabUl" class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#">电子</a></li>
                <li role="presentation"><a href="#">食品</a></li>
                <li role="presentation"><a href="#">日用品</a></li>
                <li role="presentation"><a href="#">酒类</a></li>
            </ul>
            <div id="tabDiv" class="goods-wrap">
                <div class="goods">
                    <div>
                        <div class="price">$3.00</div>
                        <a href="detail.php">
                            <div class="name">ipad</div>
                        </a>
                    </div>
                    <div>
                        <div class="price">$3.00</div>
                        <div class="name">iphone</div>
                    </div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div class="hide-div goods">
                    <div>
                        <div class="price">$3.00</div>
                        <div class="name">面包</div>
                    </div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div class="hide-div goods">
                    <div>
                        <div class="price">$3.00</div>
                        <div class="name">餐巾纸</div>
                    </div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div class="hide-div goods">
                    <div>
                        <div class="price">$3.00</div>
                        <div class="name">啤酒</div>
                    </div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    $(function(){
        $('#tabUl li').click(function(){
            var _this = $(this);
            var index = _this.index();
            setTimeout(function(){
                _this.addClass('active').siblings().removeClass('active');
                $('#tabDiv>div').eq(index).show().siblings().hide();
            },100);
        });
    });
</script>
</html>