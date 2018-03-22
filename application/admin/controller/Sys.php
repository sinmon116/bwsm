<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\captcha;
use app\admin\model\Base;
use app\admin\model\Basetwo;
class Sys extends Controller
{
	//系统设置
	public function sysset()
	{
		$base= new Base();
		$base->_initialize();
		//查询网站信息
		$data=Db::table('bw_website')->select();
		$this->assign('data',$data);
		return $this->fetch();
	}

	//修改站点信息的方法
	public function changezd($wname,$wurl,$email,$ban,$number,$info)
	{
		//更新站点信息数据
		$res = Db::table('bw_website')->update(['wname'=>$wname,'wurl'=>$wurl,
					'email'=>$email,'ban'=>$ban,'number'=>$number,'info'=>$info,'id'=>1]);		
		if ($res)
		{
			echo json_encode(1);
		}
	}

	//关闭站点的方法
	public function closezd($key)
	{
		//关闭站点------>更改数据库中isdisplay字段
		$resu = Db::table('bw_website')->update(['key'=>$key,'id'=>1]);
		

	}
	//友情链接
	public function syslink()
	{
		$base= new Base();
		$base->_initialize();
		//查询数据库的内容
		$data = Db::table('bw_link')->select();
		$count =Db::table('bw_link')->count('id');
		$this->assign('count',$count);
		$this->assign('data',$data);
		return $this->fetch();
	}
	
	//增加友情链接的方法
	public function linkadd()
	{
		//获取数据
		if(empty(input('param.name')) || empty(input('param.link')) || 
			empty(input('param.num'))){
			$this->error('请输入完整的内容');}
			$name = input('param.name');
			$link = input('param.link');
			$order = input('param.num');
		//数据插入数据库
		$data =['name'=>$name,'url'=>$link,'order'=>$order];
		$result = Db::table('bw_link')->insert($data);
		if($result){
			$this->success('添加链接成功');
		}

	}
	//删除链接的方法
	public function linkdel($lid)
	{
		
		//删除数据
		$result = Db::name('link')->delete($lid);
		if ($result){
			echo json_encode(['state'=>1]);
		}else{
			echo json_encode(['state'=>2]);
		}
		
	}
}