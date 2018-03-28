<?php
namespace Home\Controller;
use Think\Controller;
class PostController extends Controller {
    public function index()
    {
        Controller::getConfig();

        if($_SESSION['res']['id']==''){
            $this->error('请登陆',U('Home/Login/index'),2);
            die;
        }

        $this->display('Post/index');

    }

    public function doPost()
    {
        $post=M('post');
        $res = $post->add($_POST);

        if($res){
            $this->success('恭喜，发帖成功！',U('Home/List/index/tid/'.$_POST['tid']),2);
        }else{
            $this->error('抱歉，发帖失败');
        }
    }
}