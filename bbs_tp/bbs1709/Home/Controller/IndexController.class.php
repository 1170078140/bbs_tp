<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){

        //品类列表
        $type=M('type');
        $res1 = $type->where('pid=0')->select();
        $res2 = $type->where('pid!=0')->select();
//        var_dump($res2);

        //网站配置
//        $config = M('config');
//        $configRes = $config->select()[0];

        //把获取网站配置写到基类中，然后调用
        Controller::getConfig();

        //友情链接
        $link = M('friendlink');
        $linkRes = $link->select();

        //压入数据
        $this->assign('res1',$res1);
        $this->assign('res2',$res2);
//        $this->assign('configRes',$configRes);
        $this->assign('linkRes',$linkRes);

        //解析模板
        $this->display('Index/index');
    }
}