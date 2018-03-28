<?php
namespace Home\Controller;
use Think\Controller;
class CenterController extends Controller {
    public function index(){
        Controller::getConfig();
        //判断是否登录状态
        if(empty($_SESSION)){
            $this->display('Login/index');
            die;
        }

        //获取用户id，实例化，并查询
        $id=$_SESSION['res']['id'];
        $ud=M('userdetail');
        $userRes=$ud->find($id);

        //压入数据，并解析模板
        $this->assign('userRes',$userRes);
        $this->display('Center/index');
    }

    //加载编辑图片页面
    public function editPic()
    {
        Controller::getConfig();
        $this->display('Center/editPic');
    }

    //修改用户图像
    public function updatePic()
    {
        //======================图片上传=======================================
        //1. 实例化上传类
        $upload = new \Think\Upload();

        //2. 设置参数
        $upload->maxSize = 3145728 ;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './Public/Photos/'; // 设置附件上传根目录
        $upload->autoSub = false;

        //3. 执行上传
        $info = $upload->upload();

        //4. 判断结果
        if(!$info) {
            // 上传错误提示错误信息
            $this->error($upload->getError());
            die;
        }

        //======================图片缩放=======================================
        $picName=$info['photo']['savename'];

        $image = new \Think\Image();

        $image->open($upload->rootPath.$picName);

        $image->thumb(200, 200)->save($upload->rootPath.'l_'.$picName);
        $image->thumb(100, 100)->save($upload->rootPath.'m_'.$picName);
        $image->thumb(50, 50)->save($upload->rootPath.'s_'.$picName);


        //======================将文件名传入数据库=================================
        //1. 记录图片名和用户id
        $uid=$_SESSION['res']['id'];

        //2. 更新的信息
        $data=array();
        $data['photo']=$picName;

        //3. 实例化 并执行修改
        $ud=M('userdetail');
        $res = $ud->where('uid = '.$uid)->save($data);

        //4. 判断结果
        if($res){
            // 上传成功，删除原来的旧图，默认图片不能删
            $oldPicName=$_SESSION['photo'];
            if($oldPicName!='default.jpg'){
                unlink($upload->rootPath.$oldPicName);
                unlink($upload->rootPath.'l_'.$oldPicName);
                unlink($upload->rootPath.'m_'.$oldPicName);
                unlink($upload->rootPath.'s_'.$oldPicName);
            }
            //修改session信息
            $_SESSION['photo']=$picName;

            $this->success('修改成功！');
        }else{
            $this->error('修改失败');
        }
    }

    //修改用户个人信息
    public function editUser(){
//        var_dump($_POST);
        $userName=I('post.userName');
        $nickName=I('post.nickName');
        $email=I('post.email');
        $id=I('post.id');

        //判断用户名和邮箱是否重复
        $user = M('user');
        $ud=M('userdetail');
        if($user->where('id!='.$id.' && userName="'.$userName.'"')->select()){
            $this->error('抱歉，用户名已存在！');
            die;
        }
        if($ud->where('id!='.$id.' && nickName="'.$nickName.'"')->select()){
            $this->error('抱歉，该昵称已存在，请重试！');
            die;
        }
        if($ud->where('id!='.$id.' && email="'.$email.'"')->select()){
            $this->error('抱歉，该邮箱已存在，请重试！');
            die;
        }

        //执行修改
        $res=$ud->save($_POST);

        //判断结果
        if($res){
            $this->success('修改成功！');
        }{
            $this->error('修改失败');
        }
    }
}