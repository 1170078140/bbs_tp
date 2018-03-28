<?php
namespace Admin\Controller;
use Think\Controller;
class PostController extends Controller {
    //帖子列表
    public function index(){
        $post=M('post');
//        $postRes=$post->where('recycle!=1')->select();
        $postRes = $post->query('select post.id,post.title,post.ctime,post.elite,post.top,post.recycle,user.userName from post,user where user.id=post.uid && post.recycle!=1');
//        var_dump($postRes);

        $this->assign('postRes',$postRes);
        $this->display('Post/index');

    }

    //回收站列表
    public function recycle(){
        $post=M('post');
        $postRes=$post->where('recycle=1')->select();

        $this->assign('postRes',$postRes);
        $this->display('Post/recycle');
    }

    //加入回收站
    public function toRecycle()
    {
        $id=I('get.id');
        $post=M('post');
        $data=array();
        $data['id']=$id;
        $data['recycle']=1;

        $res=$post->save($data);  //返回受影响的行数
        if($res){
            $this->success('加入回收站成功！',U('Post/recycle'),1);
        }else{
            $this->error('加入回收站失败！');
        }
    }

    //从回收站恢复
    public function leaveRecycle()
    {
        $id=I('get.id');
        $post=M('post');
        $data=array();
        $data['id']=$id;
        $data['recycle']=0;

        $res=$post->save($data);  //返回受影响的行数
        if($res){
            $this->success('恢复成功！',U('Post/index'),1);
        }else{
            $this->error('恢复失败！');
        }
    }

    //删除
    public function delete()
    {
        $id=I('get.id');
        $post=M('post');
        $res=$post->delete($id);        //返回受影响的行数

        if($res){
            $this->success('删除成功！');
        }else{
            $this->error('删除失败！');
        }
    }

    //加精
    public function setElite()
    {
        $id=I('get.id');
        $post=M('post');
        $data=array();
        $data['id']=$id;
        $data['elite']=1;

        $res=$post->save($data);  //返回受影响的行数
        if($res){
            $this->success('加精成功！');
        }else{
            $this->error('加精失败！');
        }
    }

    //取消加精
    public function cancelElite()
    {
        $id=I('get.id');
        $post=M('post');
        $data=array();
        $data['id']=$id;
        $data['elite']=0;

        $res=$post->save($data);  //返回受影响的行数
        if($res){
            $this->success('取消加精成功！');
        }else{
            $this->error('取消加精失败！');
        }
    }

    //置顶
    public function setTop()
    {
        $id=I('get.id');
        $post=M('post');
        $data=array();
        $data['id']=$id;
        $data['top']=1;

        $res=$post->save($data);  //返回受影响的行数
        if($res){
            $this->success('置顶成功！');
        }else{
            $this->error('置顶失败！');
        }
    }

    //取消置顶
    public function cancelTop()
    {
        $id=I('get.id');
        $post=M('post');
        $data=array();
        $data['id']=$id;
        $data['top']=0;

        $res=$post->save($data);  //返回受影响的行数
        if($res){
            $this->success('取消置顶成功！');
        }else{
            $this->error('取消置顶失败！');
        }
    }

    //查看帖子
    public function detail()
    {
        $id=$_GET['id'];
        $post=M('post');
        $postRes=$post->find($id);

        $user=M('user');
        $userName=$user->find($postRes['uid']);

        $this->assign('postRes',$postRes);
        $this->assign('userName',$userName['username']);
        $this->display('Post/detail');
    }

    //加载编辑帖子页面
    public function edit()
    {
        $id=$_GET['id'];
        $post=M('post');
        $postRes=$post->find($id);

        $user=M('user');
        $userName=$user->find($postRes['uid']);

        $this->assign('postRes',$postRes);
        $this->assign('userName',$userName['username']);
        $this->display('Post/edit');
    }

    //编辑帖子
    public function update()
    {
        $post=M('post');
        $res=$post->save($_POST);

        if($res){
            $this->success('修改成功！',U('Post/index'),1);
        }else{
            $this->error('修改失败！');
        }
    }

    //管理回复,加载该帖的回帖列表
    public function reply()
    {
        $id=$_GET['id'];
        $reply=M('reply');

        $res=$reply->query('select reply.id,reply.content,reply.ctime,user.userName,post.title from user,post,reply where reply.uid=user.id && reply.pid=post.id && pid='.$id);

        $this->assign('res',$res);
        $this->display('Post/reply');
    }

}