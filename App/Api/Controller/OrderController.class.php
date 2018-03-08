<?php
namespace Api\Controller;
class OrderController extends CommonController {
    public function add(){
        $data = $this->Model->create();
        $data['time'] = time();
        $res = $this->add($data);
        $this->quickReturn($res,'添加');
    }

    public function remove($id = null){
        if(empty($id)) $this->returnAjaxError(['message'=>'缺少订单ID！']);
        $res = $this->Model->where(['id'=>$id])->delete();
        $this->quickReturn($res,'删除');
    }

    public function chstatus($id = null,$status = null){
        if(empty($id)) $this->returnAjaxError(['message'=>'缺少订单ID！']);
        if(empty($status)) $this->returnAjaxError(['message'=>'缺少订单状态！']);
        $res = $this->Model->where(['id'=>$id])->setField('status',$status);
        $this->quickReturn($res,'修改');
    }
}