<?php
namespace Home\Controller;
use Think\Controller;
class SignupController extends Controller {
    public function index(){
        if(isset($_SESSION['res'])){
            $this->redirect('Index/index');    //重定向
        }else{
            $this->display('Signup/index');
        }
    }

    public function doSignup()
    {
//        var_dump($_POST);
        //获取用户数据
        $userName = I('post.userName');
        $password = I('post.password');
        $surepass = I('post.surepass');
        $email = I('post.email');

        //实例化user表
        $user = M('user');

        //判断用户名是否已存在
        if($user->where('userName="'.$userName.'"')->select()){
            $this->error('抱歉，用户名已存在！');
            die;
        }

        //判断两次输入的密码是否一致
        if($password != $surepass){
            $this->error('抱歉，两次密码不一致！');
            die;
        }

        //实例化 userdetail 用户详情表
        $ud = M('userdetail');

        //判断邮箱是否已存在
        if($ud->where('email="'.$email.'"')->select()){
            $this->error('抱歉，该邮箱已存在，请重试！');
            die;
        }

        //所有判断都通过之后，可以将用户的信息添加到user表
        $_POST['password'] = md5($_POST['password']);

        //执行添加
        $id = $user->add($_POST);

        //判断是否添加成功
        if($id){

            //定义存储uid和email的数组
            $data = array();
            $data['uid'] = $id;
            $data['email'] = $email;
            if(isset($_POST['qq'])){
                $data['qq']=$_POST['qq'];
            }
            if(isset($_POST['nickName'])){
                $data['nickName']=$_POST['nickName'];
            }
            $data['sex']=I('post.sex');

//            var_dump($data);
//            die;

            //执行userdetail信息的添加
            $id2 = $ud->add($data);

            //判断userdetail信息是否添加成功
            if($id2){
                $this->success('恭喜，注册成功！',U('Home/Index/index'),3);
            }else{
                $this->error('抱歉，注册失败！');
            }
        }
    }
}