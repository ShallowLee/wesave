
<include file="./App/Home/View/header.php"/>
<!--End-Chart-box-->
<div>
    <!--End-Chart-box-->
    <div class="btn-group ">
        <button data-toggle="dropdown" class="btn dropdown-toggle"><span
                class="icon-chevron-down"></span></button>
        <ul class="dropdown-menu fff">
            <!--            <volist name="school" id="schools">-->
            <li><a href="{:U('news/index/status/1')}" class="btn">上线状态</a></li>
            <li><a href="{:U('news/index/status/0')}" class="btn">下线状态</a></li>
            <!--            </volist>-->
        </ul>
    </div>
    <a class="btn" href="{:U('news/add')}">添加头条</a>
</div>

<div class="widget-box">

    <div class="widget-content nopadding">
        <table class="table table-bordered data-table" style="font-size: 12px;">
            <thead>
            <tr>
                <th width="60">编号</th>
                <th width="100">图片</th>
                <th width="100">名称</th>
                <th width="190">简单描述</th>
                <th width="70">状态</th>
                <th width="70">时间</th>
                <th width="190">
                    操作
                </th>
            </tr>
            </thead>
            <tbody>
            <volist name="news" id="newss">
                <tr class="gradeX father">
                    <td>{$newss.id}</td>
                    <td><img height="50px;" src="/{$newss.pic}"></td>
                    <td>{$newss.title}</td>
                    <td>{$newss.desc} </td>
                    <td>{$newss.status}</td>
                    <td>{$newss.time|date='Y-m-d H:i:s',###}</td>
                    <td>
                        <a id="{$newss.id}" class="chstatus" href=""> 更改状态</a> |
                        <!--                        <a > 查看详情</a> |-->
                        <a class="icon-edit" href="/home/news/edit?id={$newss.id}"> 编辑头条</a> |
                        <a id="{$newss.id}" class="icon-remove remove" href=""> 删除头条</a>
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
            console.log(data);
            $.post('{:U("news/news_remove")}',data, function (data) {
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
        console.log(data);
        $.post('{:U("news/chstatus")}',data, function (data) {
                if (data.code_code==200) {
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