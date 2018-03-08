<?php
namespace Poofull\Controller;

/**
 * Class EmptyController
 * @package Home\Controller]
 * 空控制器
 */
class EmptyController extends CommonController
{
    /**
     * 空控制器
     */
    public function _empty(){
        parent::returnAjaxError(['message'=>'空控制器！']);
    }
}