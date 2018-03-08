
<include file="./App/Home/View/header.php"/>
<!--End-Chart-box-->


<div class="widget-box">

    <div class="widget-content nopadding">
        <div id="light" class="white_content">
            <span lable="label label-success" style="font-size: 20px;color: red">操作试订单</span><br>
            <form class="form-horizontal col-xs-12 id" enctype="multipart/form-data" role="form">
                <BR><br>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">订单编号: </label>
                    <div class="col-sm-9">
                        <input type="hidden" class="span11" id="id" value="{$order.id}"/>
                        <span>{$order.id}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">订单状态 : </label>
                    <div class="col-sm-9">
                        <select id="status">
                            <option value="{$order.status}">
                                <switch name="order.status" style="color: #f087ff">
                                    <case value="0">未处理订单</case>
                                    <case value="1">未处理订单</case>
                                    <case value="2">已成交订单</case>
                                    <case value="3">退单申请</case>
                                    <case value="4">已退单</case>
                                    <default />
                                </switch></option>
                            <option value="0">未处理订单</option>
                            <option value="1">已发货订单</option>
                            <option value="2">已成交订单</option>
                            <option value="3">退单申请</option>
                            <option value="4">已退单</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">用户信息 : </label>
                    <div class="col-sm-9">
                        <span>用户名称：{$order.wechat_name}</span><br>
                        <span>用户号码：{$order.wechat_phone}</span><br>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">商品信息 : </label>
                    <div class="col-sm-9">
                        <span>商品名称：{$order.name}</span><br>
                        <span>商品单价：{$order.price}</span><br>
                        <span>商品数量：{$order.num}</span><br>
                        <span>商品总价：{$order.price_sum}</span><br>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">收货信息 : </label>
                    <div class="col-sm-9">
                        <span>收货人：{$order.address_name}</span><br>
                        <span>收货电话：{$order.address_phone}</span><br>
                        <span>收货地址：{$order.address}</span><br>
                        <span>收货留言：{$order.msg}</span><br>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">快递公司 : </label>
                    <div class="col-sm-9">
                        <select id="express_code">
                            <?php if ($order['express_code'])($ex = M('express')->where(array("express_code"=>$order['express_code']))->find()); ?>
                            <option value="<?php echo  $ex['express_code']  ?>">
                                <?php echo  $ex['express_name']  ?>
                            </option>
                            <volist name="express" id="expresss">
                                <option value="{$expresss.express_code}">{$expresss.express_name}</option>
                            </volist>

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">快递单号 : </label>
                    <div class="col-sm-9">
                        <input type="text" class="span11" id="express" value="{$order.express}"/>
                    </div>
                </div>
                <div class="space-4"></div>
                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-info" id="save" type="submit">
                            <i class="icon-ok bigger-110 "></i>
                            提交
                        </button>
                    </div>
                </div>
                <div class="hr hr-24"></div>
            </form>
        </div>
    </div>
</div>

<!--<td>{:html_entity_decode($statistiscs['content'])}</td>-->


<!--Footer-part-->

<include file="./App/Home/View/footer.php"/>


<script>


    $("#save").click(function () {
        if (confirm('提交数据吗？')) {
            var id               = $("#id").val();
            var express          = $("#express").val();
            var status           = $("#status").val();
            var express_code     = $("#express_code").val();
            alert(status);
            if(express==""){
                alert('请填写完整数据');
                return false;
            }
            if(express_code==""){
                alert('请填写完整数据');
                return false;
            }
            $.post("{:U('home/order/do_edit')}", {
                'id' : id,
                'express' : express,
                'express_code' : express_code,
                'status' : status,
            }, function (data) {
                if (data) {
                    alert(data.msg);
                    location.reload();
                }
            }
        )
            ;
        }
        return false;
    });


</script>