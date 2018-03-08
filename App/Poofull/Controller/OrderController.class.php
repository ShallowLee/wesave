<?php
namespace Poofull\Controller;
use Think\Controller;
use Poofull\Express\SelectExpress;

class OrderController extends Controller {
    function __construct(){
        parent::__construct();
        $web['title'] = "捕货商城";
        $this->assign("web" , $web);
    }
    public function index(){
        $method = "我的订单";
        $this->assign("method" , $method);
        if($_GET['status']){
            $where['order.status'] = $_GET['status'];
        }
        $where['order.wechat_id'] = session('userInfo')['openid'];
        $order         = M('order')
            ->join('address ON order.address_id = address.id')
            ->join('product ON order.product_id = product.id')
            ->field('address.city as address_city,address.phone as address_phone,address.address as address,address.name as address_name,
            product.name as product_name,product.pic as product_pic,order.sn as sn,order.express_code as express_code,
            order.id as id,order.name as name,order.express as express,order.time as time,order.price as price,order.num as num,order.price_sum as price_sum,order.status as status,order.msg as msg')
            ->where($where)
            ->order('order.id asc')
            ->select();


//        $order         = M('order')->where($where)->select();
////        echo "<br><br>";
//        var_dump($order);
//        echo "<br><br>";
        $this->assign('order'  ,  $order);
        $this->display();
    }


    /*非购物车单个产品新增订单/*/

    public function do_add(){
        $yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
        $orderSn = $yCode[intval(date('Y')) - 2011] . strtoupper(dechex(date('m'))) . date('d') . substr(time(), -5)
            . substr(microtime(), 2, 5) . sprintf('%02d', rand(0, 99));
        $data=array(
            "wechat_id"   => session('userInfo')['openid'],
            "product_id"  => $_POST['id'],
            "price"       => $_POST['price'],
            "address_id"  => $_POST['address_id'],
            "name"        => $_POST['name'],
            "num"         => $_POST['num'],
            "price_sum"   => $_POST['price_sum'],
            "time"        => time(),
            'sn'          => $orderSn
        );
        if(M('order')->add($data)){
            session('sn',$orderSn);
            $res = array("error_code"=>"200","msg"=>"下单成功",'sn'=>$orderSn);
        }else{
            $res = array("error_code"=>"10000","msg"=>"下单失败");
        }
        $this->AjaxReturn($res);
    }

    /*购物车多个产品订单一起处理*/
    public function do_adds(){

        $yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
        $orderSn = $yCode[intval(date('Y')) - 2011] . strtoupper(dechex(date('m'))) . date('d') . substr(time(), -5)
            . substr(microtime(), 2, 5) . sprintf('%02d', rand(0, 99));

        $where['cart.id']  = array('IN',$_POST['ids']);

        $cart = M('cart')
            ->join('product ON cart.product_id = product.id')
            ->field('product.name as name,
            cart.id as id,cart.product_id as product_id,cart.price as price,cart.num as num,cart.price_sum as price_sum')
            ->where($where)->select();


        foreach($cart as $key=>$val) {
            $data = array(
                "wechat_id"   => session('userInfo')['openid'],
                "product_id"  => $val['product_id'],
                "price"       => $val['price'],
                "name"        => $val['name'],
                "address_id"  => $_POST['address_id'],
                "num"         => $val['num'],
                "price_sum"   => $val['price_sum'],
                "time"        => time(),
                'sn'          => $orderSn
            );
            M('order')->add($data);
        }

        if (M('cart')->where($where)->delete()){
            session('sn',$orderSn);
            $res = array("error_code"=>"200","msg"=>"下单成功");
        }else{
            $res = array("error_code"=>"200","msg"=>"下单失败");
        }
        $this->AjaxReturn($res);

    }

    public function do_del(){
        $r = M('order')->where(array("sn"=>$_POST['sn']))->delete();
        if($r){
            $res = array("error_code"=>"200","msg"=>"删除成功");
        }else{
            $res = array("error_code"=>"10000","msg"=>"删除失败");
        }
        $this->AjaxReturn($res);
    }

    public function sn(){
       session('sn',$_POST['sn']);
        $res = array("error_code"=>"200","msg"=>"设置成功");
        $this->AjaxReturn($res);
    }


    public function expressssss(){
        //接收数据
        //运单编号  必须
        $LogisticCode = I('request.LogisticCode');
        //快递公司  必须
        $ShipperCode  = I('request.ShipperCode');
        //订单编号 非必需
        $OrderCode    = I('request.OrderCode');
        //如果有缓存就返回缓存信息
        if(!empty(S($OrderCode))) $this->ajaxReturn(S($OrderCode));
        /*
         //方式一
         $data = [
             //运单编号  必须
            'LogisticCode' => '3350162158341',
            //快递公司  必须
            'ShipperCode'  => 'STO',
             //订单编号 非必需
            'OrderCode'    => ''
        ];
        $SelectEvent = new \Home\Express\SelectExpress($data);
        */

        /*
         //方式二
            //运单编号  必须
            $LogisticCode = '3350162158341',
            //快递公司  必须
            $ShipperCode = 'STO',
            //订单编号 非必需
            $OrderCode = ''
          $SelectEvent = new \Home\Express\SelectExpress($LogisticCode,$ShipperCode,$OrderCode);
        */

        $order = M('order')->where(array("id"=>$_GET['id']))->find();
        //方式三
        $SelectEvent = A('Select','Express');
        $SelectEvent->OrderCode    = $order['sn'];
        $SelectEvent->ShipperCode  = $order['express_code'];
        $SelectEvent->LogisticCode = $order['express'];

        //以上三种方式任选一种
        $res = $SelectEvent->Send();
        $data = json_decode($res,true);
        if($data['Success']){
            //如果获取成功，缓存30分钟
            S($OrderCode,$data,1800);
        }
        var_dump(($data));
        exit();
//        $this->display();
//        $this->ajaxReturn($data);
    }

    //快递100
    public function express(){
        //运单编号  必须
        $LogisticCode = I('request.LogisticCode');
        //快递公司  必须
        $ShipperCode = I('request.ShipperCode');
        //订单编号 非必需
        $OrderCode = I('request.OrderCode');

        //模拟数据
        //运单编号  必须

        $LogisticCode = $_GET['express'];
        //快递公司  必须
        $ShipperCode = $_GET['express_code'];
        //订单编号 非必需
        $OrderCode = $_GET['sn'];
        if(!empty(S($OrderCode))) $this->ajaxReturn(S($OrderCode));
        $url = "https://www.kuaidi100.com/query?type={$ShipperCode}&postid={$LogisticCode}&temp=0.".time();

        $res = file_get_contents($url);
        $data = json_decode($res,true);
        if($data['Success']){
            //如果获取成功，缓存30分钟
            S($OrderCode,$data,1800);
        }
//        $this->assign('data',$data)->dispaly();
//        $this->ajaxReturn($data);



        $this->assign("express"  , $data['data']);


        $this->display();
    }

}