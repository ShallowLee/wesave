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
<!-- Copyright � 2008. Spidersoft Ltd -->
    <div>


        <input type="hidden" id="id" value="<?php echo ($product["id"]); ?>">
        <p>
          <img width="100%" src="/<?php echo ($product["pic"]); ?>">
        </p>
        <div class="c_red ft24">¥<?php echo ($product["price"]); ?></div>
        <div class="ft20">【<?php echo ($product["name"]); ?>】</div>



        <div style=" position: fixed;bottom: 0px;left:0px;width: 100%;display: inline-block;text-align: center;height: 50px;z-index: 9999" >
            <a class="bl fl tc w50 icon-shopping-cart grey h50 ft20 lh50" id="cart_open" >  加入购物车</a>
            <a class="bl fl tc w50 icon-credit-card themeColor h50 ft20 lh50" id="buy_open">  立即购买</a>
        </div>

        <style>
            .content img{
                width: 100% !important;
            }
        </style>
        <div class="bl w100 content">
            <?php echo htmlspecialchars_decode($product['content']) ?>
        </div>


    </div>
<div class="clear"></div>

<!--立即购买-->
<div id="buy_list" class="white" style="border: 2px solid #999; overflow:auto;position: fixed;top: 10%;z-index:999;left:10%;width: 80%;display: inline-block;text-align: center;height: 500px;display: none">
    <a class="fr clear c_red" id="buy_close">关闭</a><br class="clear">
    <form class="ft20">
        <p class="grey mt5">名  称：<span id="name"><?php echo ($product["name"]); ?></span></p>

        <p  class="grey mt5">单  价：<span id="buy_price"><?php echo ($product["price"]); ?></span></p>
        <p class="grey mt5">数  量：<i id="buy_del" class="icon-minus"></i>    <span id="buy_num" class="w20">1</span>   <i id="buy_add" class="icon-plus"></i></p>
        <p class="grey mt5">总  价：<span id="buy_price_sum"><?php echo ($product["price"]); ?></span>元</p>
        <p class="grey mt5">地址选择：
        <?php if(is_array($address)): $i = 0; $__LIST__ = $address;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$addresss): $mod = ($i % 2 );++$i;?><div class="grey mt5">
                <p><input type="radio" value="<?php echo ($addresss["id"]); ?>">收货人：<?php echo ($addresss["name"]); ?></p>
                <p>收货电话：<?php echo ($addresss["phone"]); ?></p>
                <p>收货地址：<?php echo ($addresss["city"]); ?> <?php echo ($addresss["address"]); ?> </p>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </p>
        <a class="bl tc w100 grey h50 ft20 lh50" id="address_open" >  添加收货地址</a>
        <a class="bl tc w100 icon-shopping-cart themeColor h50 ft20 lh50" id="buy" >  确认购买</a>
    </form>
</div>
<!--添加购物车-->
<div id="cart_list" class="white" style="border: 2px solid #999; overflow:auto;position: fixed;top: 20%;z-index:999;left:10%;width: 80%;display: inline-block;text-align: center;height: 300px;display: none">
    <a class="fr clear c_red" id="cart_close">关闭</a><br class="clear">
    <form class="ft20">
        <p class="grey mt5">名  称：<?php echo ($product["name"]); ?></p>
        <p  class="grey mt5">单  价：<span id="cart_price"><?php echo ($product["price"]); ?></span></p>
        <p class="grey mt5">数  量：<i id="cart_del" class="icon-minus"></i>    <span id="cart_num" class="w20">1</span>   <i id="cart_add" class="icon-plus"></i></p>
        <p class="grey mt5">总  价：<span id="cart_price_sum"><?php echo ($product["price"]); ?></span>元</p>
        <a class="bl tc w100 icon-shopping-cart themeColor h50 ft20 lh50" id="cart" >  确认加入</a>
    </form>
</div>

<!--添加地址-->
<div id="address_list" class="white" style="border: 2px solid #999; overflow:auto;position: fixed;top: 20%;z-index:999;left:10%;width: 80%;display: inline-block;text-align: center;height: 300px;display: none">
    <a class="fr clear c_red" id="address_close">关闭</a><br class="clear">
    <form class="ft20">
        <p class="grey mt5">收货人：<input type="text" name="address_name"></p>
        <p  class="grey mt5">手机号码：<input type="number" name="address_phone"></p>
        <p class="grey mt5">城市：<input type="text" name="address_city"></p>
        <p class="grey mt5">详细地址：<input type="text" name="address"></p>
        <a class="bl tc w100 icon-shopping-cart themeColor h50 ft20 lh50" id="address" >  确认添加</a>
    </form>
</div>


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
/*设置第一个地址为默认选中*/

//$('input:radio:first').attr('checked', 'true');
/*
* 立即购买操作*/

    $("#buy_open").click(function () {
        document.getElementById("buy_list").style.display="block";
    });
    $("#buy_close").click(function () {
        document.getElementById("buy_list").style.display="none";
    });

    $("#buy_add").click(function () {
        var num = $("#buy_num").text();
        var price = $("#buy_price").text();
        num = ++num;
        if (num<=1){
            num = 1;
        }
        var price_sum = price*num;
        $('#buy_num').html(num);
        $('#buy_price_sum').html(price_sum);
    });

    $("#buy_del").click(function () {
        var num = $("#buy_num").text();
        var price = $("#buy_price").text();
        num = --num;
        if (num<=1){
            num = 1;
        }
        var price_sum = price*num;
//        str= num;
        $('#buy_num').html(num);
        $('#buy_price_sum').html(price_sum);
    });


/*购买数据提交*/

    $("#buy").click(function () {
        var id          = $("#id").val();
        var num         = $("#buy_num").text();
        var name        = $("#name").text();
        var price       = $("#buy_price").text();
        var price_sum   = $("#buy_price_sum").text();
        var address_id  =  $("input[type='radio']:checked").val();  //获取被选中Radio的Value值

        if(address_id==""){
            alert('请选择地址');
            return false;
        }
        $.post('/poofull/order/do_add', {
            'id'   : id,
            'num'           : num,
            'name'           : name,
            'price'        : price,
            'price_sum'             : price_sum,
            'address_id'           : address_id,
        }, function (data) {
            if (data.error_code=='200') {
                window.location.href = "http://poofull.wvfeng.top/Poofull/Wxpay/jsapi";
            }else{
                alert(data.msg);
                return false;
            }
        });
    });

/*
 * 加入购物车操作*/

    $("#cart_open").click(function () {
        document.getElementById("cart_list").style.display="block";
    });
    $("#cart_close").click(function () {
        document.getElementById("cart_list").style.display="none";
    });


    $("#cart_add").click(function () {
        var num = $("#cart_num").text();
        var price = $("#cart_price").text();
        num = ++num;
        if (num<=1){
            num = 1;
        }
        var price_sum = price*num;
        $('#cart_num').html(num);
        $('#cart_price_sum').html(price_sum);
    });

    $("#cart_del").click(function () {
        var num = $("#cart_num").text();
        var price = $("#cart_price").text();
        num = --num;
        if (num<=1){
            num = 1;
        }
        var price_sum = price*num;
    //        str= num;
        $('#cart_num').html(num);
        $('#cart_price_sum').html(price_sum);
    });

/*添加购物车操作*/
   $("#cart").click(function () {
        var id = $("#id").val();
        var num = $("#cart_num").text();
        var price = $("#cart_price").text();
        var price_sum = $("#cart_price_sum").text();
        $.post('/poofull/cart/do_add', {
            'id'   : id,
            'num'           : num,
            'price'        : price,
            'price_sum'             : price_sum,
        }, function (data) {
            if (data.error_code=='200') {
                alert(data.msg);
                document.getElementById("cart_list").style.display="none";
            }else{
                alert(data.msg);
                return false;
            }
        });
    });


   /*添加收货地址弹窗*/
    $("#address_open").click(function () {
        document.getElementById("address_list").style.display="block";
        document.getElementById("buy_list").style.display="none";
    });
/*关闭收货地址弹窗*/
$("#address_close").click(function () {
    document.getElementById("address_list").style.display="none";
});

/*添加收货地址操作*/
    $("#address").click(function () {
        var name    = document.getElementsByName("address_name")[0].value;
        var phone   = document.getElementsByName("address_phone")[0].value;
        var address = document.getElementsByName("address")[0].value;
        var city    = document.getElementsByName("address_city")[0].value;


        if(name=="" || phone==""  || city=="" || address==""){
            alert('请填写完整数据');
            $("#name").focus();
            $("#phone").focus();
            $("#city").focus();
            $("#address").focus();
            return false;
        }
        if(phone){
            var reg = /(^0{0,1}1[3|4|5|6|7|8|9][0-9]{9}$)/;
            if(!reg.test(phone)){
                alert('手机号错误,必须为11位纯数字.');
                return false;
            }
        }
        $.post('/poofull/user/address_do_add', {
            'phone'   : phone,
            'name'           : name,
            'address'        : address,
            'city'             : city,
        }, function (data) {
            if (data.error_code=='200') {
                alert(data.msg);
                location.reload();
            }else{
                alert(data.msg);
                return false;
            }
        });
    });

</script>