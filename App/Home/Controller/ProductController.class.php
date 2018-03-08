<?php
namespace Home\Controller;
class ProductController extends CommonController
{
    public function index($display = null){

        $map['id']           = array('like', '%'.$_GET['name'].'%');
        $map['name']         = array('like','%'.$_GET['name'].'%');
        $map['_logic']       = 'or';
        $where['_complex']   = $map;
        if ($_GET['product_classify_id']){
            $where['product_classify_id']     = $_GET['product_classify_id'];
        }


        $User                         = M('product');
        $count                        = $User->where($where)->count();
        $Page                         = new \Org\Util\Page($count,10);
        $show                         = $Page->show();
        $product = $User->where($where)->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();


//
//        $model = M('product');
//        $count = $model->where($where)->count();
//        $Page       = new \Think\Page($count,C('__PAGESIZE__'));
//        $this->page();
//        $product    = $model->where($where)->page($this->offset,$this->pagesize)->select();
//        $show       = $Page->show();


        $product_classify = M('product_classify')->select();



        $this->assign('product_classify' , $product_classify);
        $this->assign('product',$product);
        $this->assign('count',$count);
        $this->assign('page',$show);
        $this->display($display);
    }

    /**
     * 显示上架商品
     */
    public function on(){
        $this->index('index',['status'=>1]);
    }

    /**
     * 显示下架商品
     */
    public function off(){
        $this->index('index',['status'=>0]);
    }

    /**
     * 添加商品
     */
    public function product_add(){
        if(IS_POST){
            $model = D('Product');
            $data = $model->create();
            $data['pic'] = preg_replace('/.*\\.top\\/(.*)/',"$1",$data['pic']);
            $data['time'] = time();
            $res = $model->add($data);
            if(empty($res)){
                $this->returnAjaxError(['message'=>'添加失败！']);
            }else{
                $this->returnAjaxSuccess(['message'=>'添加成功！']);
            }
        }else{
            $product_classify = M('product_classify')->field('id,name')->select();
            $this->assign('product_classify_one',array_shift($product_classify));
            $this->assign('product_classify',$product_classify);
            $this->display();
        }
    }

    /**
     * 删除商品
     */
    public function product_remove($id = null){
        $model = D('Product');
        $res = $model->where(['id'=>$id])->delete();
        if(empty($res)){
            $this->returnAjaxError(['message'=>'删除失败！']);
        }else{
            $this->returnAjaxSuccess(['message'=>'删除成功！']);
        }
    }

    public function upload(){
        $config = [
            'exts'     =>  ['jpg', 'gif', 'png', 'jpeg'],
            'rootPath' =>  C('__ROOTPATH__'),
            'savePath' =>  C('__FILE_IMAGE__'),
            'maxSize'  =>  3*1024*1024
        ];
        $upload = new \Think\Upload($config);
        $info   =   $upload->uploadOne($_FILES['file']);

        if(!$info) {
            echo $upload->getError();
        }else{
            echo $info['savepath'].$info['savename'];
        }
    }

    public function product_edit($id = null){

        if(IS_POST){
            $model = D('Product');
            $data = D('Product')->create();
            $data['pic'] = preg_replace('/.*\\.top\\/(.*)/',"$1",$data['pic']);
            $data['time'] = time();
            $data = array_filter($data);
            $res = $model->save($data);
            if(empty($res)){
                $this->returnAjaxError(['message'=>'修改失败！']);
            }else{
                $this->returnAjaxSuccess(['message'=>'修改成功！']);
            }
        }else{
            $model = D('Product');
            $info  = $model->find($id);
            $info['content'] = htmlspecialchars_decode($info['content']);
            $product_classify = M('product_classify')->field('id,name')->select();
            $this->assign('product_classify_one',array_shift($product_classify));
            $this->assign('product_classify',$product_classify);
            $this->assign('product',$info);
            $this->assign('id',$id);
            $this->display();
        }
    }

    /**
     * 修改状态
     */
    public function chstatus($id = null,$status = null){
        $model = D('Product');
        $res = $model->where(['id'=>$id])->setField(['status'=>$status]);
        if(empty($res)){
            $this->returnAjaxError(['message'=>'修改失败！']);
        }else{
            $this->returnAjaxSuccess(['message'=>'修改成功！']);
        }
    }
}