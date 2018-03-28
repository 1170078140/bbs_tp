<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class UserController extends Controller {
    //加载管理员列表
    public function index()
    {
        //实例化，并查询
        $user=M('user');

        $count = $user->count();// 查询满足要求的总记录数

        //===================================分页==========================================
        $Page = new Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数

        $Page->setConfig('first','首页');
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('end','尾页');

        $show = $Page->show();// 分页显示输出
//        $list = $user->limit($Page->firstRow.','.$Page->listRows)->select();
        $list = $user->query('select user.id,user.userName,user.password,user.auth,user.status,user.lastlogin,userdetail.photo from user,userdetail where user.id=userdetail.uid limit '.$Page->firstRow.','.$Page->listRows);
        //================================================================================

        //压入数据
        $this->assign('res',$list);  // 赋值数据集
        $this->assign('role',['普通用户','管理员','超级管理员']);
        $this->assign('status',['关闭','开启']);

//        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出

        //解析模板
        $this->display('User/index');
    }

    //加载添加页面
    public function add()
    {
        $this->display('User/add');
    }

    //执行添加
    public function insert()
    {
        $user=M('user');

        //用户名排重
        $userName=I('post.userName');
        $res=$user->where('userName="'.$userName.'"')->find();
        if($res){
            $this->error('抱歉，用户名重复，添加失败');
            die;
        }

        //在user表添加
        $_POST['password']=md5($_POST['password']);
        $id=$user->add($_POST);
        $uid = $user->field('id')->where('userName="'.$userName.'"')->find()['id'];

        //在userdetail表也要添加
        $data=array();
        $data['uid']=$uid;
        $ud=M('userdetail');
        $id2=$ud->add($data);

        if($id && $id2){
            $this->success('恭喜，添加成功',U('User/index'),1);
        }else{
            $this->error('抱歉，添加失败');
        }
    }

    //加载编辑页面
    public function edit()
    {
        $id=I('get.id');

        $user=M('user');
        $userRes=$user->find($id);

        $this->assign('userRes',$userRes);
        $this->display('User/edit');
    }

    //执行修改
    public function update()
    {
        $user=M('user');
        $id=$user->save($_POST);

        if($id){
            $this->success('恭喜，修改成功',U('User/index'),1);
        }else{
            $this->error('抱歉，修改失败');
        }
    }

    //删除
    public function delete()
    {
        $id=I('get.id');

        $user=M('user');
        $num=$user->delete($id);

        //userdetail表也要删除，以及用户图片
        $ud=M('userdetail');
        $oldPicName=$ud->field('photo')->where('uid='.$id)->find()['photo'];
        $id2=$ud->field('id')->where('uid='.$id)->find()['id'];
        $num2=$ud->delete($id2);   //自定义语句中delete 有问题
        var_dump($oldPicName);

        if($num && $num2){
            // 上传成功，删除原来的旧图，默认图片不能删
            if($oldPicName!='default.jpg'){
                unlink('./Public/Photos/'.$oldPicName);
                unlink('./Public/Photos/'.'l_'.$oldPicName);
                unlink('./Public/Photos/'.'m_'.$oldPicName);
                unlink('./Public/Photos/'.'s_'.$oldPicName);
            }
            $this->success('恭喜，删除成功',U('User/index'),1);
        }else{
            $this->error('抱歉，删除失败');
        }
    }

    //更换头像
    public function editPic()
    {
        $id=I('get.id');

        $user=M('user');
        $userRes=$user->find($id);

        $ud=M('userdetail');
        $photo=$ud->field('photo')->where('uid='.$id)->find()['photo'];

        $this->assign('userRes',$userRes);
        $this->assign('photo',$photo);
        $this->display('User/editPic');
    }

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
        $uid=I('get.id');

        //2. 更新的信息
        $data=array();
        $data['photo']=$picName;

        //3. 实例化 并执行修改
        $ud=M('userdetail');
        $oldPicName=$ud->field('photo')->where('uid = '.$uid)->find()['photo'];
        $res = $ud->where('uid = '.$uid)->save($data);

        //4. 判断结果
        if($res){
            // 上传成功，删除原来的旧图，默认图片不能删
            if($oldPicName!='default.jpg'){
                unlink($upload->rootPath.$oldPicName);
                unlink($upload->rootPath.'l_'.$oldPicName);
                unlink($upload->rootPath.'m_'.$oldPicName);
                unlink($upload->rootPath.'s_'.$oldPicName);
            }

            $this->success('修改成功！',U('User/index'),1);
        }else{
            $this->error('修改失败');
        }
    }
}