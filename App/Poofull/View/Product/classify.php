
<include file="./App/Poofull/View/header.php" />
<!-- Copyright � 2008. Spidersoft Ltd -->
<volist name="product" id="products">
    <div>
        <p>
            <table width="100%" class="grey">
                <tr width="100%">
                    <td width="40%" height="200">
                        <a href="/poofull/product/page/id/{$products.id}">
                            <img  style="width: 170px;height: 170px;" class="ml15" src="__ROOT__/{$products.pic}">
                        </a>
                    </td>
                    <td width="60%" class="ml15 father">
                        <input type="hidden" class="id" value="{$products.id}">
                        <p><a class="name" href="/poofull/product/page/id/{$products.id}">{$products.name}</a></p>
                        <p class="ft14"> {$products.desc}</p>
                        <p><span class="price">{$products.price}</span>元/  {$products.unit}<br>
                            <a class="buy_open fr mr10 icon-credit-card ft28"></a>
                            <a class="cart_open fr mr10 icon-shopping-cart ft28"></a>
                        </p>
                        <div class="clear"></div>
                    </td>
                </tr>
            </table>

        </p>

    </div>
</volist>

<!--购买操作-->

<div id="buy_list" class="white" style="border: 2px solid #999; overflow:auto;position: fixed;top: 10%;z-index:999;left:10%;width: 80%;display: inline-block;text-align: center;height: 500px;display: none">
    <a class="fr clear c_red" id="buy_close">关闭</a><br class="clear">
    <form class="ft20">
        <span id="buy_id" style="display: none"></span>
        <p class="grey mt5">名  称：<span id="buy_name"></span></p>
        <p  class="grey mt5">单  价：<span id="buy_price"></span></p>
        <p class="grey mt5">数  量：<i id="buy_del" class="icon-minus"></i>    <span id="buy_num" class="w20">1</span>   <i id="buy_add" class="icon-plus"></i></p>
        <p class="grey mt5">总  价：<span id="buy_price_sum"></span>元</p>
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


<!--加入购物车操作-->


<div id="cart_list" class="white" style="border: 2px solid #999; overflow:auto;position: fixed;top: 10%;z-index:999;left:10%;width: 80%;display: inline-block;text-align: center;height: 500px;display: none">
    <a class="fr clear c_red" id="cart_close">关闭</a><br class="clear">
    <form class="ft20">
        <span id="cart_id" style="display: none"></span>
        <p class="grey mt5">名  称：<span id="cart_name"></span></p>
        <p  class="grey mt5">单  价：<span id="cart_price"></span></p>
        <p class="grey mt5">数  量：<i id="cart_del" class="icon-minus"></i>    <span id="cart_num" class="w20">1</span>   <i id="cart_add" class="icon-plus"></i></p>
        <p class="grey mt5">总  价：<span id="cart_price_sum"></span>元</p>


<a class="bl tc w100 icon-shopping-cart themeColor h50 ft20 lh50" id="cart" >  确认加入购物车</a>
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

//    $('input:radio:first').attr('checked', 'true');
    /*
     * 立即购买操作*/

    $(".buy_open").click(function () {
        var id = $(this).parents('.father').find('.id').val();
        var name = $(this).parents('.father').find('.name').text();
        var price = $(this).parents('.father').find('.price').text();
        console.log(id); console.log(name); console.log(price);
        $('#buy_id').html(id);
        $('#buy_name').html(name);
        $('#buy_price').html(price);
        $('#buy_price_sum').html(price);
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
        var id          = $("#buy_id").text();
        var num         = $("#buy_num").text();
        var name        = $("#buy_name").text();
        var price       = $("#buy_price").text();
        var price_sum   = $("#buy_price_sum").text();
        var address_id  =  $("input[type='radio']:checked").val();  //获取被选中Radio的Value值
        if(!address_id){
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

    $(".cart_open").click(function () {
        var id = $(this).parents('.father').find('.id').val();
        var name = $(this).parents('.father').find('.name').text();
        var price = $(this).parents('.father').find('.price').text();
        console.log(id); console.log(name); console.log(price);

        $('#cart_id').html(id);
        $('#cart_name').html(name);
        $('#cart_price').html(price);
        $('#cart_price_sum').html(price);
        document.getElementById("cart_list").style.display="block";
    });
    $("#cart_close").click(function () {
        document.getElementById("cart_list").style.display="none";
    });

    /*购物车增加操作*/

    $("#cart_add").click(function () {
        var num = $("#cart_num").text();
        var price = $("#cart_price").text();
        num = ++num;
        if (num<=1){
            num = 1;
        }
        var cart_price_sum = price*num;
        $('#cart_num').html(num);
        $('#cart_price_sum').html(cart_price_sum);
    });

/*购物车减少操作*/
    $("#cart_del").click(function () {
        var num = $("#cart_num").text();
        var price = $("#cart_price").text();
        num = --num;
        if (num<=1){
            num = 1;
        }
        var cart_price_sum = price*num;
        //        str= num;
        $('#cart_num').html(num);
        $('#cart_price_sum').html(cart_price_sum);
    });

    /*添加购物车操作*/
    $("#cart").click(function () {
        var id = $("#cart_id").text();
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