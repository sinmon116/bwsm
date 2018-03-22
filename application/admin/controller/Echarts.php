<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use app\admin\model\Base;
use app\admin\model\Basetwo;

class Echarts extends Controller
{
	//柱状图
	public function echarts2()
	{
		return $this->fetch();
	}
	//饼状图
	public function echarsb()
	{
		$base= new Base();
		$base->_initialize();
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
	//网站统计
	public function echars()	
	{
		$base= new Base();
		$base->_initialize();

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

	public function map()
	{
		return $this->fetch();
	}
}