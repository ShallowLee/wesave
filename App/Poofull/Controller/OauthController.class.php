<?php
namespace Poofull\Controller;
use Think\Controller;
class WechatController extends Controller {

    public function oauth()
    {
        echo 1;die;
        $app_id = C('APPID');
        $app_secret = C('APPSECRET');
        $code = $_GET["code"];
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$app_id}&secret={$app_secret}";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        $token = json_decode($output, true);
        $oauth2Url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$app_id}&secret={$app_secret}&code=$code&grant_type=authorization_code";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $oauth2Url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        $oauth2 = json_decode($output, true);
        $access_token = $token["access_token"];
        $openid = $oauth2['openid'];
        $get_user_info_url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=$access_token&openid=$openid&lang=zh_CN";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $get_user_info_url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($output, true);
        print_r($result);die;
        $save['wechat_name'] = $result['nickname'];
        $save['wechat_pic']  = $result['headimgurl'];
        $userInfo = M('user')->find(['wechat_id' => $result['openid']]);
        if($userInfo) {
            if($userInfo->save($save)) {
                /*加盐*/
                return $this->returnAjaxSuccess($this->encrypt($userInfo['id'],'E',C('KEY')));
            }
        }else{
            $userId = M('user') -> add($save);
            if($userId) {
                /*加盐*/
                return $this->returnAjaxSuccess($this->encrypt($userInfo['id'],'E',C('KEY')));
            }
        }
    }
}