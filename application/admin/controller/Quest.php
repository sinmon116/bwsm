<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Page;
class Quest extends Controller
{
	//问题列表的方法
	public function questionlist()
	{
		$count= Db::table('bw_question')->count('qid');
		$this->assign('count',$count);
		return $this->fetch();
	}

	//ajax分页数据
	public function ajaxques()
	{
		//查询总数
		$count= Db::table('bw_question')->count('qid');

		$page = new Page(3, $count);
		$pages=$page->limit();
		$data= Db::table('bw_question')->limit($pages)->select();

		$value['data'] = $data;
		$value['allPage'] = $page->allPage();
		// dump($value['allPage']);die;
		echo json_encode($value);
	}
	//问题留言的真实删除
	public function del($id)
	{
		//删除数据库中的留言问题
		$result = Db::table('bw_question')->delete($id);
		if ($result)
		{
			echo json_encode($id);
		}
	}

	//del问题   改为访问记录
	public function questiondel($a = null)
	{

		//查询访问记录的表数据	调用分页
		if (empty($a)) {
			$list = Db::table('bw_fwjl')->paginate(5);
		} else {
			$bc = 1;
			$this->assign('bc',$bc);
			$list = Db::table('bw_fwjl')->where('uid' , '=' , $a)->paginate(5);

		}
		
		$page = $list->render();
		//查询总记录数
		$shu = Db::table('bw_fwjl')->count('id');
		$this->assign('shu',$shu);
		$this->assign('list',$list);
		$this->assign('page',$page);
		return $this->fetch();
	}

	//ajax删除访问记录数据
	public function delfw($id)
	{
		//删除数据
		$res= Db::table('bw_fwjl')->delete($id);
		if ($res){
			echo 1;
		}
	}

	
}