<?php
namespace frontend\components;

class WechatSend {
    //获得全局access_token
    public function get_token(){ //如果已经存在直接返回access_token
        //if($_SESSION['access_token'] && $_SESSION['expire_time']>time()){
            //return $_SESSION['access_token'];
        //}else{
        //1.请求url地址
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

    function sendMessage($openid,$customName,$customPhone,$reportBuilding) {
        $token = $this->get_token();
        $url="https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$token;//模板信息请求地址
        $post_data = array(
            "touser"=>$openid,//推送给谁,openid
                "template_id"=>"IDlFOZnNsg6nDhlhrhl2siPTZ7GYsEtYmzHRbKJjYrHfM",//微信后台的模板信息id
                "url"=>"http://www.baidu.com",//下面为预约看房模板示例
                "data"=> array(
            "first" => array(
                "value"=>"您有新客户，请及时查看！",
                "color"=>"#173177"
            ),
            "customName"=>array(
                "value"=>$customName,//传的变量
                                "color"=>"#173177"
                        ),
                        "customPhone"=>array(
            "value"=>$customPhone,
            "color"=>"#173177"
        ),
                        "reportBuilding"=> array(
            "value"=>$reportBuilding,
            "color"=>"#173177"
        ),
                        "reportTime"=> array(
            "value"=>date('Y-m-d H:i:s'),
            "color"=>"#173177"
        ),
                        "remark"=> array(
            "value"=>"请及时联系客户哦！",
            "color"=>"#173177"
        ),
                )
        );
        //将上面的数组数据转为json格式
        $post_data = json_encode($post_data);
        //发送数据，post方式<br>　　　　　　　　　//配置curl请求
        $ch = curl_init();//创建curl请求
        curl_setopt($ch, CURLOPT_URL,$url); //设置发送数据的网址
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); //设置有返回值，0，直接显示
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0); //禁用证书验证
        curl_setopt($ch, CURLOPT_POST, 1);//post方法请求
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);//post请求发送的数据包
        //接收执行返回的数据
        $data = curl_exec($ch);
        //关闭句柄
        curl_close($ch);
        $data = json_decode($data,true); //将json数据转成数组
        return $data;
    }
    function getHangye(){
        //用户同意授权后，会传过来一个code
        $token = $this->get_token();
        $url = "https://api.weixin.qq.com/cgi-bin/template/get_industry?access_token=".$token;
        //请求token，get方式
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
        $data = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($data,true); //将json数据转成数组
        //return $data["access_token"];
        return $data;
        }
}