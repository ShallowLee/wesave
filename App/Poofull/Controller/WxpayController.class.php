<?php

namespace Poofull\controller;

use Poofull\Controller\Components\WechatPayController as WechatPay;
use Poofull\Controller\Components\HelperController as Helper;

use Think\Controller;

class WxpayController extends Controller
{
    public $enableCsrfValidation = false;

    public function jsapi()
    {

        $this->display('jsapi');
    }

    public function pay()
    {
        $helper       = new Helper();
        $ssid         = 1;
//        $orderInfo    = M('order')->where(['sn' => session('sn')])->find();
//        $money        = ($orderInfo['price_sum'])*100;
//        $order_number = $orderInfo['sn'];

        $fee          = M('order')->where(array("sn"=> session('sn')))->sum('price_sum');

        $money        = 0.01*100;



        $order_number = session('sn');
        $open_id      = session('userInfo')['openid'];
        $body         = "商品购物";
        $notify_url   = C('NOTIFY_URL');
        session('sn',null);

        $jsApiParams  = $helper::getjsApiParams($open_id,$body,$ssid,$money,$order_number,$notify_url);


        echo $jsApiParams;

    }

    public function notify()
    {
        /*$postObj->out_trade_no*/
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
        file_put_contents("test.txt",json_encode($postObj));

        if ($postObj === false) {
            die('parse xml error');
        }

        if ($postObj->return_code != 'SUCCESS') {
            die("error_code: ".$postObj->err_code.",msg: ".$postObj->return_msg);
        }
        $key = C('KEY');
        $wechat = new WechatPay();
        $arr = (array)$postObj;
        unset($arr['sign']);
        file_put_contents("test.txt",json_encode($postObj->sign));
        if($wechat::getSign($arr,$key) != $postObj->sign) {
            die("签名错误");
        }
        /*回调操作*/
        M('order')->where(['sn' => "{$postObj->out_trade_no}"])->save(['status' => 0]);

        return '<xml><return_code><![CDATA[SUCCESS]]></return_code><return_msg><![CDATA[OK]]></return_msg></xml>';
    }

    public function actionGetcode()
    {
        $isWechat = Helper::isWechatBrowser();
        if ($isWechat) {
            $url = Helper::GetWxCodeUrl();
            header("Location: $url");
            exit();
        }
    }

    public function actionWxSendMsg( $openid, $data)
    {
        $msgid = '81-x5QTXsQJ3sdLI_VTnooLEbbFi3C8acJ-cHXupeyg';
        $urls='hd.91buyun.com';
        $access_token = $this->actionToken();
        $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$access_token;
        $template_msg = array(
            'touser' => $openid,
            'template_id' => $msgid,


            'topcolor' => '#FF0000',
            'url' => $urls,
            'data' => $data
        );
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($template_msg)) {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($template_msg));
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }

    public function actionToken(){
        $appid = 'wx0e1b2918a78bd7e4';   //appid
        $appsecret =  '950c2ae44e1bb7acd360fa516f6eb83e';//appsecret
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$appsecret;//请求地址
        //2初始化curl请求
        $ch = curl_init();
        //3.配置请求参数
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  // 从证书中检查SSL加密算法是否存在
        curl_setopt($ch, CURLOPT_URL, $url);//请求
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//不直接输出数据
        //4.开始请求
        $res = curl_exec($ch);//获取请求结果
        if( curl_errno($ch) ){
            var_dump( curl_error($ch) );//打印错误信息
        }
        curl_close( $ch );
        $arr = json_decode($res, true);//将结果转为数组
        return $arr['access_token'];
    }
}
