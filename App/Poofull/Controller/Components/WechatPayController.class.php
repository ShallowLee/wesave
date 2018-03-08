<?php


namespace Poofull\Controller\Components;
use Think\Controller;

class WechatPayController extends Controller
{
    /**
     * 获取微信公众号授权用户唯一标识
     * @param $app_id 微信公众号应用唯一标识
     * @param $app_secret 微信公众号应用密钥（注意保密）
     * @param $code 授权code, 通过调用WxpubOAuth::createOauthUrlForCode来获取
     * @return openid 微信公众号授权用户唯一标识, 可用于微信网页内支付
     */
    public static function getOpenid($app_id, $app_secret, $code)
    {
        $url = self::_createOauthUrlForOpenid($app_id, $app_secret, $code);
        $res = self::_getRequest($url);
        $data = json_decode($res, true);

        return $data['openid'];
    }

    /**
     * 用于获取授权code的URL地址，此地址用于用户身份鉴权，获取用户身份信息，同时重定向到$redirect_url
     * @param $app_id 微信公众号应用唯一标识
     * @param $redirect_url 授权后重定向的回调链接地址，重定向后此地址将带有授权code参数，
     *                      该地址的域名需在微信公众号平台上进行设置，
     *                      步骤为：登陆微信公众号平台 => 开发者中心 => 网页授权获取用户基本信息 => 修改
     * @param bool $more_info FALSE 不弹出授权页面,直接跳转,这个只能拿到用户openid
     *                        TRUE 弹出授权页面,这个可以通过 openid 拿到昵称、性别、所在地，
     * @return string 用于获取授权code的URL地址
     */
    public static function createOauthUrlForCode($app_id, $redirect_url, $more_info = false)
    {
        $urlObj = array();
        $urlObj['appid'] = $app_id;
        $urlObj['redirect_uri'] = $redirect_url;
        $urlObj['response_type'] = 'code';
        $urlObj['scope'] = $more_info ? 'snsapi_userinfo' : 'snsapi_base';
        $urlObj['state'] = "#state";  //這個參數會原封不動地傳回來
        $queryStr = http_build_query($urlObj);

        return 'https://open.weixin.qq.com/connect/oauth2/authorize?' . $queryStr;
    }

    /**
     * 获取openid的URL地址
     * @param $app_id 微信公众号应用唯一标识
     * @param $app_secret 微信公众号应用密钥（注意保密）
     * @param $code 授权code, 通过调用WxpubOAuth::createOauthUrlForCode来获取
     * @return string 获取openid的URL地址
     */
    private static function _createOauthUrlForOpenid($app_id, $app_secret, $code)
    {
        $urlObj = array();
        $urlObj['appid'] = $app_id;
        $urlObj['secret'] = $app_secret;
        $urlObj['code'] = $code;
        $urlObj['grant_type'] = 'authorization_code';
        $queryStr = http_build_query($urlObj);

        return 'https://api.weixin.qq.com/sns/oauth2/access_token?' . $queryStr;
    }

    /**
     * GET 请求
     */
    private static function _getRequest($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,FALSE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $res = curl_exec($ch);
        curl_close($ch);

        return $res;
    }


    public static function getSign($params, $key){
        ksort($params, SORT_STRING);
        $unSignParaString = self::formatQueryParaMap($params, false);
        $signStr = strtoupper(md5($unSignParaString . "&key=" . $key));
        return $signStr;
    }

    protected static function formatQueryParaMap($paraMap, $urlEncode = false){
        $buff = "";
        ksort($paraMap);
        foreach ($paraMap as $k => $v){
            if (null != $v && "null" != $v) {
                if ($urlEncode) {
                    $v = urlencode($v);
                }
                $buff .= $k . "=" . $v . "&";
            }
        }
        $reqPar = '';
        if (strlen($buff)>0) {
            $reqPar = substr($buff, 0, strlen($buff) - 1);
        }
        return $reqPar;
    }

}