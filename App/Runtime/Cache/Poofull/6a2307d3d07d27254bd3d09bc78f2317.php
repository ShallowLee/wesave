<?php if (!defined('THINK_PATH')) exit();?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo ($web["title"]); ?></title>
    <meta name="description" content="<?php echo ($web["desc"]); ?>"/>
    <meta name="keywords" content="<?php echo ($web["keyword"]); ?>" />
    <link rel="stylesheet" type="text/css" href="/Public/admin/assets/css/font-awesome.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="/Public/admin/assets/js/jquery-1.10.2.min.js"></script>
</head>
<style>
    a{
        text-decoration:none;
        color: #0a001f;
    }
    li{
        text-decoration:none;
        list-style:none;
    }
    input{
        border: none;
        box-shadow: none;
    }
    .ml5b{
        margin-left: 5%;
    }
    .ml10b{
        margin-left: 10%;
    }
    .ml15b{
        margin-left: 15%;
    }
    .ml20b{
        margin-left: 20%;
    }
    .ml25b{
        margin-left: 25%;
    }
    .ml5{
        margin-left: 5px;
    }
    .ml10{
        margin-left: 10px;
    }
    .ml15{
        margin-left: 15px;
    }
    .ml20{
        margin-left: 20px;
    }
    .ml25{
        margin-left: 25px;
    }
    .ml30{
        margin-left: 30px;
    }
    .mr5{
        margin-right: 5px;
    }
    .mr10{
        margin-right: 10px;
    }
    .mr15{
        margin-right: 15px;
    }
    .mr20{
        margin-right: 20px;
    }
    .mr25{
        margin-right: 25px;
    }
    .mr30{
        margin-right: 30px;
    }
    .mt5{
        margin-top: 5px;
    }
    .mt10{
        margin-top: 10px;
    }
    .mt15{
        margin-top: 15px;
    }
    .mt20{
        margin-top: 20px;
    }
    .mt25{
        margin-top: 25px;
    }
    .mt30{
        margin-top: 30px;
    }
    .mb5{
        margin-bottom: 5px;
    }
    .mb10{
        margin-bottom: 10px;
    }
    .mb15{
        margin-bottom: 15px;
    }
    .mb20{
        margin-bottom: 20px;
    }
    .mb25{
        margin-bottom: 25px;
    }
    .mb30{
        margin-bottom: 30px;
    }
    .fl{
        float: left;
    }
    .fr{
        float: right;
    }
    .clear{
        clear: both;
    }
    .tc{
        text-align: center;
    }
    .lh20{
        line-height: 20px;
    }
    .lh30{
        line-height: 30px;
    }
    .lh40{
        line-height: 40px;
    }
    .lh50{
        line-height: 50px;
    }
    .w15{
        width: 15%;
    }
    .w20{
        width: 20%;
    }
    .w25{
        width: 25%;
    }
    .w30{
        width: 30%;
    }
    .w35{
        width: 35%;
    }
    .w40{
        width: 40%;
    }
    .w45{
        width: 45%;
    }
    .w50{
        width: 50%;
    }
    .w55{
        width: 55%;
    }
    .w60{
        width: 60%;
    }
    .w65{
        width: 65%;
    }
    .w70{
        width: 70%;
    }
    .w75{
        width: 75%;
    }
    .w80{
        width: 80%;
    }
    .w85{
        width: 85%;
    }
    .w90{
        width: 90%;
    }
    .w95{
        width: 95%;
    }
    .w100{
        width: 100%;
    }
    .h10{
        height: 10px;
    }
    .h20{
        height: 20px;
    }
    .h30{
        height: 30px;
    }
    .h40{
        height: 40px;
    }
    .h50{
        height: 50px;
    }
    .h60{
        height: 60px;
    }
    .h70{
        height: 70px;
    }
    .h80{
        height: 80px;
    }
    .h90{
        height: 90px;
    }
    .h100{
        height: 100px;
    }
    .h150{
        height: 150px;
    }
    .h200{
        height: 200px;
    }
    .h250{
        height: 250px;
    }
    .h300{
        height: 300px;
    }
    .white{
        background-color: white;
    }
    .black{
        background-color: black;
    }
    .grey{
        background-color:  #edf1f4;
    }
    .pink{
        background-color:  pink;
    }
    .themeColor{
        background-color: #3A3D65;
    }
    .c_white{
        color: white;
    }
    .c_red{
        color: red;
    }
    .c_black{
        color: black;
    }
    .c_grey{
        color:  #edf1f4;
    }
    .c_shit{
        color:  #ffba0d;
    }
    .c_pink{
        color:  pink;
    }
    .c_themeColor{
        color: #3A3D65;
    }
    .block{
        display: block;
    }
    .none{
        display: none;
    }
    .b-r-5{
        border-radius:5px
    }
    .b-r-10{
        border-radius:10px
    }
    .b-r-15{
        border-radius:15px
    }
    .b-r-20{
        border-radius:20px
    }
    .b-r-25{
        border-radius:25px
    }
    .b-r-30{
        border-radius:30px
    }
    .b-r-35{
        border-radius:35px
    }
    .b-r-40{
        border-radius:40px
    }
    .b-r-50{
        border-radius:50px
    }
    .b-r-60{
        border-radius:60px
    }
    .b-r-70{
        border-radius:70px
    }
    .ft14{
        font-size: 14px;
    }
    .ft16{
        font-size: 16px;
    }
    .ft18{
        font-size: 18px;
    }
    .ft20{
        font-size: 20px;
    }
    .ft22{
        font-size: 22px;
    }
    .ft24{
        font-size: 24px;
    }
    .ft26{
        font-size: 26px;
    }
    .ft28{
        font-size: 28px;
    }
    .bl{
        display: block;
    }

</style>
<body style="background-color: #fff;color: #000;">
<div>
    <div class="white" style="position: fixed;top: 0px;left:0px;width: 100%;display: inline-block;text-align: center;height: 40px;border-bottom: 1px solid #999;">
                <span style="width:100%;" class="fl grey bl h50 ">
                   <a href="/poofull/index/index">
                        <div class="ft20"><?php echo ($method); ?><img height="40px;" src="/Public/Image/logo.png"></div>
                    </a>
                </span>
        <div  class="clear bl h50">
        </div>
    </div>
    <div class="clear bl h30" ></div>

<div class="clear bl h20" ></div>
<!-- Copyright � 2008. Spidersoft Ltd -->
<div class="grey tc">
    <br>
    <h1><i class="icon-map-marker "></i>   快递信息</h1>
    <br>
</div>
<br>
    <div class="grey lh30">
        <div class="ft20">订单单号：<?php echo $_GET['sn']; ?></div>
        <div class="ft20">快递单号：<?php echo $_GET['express']; ?></div>
        <div>
                <div>
                    <?php
 foreach($express as $key=>$val) { ?>
                        <div ><span class="ml10"> <?php  echo $val['context']; ?></span> </div>
                         <div class="bl w100 white"> <span class="ml10"><?php  echo $val['time']; ?></span> </div>

                     <?php } ?>
                    </div>

        </div>
    </div>


    <br>


<div class="clear bl h50" ></div>

<div class="white" style="border-top: 1px solid #999; position: fixed;bottom: 0px;left:0px;width: 100%;display: inline-block;text-align: center;height: 50px;">
                <span style="width:33.3%;" class="fl grey">
                   <a href="/poofull/index/index">
                        <p><i class=" icon-home"></i> 首页</p>
                    </a>
                </span>
    <span style="width:33.3%;" class="fl grey">
                   <a href="/poofull/cart/index">
                        <p><i class=" icon-shopping-cart"></i> 购物车</p>
                    </a>
                </span>
    <span style="width:33.3%;" class="fl grey">
                    <a href="/poofull/user/index">
                        <p><i class="icon-user"></i> 我的</p>
                    </a>
                </span>

    <div class="clear">
    </div>
</div>


</body>

</html>