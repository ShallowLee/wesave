<?php
namespace Poofull\Controller;
use Think\Controller;
class IndexController extends CommonController {
 /*   function __construct(){
        parent::__construct();
        $web['title'] = "捕货商城";
        $this->assign("web" , $web);
    }*/
    public function index(){

        $method = "捕货商城";
        $this->assign("method" , $method);


        $news = M('news')->where(array("status"=>2))->select();




        $classify = M('product_classify')->select();

        $this->assign("news"     , $news);
        $this->assign("classify" , $classify);
        $this->display();
    }
}