
<include file="./App/Home/View/header.php"/>
<!--End-Chart-box-->
<div>
    <!--End-Chart-box-->
    <div class="btn-group ">
        <button class="btn">商品状态</button>
        <button data-toggle="dropdown" class="btn dropdown-toggle"><span
                class="icon-chevron-down"></span></button>
        <ul class="dropdown-menu fff">
            <!--            <volist name="school" id="schools">-->
            <li><a href="{:U('Product/index/status/1')}" class="btn">上线状态</a></li>
            <li><a href="{:U('Product/index/status/0')}" class="btn">下线状态</a></li>
            <!--            </volist>-->
        </ul>
    </div>
    <a class="btn" href="{:U('Product/user_add')}">添加商品</a>
</div>

<div class="widget-box">

    <div class="widget-content nopadding">
        <table class="table table-bordered data-table" style="font-size: 12px;">
            <thead>
            <tr>
                <th width="60">编号</th>
                <th width="70">微信头像</th>
                <th width="100">微信名称</th>
                <th width="100">微信ID</th>
                <th width="100">电话号码</th>
                <th width="70">用户状态</th>
            </tr>
            </thead>
            <tbody>
            <volist name="user" id="users">
                <tr class="gradeX father">
                    <td>{$users.id}</td>
                    <td><img height="50px;" src="{$users.wechat_pic}"></td>
                    <td>{$users.wechat_name}</td>
                    <td>{$users.wechat_id} </td>
                    <td>{$users.phone}</td>
                    <td>{$users.status}</td>

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
            $.post('{:U("Product/user_remove")}',data, function (data) {
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