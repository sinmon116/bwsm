<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Wxj;
use app\admin\model\Base;
use app\admin\model\Basetwo;
class Comment extends Controller
{
	//评论列表
	public function commentlist()
	{
		$base= new Base();
		$base->_initialize();
		//查询评论数据
		$res = Db::table('bw_reply')->select();
		
		$data = $this->getTree4($res);

	
		$this->assign('data',$data);
		return $this->fetch();
	}
	//对评论的删除
	public function delrel($rid)
	{
		//对获取的rid删除数据库
		$red = Db::table('bw_reply')->delete($rid);
		if ($red)
		{
			echo 1;
		}
	}

	//多选删除评论
	public function delall($arid)
	{
		$res = Db::table('bw_reply')->delete($arid);
		if ($res)
		{
			echo 1;
		}
	}
	//对评论的屏蔽
	public function isdel($id,$isdel)
	{
		//对数据做出修改
		$res=Db::table('bw_reply')->update(['isdel'=>$isdel,'rid'=>$id]);
	
		if ($res){
			echo "<script>alert('操作成功');window.location.href ='/admin/comment/commentlist';</script>";
		}else{
			echo "<script>alert('失败');history.go(-1);</script>";
		}
	}
	//意见反馈
	public function feedbacklist()
	{
		return $this->fetch();
	}
	//反馈编辑
	public function feedbackedit()
	{
		return $this->fetch();
	}

	// 无限极分类
    function getTree4($list, $pid=0, $level=1)
    {
        static $newlist = array();
        foreach($list as $key => $value)
            {
            if($value['pid']==$pid)
                {
                $value['level'] = $level;
                $newlist[] = $value;
                unset($list[$key]);
                $this->getTree4($list, $value['rid'], $level+1);
                }
            }
        return $newlist;
    }
}