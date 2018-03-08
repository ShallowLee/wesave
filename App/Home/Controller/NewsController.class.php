<?php
namespace Home\Controller;
use Think\Controller;
class NewsController extends Controller {
    public function index(){
        $User                         = M('news');
        $count                        = $User->count();
        $Page                         = new \Org\Util\Page($count,10);
        $show                         = $Page->show();
        $news = $User->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();


//
//        $model = M('news');
//        $count = $model->where($where)->count();
//        $Page       = new \Think\Page($count,C('__PAGESIZE__'));
//        $this->page();
//        $news    = $model->where($where)->page($this->offset,$this->pagesize)->select();
//        $show       = $Page->show();

        $this->assign('news',$news);
        $this->assign('page',$show);
        $this->display();
    }
    public function add(){
        $this->display();
    }

    public function do_add(){

        $model = D('news');
        $data = $model->create();
        $data['pic'] = preg_replace('/.*\\.top\\/(.*)/',"$1",$_POST['pic']);
        $data['time'] = time();

        $res = $model->add($data);
        if(empty($res)){
            $this->Ajaxreturn(array("error_code"=>"10000","msg"=>"添加失败"));
        }else{
            $this->Ajaxreturn(array("error_code"=>"10000","msg"=>"添加失败"));
        }

    }

    public function news_remove($id = null){
        $model = D('news');
        $res = $model->where(['id'=>$id])->delete();
        if(empty($res)){
            $this->Ajaxreturn(array("error_code"=>"10000","msg"=>"删除失败"));
        }else{
            $this->Ajaxreturn(array("error_code"=>"200","msg"=>"删除成功"));
        }
    }

    public function chstatus($id = null,$status = null){
        $model = D('news');
        $res = $model->where(['id'=>$id])->setField(['status'=>$status]);
        if(empty($res)){
            $this->Ajaxreturn(array("error_code"=>"100000","msg"=>"修改失败"));
        }else{
            $this->Ajaxreturn(array("error_code"=>"200","msg"=>"修改成功"));
        }
    }
}