<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Wxj;
class Admingl extends Controller
{
	//管理员列表  下面 管理员增加   管理员编辑 属于这
	public function adminlist()
	{

	
		//查询用户表中的管理员
		$auser = Db::table('bw_user')->where('type',1)->select();
		$this->assign('auser',$auser);
		$role = Db::table('bw_role r, bw_user_role ur,bw_user u')->where('r.id=ur.role_id and u.id =ur.user_id')->select();
		// dump($role);
		$this->assign('role',$role);
		return $this->fetch();
	}
	//ajax删除管理员列表
	public function deladmin($id)
	{
		//删除数据库的数据
		$res = Db::table('bw_user')->delete($id);
		if($res)
		{
			echo json_encode('成功');
		}
		
	}

	//管理员增加 展示页面
	public function adminadd()
	{
		return $this->fetch();
	}
	//管理员编辑
	public function adminedit()
	{

		//获取该管理员id
		$id = input('param.id');
		//查询相对应的管理员的信息
		$adata = Db::table('bw_user')->where('id',$id)->select();
		$info=$adata[0];
		$this->assign('info',$info);
		return $this->fetch();
	}
	//ajax的编辑修改管理员
	public function editadmin($username,$phone,$email,$select,$pass,$id)
	{
		
		//更新用户表里面的username，phone，email，$pass
		if (empty($pass)) {//密码为空的区间
			$rest = Db::table('bw_user')->update(['user_name'=>$username,'phone'=>$phone,'email'=>$email,'id'=>$id]);
			if($rest){

				return  1;
			}

			if(!empty($select)){
			$up = Db::table('bw_user_role')->where('user_id',$id)->update(['role_id'=>$select]);
			if($up){
				return 1;
				}
			}

		}else{//密码不为空的区间
			$rest = Db::table('bw_user')->update(['user_name'=>$username,'phone'=>$phone,'password'=>$pass,'email'=>$email,'id'=>$id]);
			if($rest){
				echo 1;
			}
		}
	
		
	}

	//增加管理员的ajax的方法
	public function adminuser($username,$phone,$email,$select,$pas1)
	{
		//增加管理员
		$time= time();
		$data= Db::table('bw_user')->insert(['user_name'=>$username,'phone'=>$phone,'password'=>$pas1,'email'=>$email,'type'=>1,'last_login_time'=>$time]);
		if($data)
		{
			//用户表的最大id
			$userid = Db::name('user')->getLastInsID();
			//角色表的最大id
			$rid = Db::name('role')->max('id');
			if(!empty($select)){
			$res = Db::table('bw_user_role')->insert(['user_id'=>$userid,'role_id'=>$rid]);
			if($res){
				echo 1;
			}
		}
			
		}
	
	}
	//角色管理
	public function adminrole()
	{
		//查询角色表中的数据
		$role =Db::table('bw_role')->select();
		$this->assign('role',$role);
		//查询角色相对应拥有的规则
		$gz = Db::table('bw_role r, bw_role_permission rp,bw_permission p')
		->where('r.id=rp.role_id and p.id =rp.permission_id and p.pid>1')->select();
		// var_dump($gz);
		$this->assign('gz',$gz);
		return $this->fetch();
	}

	//角色增加
		public function roleadd()
	{
		return $this->fetch();
	}
	//ajax增加角色
	public function addrole1($name,$info)
	{
		$data= Db::table('bw_role')->insert(['name'=>$name,'description'=>$info]);
		if ($data){
			echo 1;
		}
		
	}

	//ajax删除
	public function delrole($id)
	{
		$res = Db::table('bw_role')->delete($id);
		if($res)
		{
			echo json_encode('成功');
		}
	}

	//角色编辑
		public function roleedit()
	{
		//获取当前角色的id
		$role_id = input('param.id');
		//获取着整个权限表的信息
		$permission= Db::table('bw_permission')->select();

		//查询出当前角色的名字和信息
		$rname = Db::table('bw_role')->where('id',$role_id)->select();
		
		//查角色表、权限表， 查询到相对应角色的权限
		$roleper= Db::table('bw_role r, bw_role_permission rp,bw_permission p')
		->where("r.id=rp.role_id and p.id =rp.permission_id and r.id=$role_id and p.pid>1 ")->select();

		//权限表的权限id,这个角色所对的权限放进数组
		$pid = [];
		foreach ($roleper as $key => $value) {
			$pid[]= $value['id'];
		}
		
		//将数据传给角色编辑页面
		$this->assign('permission',$permission); //权限表信息
		$this->assign('rname1',$rname);//角色表信息
		$this->assign('rname',$rname[0]['name']);
		$this->assign('rid',$rname[0]['id']); // 角色表的id
		$this->assign('description',$rname[0]['description']);//角色的描述
		$this->assign('$roleper',$roleper);
		$this->assign('pid',$pid);
		return $this->fetch();
	}
	//ajax角色编辑
	public function doedit($id,$role_id)
	{
		//2_3,2_4,5_6,5_7,8_9,8_10,11_12,13_14,15_16,15_17,15_18,19_20,19_21,15_23,24_25,24_26" 将id按照 , 分割
		$pid_arr =explode(',', $id);
		//查找角色权限表
		$result = Db::table('bw_role_permission')->where('role_id',$role_id)->select();
	if($result)
		{
			$del = Db::table('bw_role_permission')->where('role_id' , $role_id)->delete();
			if(!$del)
			{
				return json_encode(['state' => 0]);
			}
		}
	
		$data = [];
		$data2 = [];
		$data3 = [];
		foreach ($pid_arr as $value) {

			$data[] = explode('_', $value);
			foreach ($data as $val) {
				$data2[] = $val[1];
				$data3[] = $val[0];
				$data2 = array_unique($data2);
				$data3 = array_unique($data3);
				$data4 = array_merge($data2 , $data3);
			}
		}
		 $data5 = [];
		 foreach ($data4 as $value){
				$data5[] = array(
					'permission_id'=>$value,
					'role_id'=>$role_id
				);	
 		}
		
		$res = Db::table('bw_role_permission')->insertAll($data5);
		if ($res)
		{
			echo 1;
		}
	}	





	//权限分类
	public function admincate()
	{
		
		return $this->fetch();
	}
	//权限分类编辑
	public function cateedit()
	{
		return $this->fetch();
	}
	//权限管理
	public function adminrule()
	{
		//查询权限表中的权限规则
		$data = Db::table('bw_permission')->select();
		$limit = $this->Tree4($data);
		$this->assign('limit',$limit);
		//查询权限名称父节点
		$parent = Db::table('bw_permission')->where('pid',1)->select();
		$this->assign('parent',$parent);
		return $this->fetch();
	}

		// 无限极分类
    function Tree4($list, $pid=0, $level=1)
    {
    	
        static $newlist = array();
    
        foreach($list as $key => $value)
            {
         
            if($value['pid']==$pid)
                {      	
                $value['level'] = $level;
                $newlist[] = $value;
                unset($list[$key]);
                $this->Tree4($list, $value['id'], $level+1);
                }
            }
        return $newlist;
    }

	//增加权限分类
	public function ad($id,$model,$name)
	{
		//增加数据
		$red = Db::table('bw_permission')->insert(['path'=>$model,'name'=>$name,'pid'=>$id]);
		if($red)
		{
			echo 1;
		}

	}
	//删除权限管理的一条
	public function del($id)
	{
		$odel = Db::table('bw_permission')->delete($id);
		if ($odel)
		{
			echo 1;
		}
	}

	//权限编辑
	public function redit()
	{
		//查询当前内容的id
		$id = input('param.id');
		$data= Db::table('bw_permission')->where('id',$id)->select();
		$info=$data[0];
		$this->assign('info',$info);
		return $this->fetch();
	}
	//ajax进行权限修改
	public function changeqx($name,$path,$id)
	{
		//更改数据库
		$result = Db::table('bw_permission')->update(['name'=>$name,'path'=>$path,'id'=>$id]);
		if ($result) {
			return 1;
		}
	}


}