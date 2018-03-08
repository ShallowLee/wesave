<?php
namespace Poofull\Controller;
use Think\Controller;
class UserController extends CommonController {

    function __construct(){
        parent::__construct();
        $web['title'] = "捕货商城";
        $this->assign("web" , $web);
    }
    public function index(){
        $method = "个人中心";
        $this->assign("method" , $method);

        $user = M('user')->where(array("wechat_id"=>session('userInfo')['openid']))->find();
        $this->assign("user" , $user);
        $this->display();
    }

    public function address(){
        $method = "地址管理";
        $this->assign("method" , $method);
        $address = M('address')->where(array("wechat_id"=>session('userInfo')['openid'],"status"=>1))->select();

        $this->assign("address" , $address);
        $this->display();
    }

    public function address_add(){
        $method = "添加地址";
        $this->assign("method" , $method);
        $this->display();
    }

    public function address_do_add(){

        $data = $_POST;
        $data['status'] = 1;
        $data['wechat_id'] = session('userInfo')['openid'];
        if(M('address')->add($data)){
            $res = array("error_code"=>"200","msg"=>"添加地址成功");
        }else{
            $res = array("error_code"=>"10000","msg"=>"添加地址失败");
        }
        $this->AjaxReturn($res);
    }

    public function address_edit(){
        $method = "编辑地址";
        $this->assign("method" , $method);
        $address = M('address')->where(array("id"=>$_GET['id']))->find();
        $this->assign("address" , $address);
        $this->display();
    }
    public function address_do_edit(){

        $data['name'] = $_POST['name'];
        $data['phone'] = $_POST['phone'];
        $data['city'] = $_POST['city'];
        $data['address'] = $_POST['address'];
        $data['wechat_id'] = session('userInfo')['openid'];
        if(M('address')->where(array("id"=>$_POST['id']))->save($data)){
            $res = array("error_code"=>"200","msg"=>"编辑地址成功");
        }else{
            $res = array("error_code"=>"10000","msg"=>"编辑地址失败");
        }
        $this->AjaxReturn($res);
    }
    public function address_del(){
        if(M('address')->where(array("id"=>$_POST['id']))->save(array("status"=>"0"))){
            $res = array("error_code"=>"200","msg"=>"删除地址成功");
        }else{
            $res = array("error_code"=>"10000","msg"=>"删除地址失败");
        }
        $this->AjaxReturn($res);
    }

}