<?php
namespace Api\Controller;
class UserController extends CommonController {

    public function orderList($id = null){
        if(empty($id)) $this->returnAjaxError(['message'=>'缺少用户ID！']);
        $data = $this->Model->table('__ORDER__')->where(['id'=>$id])->limit($this->page())->select();
        $this->quickReturn($data);
    }

    public function addressList($id = null) {
        if(empty($id)) $this->returnAjaxError(['message'=>'缺少用户ID！']);
        $data = $this->Model->table('__ADDRESS__')->where(['id'=>$id])->limit($this->page())->select();
        $this->quickReturn($data);
    }

    public function cartList($id = null){
        if(empty($id)) $this->returnAjaxError(['message'=>'缺少用户ID！']);
        $data = $this->Model->table('__CART__')->where(['id'=>$id])->limit($this->page())->select();
        $this->quickReturn($data);
    }
}