<?php
namespace Home\Controller;
use Think\Controller;
/**
 * 公共控制器
 */
class CommonController extends Controller
{
    public function _initialize()
    {
        //设置中国时区
        ini_set('date.timezone','PRC');
    }

    const CODE_SUCCESS = 200;
    const CODE_ERROR = 400;
    const CODE_LOGIN_ERROR = 401;
    const CODE_REFRESH_ERROR = 302;

    /**
     * AJAX 返回成功
     * @param array  $data
     * @param string $message
     * @param int    $code
     * @param int    $status
     * @return array
     */
    public function returnAjaxSuccess($data,$Methods = null)
    {
        static::setHeader($Methods);
        $response = static::dataConversion($data,true);
        $this->ajaxReturn($response);
    }

    /**
     * AJAX 返回失败
     * @param string $message
     * @param int    $code
     * @param int    $status
     * @return array
     */
    public function returnAjaxError($data,$Methods = null)
    {
        static::setHeader($Methods);
        $response = static::dataConversion($data,false);
        $this->ajaxReturn($response);
    }

    /**
     * 允许跨域AJAX请求
     */
    private static function setHeader($Methods = null)
    {
        header('Content-type: application/json');//请求的数据格式
        //设置中文header头
        header('Content-Type:text/html;CharSet=UTF-8');
//        header('Content-Type: application/x-www-form-urlencoded; charset=UTF-8');//请求的数据格式
        header('Access-Control-Allow-Origin: *');//请求来源
        header('Access-Control-Allow-Headers: content-type');//允许的请求头
        header('Access-Control-Allow-Credentials: true');//允许携带cookie数据
        if($Methods && strtolower($Methods) != 'any'){
            if(is_array($Methods)) $Methods = implode(',',$Methods);
            if(strtolower($Methods) == 'match') $Methods = 'GET,POST';
            header('Access-Control-Allow-Methods: '.$Methods);//允许的请求方式
        }
    }

    /**
     *  智能数据转换
     * @param mixed $data   数组、对象、JSON
     * @return array    数组
     */
    private static function dataConversion($data,$bool = true){
        $tmp['success'] =   $bool;
        $tmp['message'] =   $bool ? '操作成功！':'操作失败！';
        $tmp['status']  =   $bool ? static::CODE_SUCCESS:static::CODE_ERROR;
        $tmp['code']    =   $bool ? 1:0;

        if(is_array($data)){
            return $response = [
                'success'  =>  isset($data['success']) ? $data['success']:$tmp['success'],
                'message'  =>  isset($data['message']) ? $data['message']:$tmp['message'],
                'status'   =>  isset($data['status'])  ? $data['status']:$tmp['status'],
                'code'     =>  isset($data['code'])    ? $data['code']:$tmp['code'],
                'data'     =>  (object)(isset($data['data']) ? $data:[])
            ];
        }elseif(!is_null(json_decode($data)) && is_array($data = json_decode($data,true))){
            return static::dataConversion($data);
        }elseif(is_object($data)){
            return static::dataConversion([
                'data'    => $data->data,
                'code'    => $data->code,
                'message' => $data->message,
                'status'  => $data->status
            ]);
        }elseif(empty($data)){
            return static::returnAjaxError(['message'=>'空参数！']);
        }else{
            return static::returnAjaxError(['message'=>'参数不是：数组、对象、JSON！']);
        }
    }

    /**
     * 用于获取列表并转换格式
     * @param object 传递一个对象，省略代表使用当前对象
     */
    public function getList($obj){
        $obj = $obj ? :$this;
        $list = $obj->select();
        if($list === false) $this->returnAjaxError(['message'=>'获取列表失败！']);
        $tmp = [];
        foreach ($list as $value) {
            $tmp[base64_encode(array_shift($value))] = array_shift($value);
        }
        array_push($tmp, '其他');
        return $tmp;
    }

    /**
     * 登陆验证
     */
    private function cheCkUser(){
        if(empty(session('userInfo'))){
            static::returnAjaxError(['message'=>'请登您先登陆！']);
        }
    }

    /**
     * 空操作
     */
    public function _empty(){
        static::returnAjaxError(['message'=>'空操作！']);
    }

    /**
     * 设置分页数据
     */
    public function page(){
        $page = isset($_POST['page']) ? $_POST['page']:1;
        $pagesize = isset($_POST['pagesize']) ? $_POST['pagesize']:C('__PAGESIZE__');
        $offset = ($page-1) * $pagesize;
        $this->offset   = $offset;
        $this->pagesize = $pagesize;
        return ['offset'=>$offset,'pagesize'=>$pagesize];
    }


    /**
     * 获取token
     */
    public function getUserToken()
    {
        $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=' . C('APPID') . '&redirect_uri=' . urlencode(C('REDIRECTURI')) .
            '&response_type=code&scope=' . C('SCOPE') . '&state=STATE#wechat_redirect';
        header("Location:" . $url);
        exit;
    }

    public function oauth()
    {
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

    public function encrypt($string,$operation,$key=''){
        $key=md5($key);
        $key_length=strlen($key);
        $string=$operation=='D'?base64_decode($string):substr(md5($string.$key),0,8).$string;
        $string_length=strlen($string);
        $rndkey=$box=array();
        $result='';
        for($i=0;$i<=255;$i++){
            $rndkey[$i]=ord($key[$i%$key_length]);
            $box[$i]=$i;
        }
        for($j=$i=0;$i<256;$i++){
            $j=($j+$box[$i]+$rndkey[$i])%256;
            $tmp=$box[$i];
            $box[$i]=$box[$j];
            $box[$j]=$tmp;
        }
        for($a=$j=$i=0;$i<$string_length;$i++){
            $a=($a+1)%256;
            $j=($j+$box[$a])%256;
            $tmp=$box[$a];
            $box[$a]=$box[$j];
            $box[$j]=$tmp;
            $result.=chr(ord($string[$i])^($box[($box[$a]+$box[$j])%256]));
        }
        if($operation=='D'){
            if(substr($result,0,8)==substr(md5(substr($result,8).$key),0,8)){
                return substr($result,8);
            }else{
                return'';
            }
        }else{
            return str_replace('=','',base64_encode($result));
        }
    }
}