<?php
namespace Api\Controller;
class AddressController extends CommonController {

    public function add(){
        $data = $this->Model->create();
        $res = $this->Model->add($data);
        $this->quickReturn($res,'添加');
    }

    public function remove($id = null){
        if(empty($id)) $this->returnAjaxError(['message'=>'缺少地址ID！']);
        $res = $this->Model->where(['id'=>$id])->delete();
        $this->quickReturn($res,'删除');
    }

    public function edit($id = null){
        if(empty($id)) $this->returnAjaxError(['message'=>'缺少地址ID！']);
        $data = $this->Model->create();
        $data = array_filter($data);
        $res = $this->Model->save($data);
        $this->quickReturn($res,'修改');
    }
}