<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo ($web["title"]); ?></title>
    <meta name="description" content="<?php echo ($web["desc"]); ?>"/>
    <meta name="keywords" content="<?php echo ($web["keyword"]); ?>" />
    <link rel="stylesheet" type="text/css" href="/Public/admin/assets/css/font-awesome.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="/Public/admin/assets/js/jquery-1.10.2.min.js"></script>
</head>
<style>
    a{
        text-decoration:none;
        color: #0a001f;
    }
    li{
        text-decoration:none;
        list-style:none;
    }
    input{
        border: none;
        box-shadow: none;
    }
    .ml5b{
        margin-left: 5%;
    }
    .ml10b{
        margin-left: 10%;
    }
    .ml15b{
        margin-left: 15%;
    }
    .ml20b{
        margin-left: 20%;
    }
    .ml25b{
        margin-left: 25%;
    }
    .ml5{
        margin-left: 5px;
    }
    .ml10{
        margin-left: 10px;
    }
    .ml15{
        margin-left: 15px;
    }
    .ml20{
        margin-left: 20px;
    }
    .ml25{
        margin-left: 25px;
    }
    .ml30{
        margin-left: 30px;
    }
    .mr5{
        margin-right: 5px;
    }
    .mr10{
        margin-right: 10px;
    }
    .mr15{
        margin-right: 15px;
    }
    .mr20{
        margin-right: 20px;
    }
    .mr25{
        margin-right: 25px;
    }
    .mr30{
        margin-right: 30px;
    }
    .mt5{
        margin-top: 5px;
    }
    .mt10{
        margin-top: 10px;
    }
    .mt15{
        margin-top: 15px;
    }
    .mt20{
        margin-top: 20px;
    }
    .mt25{
        margin-top: 25px;
    }
    .mt30{
        margin-top: 30px;
    }
    .mb5{
        margin-bottom: 5px;
    }
    .mb10{
        margin-bottom: 10px;
    }
    .mb15{
        margin-bottom: 15px;
    }
    .mb20{
        margin-bottom: 20px;
    }
    .mb25{
        margin-bottom: 25px;
    }
    .mb30{
        margin-bottom: 30px;
    }
    .fl{
        float: left;
    }
    .fr{
        float: right;
    }
    .clear{
        clear: both;
    }
    .tc{
        text-align: center;
    }
    .lh20{
        line-height: 20px;
    }
    .lh30{
        line-height: 30px;
    }
    .lh40{
        line-height: 40px;
    }
    .lh50{
        line-height: 50px;
    }
    .w15{
        width: 15%;
    }
    .w20{
        width: 20%;
    }
    .w25{
        width: 25%;
    }
    .w30{
        width: 30%;
    }
    .w35{
        width: 35%;
    }
    .w40{
        width: 40%;
    }
    .w45{
        width: 45%;
    }
    .w50{
        width: 50%;
    }
    .w55{
        width: 55%;
    }
    .w60{
        width: 60%;
    }
    .w65{
        width: 65%;
    }
    .w70{
        width: 70%;
    }
    .w75{
        width: 75%;
    }
    .w80{
        width: 80%;
    }
    .w85{
        width: 85%;
    }
    .w90{
        width: 90%;
    }
    .w95{
        width: 95%;
    }
    .w100{
        width: 100%;
    }
    .h10{
        height: 10px;
    }
    .h20{
        height: 20px;
    }
    .h30{
        height: 30px;
    }
    .h40{
        height: 40px;
    }
    .h50{
        height: 50px;
    }
    .h60{
        height: 60px;
    }
    .h70{
        height: 70px;
    }
    .h80{
        height: 80px;
    }
    .h90{
        height: 90px;
    }
    .h100{
        height: 100px;
    }
    .h150{
        height: 150px;
    }
    .h200{
        height: 200px;
    }
    .h250{
        height: 250px;
    }
    .h300{
        height: 300px;
    }
    .white{
        background-color: white;
    }
    .black{
        background-color: black;
    }
    .grey{
        background-color:  #edf1f4;
    }
    .pink{
        background-color:  pink;
    }
    .themeColor{
        background-color: #3A3D65;
    }
    .c_white{
        color: white;
    }
    .c_red{
        color: red;
    }
    .c_black{
        color: black;
    }
    .c_grey{
        color:  #edf1f4;
    }
    .c_shit{
        color:  #ffba0d;
    }
    .c_pink{
        color:  pink;
    }
    .c_themeColor{
        color: #3A3D65;
    }
    .block{
        display: block;
    }
    .none{
        display: none;
    }
    .b-r-5{
        border-radius:5px
    }
    .b-r-10{
        border-radius:10px
    }
    .b-r-15{
        border-radius:15px
    }
    .b-r-20{
        border-radius:20px
    }
    .b-r-25{
        border-radius:25px
    }
    .b-r-30{
        border-radius:30px
    }
    .b-r-35{
        border-radius:35px
    }
    .b-r-40{
        border-radius:40px
    }
    .b-r-50{
        border-radius:50px
    }
    .b-r-60{
        border-radius:60px
    }
    .b-r-70{
        border-radius:70px
    }
    .ft14{
        font-size: 14px;
    }
    .ft16{
        font-size: 16px;
    }
    .ft18{
        font-size: 18px;
    }
    .ft20{
        font-size: 20px;
    }
    .ft22{
        font-size: 22px;
    }
    .ft24{
        font-size: 24px;
    }
    .ft26{
        font-size: 26px;
    }
    .ft28{
        font-size: 28px;
    }
    .bl{
        display: block;
    }

</style>
<body style="background-color: #fff;color: #000;">
<div>
    <div class="white" style="position: fixed;top: 0px;left:0px;width: 100%;display: inline-block;text-align: center;height: 40px;border-bottom: 1px solid #999;">
                <span style="width:100%;" class="fl grey bl h50 ">
                   <a href="/poofull/index/index">
                        <div class="ft20"><?php echo ($method); ?><img height="40px;" src="/Public/Image/logo.png"></div>
                    </a>
                </span>
        <div  class="clear bl h50">
        </div>
    </div>
    <div class="clear bl h30" ></div>
<div class="clear bl h20" ></div>
<!-- Copyright � 2008. Spidersoft Ltd -->
<a style="display: block;  position: relative;
    z-index: 9999;  " onclick="swapCheck()" value="全选" />全选</a>
    <?php if(is_array($cart)): $i = 0; $__LIST__ = $cart;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$carts): $mod = ($i % 2 );++$i;?><div class="bl mt5">
            <table width="100%" class="grey">
                <tr width="100%">
                    <td width="40%" height="200">
                        <a  class="bl" style="position: relative;">
                            <img  style="width: 170px;height: 170px;" class="ml15" src="/<?php echo ($carts["product_pic"]); ?>">

                        </a>
                    </td>

                    <td width="60%" class="ml15 father ft18">
                        <input type="hidden" class="id" value="<?php echo ($carts["id"]); ?>">
                        <p><a class="name" href="/poofull/product/page/id/<?php echo ($carts["product_id"]); ?>"><?php echo ($carts["product_name"]); ?></a><input type="checkbox" name="cart_id" value="<?php echo ($carts["id"]); ?>" class="fr mr5" style="zoom:200%; border-color: red;color: red;"></p>
                        <p> 单  价：<span class="price"><?php echo ($carts["price"]); ?></span>元/ <?php echo ($carts["unit"]); ?></p>
                        <p> 总  价：<span class="price_sum"><?php echo ($carts["price_sum"]); ?></span> 元</p>
                        <p> 数  量：<i class="icon-minus del"></i>    <span class="num" class="w20"><?php echo ($carts["num"]); ?></span>   <i class="icon-plus add"></i> <i class=" fr mr5 icon-trash trash_one"></i></p>
<!--                         <button class="one_buy_open fr mr10 icon-credit-card">立即购买</button>-->
                        <div class="clear"></div>
                    </td>
                </tr>
            </table>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>



<!--提交订单页面-->
<div id="buy_list" class="white" style="border: 2px solid #999; overflow:auto;position: fixed;top: 20%;z-index:999;left:10%;width: 80%;display: inline-block;text-align: center;height: 300px;display: none;">
    <a class="fr clear c_red" id="buy_close">关闭</a>
    <br class="clear">
    <p class="grey mt5">
        地址选择：
        <?php if(is_array($address)): $i = 0; $__LIST__ = $address;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$addresss): $mod = ($i % 2 );++$i;?><div class="grey mt5">
                <p>
            <input class="fl" type="radio" value="<?php echo ($addresss["id"]); ?>">收货人：<?php echo ($addresss["name"]); ?>
        </p>
    <div class="clear"></div>
                <p>收货电话：<?php echo ($addresss["phone"]); ?></p>
                <p>收货地址：<?php echo ($addresss["city"]); ?> <?php echo ($addresss["address"]); ?> </p>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </p>
    <a class="bl tc w100 icon-shopping-cart grey h50 ft20 lh50" id="addres">  添加地址</a>
    <a class="bl tc w100 icon-shopping-cart themeColor h50 ft20 lh50" id="buy">  确认购买</a>
</div>



<div class="white" style="position: fixed;bottom:0px;z-index: 9999; left:0px;width: 100%;display: inline-block;text-align: center;height: 50px;">
    <a class="bl fl tc w50 icon-trash grey h50 ft20 lh50" id="trash_all" >  删除选中</a>
    <a class="bl fl tc w50 icon-shopping-cart themeColor h50 ft20 lh50" id="buy_open" >  选择购买</a>
</div>
<div class="clear bl h50" ></div>

<div class="clear bl h50" ></div>

<div class="white" style="border-top: 1px solid #999; position: fixed;bottom: 0px;left:0px;width: 100%;display: inline-block;text-align: center;height: 50px;">
                <span style="width:33.3%;" class="fl grey">
                   <a href="/poofull/index/index">
                        <p><i class=" icon-home"></i> 首页</p>
                    </a>
                </span>
    <span style="width:33.3%;" class="fl grey">
                   <a href="/poofull/cart/index">
                        <p><i class=" icon-shopping-cart"></i> 购物车</p>
                    </a>
                </span>
    <span style="width:33.3%;" class="fl grey">
                    <a href="/poofull/user/index">
                        <p><i class="icon-user"></i> 我的</p>
                    </a>
                </span>

    <div class="clear">
    </div>
</div>


</body>

</html>



<script>



    /*单个删除操作*/
    $(".trash_one").click(function () {
        if(confirm('你确定要删除这个商品吗？')) {
            var id = $(this).parents('.father').find('.id').val();
            $.post('/poofull/cart/do_del', {
                'id': id,
            }, function (data) {
                if (data.error_code == '200') {
                    location.reload();
                } else {
                    alert(data.msg);
                    return false;
                }
            });
        }
    });
    /*多个删除操作*/
    $("#trash_all").click(function () {
        if(confirm('你确定要删除这些商品吗？')) {
            obj = document.getElementsByName("cart_id");
            ids = [];
            for(k in obj){
                if(obj[k].checked)
                    ids.push(obj[k].value);
            }
            $.post('/poofull/cart/do_dels', {
                'ids': ids,
            }, function (data) {
                if (data.error_code == '200') {
                    location.reload();
                } else {
                    alert(data.msg);
                    return false;
                }
            });
        }
    });

    // $('.textarea_editor').wysihtml5();
    /*
//全选，。全部选，反选操作/**/
    var isCheckAll = false;
    function swapCheck() {
        if (isCheckAll) {
            $("input[type='checkbox']").each(function() {
                this.checked = false;
            });
            isCheckAll = true;
        } else {
            $("input[type='checkbox']").each(function() {
                this.checked = true;
            });
            isCheckAll = false;
        }
    }


    /*添加数量*/
    $(".add").click(function () {
        var id = $(this).parents('.father').find('.id').val();
        var num = $(this).parents('.father').find('.num').text();
        var price = $(this).parents('.father').find('.price').text();

        num = ++num;
        if (num<=1){
            num = 1;
        }
        var price_sum = price*num;
        console.log(id);
        console.log(num);   console.log(price);
        console.log(price_sum);
        $.post('/poofull/cart/do_msg', {
            'id'   : id,
            'num'           : num,
            'price_sum'             : price_sum,
        }, function (data) {
            if (data.error_code=='200') {
                $(this).parents('.father').find('.num').html(num);
                $(this).parents('.father').find('.price_sum').html(price_sum);
            }else{
                alert(data.msg);
                return false;
            }
        });
        $(this).parents('.father').find('.num').html(num);
        $(this).parents('.father').find('.price_sum').html(price_sum);
    });
/*减少数量*/
    $(".del").click(function () {
        var id = $(this).parents('.father').find('.id').val();
        var num = $(this).parents('.father').find('.num').text();
        var price = $(this).parents('.father').find('.price').text();

        num = --num;
        if (num<=1){
            num = 1;
        }
        var price_sum = price*num;
        $.post('/poofull/cart/do_msg', {
            'id'   : id,
            'num'           : num,
            'price_sum'             : price_sum,
        }, function (data) {
            if (data.error_code=='200') {
                $(this).parents('.father').find('.num').html(num);
                $(this).parents('.father').find('.price_sum').html(price_sum);
            }else{
                alert(data.msg);
                return false;
            }
        });
        $(this).parents('.father').find('.num').html(num);
        $(this).parents('.father').find('.price_sum').html(price_sum);
    });


/*关闭弹框*/
    $("#buy_close").click(function () {
        document.getElementById("buy_list").style.display="none";
    });


    /*地址选择*/

    $("#buy_open").click(function () {
        document.getElementById("buy_list").style.display="block";
    });

    /*购物车购买操作数据提交*/
    $("#buy").click(function () {
        obj = document.getElementsByName("cart_id");
        ids = [];
        for(k in obj){
            if(obj[k].checked)
                ids.push(obj[k].value);
        }
        var address_id  =  $("input[type='radio']:checked").val();  //获取被选中Radio的Value值
        if (!address_id){
            alert("请选择地址");
        }
        if (ids==""){
            alert("请选择需要结算的产品");
        }
        $.post('/poofull/order/do_adds',{'ids' : ids,'address_id':address_id}, function (data) {
            if (data.error_code=='200') {
                window.location.href = "http://poofull.wvfeng.top/Poofull/Wxpay/jsapi";
            }else{
                alert(data.msg);
                return false;
            }
        });

    });




</script>