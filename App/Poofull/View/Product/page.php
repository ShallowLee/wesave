
<include file="./App/Poofull/View/header.php" />
<!-- Copyright � 2008. Spidersoft Ltd -->
    <div>


        <input type="hidden" id="id" value="{$product.id}">
        <p>
          <img width="100%" src="__ROOT__/{$product.pic}">
        </p>
        <div class="c_red ft24">¥{$product.price}</div>
        <div class="ft20">【{$product.name}】</div>



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
        <p class="grey mt5">名  称：<span id="name">{$product.name}</span></p>

        <p  class="grey mt5">单  价：<span id="buy_price">{$product.price}</span></p>
        <p class="grey mt5">数  量：<i id="buy_del" class="icon-minus"></i>    <span id="buy_num" class="w20">1</span>   <i id="buy_add" class="icon-plus"></i></p>
        <p class="grey mt5">总  价：<span id="buy_price_sum">{$product.price}</span>元</p>
        <p class="grey mt5">地址选择：
        <volist name="address" id="addresss">
            <div class="grey mt5">
                <p><input type="radio" value="{$addresss.id}">收货人：{$addresss.name}</p>
                <p>收货电话：{$addresss.phone}</p>
                <p>收货地址：{$addresss.city} {$addresss.address} </p>
            </div>
        </volist>
        </p>
        <a class="bl tc w100 grey h50 ft20 lh50" id="address_open" >  添加收货地址</a>
        <a class="bl tc w100 icon-shopping-cart themeColor h50 ft20 lh50" id="buy" >  确认购买</a>
    </form>
</div>
<!--添加购物车-->
<div id="cart_list" class="white" style="border: 2px solid #999; overflow:auto;position: fixed;top: 20%;z-index:999;left:10%;width: 80%;display: inline-block;text-align: center;height: 300px;display: none">
    <a class="fr clear c_red" id="cart_close">关闭</a><br class="clear">
    <form class="ft20">
        <p class="grey mt5">名  称：{$product.name}</p>
        <p  class="grey mt5">单  价：<span id="cart_price">{$product.price}</span></p>
        <p class="grey mt5">数  量：<i id="cart_del" class="icon-minus"></i>    <span id="cart_num" class="w20">1</span>   <i id="cart_add" class="icon-plus"></i></p>
        <p class="grey mt5">总  价：<span id="cart_price_sum">{$product.price}</span>元</p>
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

<include file="./App/Poofull/View/footer.php" />

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