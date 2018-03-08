<?php
namespace Home\Model;
class ProductModel extends CommonModel
{
    protected $trueTableName  = 'product_classifys';
    protected $_map = array(
        'school' =>'status',
        'container' =>'content',
        'product_classifys' =>'product_classify_id'
    );

    // 插入成功后的回调方法
    protected function _after_insert($data) {
        //
    }
}