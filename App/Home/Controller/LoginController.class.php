<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
        layout(false);
        $this->display();
    }

    public function do_login(){
        $rules = array(
            array('username','require','账号必须填写'), // 在新增的时候验证name字段是否唯一
            array('password','require','密码必须填写'), // 自定义函数验证密码格式
        );
        $admin_auth = M("admin"); // 实例化admin对象
        if (!$admin_auth->validate($rules)->create()){// 如果创建失败 表示验证没有通过 输出错误提示信息
            $this->error($admin_auth->getError());
        }else{
            $admin = M('admin')->where(array(
                'username' =>I('post.username'),
                'password' =>md5(I('post.password')),
                'status'   =>'1',
            ))->find();
            if (!$admin) {
                $this->error('账号或密码不正确,或无权限登录');
            };
            $_SESSION['admin_is_login'] = true;
            $_SESSION['admin_name'] = I('post.username');
            $this->success('登录成功',U('home/index/index',2));
        }
    }


    public function logout(){
        session_destroy();
        $this->redirect('home/login/index');
    }
}