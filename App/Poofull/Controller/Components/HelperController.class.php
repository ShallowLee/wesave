<?php

namespace Poofull\Controller\Components;
use Poofull\Controller\Components\WechatPay;
use Think\Controller;
require_once  dirname(__FILE__).'/init.php';

class HelperController extends Controller
{


    /**
     * 判断是否微信打开
     * @return boolean
     */
    public static function isWechatBrowser()
    {
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) {
            return true;
        }

        return false;
    }

    public static function test()
    {
        return 1111;
    }


    /**
     * 获取微信code的重定向前的url
     * @return string
     */
  /*  public static function GetWxCodeUrl()
    {
        $wx_app_id = C('APPID');
        $redirect_url = Yii::$app->params['wechat']['redirect_url'];//這個就是前面 微信重定向獲取code的ur(/order/getwxcode )

        $code_url = WechatPay::createOauthUrlForCode($wx_app_id, $redirect_url);

        return $code_url;
    }*/

    /**
     * wechat支付 獲取jsapi參數
     */
    public static function getjsApiParams($openId, $body, $attach, $money, $order_number, $notify_url, $trade_type = "JSAPI")
    {
        $input = new \WxPayUnifiedOrder();
        $input->SetBody($body);
        $input->SetAttach($attach);
        $input->SetOut_trade_no($order_number);
        $input->SetTotal_fee($money);
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetGoods_tag("商品");
        $input->SetNotify_url($notify_url);
        $input->SetTrade_type($trade_type);
        $input->SetOpenid($openId);
        $input->setDetail("商品簡介");
        $order = \WxPayApi::unifiedOrder($input);
        file_put_contents("order.txt",$notify_url,FILE_APPEND);

        $jsApiParameters = \WxPayApi::GetJsApiParameters($order);
        return $jsApiParameters;
    }
}