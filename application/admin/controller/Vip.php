<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Page;
class Vip extends Controller
{
	//会员列表   下面三个是会员列表修改  添加会员  会员编辑 会员密码
	public function memberlist()
	{
		//查询会员信息
		$list = Db::table('bw_user')->paginate(3);
		$page = $list->render();
		$count =Db::table('bw_user')->count('id');
		$this->assign('count',$count);
		$this->assign('list',$list);
		$this->assign('page',$page);
		return $this->fetch();
	}

	//删除会员用户的方法
	public function deluser($id)
	{
		$res =Db::table('bw_user')->delete($id);
		if($res)
		{
			echo 1;
		}else{
			echo 2;
		}
	}

	//屏蔽会员用户 修改
	public function isdel($id,$isdel)
	{
		//获取用户id
		$id = input('param.id');
		
		//获取isdel的值
		$isdel= input('param.isdel');
	
		//处理
		$res=Db::table('bw_user')->update(['isdel'=>$isdel,'id'=>$id]);
	
		if ($res){
			echo "<script>alert('操作成功');window.location.href ='/admin/vip/memberlist';</script>";
		}else{
			echo "<script>alert('失败');history.go(-1);</script>";
		}
	}

	//搜索会员用户
	public function search()
	{
		$username=input('param.');
		//根据获得的用户名查询用户表
		$list = Db::table('bw_user')->where('user_name','like',$username)->select();
	
		//结果总数
		$brows = Db::table('bw_user')->where('user_name','like',$username)->count();
		$this->assign('list',$list);
		$this->assign('brows',$brows);
		return $this->fetch();
	}


	//订单页面
	public function order()
	{
		//查询总数vip的总数
		$count = Db::table('codepay_user')->count('id');
		$this->assign('count',$count);
		return $this->fetch();
	}
	//删除订单页面
	
	public function delorder($id)
	{
		//删除数据库
		$res =Db::table('codepay_user')->delete($id);
		$result = Db::table('codepay_user')->delete($id);
		if ($result)
		{
			echo json_encode($id);
		}
	}

	//订单ajax分页数据
	public function ajaxorder()
	{
		//查询总数
		$count= Db::table('codepay_user')->count('id');

		$page = new Page(3, $count);
		$pages=$page->limit();
		$data= Db::table('codepay_user')->limit($pages)->select();

		$value['data'] = $data;
		$value['allPage'] = $page->allPage();
		// dump($value['allPage']);die;
		echo json_encode($value);
	}
	
	//会员等级管理   下面两个 等级编辑 等级添加
	public function memberlevel()
	{
		return $this->fetch();
	}
	// 等级编辑
	public function leveledit()
	{
		return $this->fetch();
	}
	//等级添加
	public function leveladd()
	{
		return $this->fetch();
	}
	//会员积分管理  下面两个为积分添加  积分编辑
	public function memberkiss()
	{
		return $this->fetch();
	}
	//积分添加
	public function kissadd()
	{
		return $this->fetch();
	}
	//积分编辑
	public function kissedit()
	{
		return $this->fetch();
	}
	
}