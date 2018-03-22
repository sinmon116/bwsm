<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Session;
use app\index\model\Reply as ReplyModel;
use app\index\model\User as UserModel;
class Reply extends Controller
{
	// 回复评论
	public function huifu()
	{
		if (empty(Session::get('uid'))) {
			$this->error('请先登录');
			die;
		}

        //获取当前登录着的头像
        // $b = User::where('id',Session::get('uid'))->value('picture');

		$a = input('');
		$a['name'] = Session::get('uname');
		$a['uid'] = Session::get('uid');
		$a['create_time'] = date('Y-m-d H:i:s' , time());
		$a['prc'] = UserModel::where('id',Session::get('uid'))->value('picture');
		$reply = new ReplyModel;
		$reply->data($a);
		if ($reply->save()) {
			$this->error('回复成功');
		} else {
			$this->error("回复失败");
		}
		
	}
}