<?php
namespace Api\Controller;
class IndexController extends CommonController {

/*
     * 首页信息
     * $product_classify 分类信息
     * $news 头条信息
     * */
    public function index(){

        $data['product_classify'] = M('Product_classify')->select();
        $data['head'] = M('Web')->field('name,logo,ico,keywords,`desc`')->select();
        $this->returnAjaxSuccess(['data'=>$data]);
    }
}