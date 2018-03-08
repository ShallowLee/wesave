<?php
namespace Poofull\Controller;
class CartController extends CommonController
{
    function __construct(){
        parent::__construct();
        $web['title'] = "捕货商城";
        $this->assign("web" , $web);
    }
    public function index(){
        $method = "购物车";
        $this->assign("method" , $method);

        $data                     = M('cart')
            ->join('product ON cart.product_id = product.id')
            ->field('product.pic as product_pic,product.name as product_name,product.unit as unit,
            cart.id as id,cart.num as num,cart.price as price,cart.price_sum as price_sum,cart.num as num,cart.time as time,cart.product_id as product_id')
            ->where(array("cart.wechat_id"=>session('userInfo')['openid']))
            ->order('cart.id desc')
            ->select();


//        if(empty($id)) $this->returnAjaxError(['message'=>'缺少用户ID！']);
//        $data = $this->Model->table('__ADDRESS__')->where(['id'=>$id])->limit($this->page())->select();
//        $this->quickReturn($data);
        $address = M('address')->where(array("wechat_id"=>session('userInfo')['openid']))->select();
        $this->assign("address" , $address);

        $this->assign('cart',$data);
        $this->display();
    }

    public function do_add(){
        $data=array(
            "wechat_id"   => session('userInfo')['openid'],
            "product_id"  => $_POST['id'],
            "price"       => $_POST['price'],
            "num"         => $_POST['num'],
            "price_sum"   => $_POST['price_sum'],
        );
        if(M('cart')->add($data)){
            $res = array("error_code"=>"200","msg"=>"添加购物车成功");
        }else{
            $res = array("error_code"=>"10000","msg"=>"添加购物车失败");
        }
        $this->AjaxReturn($res);
    }
    /*
     * 单个购物车删除操作*/
    public function do_del(){
        $r = M('cart')->where(array("id"=>$_POST['id']))->delete();
        if($r){
            $res = array("error_code"=>"200","msg"=>"删除成功");
        }else{
            $res = array("error_code"=>"10000","msg"=>"删除失败");
        }
        $this->AjaxReturn($res);
    }
/*d多个购物车删除操作*/
    public function do_dels(){

        $where['id']  = array('IN',$_POST['ids']);

        $r = M('cart')->where($where)->delete();
        if($r){
            $res = array("error_code"=>"200","msg"=>"删除成功");
        }else{
            $res = array("error_code"=>"10000","msg"=>"删除失败");
        }
        $this->AjaxReturn($res);
    }


    /*
     * 修改商品数量和商品总价
     * */
    public function do_msg(){
        $data = array(
            "num"         => $_POST['num'],
            "price_sum"   => $_POST['price_sum'],
        );
        if(M('cart')->where(array("id"=>$_POST['id']))->save($data)){
            $res = array("error_code"=>"200","msg"=>"修改成功");
        }else{
            $res = array("error_code"=>"10000","msg"=>"修改失败");
        }
        $this->AjaxReturn($res);
    }



}