
<include file="./App/Poofull/View/header.php" />
<div class="clear bl h20" ></div>
<!-- Copyright � 2008. Spidersoft Ltd -->
<div style="display: block;  position: relative;
    z-index: 9999;  ">
    <a href="/poofull/order/index/status/400" class="grey">未支付订单</a>
    <a href="/poofull/order/index/status/0" class="grey">未处理订单</a>
    <a href="/poofull/order/index/status/1" class="grey">已发货订单</a>
    <a href="/poofull/order/index/status/2" class="grey">已成交订单</a>
    <a href="/poofull/order/index/status/3" class="grey">退单申请</a>
    <a href="/poofull/order/index/status/4" class="grey">已退单</a>
</div>
<div class="clear"></div>
<volist name="order" id="orders">
    <div>
        <p>
            <table width="100%" class="grey">
                <tr width="100%">
                    <td width="40%" height="200">
                        <a href="/poofull/product/page/id/{$orders.id}">
                            <img style="width: 170px;height: 170px;" class="ml15" src="__ROOT__/{$orders.product_pic}">
                        </a>
                    </td>
                    <td width="60%" class="ml15 father">
                        <p><a class="name" href="/poofull/product/page/id/{$orders.product_id}">{$orders.product_name}</a></p>

                        <p> 订  单：<span class="sn ft14">{$orders.sn}</span></p>
                        <p> 单  价：<span class="price">{$orders.price}</span></p>
                        <p> 总  价：<span class="price_sum">{$orders.price_sum}</span> 元</p>
                        <p> 数  量：
                                <span class="num" class="w20">{$orders.num}</span>
                            <if condition="($orders.status eq 400)">
                                <i class=" fr mr5 icon-trash trash_one"></i>
                                <else />
                            </if>

                        </p>
                        <!--                         <button class="one_buy_open fr mr10 icon-credit-card">立即购买</button>-->
                        <div class="clear"></div>
                        <p>
                            <if condition="($orders.status eq 400)">
                                <button class="buy fr icon-credit-card mr10">立即支付</button>
                                <else />
                                <a class="ft28 bl fr mr10" href="/poofull/order/express/express/{$orders.express}/sn/{$orders.sn}/express_code/{$orders.express_code}">  <button class="fr mr10"><i class="icon-truck"> 物流信息</i> </button>   </a>
                            </if>
                        </p>
                    </td>
                 </tr>
            </table>
        </p>
    </div>
</volist>


<include file="./App/Poofull/View/footer.php" />
<script>


/*支付*/

$(".buy").click(function () {
    var sn = $(this).parents('.father').find('.sn').text();
    $.post('/poofull/order/sn',{'sn' : sn}, function (data) {
        console.log(sn);
        if (data.error_code=='200') {
            window.location.href = "http://poofull.wvfeng.top/Poofull/Wxpay/jsapi";
        }else{
            alert(data.msg);
            return false;
        }
    });
});

/*删除未支付订单*/

    $(".trash_one").click(function () {
        if(confirm('你确定要删除这个商品吗？')) {
            var sn = $(this).parents('.father').find('.sn').text();

            $.post('/poofull/order/do_del', {
                'sn': sn,
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
</script>