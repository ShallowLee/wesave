
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
                        <input type="file" class="span11" id="pic"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">商品分类 : </label>
                    <div class="col-sm-9">
                        <select id="product_classify_id">
                            <option></option>
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
                            <option value="0">上线状态</option>
                            <option value="1">下线状态</option>
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
                     <textarea style="height: 100px;color: #000;width: 400px;" id="content">
                     </textarea>
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

