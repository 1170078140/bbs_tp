<?php
namespace Admin\Controller;
use Think\Controller;
class LinksController extends Controller {

    //加载链接列表
    public function index(){
        $friendlink = M('friendlink');
        $linkRes = $friendlink->select();

        $this->assign('linkRes',$linkRes);
        $this->display('Links/index');

    }

    //加载添加链接的页面
    public function add()
    {
        $this->display('Links/add');
    }

    //执行添加
    public function insert()
    {
        //排错
        if($_POST['linkname']=='' || $_POST['url']==''){
            $this->error('抱歉，链接名称或地址为空！');
            die;
        }

        //实例化 并执行添加
        $friendlink = M('friendlink');
        $id=$friendlink->add($_POST);

        //判断结果
        if($id){
            $this->success('恭喜，添加成功！',U('Links/index'),2);
        }else{
            $this->error('抱歉，添加失败！');
        }
    }

    //加载编辑修改页面
    public function edit()
    {
        $id=I('get.id');
        //实例化 并执行添加
        $friendlink = M('friendlink');
        $linkRes=$friendlink->find($id);

        $this->assign('linkRes',$linkRes);
        $this->display('Links/edit');
    }

    //执行修改
    public function update()
    {
        //实例化 并执行修改
        $friendlink = M('friendlink');
        $id=$friendlink->save($_POST);

        //判断结果
        if($id){
            $this->success('恭喜，修改成功！',U('Links/index'),1);
        }else{
            $this->error('抱歉，修改失败！');
        }
    }

    //删除
    public function delete()
    {
        $id=I('get.id');
        //实例化 并执行删除
        $friendlink = M('friendlink');
        $res=$friendlink->delete($id);

        //判断结果
        if($res){
            $this->success('恭喜，删除成功！',U('Links/index'),1);
        }else{
            $this->error('抱歉，删除失败！');
        }
    }

}