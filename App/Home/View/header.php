<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8"/>

    <title>POOFULL后台管理系统v1.0</title>


    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- basic styles -->

    <link href="__PUBLIC__/admin/assets/css/bootstrap.min.css" rel="stylesheet"/>

<!--    <link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/assets/css/font-awesome.css">-->

    <link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/assets/css/font-awesome.min.css">

    <!--[if IE 7]>

    <link rel="stylesheet" href="__PUBLIC__/admin/assets/css/font-awesome-ie7.min.css"/>

    <![endif]-->


    <!-- page specific plugin styles -->


    <!-- ace styles -->


    <link rel="stylesheet" href="__PUBLIC__/admin/assets/css/ace.min.css"/>

    <link rel="stylesheet" href="__PUBLIC__/admin/assets/css/ace-rtl.min.css"/>

    <link rel="stylesheet" href="__PUBLIC__/admin/assets/css/ace-skins.min.css"/>


    <!--[if lte IE 8]>

    <link rel="stylesheet" href="__PUBLIC__/admin/assets/css/ace-ie.min.css"/>

    <![endif]-->


    <!-- inline styles related to this page -->


    <!-- ace settings handler -->


    <script src="__PUBLIC__/admin/assets/js/ace-extra.min.js"></script>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

<!--    <script type="text/javascript" src="__PUBLIC__/admin/timechose/showdate.js"></script>-->
    <!--[if lt IE 9]>

    <script src="__PUBLIC__/admin/assets/js/html5shiv.js"></script>

    <script src="__PUBLIC__/admin/assets/js/respond.min.js"></script>

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

            <a href="{:U('index/index')}" class="navbar-brand">

                <small>

                    <i class="icon-leaf"></i>

                   POOFULL后台管理系统

                </small>

            </a><!-- /.brand -->

        </div><!-- /.navbar-header -->


        <div class="pull-right" role="">
            <ul class="nav ace-nav">
                <li class="grey">
                    <a data-toggle="" class="" href="{:U('login/logout')}">
                        <i class=" icon-share-alt"></i>
                        <span class="badge badge-grey">退出登录</span>
                    </a>
                </li>
                <li class="purple">
                    <a data-toggle="" class="" href="{:U('custom/index')}">
                        <i class="icon-bell-alt icon-animated-bell"></i>
                        <span class="badge badge-important">{$index_count}</span>
                    </a>
                </li>
                <li class="green">
                    <a data-toggle="" class="" href="{:U('admin/index')}">
                        <i class="icon-envelope icon-animated-vertical"></i>
                        <span class="badge badge-success">{$new_count}</span>
                    </a>
                </li>
                <li class="light-blue">

                    <a data-toggle="dropdown" style="cursor: pointer;">

                        <img class="nav-user-photo" src="__PUBLIC__/admin/assets/avatars/user.jpg" alt="Jason's Photo"/>

                        <span class="user-info">

                            <small>欢迎光临,</small>
                            {$username}
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
                <li  <if condition="($ctrl eq  index)">class="active"<else/></if>>
                    <a href="{:U('index/index')}">
                        <i class="icon-dashboard"></i>
                        <span class="menu-text"> 控制台 </span>
                    </a>
                </li>
                    <li <if condition="($ctrl eq  product)">class="active"<else/></if>>
                        <a style="cursor: pointer;" class="dropdown-toggle">
                            <i class="icon-desktop"></i>
                            <span class="menu-text"> 商品管理 </span>
                            <b class="arrow icon-angle-down"></b>
                        </a>
                        <ul class="submenu">
                            <li <if condition="($method eq  index)">class="active"<else/></if>>
                                <a href="{:U('product/index')}">
                                    <i class="icon-double-angle-right"></i>
                                    全部商品
                                </a>
                            </li>
                            <li <if condition="($method eq  on)">class="active"<else/></if>>
                                <a href="{:U('Product/on')}">
                                    <i class="icon-double-angle-right"></i>
                                    上架商品
                                </a>
                            </li>
                            <li <if condition="($method eq  under)">class="active"<else/></if>>
                                <a href="{:U('Product/off')}">
                                    <i class="icon-double-angle-right"></i>
                                    下架商品
                                </a>
                            </li>
                            <li <if condition="($method eq  add)">class="active"<else/></if>>
                                <a href="{:U('Product/product_add')}">
                                    <i class="icon-double-angle-right"></i>
                                    添加商品
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li <if condition="($ctrl eq  custom)">class="active"<else/></if>>
                    <a style="cursor: pointer;" class="dropdown-toggle">
                        <i class="icon-list-alt"></i>
                        <span class="menu-text"> 订单管理 </span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu">
                        <li <if condition="($method eq  order)">class="active"<else/></if>>
                            <a href="{:U('order/index')}">
                                <i class="icon-double-angle-right"></i>
                                全部订单
                            </a>
                        </li>
                        <li <if condition="($method eq  order)">class="active"<else/></if>>
                            <a href="{:U('order/index')}">
                                <i class="icon-double-angle-right"></i>
                                全部订单
                            </a>
                        </li>
                    </ul>
                    </li>
                <li <if condition="($ctrl eq  news)">class="active"<else/></if>>
                <a style="cursor: pointer;" class="dropdown-toggle">
                    <i class="icon-list-alt"></i>
                    <span class="menu-text"> 头条管理 </span>
                    <b class="arrow icon-angle-down"></b>
                </a>
                <ul class="submenu">
                    <li <if condition="($method eq  user)">class="active"<else/></if>>
                    <a href="{:U('news/index')}">
                        <i class="icon-double-angle-right"></i>
                        全部头条
                    </a>
                    </li>
                </ul>

                <li <if condition="($ctrl eq  custom)">class="active"<else/></if>>
                <a style="cursor: pointer;" class="dropdown-toggle">
                    <i class="icon-list-alt"></i>
                    <span class="menu-text"> 用户中心 </span>
                    <b class="arrow icon-angle-down"></b>
                </a>
                <ul class="submenu">
                    <li <if condition="($method eq  user)">class="active"<else/></if>>
                    <a href="{:U('user/index')}">
                        <i class="icon-double-angle-right"></i>
                        全部用户
                    </a>
                    </li>
                    <li <if condition="($method eq  order)">class="active"<else/></if>>
                    <a href="{:U('user/address')}">
                        <i class="icon-double-angle-right"></i>
                        地址信息
                    </a>
                    </li>
                </ul>
                </li>
                    <li <if condition="($ctrl eq  developer)">class="active"
                        <else/>
                    </if>>
                    <a style="cursor: pointer;" class="dropdown-toggle">
                        <i class="icon-cogs"></i>
                        <span class="menu-text"> 开发者中心 </span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu">
                        <li <if condition="($method eq  developer_)">class="active"<else/></if>>
                        <a href="{:U('developer/index')}">
                            <i class="icon-double-angle-right"></i>
                            开发者文档
                        </a>
                        </li>
                        <li <if condition="($method eq  developer_api)">class="active"<else/></if>>
                        <a href="{:U('developer/api')}">
                            <i class="icon-double-angle-right"></i>
                            接口文档
                        </a>
                        </li>
                        <li <if condition="($method eq  developer_data)">class="active"<else/></if>>
                        <a href="{:U('developer/data')}">
                            <i class="icon-double-angle-right"></i>
                            数据库
                        </a>
                        </li>
                    </ul>
                    </li>
                <li  <if condition="($ctrl eq  web)">class="active"<else/></if>>
                <a href="{:U('web/index')}">
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