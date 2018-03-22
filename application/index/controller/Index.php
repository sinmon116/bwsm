<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Session;
use app\index\model\Category as CategoryModel;
class Index extends Controller
{
    public function index()
    {

        
        // Base::_initialize();

        // 查询所有大板块总数
        $zongshu = CategoryModel::where('pid','=',0)->where('isdel' , '=' , 0)->count();

        // 遍历大板块
        $data1 = CategoryModel::where('pid','=',0)->where('isdel' , '=' , 0)->order('ordeby' , 'desc')->limit(5)->select();
        $this->assign('data1' , $data1);
        // dump($data1);die;

        // 遍历收缩起来的大板块
        $data2 = CategoryModel::where('pid','=',0)->where('isdel' , '=' , 0)->order('ordeby' , 'desc')->limit('5' , $zongshu)->select();
        $this->assign('data2' , $data2);
        // dump($data2);die;

        // 轮播图
        $data3 = Db::table('bw_banner')->where('isdel' , '=' , 0)->order('orderby' , 'desc')->select();
        // dump($data3);
        $this->assign('data3',$data3);

    	// 友情链接
    	$data = Db::table('bw_link')->order('order' , 'asc')->select();
    	$this->assign('data',$data);

    	// 网站信息
    	$wzxx = Db::table('bw_website')->select();
    	$this->assign('wzxx',$wzxx[0]);
    	//调用查询视频的方法
        $this->xvideo();
        return $this->fetch();
    }

    //查询影片的方法
    public function xvideo()
    {
        //大轮播下的视频
        $banvideo = Db::table('bw_video')->where('isdel','=',0)->where('vplay','>',3)->select();
        $this->assign('banvideo',$banvideo);
        //查询LPL视频的方法
        $lpl= Db::table('bw_video')->where('vname','like','%lp%')->select();
        $this->assign('lpl',$lpl);
        //查王者荣耀视频
        $wz= Db::table('bw_video')->where('vname','like','%w_%')->select();
        $this->assign('wz',$wz);
         //查dnf视频
        $dnf= Db::table('bw_video')->where('vname','like','%dnf_%')->select();
        $this->assign('dnf',$dnf);
        //查qq飞车视频
        $qq = Db::table('bw_video')->where('vname','like','%qq_%')->select();
        $this->assign('qq',$qq);
    }



    public function tuichu()
    {
        Session::clear('think');
        $this->success('退出成功', 'index/index/index');
    }
}
