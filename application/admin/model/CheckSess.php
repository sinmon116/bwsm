<?php
namespace app\admin\model;
use think\Controller;
use think\Session;
use think\Request;
use think\Validate;
use think\View;
use think\Db;
class CheckSess extends Controller
{
	//判断用户是否已登录
	 function isLogin(){
		//如果登录常量为空，则管理员未登录
		if(is_null(Session::get('uid'))){	
			$this->error('您还没有登录，请登录后进行访问','admin/login/login');
		}
	}
}