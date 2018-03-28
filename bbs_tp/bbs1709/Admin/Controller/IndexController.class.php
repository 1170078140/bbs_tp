<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        if(isset($_SESSION['id'])){
            $id=$_SESSION['id'];
            $user=M('user');
            $res=$user->find($id);
            $_SESSION['lastlogin']=$res['lastlogin'];
            if($res['auth']=='2'){
                $_SESSION['auth']='超级管理员';
            }elseif ($res['auth']=='1'){
                $_SESSION['auth']='管理员';
            }
            $sum=$user->where('auth!=0')->count();
            $num=$user->where('auth=0')->count();
            $_SESSION['sum']=$sum;
            $_SESSION['num']=$num;

            $this->display('Index/index');
        }else{
            $this->display('Index/login');
        }

    }

    //获取验证码
    public function getcode()
    {
        $config =    array(
            'fontSize'    =>    18,    // 验证码字体大小
            'length'      =>    3,                            // 验证码位数
            'useNoise'    =>    false,                        // 关闭验证码杂点
            'imageW'   =>100,
            'imageH'   =>30
            );
        $Verify =     new \Think\Verify($config);
        $Verify->codeSet = '0123456789';
        $Verify->entry();
    }

    //登陆验证
    public function dologin()
    {
        //获取用户提交的验证码以及用户名和密码
        $code=$_POST['code'];
        $userName=I('post.userName');
        $password=I('post.password');

        //实例化验证码类，并验证
        $verify = new \Think\Verify();
        $res1 = $verify->check($code);
        if(!$res1){
            $this->error('登陆失败，验证码错误！');
            die;
        }


        //实例化，并验证
        $user=M('user');
        $res2=$user->where('userName="'.$userName.'"&& password="'.md5($password).'" && auth!=0 && status=1')->find();

        //判定结果
        if($res2){
            //记录用户头像
            $ud=M('userdetail');
            $photo=$ud->where('uid='.$res2['id'])->find()['photo'];

            //记录登录时间
            $lastlogin=date('Y/m/d H:i:s',time());

            //存到缓存中
            $_SESSION['id']=$res2['id'];
            $_SESSION['userName']=$res2['username'];
            $_SESSION['photo']=$photo;

            //把登录时间传递到数据库
            $user->execute('update user set lastlogin="'.$lastlogin.'" where userName="'.$userName.'"');

            $this->success('登陆成功','Index/index',3);
        }else{
            $this->error('登陆失败，用户权限不足或已被禁用');
        }
    }

    //注销
    public function doLogout()
    {
        //清除session信息
        unset($_SESSION['id']);
        unset($_SESSION['userName']);

        //销毁session 文件
//        session_destroy();

        //清除cookie信息
//        setcookie('SESSIID','',time()-1,'/');

        //跳转
        $this->success('退出成功','Index/login',3);

    }
}