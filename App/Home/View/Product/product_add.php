
<include file="./App/Home/View/header.php"/>
<!--End-Chart-box-->

<div class="widget-box">

    <div class="widget-content nopadding">
        <div id="light" class="white_content">
            <span lable="label label-success" style="font-size: 20px;color: red">添加商品</span><br>

            <form class="form-horizontal col-xs-12 id" enctype="multipart/form-data" role="form">
                <BR><br>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">商品名称 : </label>
                    <div class="col-sm-9">
                        <input type="text" class="span11" id="name"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">展示图片 : </label>
                    <div class="col-sm-9">
                        <div class="col-sm-5">
                            <input type="text" id="img" name="img" class="form-control"></div>
                        <a href="" id="upload" class="col-sm-1 btn btn-success">上传图片</a>
                        <div class="col-sm-4" id="preview"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">视频URL : </label>
                    <div class="col-sm-9">
                        <input type="text" class="span11" id="video"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">商品分类 : </label>
                    <div class="col-sm-9">
                        <select id="product_classify_id">
                                <option value="{$product_classify_one['id']}" selected>{$product_classify_one['name']}</option>
                            <volist name="product_classify" id="product_classifys">
                                <option value="{$product_classifys.id}">{$product_classifys.name}</option>
                            </volist>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">商品状态 : </label>
                    <div class="col-sm-9">
                        <select id="school">
                            <option value="1">上线状态</option>
                            <option value="0">下线状态</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">商品价格 : </label>
                    <div class="col-sm-9">
                        <input type="text" class="span11" id="price"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">商品单位 : </label>
                    <div class="col-sm-9">
                        <input type="text" class="span11" id="unit"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">商品库存 : </label>
                    <div class="col-sm-9">
                        <input type="text" class="span11" id="num"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">商品描述 : </label>
                    <div class="col-sm-9">
                        <input type="text" class="span11" id="desc"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">商品详情 : </label>
                    <div class="col-sm-9">
                        <!-- 加载编辑器的容器 -->
                        <script id="container" name="content" type="text/plain"><!--
                            这里写你的初始化内容
                        --></script>
                        <!-- 配置文件 -->
                        <script type="text/javascript" src="__PUBLIC__/admin/assets/UEditor/ueditor.config.js"></script>
                        <!-- 编辑器源码文件 -->
                        <script type="text/javascript" src="__PUBLIC__/admin/assets/UEditor/ueditor.all.js"></script>
                        <!-- 实例化编辑器 -->
                        <script type="text/javascript" width="560" height="465">
                            var ue = UE.getEditor('container');
                        </script>
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
<script src="__PUBLIC__/admin/assets/js/jquery.upload.js"></script>

<script>
    $(".remove").click(function () {
        if (confirm('确定删除这条资源吗？')) {
            var id = $(this).parents('.father').find('.id').text();
//                console.log(id);
//                debugger;
            $.post('{:U("custom/del")}', {
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

    $('#upload').click(function(){
        $.upload({
            url: '/home/product/upload',
            fileName: 'file',
            dataType: 'text',
            onSend: function() {
                return true;
            },
            onComplate: function(data) {
                if(data.indexOf('Image')>=0){
                    $("#img").val(data);
                    $("#preview").html('<img id="pic" style="height:100px;" src="__HOST__'+data+'" />');
                }else{
                    alert(data);
                }
            }
        });
        return false;
    });

    $("#save").click(function (e) {
        e.preventDefault();
        if (confirm('提交数据吗？')) {
            var data = {
                "name"   : $("#name").val(),
                "pic"    : $("#pic").attr('src'),
                "school" : $("#school").val(),
                "price"  : $("#price").val(),
                "unit"   : $("#unit").val(),
                "num"    : $("#num").val(),
                "desc"   : $("#desc").val(),
                "video"   : $("#video").val(),
                "container"         : ue.getContent(),
                "product_classifys" : $("#product_classify_id").val()
            };
            if(
                data.name=="" || data.school==""  || data.price=="" ||
                data.unit=="" || data.num==""     || data.desc==""  ||
                /*data.product_classifys==""      ||*/ data.container==""
            ){
                alert('请填写完整数据');
                $("#name").focus();
                $("#pic").focus();
                $("#huihu").focus();
                $("#school").focus();
                $("#price").focus();
                $("#unit").focus();
                $("#num").focus();
                $("#container").focus();
                $("#desc").focus();
                $("#product_classifys").focus();
                return false;
            }
            $.post("{:U('Product/product_add')}",data, function (data) {
                if (data.code) {
                    alert(data.message);
                    $(window).attr('location','{:U("Product/index")}');
                }else{
                    alert(data.message);
                }
            }
        );
        }
        return false;
    });


</script>