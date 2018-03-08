<?php
return array(
    'APP_SUB_DOMAIN_DEPLOY'   =>    1, // 开启子域名配置
    'APP_SUB_DOMAIN_RULES'    =>    array(//隐藏模块名称
        'hf.liiedu.com'       => 'Hefei',//合肥站模块(乐学网)
        'wz.liiedu.com'       => 'Wenzhou',//温州站模块(乐学网)
        'www.junelee.cn'      => 'Test',//测试模块
        'www.sdscxc.com'      => 'Admin',//后台模块
        'www.sdxc360.com'     => 'Shandong',//山东模块（优化站）
        'sc.jhredu.com'       => 'Shandong_Le',//山东模块(乐学网)
        'sdsc.vroedu.com'     => 'Shandong_Le',//山东模块(乐学网)
        'ceshi.sdxc360.com'   => 'Shandong_Le',//山东模块（优化站）
        'admin.sdscxc.com'    => 'Admin',//新后台模块
        'stpc.sdscxc.com'     => 'Station_pc',//普创样板站
        'stsc.sdscxc.com'     => 'Station_sc',//食创样板站
        'stnj.sdscxc.com'     => 'Station_nj',//南京样板站
        'demo.sdscxc.com'     => 'Home',//南京样板站
        'www.pcxc360.com'     => 'Station_pc',//普创小吃360站
        'm.pcxc360.com'       => 'Station_pc',//普创小吃360站
        'sc.yytpa.org.cn'     => 'Station_sc',//山东搜狗站
        'www.jsnjxsg.com'     => 'Station_nj',//南京鑫时光
        'm.jsnjxsg.com'       => 'Station_nj',//南京鑫时光
    ),
    'LOG_RECORD'            =>  false,   // 默认不记录日志
    //'TMPL_FILE_DEPR'=>'_',//
    'TMPL_TEMPLATE_SUFFIX'     => '.php',//默认文件后缀
    'URL_HTML_SUFFIX'          => '.htm',//伪静态
//    'SHOW_PAGE_TRACE'=>true,// 显示页面Trace信息
    'URL_PARAMS_BIND'          => true, // URL变量绑定到操作方法作为参数
    'DEFAULT_CONTROLLER'       => 'Index', // 默认控制器名称
    'URL_ROUTER_ON'            => true, // 开启路由

    'URL_MODEL'                => '0', // 开启路由
//    'URL_ROUTE_RULES'          => array( //路由正则
////访问地址http://www.xxx.com/index.php/Home/News/add/id/3.html
////短地址http://www.xxx.com/add_3.html
////短链接php里 U('/add_3'); html里 {:U('/add_3')}
//        '/^add_(\d{0,2})$/'               => 'Home/News/add?id=:1',
////访问地址http://www.xxx.com/index.php/Home/News/add/name/aa/id/3.html
////短地址http://www.xxx.com/add/aa/3.html
////短链接php里U('/add/aa/3'); html里 {:U('/add/aa/3')}
//        '/^add\/(\w+)\/(\d{0,2})$/'       => 'Home/News/add?name=:1&id=:2',
////访问地址http://www.xxx.com/index.php/Home/News/add/id/3.html
////短地址http://www.xxx.com/3.html
////短链接php里U('/3'); html里 {:U('/3')}
//        '/^(\d{0,2})$/'                   =>'Home/News/add?id=:1',
////访问地址http://www.xxx.com/index.php/Home/News/add?name/aa/id/3.html
////短地址http://www.xxx.com/aa/3.html
////短链接php里U('/aa/3'); html里 {:U('/aa/3')}
//        '/^(\w+)\/(\d{0,2})$/'            => 'Home/News/add?name=:1&id=:2',
////访问地址http://www.xxx.com/index.php/Home/News/add?id/上海(北京)
////短地址http://www.xxx.com/上海.html
////短链接php里U('/上海'); html里 {:U('/上海')}
//        '/^([\x{4e00}-\x{9fa5}]+)$/u'     => 'Home/News/add?id=:1',
//
//    ),

    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => '127.0.0.1', // 服务器地址
    'DB_NAME'   => 'poofull', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => 'show1028', // 密码
    'DB_PORT'   => 3306, // 端口
    'DB_PARAMS' =>  array(), // 数据库连接参数
    'DB_PREFIX' => '', // 数据库表前缀
    'DB_CHARSET'=> 'utf8', // 字符集
    'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志

    //定义文件路径
    '__ROOTPATH__' => '/data/wwwroot/default/wesave/',
    '__FILE_IMAGE__' => 'Public/Image/',
    '__FILE_VIDEO__' => 'Public/Video/',

    'APPID'=>'wxafe0c676420d5319',
    'APPSECRET'=>'4a7138e1d94371e97be01adbb7c9ffd6',
    'SCOPE'=>'snsapi_userinfo',
    'REDIRECTURI'=>'http://poofull.wvfeng.top/Poofull/wechat/oauth',
    'NOTIFY_URL' =>'poofull.wvfeng.top/Poofull/wxpay/notify',
    'KEY' => '2bd12a930c3012f9bb4e0ea9bec9a3fc',

);