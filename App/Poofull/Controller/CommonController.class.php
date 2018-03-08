<?php
namespace Poofull\Controller;
use Think\Controller;
/**
 * 公共控制器
 */
class CommonController extends Controller
{
    public function _initialize()
    {
        if(empty(session('userInfo'))){
            $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=' . C('APPID') . '&redirect_uri=' . urlencode(C('REDIRECTURI')) .
                '&response_type=code&scope=' . C('SCOPE') . '&state=STATE#wechat_redirect';
            header("Location:" . $url);
            exit;
        }
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
                'data'     =>  (object)(isset($data['data']) ? $data['data']:[])
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

}