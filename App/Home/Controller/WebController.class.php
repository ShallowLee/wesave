<?php
namespace Home\Controller;
use Think\Controller;
class WebController extends Controller {
    public function index(){
        $web = M('web')->where("id=1")->find();
 
        $this->assign("web" , $web);
        $this->display();
    }

    public function edit(){
        M('web')->where("id=1")->save($_POST);
        echo "修改成功";
        exit();
    }
}