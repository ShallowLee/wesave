<?php
namespace Poofull\Controller;
class ProductController extends CommonController
{
    function __construct(){
        parent::__construct();
        $web['title'] = "捕货商城";
        $this->assign("web" , $web);
    }

    public function classify(){
        $product = M('product')->where(array("product_classify_id"=>$_GET['id']))->select();
        $address = M('address')->where(array("wechat_id"=>session('userInfo')['openid']))->select();
        $this->assign("address" , $address);
        $this->assign('product',$product);
        $this->display();
    }

    public function page()
    {
        $product = M('product')->where(array("id"=>$_GET['id']))->find();
        $address = M('address')->where(array("wechat_id"=>session('userInfo')['openid']))->select();

        $method = $product['name'];
        $this->assign("method" , $method);
        $this->assign("address" , $address);
        $this->assign('product',$product);
        $this->display();
    }

}