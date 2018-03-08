
<include file="./App/Home/View/header.php"/>
<!--End-Chart-box-->


<div class="widget-box">

    <div class="widget-content nopadding">
        <div id="light" class="white_content">
            <span lable="label label-success" style="font-size: 20px;color: red">网站设置</span><br>

            <form class="form-horizontal col-xs-12 id" enctype="multipart/form-data" role="form">
                <BR><br>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">网站名称 : </label>
                    <div class="col-sm-9">
                        <input type="text" class="span11" id="name" value="{$web.name}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">ico : </label>
                    <div class="col-sm-9">
                        <div class="col-sm-3" id="preview_ico"><img height="100" src="/{$web.ico}"></div>
                        <div class="col-sm-6">
                            <input type="text" id="ico" name="ico" class="form-control"></div>
                        <a href="" id="upload_ico" class="col-sm-1 btn btn-success">上传图片</a>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">logo : </label>

                    <div class="col-sm-9">
                        <div class="col-sm-3" id="preview_logo"><img height="100" src="/{$web.logo}"></div>
                        <div class="col-sm-6">
                            <input type="text" id="logo" name="logo" class="form-control"></div>
                        <a href="" id="upload_logo" class="col-sm-1 btn btn-success">上传图片</a>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">电话号码 : </label>
                    <div class="col-sm-9">
                        <input type="text" class="span11" id="tel" value="{$web.tel}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">传真 : </label>
                    <div class="col-sm-9">
                        <input type="text" class="span11" id="fax" value="{$web.fax}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">公司名称 : </label>
                    <div class="col-sm-9">
                        <input type="text" class="span11" id="company" value="{$web.company}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 关键词: </label>
                    <div class="col-sm-9">
                        <input type="text" class="span11" id="keywords" value="{$web.keywords}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 描述: </label>
                    <div class="col-sm-9">
                        <input type="text" class="span11" id="desc" value="{$web.desc}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">icp备案号 : </label>
                    <div class="col-sm-9">
                        <input type="text" class="span11" id="icp" value="{$web.icp}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">公司简介 : </label>
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
                            ue.ready(function() {
                                ue.setContent('{$web.content}');
                            });
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
    $('#upload_ico').click(function(){
        $.upload({
            url: '/home/product/upload',
            fileName: 'file',
            dataType: 'text',
            onSend: function() {
                return true;
            },
            onComplate: function(data) {
                if(data.indexOf('Image')>=0){
                    $("#ico").val(data);
                    $("#preview_ico").html('<img style="height:100px;" src="__HOST__/'+data+'"/>');
                }else{
                    alert(data);
                }
            }
        });
        return false;
    });
    $('#upload_logo').click(function(){
        $.upload({
            url: '/home/product/upload',
            fileName: 'file',
            dataType: 'text',
            onSend: function() {
                return true;
            },
            onComplate: function(data) {
                if(data.indexOf('Image')>=0){
                    $("#logo").val(data);
                    $("#preview_logo").html('<img style="height:100px;" src="__HOST__/'+data+'"/>');
                }else{
                    alert(data);
                }
            }
        });
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
                if(data.indexOf('upload')>=0){
                    $("#img").val(data);
                    $("#preview").html('<img style="height:100px;" src="__PUBLIC__/'+data+'"/>');
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
                "ico"    : $("#ico").val(),
                "logo" : $("#logo").val(),
                "company"  : $("#company").val(),
                "desc"   : $("#desc").val(),
                "keywords"    : $("#keywords").val(),
                "icp"   : $("#icp").val(),
                "content"         : ue.getContent(),
                "tel" : $("#tel").val(),
                "fax" : $("#fax").val()
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
            $.post("{:U('Web/edit')}",data, function (data) {
                alert(data);
                     location.reload();

                }
            );
        }
        return false;
    });


</script>