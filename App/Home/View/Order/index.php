
<include file="./App/Home/View/header.php"/>
<!--End-Chart-box-->
<div>
    <!--End-Chart-box-->
    <a class="btn" href="/home/order/index">全部</a>
    <a class="btn" href="/home/order/index?status=400">未付款</a>
    <a class="btn" href="/home/order/index?status=0">待发货</a>
    <a class="btn" href="/home/order/index?status=1">待收货</a>
    <a class="btn" href="/home/order/index?status=2">已完成</a>
    <form action="/home/order/index" method="get">
        <input type="text" name="name" placeholder="请输入订单名称或订单号">
        <input type="submit" value="查询订单">
    </form>
</div>

<div class="widget-box">

    <div class="widget-content nopadding">
        <table class="table table-bordered data-table" style="font-size: 12px;">
            <thead>
            <tr>
                <th width="60">订单号</th>
                <th width="70">商品名称</th>
                <th width="100">用户名称</th>
                <th width="100">商品单价</th>
                <th width="70">下单数量</th>
                <th width="70">总价</th>
                <th width="190">订单状态</th>
                <th width="190">收货人</th>
                <th width="190">收货号码</th>
                <th width="190">收货地址</th>
                <th width="190">快递</th>
                <th width="190">用户留言</th>
                <th width="190">下单时间</th>
                <th width="190">
                    操作
                </th>
            </tr>
            </thead>
            <tbody>
            <volist name="order" id="orders">
                <tr class="gradeX father">
                    <td>{$orders.sn}</td>
                    <td>{$orders.name}</td>
                    <td>{$orders.wechat_name}</td>
                    <td>{$orders.price}</td>
                    <td>{$orders.num} </td>
                    <td>{$orders.price_sum}</td>
                    <td>{$orders.status}</td>
                    <td>{$orders.address_name}</td>
                    <td>{$orders.address_phone}</td>
                    <td>{$orders.address}</td>
                    <td>
                        快递公司：{$orders.express}<br>
                        快递单号：{$orders.express_code}
                    </td>
                    <td>{$orders.msg}</td>
                    <td>{$orders.time|date='Y-m-d H:i:s',###}</td>
                    <td>
                        <a href="/home/order/edit?id={$orders.id}">操作订单</a></td>
                </tr>
            </volist>
            </tbody>
        </table>
        {$page}
    </div>
</div>

<!--<td>{:html_entity_decode($statistiscs['content'])}</td>-->


<!--Footer-part-->

<include file="./App/Home/View/footer.php"/>


<script>
    $(".remove").click(function () {
        if (confirm('确定删除这条资源吗？')) {
            var id = $(this).parents('.father').find('.id').text();
//                console.log(id);
//                debugger;
            $.post('{:U('custom/del')}', {
                'id': id,
            }, function (data) {
                if (data == 'ok') {
                    alert("删除成功");
                    location.reload();
                } else if (data == 'no') {
                    alert("无权限删除");
                } else if (data == 'nothing') {
                    alert("程序错误");
                } else {
                    alert("删除失败");
                }
            }
        )
            ;
        }
        return false;
    });

    $("#save").click(function () {
        if (confirm('提交数据吗？')) {
            var account            = $("#account").val();
            var phone_num          = $("#phone_num").val();
            var shangqiao          = $("#shangqiao").val();
            var huihu              = $("#huihu").val();
            var date               = $("#date").val();
            var school             = $("#school").val();
            var shows              = $("#shows").val();
            var consume            = $("#consume").val();
            var click              = $("#click").val();
            var desc               = $("#desc").val();
            var talk_num           = $("#talk_num").val();
            if(account=="" || shangqiao=="" || huihu=="" || school=="" || shows=="" || desc=="" || consume=="" || click==""  || talk_num=="" || date==""){
                alert('请填写完整数据');
                $("#account").focus();
                $("#shangqiao").focus();
                $("#huihu").focus();
                $("#school").focus();
                $("#shows").focus();
                $("#consume").focus();
                $("#click").focus();
                $("#talk_num").focus();
                $("#desc").focus();
                return false;
            }
            $.post('{:U('company/add')}', {
                'account' : account,
                'date' : date,
                'shangqiao'  : shangqiao,
                'huihu'  : huihu,
                'school'  : school,
                'shows'   : shows,
                'consume'   : consume,
                'click'      : click,
                'desc'       : desc,
                'talk_num'       : talk_num,
            }, function (data) {
                if (data) {
                    alert(data.message);
                    location.reload();
                }
            }
        )
            ;
        }
        return false;
    });


</script>