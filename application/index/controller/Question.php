<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Question as QuestionModel;
use think\Session;

// 意见表
class Question extends Controller
{
	// 发表意见
	public function fabiao($yij)
	{
		// dump($yij);
		// die;
		// 这里设置session的
		// Session::set('uid' , 1);
		// Session::set('uname' , 'chen');
		if (empty(input('session.uname'))) {
			// 您还没有登陆
			echo 2;
			die;
		}
		// echo $yij;
		$question = new QuestionModel;
		$question->data([	
		'uid' => input('session.uid'),
		'uname' => input('session.uname'),
		'content' => $yij,
		'create_time' => time()
		]);
		if ($question->save()) {
			// 发表成功
			echo 0;
		} else {
			// 发表失败
			echo 1;
		}
		// dump(input('post.'));
	}
}