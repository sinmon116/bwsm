<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Session;
use think\Wxj;
use think\Page;
use app\index\model\Video as VideoModel;
use app\index\model\User as UserModel;
use app\index\model\Vip as VipModel;
use app\index\model\Category as CategoryModel;
use app\index\model\Reply as ReplyModel;
use app\index\model\Down as DownModel;
use app\index\model\Scang as ScangModel;

require '../vendor/sdk/autoload.php';
use Qiniu\Auth;


use Qiniu\Storage\UploadManager;

define('WAILIAN' , 'p3fczj25n.bkt.clouddn.com/');

class Video extends Controller
{
	// 视频搜索页
	public function lister($Search)
	{
		// dump($Search);
		// 查询所有大板块总数
        $zongshu = CategoryModel::where('pid','=',0)->where('isdel' , '=' , 0)->count();
		// 遍历大板块
        $data1 = CategoryModel::where('pid','=',0)->where('isdel' , '=' , 0)->order('ordeby' , 'desc')->limit(5)->select();
        $this->assign('data1' , $data1);
        // 遍历收缩起来的大板块
        $data2 = CategoryModel::where('pid','=',0)->where('isdel' , '=' , 0)->order('ordeby' , 'desc')->limit('5' , $zongshu)->select();
        $this->assign('data2' , $data2);


        $this->assign('Search' , $Search);
		return $this->fetch();
	}
	// 接收搜索页面提交过来的值进行查询
	public function cha($sou)
	{
		// 得到查询所有结果的总数
		$zongshu = VideoModel::where('isdel' , 0)->where('title' , 'like' , $sou)->count();
		// 走Page的方法
		$page = new Page(12, $zongshu);
		// 根据Page提供的方法（limit）得到分页中的每页显示数和偏移量
		$limit = $page->limit();
		// 根据得到的偏移量得到本页显示的所以信息
		$data = VideoModel::where('isdel' , 0)->where('title' , 'like' , $sou)->limit($limit)->select();
		$value['data'] = $data;
		$value['zongshu'] = $zongshu;
		// 在Page中得到分页的4个a连接的参数
		$value['allPage'] = $page->allPage();
		// dump($data);
		echo json_encode($value);
	}

	// 视频播放页
	public function single($vid)
	{
		// 查询当大板块，小版块ID
		$xcid = VideoModel::where('vid',$vid)->value('xcid');
		$dcid = VideoModel::where('vid',$vid)->value('dcid');
		// 查询当前板块名字
		$xname = CategoryModel::where('cid',$xcid)->value('classname');
		$dname = CategoryModel::where('cid',$dcid)->value('classname');

		// 给这个视频加一次浏览次数
		$video = VideoModel::get($vid);
		$cishu = $video->vplay;
		$video->vplay = $cishu+1;
		$video->save();

		// 查询所有大板块总数
        $zongshu = CategoryModel::where('pid','=',0)->where('isdel' , '=' , 0)->count();
		// 遍历大板块
        $data1 = CategoryModel::where('pid','=',0)->where('isdel' , '=' , 0)->order('ordeby' , 'desc')->limit(5)->select();
        $this->assign('data1' , $data1);
        // 遍历收缩起来的大板块
        $data2 = CategoryModel::where('pid','=',0)->where('isdel' , '=' , 0)->order('ordeby' , 'desc')->limit('5' , $zongshu)->select();
        $this->assign('data2' , $data2);


        //查询单个视频详情
        $data = Db::table('bw_video')->where('vid' , '=' , $vid)->where('isdel' , '=' , 0)->select();
        $this->assign('data' , $data[0]);


        //对应视频的所有评论信息
        $info1=Db::table('bw_reply')->where('vid','=',$vid)->where('isdel' , '=' , 0)->select();
        // 用的无限极分类
		$tool = new Wxj();
		$info = $tool->tree($info1,'rid');
        $this->assign('info' , $info);

        //该视频下的所有评论数
        $count =Db::table('bw_reply')->where('vid','=',$vid)->where('isdel' , '=' , 0)->count();
        $this->assign('count',$count);

        // 对应板块的热播电影
        $data3 = Db::table('bw_video')->where('xcid' , '=' , $xcid)->where('isdel' , '=' , 0)->order('vplay' , 'desc')->limit(5)->select();
        // dump($data3);
        $this->assign('data3' , $data3);

        // 查询当前登录者是否收藏此视频
        $result = Db::table('bw_scang')->where('uid' , Session::get('uid'))->where('vid' , $vid)->select();
        if ($result) {
        	$this->assign('sc' , '取消收藏');
        } else {
        	$this->assign('sc' , '收藏');
        }

        // 判断有登陆者时，登陆者vip是否过期
      	$this->pdvip();

      	// 查广告
      	$data10 = Db::table('bw_guanggao')->select();
      	// var_dump($data10);
      	$count10 = Db::table('bw_guanggao')->count('id');
      	// var_dump($count10);
      	$shuzi = mt_rand(0,$count10-1);
      	$gurl = $data10[$shuzi]['gurl'];
      	$this->assign('gurl' , $gurl);
      	// var_dump($gurl);

		$this->assign('xname' , $xname);
		$this->assign('dname' , $dname);
		return $this->fetch();
	}

	// 从后端获取弹幕
	public function getData($vid)
	{
		if (file_exists('video/'.$vid.'.txt')) {
			$a = file_get_contents('video/'.$vid.'.txt');
		} else {
			$a = '{ "text":"欢迎来到洪猛视频网站","color":"#54e8d2","size":"1","position":"0","time":4},';
		}
		
		echo '['.substr($a,0,-1).']';

		// 这里是存数据库的方法
		// $json = '';
		// // User::where('status',1)->column('name');
		// $json1 = Db::table('bw_danmu')->where('vid' , $vid)->column('content');
		// foreach ($json1 as $key => $val) {
		// 	$json .= $val . ',';
		// }
		// $json = '['.substr($json,0,-1).']';
		// echo $json;
	}
	// 保存发送弹幕
	public function sendData($vid)
	{
		$danmu=strip_tags($_POST['danmu']);

		file_put_contents('video/'.$vid.'.txt' , $danmu.',' , FILE_APPEND);

		// 这里是存数据库的方法
		// Db::table('bw_danmu')->INSERT(['content' => $danmu , 'addtime' => $addtime , 'vid' => $vid]);
	}


	// 小版块下的单个页面
	public function gd($cid)
	{
		// 查询当前板块名字
		$name = CategoryModel::where('cid',$cid)->value('classname');
		// 查询这个板块的pid
		$pid = CategoryModel::where('cid',$cid)->value('pid');
		// 根据上一板块的pid查父级的名字
		$dname = CategoryModel::where('cid',$pid)->value('classname');
		// 查父级cid
		$fcid = CategoryModel::where('cid',$pid)->value('cid');

		// 查询所有大板块总数
        $zongshu = CategoryModel::where('pid','=',0)->where('isdel' , '=' , 0)->count();

        // 遍历大板块
        $data1 = CategoryModel::where('pid','=',0)->where('isdel' , '=' , 0)->order('ordeby' , 'desc')->limit(5)->select();
        $this->assign('data1' , $data1);
        // dump($data1);die;

        // 遍历收缩起来的大板块
        $data2 = CategoryModel::where('pid','=',0)->where('isdel' , '=' , 0)->order('ordeby' , 'desc')->limit('5' , $zongshu)->select();
        $this->assign('data2' , $data2);

        //该小版块下的所有视频 并且分页 每页显示12条
        $data =  Db::table('bw_video')->where('xcid' , '=' , $cid)->where('isdel' , '=' , 0)->paginate(12);
        $page = $data->render();
        $this->assign('data' , $data);
        $this->assign('page' , $page);


		$this->assign('dname' , $dname);
		$this->assign('fcid' , $fcid);
		$this->assign('name' , $name);
		// echo $cid;
		return $this->fetch();
	}


	// 所属板块视频页
	public function tv($cid)
	{
		// 查询当前板块名字
		$name = CategoryModel::where('cid',$cid)->value('classname');

		// 查询所有大板块总数
        $zongshu = CategoryModel::where('pid','=',0)->where('isdel' , '=' , 0)->count();

        // 遍历大板块
        $data1 = CategoryModel::where('pid','=',0)->where('isdel' , '=' , 0)->order('ordeby' , 'desc')->limit(5)->select();
        $this->assign('data1' , $data1);
        // dump($data1);die;

        // 遍历收缩起来的大板块
        $data2 = CategoryModel::where('pid','=',0)->where('isdel' , '=' , 0)->order('ordeby' , 'desc')->limit('5' , $zongshu)->select();
        $this->assign('data2' , $data2);

        // 遍历当前大板块下的下班快
		$data = CategoryModel::where('pid','=',$cid)->where('isdel' , '=' , 0)->order('ordeby' , 'desc')->select();
		$this->assign('data' , $data);
		//获取当前当板块下的所有小版块
		$Bdata = Db::table('bw_category')->where('isdel' , '=' , 0)->where('pid',$cid)->select();
		//获取小版块下的6个视频
		$Video = [];
		foreach ($Bdata as $key=>$v){
			$Video[$v['cid']] = Db::table('bw_video')->where('isdel' , '=' , 0)->where('xcid',$v['cid'])->limit(6)->select();
		}
		// dump($Video);
		$this->assign('Video' , $Video);



		$this->assign('name' , $name);
		return $this->fetch();
	}

	//上传视频
	public function upload()
	{
		// dump(input('cid'));
		// $arr = explode(',' , input('cid'));
		// dump($arr);
		// die;
		// 视频文件的名字
		// $name = uniqid();
		$name=$_FILES['file']['name'];
		// 视频的类型
		$type = $_FILES['file']['type'];
		// 视频缓存文件的路径
		$filePath = $_FILES['file']['tmp_name'];

		$token = $this->getToken();
    	// 初始化 UploadManager 对象并进行文件的上传。
		$uploadMgr = new UploadManager();
		//调用UploadManager的putFile方法进行文件的上传
        list($ret,$err) = $uploadMgr->putFile($token,$name,$filePath);
		if ($err !== null) {
			$this->error('上传失败');
			// 失败区间
		    // var_dump($err);
		} else {
			// 成功区间
		    // var_dump($ret);
		    // 获取视频的时长
		    // 第一步先获取到到的是关于视频所有信息的json字符串
		    $shichang = file_get_contents('http://'.WAILIAN.$name.'?avinfo');
		    // 第二部转化为对象
			$shi =json_decode($shichang);
			// 第三部从中取出视频的时长
			$chang = $shi->format->duration;

			// 获取去封面
			//http://p3fczj25n.bkt.clouddn.com/8.mp4?vframe/jpg/offset/1
			$fengmian = 'http://'.WAILIAN.$name.'?vframe/jpg/offset/1';
			// 因为存的时候把大板块和小板块放一起了，是按照 ， 号拼接的，所以现在得切割开
			$arr = explode(',' , input('cid'));
			// 存入数据库
		    $video = new VideoModel;
			$video->data([
			'vname' => $name,
			'vurl' => WAILIAN.$ret['key'],
			'username' => Session::get('uname'),
			'uid' => Session::get('uid'),
			'fengmian' => $fengmian,
			'info' => input('vinfo'),
			'dcid' => $arr['1'],
			'xcid' => $arr['0'],
			'ctime' => date('Y-m-d H:i:s' , time()),
			'title' => input('mingc'),
			'title' => input('mingc'),
			'vtype' => $type
			]);

			if ($video->save()) {
				$this->success('上传成功' , '/index/user/person');
			} else {
				$this->error('上传失败');
			}
		}
	}

	// 下载视频
	public function xiazai($vid)
	{
		// echo 111;
		// 给这个视频加一次下载次数
		$video = VideoModel::get($vid);
		// 保存视频标题
		$vtitle = $video->title;
		// 保存视频封面
		$vfengmian = $video->fengmian;

		// 得到该视频表的下载次数
		$cishu = $video->vcishu;
		$video->vcishu = $cishu+1;
		$video->save();


		// 给该用户添加下载记录
		$xia = new DownModel;
		$xia->data([
			'uid' => Session::get('uid'),
			'vid' => $vid,
			'vtitle' => $vtitle,
			'vfengmian' => $vfengmian,
			'xtime' => date('Y-m-d H:i:s' , time())
		]);
		$xia->save();
	}

	// 该用户收藏视频
	public function scang($vid)
	{
		// 根据视频ID查视频信息
		$video = VideoModel::get($vid);
		// 查收藏表
		// $sid = new ScangModel;
		// $result = $sid->where('uid' , Session::get('uid'))->where('vid' , $vid)->select();
		$result = Db::table('bw_scang')->where('uid' , Session::get('uid'))->where('vid' , $vid)->select();
		if ($result) {
			// 这里是取消收藏区间
			// echo "3333";
			$a = $result[0]['sid'];
			// 删除这条记录
			$b = ScangModel::get($a);
			$b->delete();
			echo 2;
			// echo $result->getLastSql;
		} else {
			// 这里是收藏区间

			
			// 保存视频标题
			$vtitle = $video->title;
			// 保存视频封面
			$vfengmian = $video->fengmian;


			// 给该用户添加下载记录
			$cang = new ScangModel;
			$cang->data([
				'uid' => Session::get('uid'),
				'vid' => $vid,
				'vtitle' => $vtitle,
				'vfengmian' => $vfengmian,
				'stime' => date('Y-m-d H:i:s' , time())
			]);
			$cang->save();
			echo 1;
		}
			
	}

	// 判断如果有登陆者时Vip是否过期
    public function pdvip()
    {
      if (!empty(Session::get('uid'))) {
        // 查看该用户在vip表中的过期时间
        $gq = VipModel::where('uid',Session::get('uid'))->value('gqtime');
        // 现在的时间
        $xz = time();
        // 判断是否存在过期时间
        if (empty($gq)) {
          $user = new UserModel;
          $user->where('id', Session::get('uid'))->update(['isvip' => 1]);
          Session::set('isvip' , 1);
        }
        if ($gq <= $xz) {
          // 过期区间
          // 删除掉当前登录者在vip表的记录
          VipModel::where('uid',Session::get('uid'))->delete();
          // 修改当前登录者在用户表中的vip字段
          $user = new UserModel;
          $user->where('id', Session::get('uid'))->update(['isvip' => 1]);
          Session::set('isvip' , 1);
        }else {
          $user = new UserModel;
          $user->where('id', Session::get('uid'))->update(['isvip' => 2]);
          Session::set('isvip' , 2);
        }
      }
    }

	//生成token
	private function getToken(){

        $accessKey = 'XxXcTXsjfX6rse1v4And5Ts38ssKNLNIHclLSyZA';
        $secretKey = 'AoKkmKNX2cfS1eOQd9EVnbamSjwWJUGCtpah6Rbz';
        // 初始化签权对象
        $auth = new Auth($accessKey, $secretKey);
        // 空间名  https://developer.qiniu.io/kodo/manual/concepts
        $bucket = 'chen';
    
        return $auth->uploadToken($bucket);//生成token      
    }
	
}
