<?php
namespace Admin\Controller;
use Think\Controller;
class TypeController extends Controller {
    //加载板块列表
    public function index()
    {
        //1. 实例化并执行查询
        $type=M('type');
        $res=$type->field("*,concat(path,'-',id) as npath")->order('npath')->select();
//        $res=$type->query("select *,concat(path,'-',id) as npath from type order by npath");

        //2. 压入数据
        $this->assign('res',$res);
        $this->assign('show',['禁用','开启']);

        //3. 解析模板
        $this->display('Type/index');
    }

    //加载添加父分区页面
    public function addFather()
    {
        $this->display('Type/addFather');
    }

    //添加父分区
    public function insertFather()
    {
        //1. 排错
        if($_POST['father']==''){
            $this->error('不能提交空数据');
            die;
        }

        //2. 准备数据
        $data=array();
        $data['name']=I('post.father');

        //3. 实例化并执行添加
        $type=M('type');
        $res = $type->add($data);

        //4. 判断结果
        if($res){
            $this->success('添加成功',U('Type/index'),1);
        }else{
            $this->error('添加失败');
        }
    }

    //加载修改父分区
    public function updateFather()
    {
        $data=array();
        $data['id']=I('get.id');
        $data['name']=I('post.father');
        $data['status']=I('post.status');

        $type=M('type');
        $res = $type->save($data);

        if($res){
            $this->success('恭喜，修改成功！',U('Type/index'),1);
        }else{
            $this->error('抱歉，修改失败！');
        }
    }

    //加载修改子版块页面
    public function editSon()
    {
        //获取子版块id
        $id=I('get.id');

        //获取子版块信息
        $type=M('type');
        $res = $type->find($id);

        //获取父分区名字
        $fname =$type->field('name')->where('id='.$res['pid'])->find();

        //压入数据
        $res['fname']=$fname['name'];
        $res['id']=$id;
        $this->assign('res',$res);

        $this->display('Type/editSon');
    }

    //删除父分区
    public function delFather()
    {
        $id=I('get.id');
        $type=M('type');
        $res=$type->where('pid='.$id)->select();
        if($res){
            $this->success('抱歉，该分区下包含有子版块，不能删除！');
        }else{
            //执行删除
            $result=$type->delete($id);
            if($result){
                $this->success('恭喜，删除成功！');
            }else{
                $this->error('抱歉，删除失败！');
            }
        }
    }


    //加载添加子版块页面
    public function addSon()
    {
        //传递父分区id和fname
        $this->assign('res',$_GET);
        $this->display('Type/addSon');
    }

    //添加子版块
    public function insertSon()
    {
        //1. 排错
        if($_POST['son']==''){
            $this->error('不能提交空数据');
            die;
        }

        //2. 准备数据
        $data=array();
        $data['name']=I('post.son');
        $data['pid']=I('get.id');
        $data['path']='0-'.$data['pid'];

        //3. 实例化并执行添加
        $type=M('type');
        $res = $type->add($data);

        //4. 判断结果
        if($res){
            $this->success('恭喜，添加成功！',U('Type/index'),1);
        }else{
            $this->error('抱歉，添加失败！');
        }
    }

    //加载修改父分区页面
    public function editFather()
    {
        //父分区id
        $id=I('get.id');
        $type=M('type');
        $res=$type->find($id);

        $this->assign('res',$res);
        $this->display('Type/editFather');
    }

    //修改子版块
    public function updateSon()
    {
        //============================更新数据库===================================

        //将文件名传入数据库
        $data=array();
        $data['id']=I('get.id');
        $data['name']=I('post.son');
        $data['status']=I('post.status');

        //如果传递了图片。没有传图片，使用默认的
        if($_FILES['blogo']['name']!=''){
            //============================上传图片===================================
            //1. 实例化上传类
            $upload = new \Think\Upload();

            //2. 设置参数
            $upload->maxSize = 3145728 ;// 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath = './Public/Admin/images/blogos/'; // 设置附件上传根目录
            $upload->autoSub = false;

            //3. 执行上传
            $info = $upload->upload();

            //4. 判断结果
            if(!$info) {
                // 上传错误提示错误信息
                $this->error($upload->getError());
                die;
            }

            //============================缩放图片===================================

            $picName=$info['blogo']['savename'];
            $image = new \Think\Image();
            $image->open($upload->rootPath.$picName);
            $image->thumb(57, 57)->save($upload->rootPath.'s_'.$picName);

            //============================图片用户名===================================
            $data['blogo']=$picName;
        }

        //实例化
        $type = M('type');

        //获取原来的图片名
        $oldPic=$type->field('blogo')->find($data['id'])['blogo'];

        //并执行修改
        $res = $type->save($data);

        //判断结果
        if($res){
            //删除不需要的大图
            unlink($upload->rootPath.$picName);

            //删除原来的图片
            if($oldPic=!'default.jpg'){
                unlink($upload->rootPath.'s_'.$oldPic);
            }

            $this->success('恭喜，修改成功！',U('Type/index'),1);
        }else{
            $this->error('抱歉，修改失败！');
        }

    }

    //查看子版块的帖子
    public function post()
    {
        //子版块的id
        $id=I('get.id');

        $post=M('post');
        $postRes=$post->query('select post.id,post.title,post.ctime,post.elite,post.top,post.recycle,user.userName from post,user where user.id=post.uid && post.tid='.$id);

        $this->assign('postRes',$postRes);
        $this->display('Type/post');
    }

    //删除子版块
    public function delSon()
    {
        $id=I('get.id');
        //判断该子板块下是否含有帖子
        $post=M('post');
        $res=$post->where('tid='.$id)->select();
        if(!empty($res)){
            $this->error('抱歉，该子版块下含有帖子，不能删除');
            die;
        }

        $type=M('type');
        $result=$type->delete($id);
        if($result){
            $this->success('恭喜，删除成功！');
        }else{
            $this->error('抱歉，删除失败！');
        }
    }
}