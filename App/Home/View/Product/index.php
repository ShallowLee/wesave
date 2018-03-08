
<include file="./App/Home/View/header.php"/>
<!--End-Chart-box-->
<div>
    <!--End-Chart-box-->

    <volist name="product_classify" id="classifys">
        <a class="btn" href="/home/product/index?product_classify_id={$classifys.id}">{$classifys.name}</a>
    </volist>
    <a class="btn" href="{:U('Product/product_add')}">添加商品</a>
    <form action="/home/product/index" method="post">
        <input type="text" name="name" placeholder="请输入商品名称或编号">
        <input type="submit" value="查询商品">
    </form>
</div>
<div>共有<span class="ft20 c_red">{$count}</span>商品</div>
<div class="widget-box">

    <div class="widget-content nopadding">
        <table class="table table-bordered data-table" style="font-size: 12px;">
            <thead>
            <tr>
                <th width="60">编号</th>

                <th width="100">名称</th>
                <th width="100">图片</th>
                <th width="70">单价</th>
                <th width="100">单位</th>
                <th width="70">库存数量</th>
                <th width="70">产品状态</th>
                <th width="190">简单描述</th>
                <th width="190">简单描述</th>
                <th width="190">
                   操作
                </th>
            </tr>
            </thead>
            <tbody>
            <volist name="product" id="products">
                <tr class="gradeX father">
                    <td>{$products.id}</td>
                    <td>{$products.name}</td>
                    <td><img height="50px;" src="/{$products.pic}"></td>
                    <td>{$products.price} </td>
                    <td>{$products.unit}</td>
                    <td>{$products.num}</td>
                    <td>{$products.status}</td>
                    <td>{$products.desc}</td>
                    <td>{$products.time|date='Y-m-d H:i:s',###}</td>
                    <td>
                        <a id="{$products.id}" class="chstatus" href=""> 更改状态</a> |
<!--                        <a > 查看详情</a> |-->
                        <a class="icon-edit" href="/home/product/product_edit?id={$products.id}"> 编辑商品</a> |
                        <a id="{$products.id}" class="icon-remove remove" href=""> 删除商品</a>
                    </td>
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
            var data = {
                'id': $(this).attr('id')
            };
            $.post('{:U("Product/product_remove")}',data, function (data) {
                if (data.code) {
                    alert(data.message);
                    $(window).attr('location','{:U("Product/index")}');
                }else {
                    alert(data.message);
                }
            }
        )
            ;
        }
        return false;
    });

    $(".chstatus").click(function () {
            var data = {
                'id': $(this).attr('id'),
                'status': ($($('.chstatus').parents('.father').find('td')[6]).html() == 1) ? 0:1
            };
            $.post('{:U("Product/chstatus")}',data, function (data) {
                    if (data.code) {
                        alert(data.message);
                        location.reload();
                    }else {
                        alert(data.message);
                    }
                }
            )
            ;
        });
</script>