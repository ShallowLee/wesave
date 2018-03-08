<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
        $User                         = M('user');
        $count                        = $User->count();
        $Page                         = new \Org\Util\Page($count,20);
        $show                         = $Page->show();
        $user                          = $User->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('user'          , $user);
        $this->assign('page'          , $show);
        $this->display();
    }

    public function address(){
        $User                         = M('address');
        $count                        = $User->count();
        $Page                         = new \Org\Util\Page($count,20);
        $show                         = $Page->show();
        $address                          = $User
            ->join('user ON address.wechat_id = user.wechat_id')
            ->field('*,address.id as id,address.phone as phone,user.wechat_id as wechat_id,user.wechat_name as wechat_name,user.wechat_pic as wechat_pic')
            ->order('user.id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('address'          , $address);
        $this->assign('page'          , $show);
        $this->display();
    }
}