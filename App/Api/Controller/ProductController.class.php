<?php
namespace Api\Controller;
class ProductController extends CommonController {

    /*
     * 首页信息
     * $_POST['id'] 分类id
     * $product 分类商品
     * */
    public function productList($product_classify_id = 1){
        $data = $this->Model->where(["product_classify_id"=>$product_classify_id])
            ->limit($this->page())->select();
        $this->quickReturn($data);
    }

    /**
     *
     * 产品信息
     * $_POST['id'] 产品id
     */
    public function show($id = null){
        if($id === null) $this->returnAjaxError(['message'=>'未传递商品ID！']);
        $data = $this->Model->where(["id"=>$id])->find();
        $this->quickReturn($data);
    }
}