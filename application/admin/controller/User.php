<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Session;
use app\admin\model\Base;
use app\admin\model\Basetwo;

class User extends Controller
{
	public function login()
	{
		return $this->fetch();
	}
	public function baseer()
	{
		$base= new Basetwo();
		$base->_initialize();
	}

	public function dologin()
	{
		//获取用户名和密码
		$username= $_POST['username'];
		$password = $_POST['password'];

		$data = Db::table('bw_user')->where('user_name',$username)->where('password',$password)->find();
		if ($data)
		{
			//将信息存进session
			Session::set('admin',$username);
			Session::set('aid',$data['id']);

			$base= new Base();
			$base->_initialize();
			$this->success('登录成功','/admin/index/index');

		}else{
			$this->success('用户名或密码错误','/admin/user/login');
		}
	}


	// 退出的方法
	public function logout()
	{
		Session::clear('think');
		$this->success('退出成功','/admin/user/login');
	}
}
