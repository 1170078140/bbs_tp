<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){

        if(isset($_SESSION['res'])){
            $this->redirect('Index/index');    //重定向
        }else{
            $this->display('Login/index');
        }
    }

    public function doLogin()
    {
        //1. 获取登录信息
        $userName=$_POST['userName'];
        $password=$_POST['password'];

        //2. 判断是否为空
        if($userName==null || $password==null){
            $this->error('用户名或密码为空！');
            die;
        }

        //3. 验证用户名和密码
        $user=M('user');
        $res=$user->where('userName="'.$userName.'" && password="'.md5($password).'"')->find();

        //4. 记录登陆时间
        $lastLogin=date('Y/m/d H:i:s');
        $user->where('id = '.$res['id'])->save();

        //4. 判断结果，并传数据到$_SESSION
        if($res){
            $ud=M('userdetail');
            $photo = $ud->field('photo')->where('uid = '.$res['id'])->find();

            $_SESSION['res']=$res;
            $_SESSION['photo']=$photo['photo'];

            $this->success('登陆成功',$_SERVER['HTTP_REFERER'],3);
        }else{
            $this->error('用户名或密码错误！');
        }
    }

    public function doLogout()
    {
        //1. 销毁session信息
        unset($_SESSION['res']);
        unset($_SESSION['photo']);

        //2. 销毁session文件
//        session_destroy();

        //3. 销毁cookie信息
//        setcookie('SESSID','',time()-1,'/');

        //4. 跳转
        $this->success('退出成功',$_SERVER['HTTP_REFERER'],3);

    }
}