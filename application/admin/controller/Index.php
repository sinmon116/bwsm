<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Base;
use think\Db;
class Index  extends Controller
{
	// 展示后台首页的方法
	public function  index()
	{
		$base= new Base();
		$base->_initialize();
		return $this->fetch();
	}

	//欢迎页面
	public function welcome()
	{
		//用户数
		$data=Db::table('bw_user')->count('id');
		//管理员
		$admin= Db::table('bw_user')->where('type',1)->count('id');
		//查询评论数
		$res =Db::table('bw_question')->count('qid');
		//访问量
		$fw=Db::table('bw_fwjl')->count('id');
		//视频数量
		$video =Db::table('bw_video')->count('vid');
		//图片库
		$pic = Db::table('bw_banner')->count('id');
		$this->assign('admin',$admin);
		$this->assign('pic',$pic);
		$this->assign('fw',$fw);
		$this->assign('video',$video);
		$this->assign('data',$data);
		$this->assign('res',$res);
		return $this->fetch();
	}
}