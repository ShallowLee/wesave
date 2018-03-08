<include file="./App/Poofull/View/header.php"/>
<div class="clear bl h20" ></div>
<!-- Copyright � 2008. Spidersoft Ltd -->
<a style="display: block;  position: relative;
    z-index: 9999;  " onclick="swapCheck()" value="全选" />全选</a>
    <volist name="cart" id="carts">
        <div class="bl mt5">
            <table width="100%" class="grey">
                <tr width="100%">
                    <td width="40%" height="200">
                        <a  class="bl" style="position: relative;">
                            <img  style="width: 170px;height: 170px;" class="ml15" src="__ROOT__/{$carts.product_pic}">

                        </a>
                    </td>

                    <td width="60%" class="ml15 father ft18">
                        <input type="hidden" class="id" value="{$carts.id}">
                        <p><a class="name" href="/poofull/product/page/id/{$carts.product_id}">{$carts.product_name}</a><input type="checkbox" name="cart_id" value="{$carts.id}" class="fr mr5" style="zoom:200%; border-color: red;color: red;"></p>
                        <p> 单  价：<span class="price">{$carts.price}</span>元/ {$carts.unit}</p>
                        <p> 总  价：<span class="price_sum">{$carts.price_sum}</span> 元</p>
                        <p> 数  量：<i class="icon-minus del"></i>    <span class="num" class="w20">{$carts.num}</span>   <i class="icon-plus add"></i> <i class=" fr mr5 icon-trash trash_one"></i></p>
<!--                         <button class="one_buy_open fr mr10 icon-credit-card">立即购买</button>-->
                        <div class="clear"></div>
                    </td>
                </tr>
            </table>
        </div>
    </volist>



<!--提交订单页面-->
<div id="buy_list" class="white" style="border: 2px solid #999; overflow:auto;position: fixed;top: 20%;z-index:999;left:10%;width: 80%;display: inline-block;text-align: center;height: 300px;display: none;">
    <a class="fr clear c_red" id="buy_close">关闭</a>
    <br class="clear">
    <p class="grey mt5">
        地址选择：
        <volist name="address" id="addresss">
            <div class="grey mt5">
                <p>
            <input class="fl" type="radio" value="{$addresss.id}">收货人：{$addresss.name}
        </p>
    <div class="clear"></div>
                <p>收货电话：{$addresss.phone}</p>
                <p>收货地址：{$addresss.city} {$addresss.address} </p>
            </div>
        </volist>
    </p>
    <a class="bl tc w100 icon-shopping-cart grey h50 ft20 lh50" id="addres">  添加地址</a>
    <a class="bl tc w100 icon-shopping-cart themeColor h50 ft20 lh50" id="buy">  确认购买</a>
</div>



<div class="white" style="position: fixed;bottom:0px;z-index: 9999; left:0px;width: 100%;display: inline-block;text-align: center;height: 50px;">
    <a class="bl fl tc w50 icon-trash grey h50 ft20 lh50" id="trash_all" >  删除选中</a>
    <a class="bl fl tc w50 icon-shopping-cart themeColor h50 ft20 lh50" id="buy_open" >  选择购买</a>
</div>
<div class="clear bl h50" ></div>
<include file="./App/Poofull/View/footer.php"/>

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