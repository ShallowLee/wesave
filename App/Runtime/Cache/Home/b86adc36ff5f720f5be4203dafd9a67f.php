<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8"/>

    <title>POOFULL后台管理系统v1.0</title>


    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- basic styles -->

    <link href="/Public/admin/assets/css/bootstrap.min.css" rel="stylesheet"/>

<!--    <link rel="stylesheet" type="text/css" href="/Public/admin/assets/css/font-awesome.css">-->

    <link rel="stylesheet" type="text/css" href="/Public/admin/assets/css/font-awesome.min.css">

    <!--[if IE 7]>

    <link rel="stylesheet" href="/Public/admin/assets/css/font-awesome-ie7.min.css"/>

    <![endif]-->


    <!-- page specific plugin styles -->


    <!-- ace styles -->


    <link rel="stylesheet" href="/Public/admin/assets/css/ace.min.css"/>

    <link rel="stylesheet" href="/Public/admin/assets/css/ace-rtl.min.css"/>

    <link rel="stylesheet" href="/Public/admin/assets/css/ace-skins.min.css"/>


    <!--[if lte IE 8]>

    <link rel="stylesheet" href="/Public/admin/assets/css/ace-ie.min.css"/>

    <![endif]-->


    <!-- inline styles related to this page -->


    <!-- ace settings handler -->


    <script src="/Public/admin/assets/js/ace-extra.min.js"></script>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

<!--    <script type="text/javascript" src="/Public/admin/timechose/showdate.js"></script>-->
    <!--[if lt IE 9]>

    <script src="/Public/admin/assets/js/html5shiv.js"></script>

    <script src="/Public/admin/assets/js/respond.min.js"></script>

    <![endif]-->

</head>


<body>

<div class="navbar navbar-default" id="navbar">

    <script type="text/javascript">

        try {
            ace.settings.check('navbar', 'fixed')
        } catch (e) {
        }

    </script>


    <div class="navbar-container" id="navbar-container">

        <div class="navbar-header pull-left">

            <a href="<?php echo U('index/index');?>" class="navbar-brand">

                <small>

                    <i class="icon-leaf"></i>

                   POOFULL后台管理系统

                </small>

            </a><!-- /.brand -->

        </div><!-- /.navbar-header -->


        <div class="pull-right" role="">
            <ul class="nav ace-nav">
                <li class="grey">
                    <a data-toggle="" class="" href="<?php echo U('login/logout');?>">
                        <i class=" icon-share-alt"></i>
                        <span class="badge badge-grey">退出登录</span>
                    </a>
                </li>
                <li class="purple">
                    <a data-toggle="" class="" href="<?php echo U('custom/index');?>">
                        <i class="icon-bell-alt icon-animated-bell"></i>
                        <span class="badge badge-important"><?php echo ($index_count); ?></span>
                    </a>
                </li>
                <li class="green">
                    <a data-toggle="" class="" href="<?php echo U('admin/index');?>">
                        <i class="icon-envelope icon-animated-vertical"></i>
                        <span class="badge badge-success"><?php echo ($new_count); ?></span>
                    </a>
                </li>
                <li class="light-blue">

                    <a data-toggle="dropdown" style="cursor: pointer;">

                        <img class="nav-user-photo" src="/Public/admin/assets/avatars/user.jpg" alt="Jason's Photo"/>

                        <span class="user-info">

                            <small>欢迎光临,</small>
                            <?php echo ($username); ?>
                        </span>
                    </a>
                </li>
            </ul><!-- /.ace-nav -->
        </div><!-- /.navbar-header -->
    </div><!-- /.container -->
</div>


<div class="main-container" id="main-container">

    <script type="text/javascript">

        try {
            ace.settings.check('main-container', 'fixed')
        } catch (e) {
        }

    </script>


    <div class="main-container-inner">

        <a class="menu-toggler" id="menu-toggler" href="#">

            <span class="menu-text"></span>

        </a>


        <div class="sidebar" id="sidebar">

            <script type="text/javascript">

                try {
                    ace.settings.check('sidebar', 'fixed')
                } catch (e) {
                }

            </script>


            <div class="sidebar-shortcuts" id="sidebar-shortcuts">

                <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">

                    <button class="btn btn-success">

                        <i class="icon-signal"></i>

                    </button>


                    <button class="btn btn-info">

                        <i class="icon-pencil"></i>

                    </button>


                    <button class="btn btn-warning">

                        <i class="icon-group"></i>

                    </button>
                    <button class="btn btn-danger">
                        <i class="icon-cogs"></i>
                    </button>
                </div>
                <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                    <span class="btn btn-success"></span>
                    <span class="btn btn-info"></span>
                    <span class="btn btn-warning"></span>
                    <span class="btn btn-danger"></span>
                </div>
            </div><!-- #sidebar-shortcuts -->
            <ul class="nav nav-list">
                <li  <?php if(($ctrl == index)): ?>class="active"<?php else: endif; ?>>
                    <a href="<?php echo U('index/index');?>">
                        <i class="icon-dashboard"></i>
                        <span class="menu-text"> 控制台 </span>
                    </a>
                </li>
                    <li <?php if(($ctrl == product)): ?>class="active"<?php else: endif; ?>>
                        <a style="cursor: pointer;" class="dropdown-toggle">
                            <i class="icon-desktop"></i>
                            <span class="menu-text"> 商品管理 </span>
                            <b class="arrow icon-angle-down"></b>
                        </a>
                        <ul class="submenu">
                            <li <?php if(($method == index)): ?>class="active"<?php else: endif; ?>>
                                <a href="<?php echo U('product/index');?>">
                                    <i class="icon-double-angle-right"></i>
                                    全部商品
                                </a>
                            </li>
                            <li <?php if(($method == on)): ?>class="active"<?php else: endif; ?>>
                                <a href="<?php echo U('Product/on');?>">
                                    <i class="icon-double-angle-right"></i>
                                    上架商品
                                </a>
                            </li>
                            <li <?php if(($method == under)): ?>class="active"<?php else: endif; ?>>
                                <a href="<?php echo U('Product/off');?>">
                                    <i class="icon-double-angle-right"></i>
                                    下架商品
                                </a>
                            </li>
                            <li <?php if(($method == add)): ?>class="active"<?php else: endif; ?>>
                                <a href="<?php echo U('Product/product_add');?>">
                                    <i class="icon-double-angle-right"></i>
                                    添加商品
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li <?php if(($ctrl == custom)): ?>class="active"<?php else: endif; ?>>
                    <a style="cursor: pointer;" class="dropdown-toggle">
                        <i class="icon-list-alt"></i>
                        <span class="menu-text"> 订单管理 </span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu">
                        <li <?php if(($method == order)): ?>class="active"<?php else: endif; ?>>
                            <a href="<?php echo U('order/index');?>">
                                <i class="icon-double-angle-right"></i>
                                全部订单
                            </a>
                        </li>
                        <li <?php if(($method == order)): ?>class="active"<?php else: endif; ?>>
                            <a href="<?php echo U('order/index');?>">
                                <i class="icon-double-angle-right"></i>
                                全部订单
                            </a>
                        </li>
                    </ul>
                    </li>
                <li <?php if(($ctrl == admin)): ?>class="active"
                    <?php else: endif; ?>>
                <a style="cursor: pointer;" class="dropdown-toggle">
                    <i class="icon-user"></i>
                    <span class="menu-text"> 个人中心 </span>
                    <b class="arrow icon-angle-down"></b>
                </a>
                <ul class="submenu">
                    <li <?php if(($method == admin_index)): ?>class="active"<?php else: endif; ?>>
                    <a href="<?php echo U('admin/index');?>">
                        <i class="icon-double-angle-right"></i>
                        资源管理
                    </a>
                    </li>
                    <li <?php if(($method == admin_sale)): ?>class="active"<?php else: endif; ?>>
                    <a href="<?php echo U('admin/sale');?>">
                        <i class="icon-double-angle-right"></i>
                        每日数据录入
                    </a>
                    </li>
                    <li <?php if(($method == admin_page)): ?>class="active"<?php else: endif; ?>>
                    <a href="<?php echo U('admin/page');?>">
                        <i class="icon-double-angle-right"></i>
                        个人信息
                    </a>
                    </li>
                    <li <?php if(($method == admin_pass)): ?>class="active"<?php else: endif; ?>>
                    <a href="<?php echo U('admin/pass');?>">
                        <i class="icon-double-angle-right"></i>
                        修改密码
                    </a>
                    </li>
                </ul>
                </li>
                <?php if(($auth == 7)): ?><li
                    <?php if(($ctrl == company)): ?>class="active"
                        <?php else: endif; ?>
                    >
                    <a style="cursor: pointer;" class="dropdown-toggle">
                        <i class="icon-group"></i>
                        <span class="menu-text"> 公司管理 </span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu">
                        <li <?php if(($method == company_index)): ?>class="active"<?php else: endif; ?>>
                        <a href="<?php echo U('company/index');?>">
                            <i class="icon-double-angle-right"></i>
                            在职员工
                        </a>
                        </li>
                        <li <?php if(($method == company_api)): ?>class="active"<?php else: endif; ?>>
                        <a href="<?php echo U('company/api');?>">
                            <i class="icon-double-angle-right"></i>
                            离职员工
                        </a>
                        </li>
                        <li <?php if(($method == company_data)): ?>class="active"<?php else: endif; ?>>
                        <a href="<?php echo U('company/data');?>">
                            <i class="icon-double-angle-right"></i>
                            职位管理
                        </a>
                        </li>
                    </ul>
                    </li>
                    <?php else: endif; ?>
                    <li
                    <?php if(($ctrl == spread)): ?>class="active"
                        <?php else: endif; ?>
                    >
                    <a style="cursor: pointer;" class="dropdown-toggle">
                        <i class="icon-bar-chart"></i>
                        <span class="menu-text"> 推广数据中心 </span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu">
                        <li <?php if(($method == spread_index)): ?>class="active"<?php else: endif; ?>>
                        <a href="<?php echo U('spread/index');?>">
                            <i class="icon-double-angle-right"></i>
                            推广报表
                        </a>
                        </li>
                        <li <?php if(($method == spread_account)): ?>class="active"<?php else: endif; ?>>
                        <a href="<?php echo U('spread/account_');?>">
                            <i class="icon-double-angle-right"></i>
                            推广账户
                        </a>
                        </li>
                    </ul>
                    </li>
                    <li <?php if(($ctrl == developer)): ?>class="active"
                        <?php else: endif; ?>>
                    <a style="cursor: pointer;" class="dropdown-toggle">
                        <i class="icon-cogs"></i>
                        <span class="menu-text"> 开发者中心 </span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu">
                        <li <?php if(($method == developer_)): ?>class="active"<?php else: endif; ?>>
                        <a href="<?php echo U('developer/index');?>">
                            <i class="icon-double-angle-right"></i>
                            开发者文档
                        </a>
                        </li>
                        <li <?php if(($method == developer_api)): ?>class="active"<?php else: endif; ?>>
                        <a href="<?php echo U('developer/api');?>">
                            <i class="icon-double-angle-right"></i>
                            接口文档
                        </a>
                        </li>
                        <li <?php if(($method == developer_data)): ?>class="active"<?php else: endif; ?>>
                        <a href="<?php echo U('developer/data');?>">
                            <i class="icon-double-angle-right"></i>
                            数据库
                        </a>
                        </li>
                    </ul>
                    </li>
                <li  <?php if(($ctrl == web)): ?>class="active"<?php else: endif; ?>>
                <a href="<?php echo U('web/index');?>">
                    <i class="icon-dashboard"></i>
                    <span class="menu-text"> 网站设置 </span>
                </a>
                </li>
            </ul><!-- /.nav-list -->


            <div class="sidebar-collapse" id="sidebar-collapse">

                <i class="icon-double-angle-left" data-icon1="icon-double-angle-left"
                   data-icon2="icon-double-angle-right"></i>

            </div>


            <script type="text/javascript">

                try {
                    ace.settings.check('sidebar', 'collapsed')
                } catch (e) {
                }

            </script>

        </div>


        <div class="main-content">
            <div class="breadcrumbs" id="breadcrumbs">
                <script type="text/javascript">
                    try {
                        ace.settings.check('breadcrumbs', 'fixed')
                    } catch (e) {
                    }
                </script>
                <ul class="breadcrumb">
                    <li>
                        <i class="icon-home home-icon"></i>
                        <a href="#">首页</a>
                    </li>
                    <li class="active">控制台</li>
                </ul><!-- .breadcrumb -->
                <!--                <div class="nav-search" id="nav-search">-->
                <!--                    <form class="form-search">-->
                <!--								<span class="input-icon">-->
                <!--									<input type="text" placeholder="Search ..." class="nav-search-input"-->
                <!--                                           id="nav-search-input" autocomplete="off"/>-->
                <!--									<i class="icon-search nav-search-icon"></i>-->
                <!--								</span>-->
                <!--                    </form>-->
                <!--                </div><!-- #nav-search -->
            </div>
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
                                <option value="<?php echo ($product_classify_one['id']); ?>" selected><?php echo ($product_classify_one['name']); ?></option>
                            <?php if(is_array($product_classify)): $i = 0; $__LIST__ = $product_classify;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$product_classifys): $mod = ($i % 2 );++$i;?><option value="<?php echo ($product_classifys["id"]); ?>"><?php echo ($product_classifys["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
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
                        <script type="text/javascript" src="/Public/admin/assets/UEditor/ueditor.config.js"></script>
                        <!-- 编辑器源码文件 -->
                        <script type="text/javascript" src="/Public/admin/assets/UEditor/ueditor.all.js"></script>
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

<!--<td><?php echo html_entity_decode($statistiscs['content']);?></td>-->


<!--Footer-part-->

</div><!-- /.main-container-inner -->



<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">

    <i class="icon-double-angle-up icon-only bigger-110"></i>

</a>

</div><!-- /.main-container -->



<!-- basic scripts -->



<!--[if !IE]> -->



<!--<script src="http://www.jq22.com/jquery/jquery-2.1.1.js"></script>-->



<!-- <![endif]-->



<!--[if IE]>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<![endif]-->



<!--[if !IE]> -->



<script type="text/javascript">

    window.jQuery || document.write("<script src='/Public/admin/assets/js/jquery-2.0.3.min.js'>"+"<"+"script>");

</script>



<!-- <![endif]-->



<!--[if IE]>

<script type="text/javascript">

    window.jQuery || document.write("<script src='/Public/admin/assets/js/jquery-1.10.2.min.js'>"+"<"+"script>");

</script>

<![endif]-->



<script type="text/javascript">

    if("ontouchend" in document) document.write("<script src='/Public/admin/assets/js/jquery.mobile.custom.min.js'>"+"<"+"script>");

</script>

<!--<script src="http://www.jq22.com/jquery/bootstrap-3.3.4.js"></script>-->

<script src="/Public/admin/assets/js/typeahead-bs2.min.js"></script>



<!-- page specific plugin scripts -->



<!--[if lte IE 8]>

<script src="/Public/admin/assets/js/excanvas.min.js"></script>

<![endif]-->



<script src="/Public/admin/assets/js/jquery-ui-1.10.3.custom.min.js"></script>

<script src="/Public/admin/assets/js/jquery.ui.touch-punch.min.js"></script>

<script src="/Public/admin/assets/js/jquery.slimscroll.min.js"></script>

<script src="/Public/admin/assets/js/jquery.easy-pie-chart.min.js"></script>

<script src="/Public/admin/assets/js/jquery.sparkline.min.js"></script>

<script src="/Public/admin/assets/js/flot/jquery.flot.min.js"></script>

<script src="/Public/admin/assets/js/flot/jquery.flot.pie.min.js"></script>

<script src="/Public/admin/assets/js/flot/jquery.flot.resize.min.js"></script>



<!-- ace scripts -->



<script src="/Public/admin/assets/js/ace-elements.min.js"></script>

<script src="/Public/admin/assets/js/ace.min.js"></script>



<!-- inline scripts related to this page -->



<script type="text/javascript">

    jQuery(function($) {

        $('.easy-pie-chart.percentage').each(function(){

            var $box = $(this).closest('.infobox');

            var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');

            var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';

            var size = parseInt($(this).data('size')) || 50;

            $(this).easyPieChart({

                barColor: barColor,

                trackColor: trackColor,

                scaleColor: false,

                lineCap: 'butt',

                lineWidth: parseInt(size/10),

                animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,

                size: size

            });

        })



        $('.sparkline').each(function(){

            var $box = $(this).closest('.infobox');

            var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';

            $(this).sparkline('html', {tagValuesAttribute:'data-values', type: 'bar', barColor: barColor , chartRangeMin:$(this).data('min') || 0} );

        });









        var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});

        var data = [

            { label: "social networks",  data: 38.7, color: "#68BC31"},

            { label: "search engines",  data: 24.5, color: "#2091CF"},

            { label: "ad campaigns",  data: 8.2, color: "#AF4E96"},

            { label: "direct traffic",  data: 18.6, color: "#DA5430"},

            { label: "other",  data: 10, color: "#FEE074"}

        ]

        function drawPieChart(placeholder, data, position) {

            $.plot(placeholder, data, {

                series: {

                    pie: {

                        show: true,

                        tilt:0.8,

                        highlight: {

                            opacity: 0.25

                        },

                        stroke: {

                            color: '#fff',

                            width: 2

                        },

                        startAngle: 2

                    }

                },

                legend: {

                    show: true,

                    position: position || "ne",

                    labelBoxBorderColor: null,

                    margin:[-30,15]

                }

                ,

                grid: {

                    hoverable: true,

                    clickable: true

                }

            })

        }

        drawPieChart(placeholder, data);



        /**

         we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically

         so that's not needed actually.

         */

        placeholder.data('chart', data);

        placeholder.data('draw', drawPieChart);







        var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');

        var previousPoint = null;



        placeholder.on('plothover', function (event, pos, item) {

            if(item) {

                if (previousPoint != item.seriesIndex) {

                    previousPoint = item.seriesIndex;

                    var tip = item.series['label'] + " : " + item.series['percent']+'%';

                    $tooltip.show().children(0).text(tip);

                }

                $tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});

            } else {

                $tooltip.hide();

                previousPoint = null;

            }



        });













        var d1 = [];

        for (var i = 0; i < Math.PI * 2; i += 0.5) {

            d1.push([i, Math.sin(i)]);

        }



        var d2 = [];

        for (var i = 0; i < Math.PI * 2; i += 0.5) {

            d2.push([i, Math.cos(i)]);

        }



        var d3 = [];

        for (var i = 0; i < Math.PI * 2; i += 0.2) {

            d3.push([i, Math.tan(i)]);

        }





        var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});

        $.plot("#sales-charts", [

            { label: "Domains", data: d1 },

            { label: "Hosting", data: d2 },

            { label: "Services", data: d3 }

        ], {

            hoverable: true,

            shadowSize: 0,

            series: {

                lines: { show: true },

                points: { show: true }

            },

            xaxis: {

                tickLength: 0

            },

            yaxis: {

                ticks: 10,

                min: -2,

                max: 2,

                tickDecimals: 3

            },

            grid: {

                backgroundColor: { colors: [ "#fff", "#fff" ] },

                borderWidth: 1,

                borderColor:'#555'

            }

        });





        $('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});

        function tooltip_placement(context, source) {

            var $source = $(source);

            var $parent = $source.closest('.tab-content')

            var off1 = $parent.offset();

            var w1 = $parent.width();



            var off2 = $source.offset();

            var w2 = $source.width();



            if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';

            return 'left';

        }





        $('.dialogs,.comments').slimScroll({

            height: '300px'

        });





        //Android's default browser somehow is confused when tapping on label which will lead to dragging the task

        //so disable dragging when clicking on label

        var agent = navigator.userAgent.toLowerCase();

        if("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))

            $('#tasks').on('touchstart', function(e){

                var li = $(e.target).closest('#tasks li');

                if(li.length == 0)return;

                var label = li.find('label.inline').get(0);

                if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;

            });



        $('#tasks').sortable({

                opacity:0.8,

                revert:true,

                forceHelperSize:true,

                placeholder: 'draggable-placeholder',

                forcePlaceholderSize:true,

                tolerance:'pointer',

                stop: function( event, ui ) {
                    //just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved

                    $(ui.item).css('z-index', 'auto');

                }

            }

        );

        $('#tasks').disableSelection();

        $('#tasks input:checkbox').removeAttr('checked').on('click', function(){

            if(this.checked) $(this).closest('li').addClass('selected');

            else $(this).closest('li').removeClass('selected');

        });





    })

</script>



</body>

</html>


<script src="/Public/admin/assets/js/jquery.upload.js"></script>

<script>
    $(".remove").click(function () {
        if (confirm('确定删除这条资源吗？')) {
            var id = $(this).parents('.father').find('.id').text();
//                console.log(id);
//                debugger;
            $.post('<?php echo U("custom/del");?>', {
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
                    $("#preview").html('<img id="pic" style="height:100px;" src="http://poofull.wvfeng.top/'+data+'" />');
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
            $.post("<?php echo U('Product/product_add');?>",data, function (data) {
                if (data.code) {
                    alert(data.message);
                    $(window).attr('location','<?php echo U("Product/index");?>');
                }else{
                    alert(data.message);
                }
            }
        );
        }
        return false;
    });


</script>