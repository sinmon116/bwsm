<?php
namespace app\admin\model;
use think\Controller;
use think\Session;
use think\Request;
use think\Validate;
use think\View;
use think\Db;

class Basetwo extends Controller
{
	//后台基础类登录验证
	public function _initialize()
	{
		parent::_initialize();
		//定义一个登录常量，判断用户是否登录或已登录
		// define('UID',Session::get('name'));
		//判断是否登录，未登录禁止非法操作，跳转到登录界面
		$this->isLogin();

		//获得用户所拥有的权限
		 $privarr_urls=$this->getRole();

		 $url = input('url');
	 	//判断当前访问页面权限的链接是否在用户所有链接中
		if(!in_array($url, $privarr_urls)){
			//没有相关权限
			// dump($jiedian);
			// dump($privarr_urls);die;
			// 没有权限的时候跳转到登陆界面
			// $this->error('没有权限','index/login/login');	
			// $this->error('没有权限','/admin/user/login');
			echo 1;
			die;
		}
	}
	
	//判断用户是否已登录
	protected function isLogin(){
		//如果登录常量为空，则管理员未登录
		if(is_null(Session::get('aid'))){
			// $this->error('您还没有登录，请登录后进行访问','/admin/user/login');
			echo 2;
			die;
		}
	}

	// //在框架里加入统一验证方法	
	/*
	*获取用户所有的权限
	*取出指定用户所有角色
	*在通过角色 取出 所属 权限关系
	*在权限表中取出所有权限
	*/

	//取出用户的所有权限
	public function getRole()
	{
      	$aid=Session::get('aid');

		$privarr_urls=[];
		//取出用户所述的角色 是一个数组
		$role_idss=Db::name('user_role')->where('user_id',$aid)->select();

		if($role_idss){
			$role_ids=[];
				foreach ($role_idss as $keys => $values) {
					$role_ids[]=$values['role_id'];
				}

				if($role_ids)
				{
					//在通过角色取出所属的权限id,是一个数组					
					foreach($role_ids as $v)
					{

						$access_idss[]=Db::name('role_permission')->distinct(true)->where('role_id',$v)->field('role_id,permission_id')->select();
					
					}

						$access_ids=[];
						foreach ($access_idss as $ke => $value) {

							foreach ($value as  $val) {
								$access_ids[]=$val['permission_id'];
							}
						}
						$urllist=[];
						
					
					//在权限表中所有的权限urls 是个数组
					foreach($access_ids as $key=>$value)
					{
						$urllist[]=Db::name('permission')->where('id',$value)->select();
					}

					if($urllist)
					{
                          foreach ($urllist as $key => $value) {
                            foreach($value as $val){

                              $privarr_urls[] = $val['path'];
                            }
                          }	
					}
				}
		}
		return $privarr_urls; 
	}
}