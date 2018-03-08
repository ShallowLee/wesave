<?php
namespace Poofull\Controller;
use Think\Controller;
class NewsController extends Controller {
    public function index(){
        $news = M('news')->select();
        $this->assign("news" , $news);
        $this->display();
    }

    public function page(){
        $news = M('news')->where(array("id"=>$_GET['id']))->find();
        $this->assign("news" , $news);
        $this->display();
    }
}