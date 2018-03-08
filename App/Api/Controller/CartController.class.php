<?php
namespace Api\Controller;
class CartController extends CommonController {

    public function add(){
        $data = $this->Model->create();
        $data['time'] = time();
        $res = $this->Model->add($data);
        $this->quickReturn($res,'添加');
    }

    public function remove($id = null){
        if(empty($id)) $this->returnAjaxError(['message'=>'缺少购物车ID！']);
        $res = $this->Model->where(['id'=>$id])->delete();
        $this->quickReturn($res,'删除');
    }

    public function edit($id = null){
        $data = $this->Model->create();
        $data = array_filter($data);
        $res = $this->Model->save($data);
        $this->quickReturn($res,'修改');
    }
}