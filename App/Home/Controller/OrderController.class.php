<?php
namespace Home\Controller;
use Think\Controller;
class OrderController extends Controller {
    public function index(){

        $map['order.sn']           = array('like', '%'.$_GET['name'].'%');
        $map['order.name']         = array('like','%'.$_GET['name'].'%');
        $map['_logic']       = 'or';
        $where['_complex']   = $map;



        if ($_GET['status']){
            $where['order.status']     = $_GET['status'];
        }

        $User                         = M('order');
        $count                        = $User->where($where)->count();
        $Page                         = new \Org\Util\Page($count,10);
        $show                         = $Page->show();

        $order         = $User
            ->join('address ON order.address_id = address.id')
            ->join('user ON order.wechat_id = user.wechat_id')
            ->field('address.city as address_city,address.phone as address_phone,address.address as address,address.name as address_name,
            user.wechat_name as wechat_name,order.id as id,order.sn as sn,order.express_code as express_code,
            order.name as name,order.express as express,order.time as time,order.price as price,order.num as num,order.price_sum as price_sum,order.status as status,order.msg as msg')
            ->where($where)
            ->limit($Page->firstRow.','.$Page->listRows)
            ->order('order.id asc')
            ->select();

        $this->assign('page',$show);
        $this->assign('order'  ,  $order);
        $this->display();
    }

    public function edit(){
        $order         = M('order')
            ->join('address ON order.address_id = address.id')
            ->join('user ON order.wechat_id = user.wechat_id')
            ->field('address.city as address_city,address.phone as address_phone,address.address as address,address.name as address_name,
            user.wechat_name as wechat_name,user.phone as wechat_phone,order.id as id,order.express_code as express_code,
            order.name as name,order.express as express,order.time as time,order.price as price,order.num as num,order.price_sum as price_sum,order.status as status,order.msg as msg')
            ->where(array("order.id"=>$_GET['id']))
            ->order('order.id asc')
            ->find();

        $express = M('express')->select();
        $this->assign('express'  , $express);
        $this->assign('order'  ,  $order);
        $this->display();
    }

    public function do_edit(){
        if ($_POST['id']){
            if ($_POST['express']) {
               $data['express'] = $_POST['express'];
            }
            if ($_POST['express_code']) {
                $data['express_code'] = $_POST['express_code'];
            }
            if ($_POST['status']) {
                $data['status'] = $_POST['status'];
            }
            $res = M('order')->where(array("id" => $_POST['id']))->save($data);
        }
        if ($res){
            $data = array("msg" => "修改成功");
        }else{
            $data = array("msg" => "修改失败");
        }


        $this->AjaxReturn($data);
    }

}