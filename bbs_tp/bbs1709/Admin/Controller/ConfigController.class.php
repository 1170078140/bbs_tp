<?php
namespace Admin\Controller;
use Think\Controller;
class ConfigController extends Controller {
    public function index(){
        $conf=M('config');
        $confRes=$conf->where('status=1')->find();   //如果是多套网站配置，需要用select（）；遍历显示列表，然后显示单条信息
//        var_dump($confRes);

        $this->assign('confRes',$confRes);
        $this->display('Config/index');

    }

    public function update()
    {
        //将文件名传入数据库
        $data=array();
        $data['id']=I('post.id');
        $data['webname']=I('post.webname');
        $data['copy']=I('post.copy');
        $data['keywords']=I('post.keywords');
//        $data['status']=I('post.status');

        var_dump($_FILES);

        //判断是否更换了logo
        if($_FILES['logo']['name']!=''){
            //============================上传图片===================================
            //1. 实例化上传类
            $upload = new \Think\Upload();

            //2. 设置参数
            $upload->maxSize = 3145728 ;// 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath = './Public/Home/images/logo/'; // 设置附件上传根目录
            $upload->autoSub = false;

            //3. 执行上传
            $info = $upload->upload();

            //4. 判断结果
            if(!$info) {
                // 上传错误提示错误信息
                $this->error($upload->getError());
                die;
            }
            //5. 记录图片名
            $picName=$info['logo']['savename'];
            $data['logo']=$picName;
        }

        //实例化
        $conf = M('config');

        //查询原来图片的名字
        $oldPic=$conf->field('logo')->find($data['id']);

        //执行修改
        $res = $conf->save($data);

        //判断结果
        if($res){
            if($_FILES['logo']['name']!='') {
                //删除原来的图片
                unlink('./Public/Home/images/logo/' . $oldPic['logo']);
            }
            $this->success('恭喜，修改成功！');
        }else{
            $this->error('抱歉，修改失败！');
        }
    }
}