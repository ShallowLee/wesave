
<script type="text/javascript" src="__PUBLIC__/admin/assets/js/jquery-1.10.2.min.js"></script>
<script>
    //wechat 支付
    function wechatcallpay()
    {
        var sn = '{$sn}';
        $.ajax({
            type: 'get',
            url: 'http://poofull.wvfeng.top/Poofull/Wxpay/pay/',  //獲取後臺中的數據
            dataType: 'json',
            data: {"sn":sn},
            success: function(data){
                jsApiParamenters = data
                if (typeof WeixinJSBridge == "undefined"){
                    if( document.addEventListener ){
                        document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
                    }else if (document.attachEvent){
                        document.attachEvent('WeixinJSBridgeReady', jsApiCall);
                        document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
                    }
                }else{

                    jsApiCall();
                }
            }
    });
    }
    window.onload = wechatcallpay();

    function jsApiCall()
    {
        WeixinJSBridge.invoke(
            'getBrandWCPayRequest',
            jsApiParamenters,
            function(res){
//                WeixinJSBridge.log(res.err_msg);
//                alert(res.err_code+res.err_desc+res.err_msg);

                if(res.err_msg == "get_brand_wcpay_request:ok" ) {
                    window.location.href = "http://poofull.wvfeng.top/Poofull";
                    //跳轉到[成功界面]
                } else if(res.err_msg == "get_brand_wcpay_request:cancel"){
                    alert('未支付订单请在我的订单中去完成支付');
                    window.location.href = "http://poofull.wvfeng.top/Poofull";
                } else {
                    alert('系统错误请稍后再我的订单中再试');
                    window.location.href = "http://poofull.wvfeng.top/Poofull";
                }
            }
        );
    }
</script>
