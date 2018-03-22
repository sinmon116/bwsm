<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Collection;
use think\Wxj;
 require '../vendor/sdk/autoload.php'; //引用上传文件的sdk包
use Qiniu\Auth;
use Qiniu\Storage\UploadManager; //上传类
use think\Session;
use app\admin\model\Base;
use app\admin\model\Basetwo;
define('WAILIAN', 'p3fczj25n.bkt.clouddn.com/');
class Videoclass extends Controller
{
	//等会视频的上传
	public function upload()
	{	
		/*//判断是否是广告
		$kg = input('param.cid');
		if ($kg == 'kg'){//是广告的区间

		}*/

		
		
		//获取存储的视频的信息
		//获取文件的类型->vname
		$vname = $_FILES['file']['type'];

		//获取文件的名字
		$key = $_FILES['file']['name'];
		// $key=uniqid();
		// dump($key);
		$filePath=$_FILES['file']['tmp_name'];
		//获取token值
		$accessKey = 'XxXcTXsjfX6rse1v4And5Ts38ssKNLNIHclLSyZA';
		$secretKey = 'AoKkmKNX2cfS1eOQd9EVnbamSjwWJUGCtpah6Rbz';
		// 初始化签权对象
		$auth = new Auth($accessKey, $secretKey);
		$bucket = 'chen';//七牛云空间名字
		// 生成上传Token
		$token = $auth->uploadToken($bucket);
		$uploadMgr = new UploadManager();
		// 调用 UploadManager 的 putFile 方法进行文件的上传。
		list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
	
		if ($err !== null) {
			//失败区间
			$this->error('上传失败');
		} else {
		    //成功区间
		    // 第一步先获取到到的是关于视频所有信息的json字符串
		    $shichang = file_get_contents('http://'.WAILIAN.$key.'?avinfo');
		    // 第二部转化为对象
			$shi =json_decode($shichang);
			// 第三部从中取出视频的时长
			$chang = $shi->format->duration;
			// 获取去封面
			//http://p3fczj25n.bkt.clouddn.com/8.mp4?vframe/jpg/offset/1
			$fengmian = 'http://'.WAILIAN.$key.'?vframe/jpg/offset/1';

			//判断是否是广告
			$kg = input('param.cid');
			if ($kg == 'kg'){//是广告的区间
				$result =Db::table('bw_guanggao')->insert(
				['gtitle' => input('title'),
				'gurl' => WAILIAN.$ret['key'],
				'gpic' => $fengmian]);
			} else {//不是广告区间
				// 因为存的时候把大板块和小板块放一起了，是按照 ， 号拼接的，所以现在得切割开
				$arr = explode(',' , input('cid'));
				$result =Db::table('bw_video')->insert(['vname' => $key,
				'vurl' => WAILIAN.$ret['key'],
				'username' => Session::get('admin'),
				'uid' => Session::get('aid'),
				'fengmian' => $fengmian,
				'info' => input('desc'),
				'dcid' => $arr['1'],
				'xcid' => $arr['0'],
				'ctime' => date('Y-m-d H:i:s' , time()),
				'title' => input('title'),
				'isvip'=>input('vip'),		
				'vtype' => $vname]);
			}

		  	  if($result)
		  	  {
		  	  	$this->success('上传成功');
		  	  }else{
		  	  	$this->success('上传失败');
		  	  }
		}
			
		
	}


	//板块管理方法  ------>添加板块
	public function category()
	{
		$base= new Base();
		$base->_initialize();
		//展示数据内容
		$res =Db::table('bw_category')->where('isdel' , '0')->select();
		$tool = new Wxj();
		$data = $tool->tree($res,'cid');
		$this->assign('data',$data);
		return  $this->fetch();
	}

	//ajax展示数据
	public function zhanshi()
	{
		$ajax =Db::table('bw_category')->where('isdel' , '0')->select();
		$tool = new Wxj();
		$data = $tool->tree($ajax,'cid');
		echo json_encode($data);
	}

	//删除版板块
	public function delbk($id)
	{
		//删除数据库相对应数据
		$result = Db::table('bw_category')->delete($id);
		 	// echo json_encode($id);
	}
	//添加板块
	public function addbk($name,$ordeby,$pid)
	{
		//将获得的数据插入数据库
		$data=['classname'=>$name,'ordeby'=>$ordeby,'pid'=>$pid];
		$res = Db::table('bw_category')->insert($data);

		if ($res){
			echo 1;
		}	
	}

	//板块编辑
	public function cateedit()
	{
		$base= new Base();
		$base->_initialize();
		$data =Db::table('bw_category')->where('isdel' , '0')->select();
		$this->assign('data',$data);
		return $this->fetch();
	}
	public function changebk($cname,$cid)
	{
		$data= Db::table('bw_category')->update(['classname'=>$cname,'cid'=>$cid]);
		if($data)
		{
			echo 1;
		}
	}

	//轮播管理  视频列表
	public function bannerlist()
	{
		$base= new Base();
		$base->_initialize();
		//查询视频内容数据
		$list = Db::table('bw_video')->paginate(3);
		$page=$list->render();
		$this->assign('list',$list);
		$this->assign('page',$page);
		return $this->fetch();
	}

	//视频列表的删除
	public function delvideo($vid)
	{
		//删除数据相对应的视频
		$res =Db::table('bw_video')->delete($vid);
		if ($res) {
			echo json_encode('成功');
		}
	}
	//视频列表的屏蔽和解除
		public function isdel($id,$isdel)
	{
		//获取用户id
		$id = input('param.id');
		
		//获取isdel的值
		$isdel= input('param.isdel');
		
		//处理
		$res=Db::table('bw_video')->update(['isdel'=>$isdel,'vid'=>$id]);
	
		if ($res){
			echo "<script>alert('操作成功');window.location.href ='/admin/Videoclass/bannerlist';</script>";
		}else{
			echo "<script>alert('失败');history.go(-1);</script>";
		}
	}


	//轮播添加 视频添加
	public function banneradd()
	{
		$base= new Base();
		$base->_initialize();
		//展示数据内容
		$res =Db::table('bw_category')->where('isdel' , '0')->select();
		$tool = new Wxj();
		$data = $tool->tree($res,'cid');
		$this->assign('data',$data);
		return $this->fetch();
	}

	//轮播图页面
	public function bannerlb()
	{
		$base= new Base();
		$base->_initialize();
		//查询轮播数据
		$pic = Db::table('bw_banner')->select();
		$this->assign('pic',$pic);
		return $this->fetch();
	}

	//编辑轮播图
	public function banneredit()
	{
		return $this->fetch();
	}

	//上传图片到七牛云
	public function uppic()
	{

		// dump($_FILES);die;
		//获取存储的视频的信息
		//获取文件的类型->vname
		$vname = $_FILES['file']['type'];
		//获取文件的名字
		$key = $_FILES['file']['name'];
		
		$filePath=$_FILES['file']['tmp_name'];
		//获取token值
		$accessKey = 'XxXcTXsjfX6rse1v4And5Ts38ssKNLNIHclLSyZA';
		$secretKey = 'AoKkmKNX2cfS1eOQd9EVnbamSjwWJUGCtpah6Rbz';
		// 初始化签权对象
		$auth = new Auth($accessKey, $secretKey);
		$bucket = 'chen';//七牛云空间名字
		// 生成上传Token
		$token = $auth->uploadToken($bucket);
		$uploadMgr = new UploadManager();
		// 调用 UploadManager 的 putFile 方法进行文件的上传。
		list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
	
		if ($err !== null) {
			//失败区间
			$this->error('上传失败');
		} else {
		    //成功区间
		    //获取信息 图片的连接
		    $pic = 'http://'.WAILIAN.$key;
		   	//获取表单传过来的信息
		   	
		 	$a=input('');
		   	$a['photo']=$pic;

		 	$data=Db::table('bw_banner')->insert($a);
		 	if($data){
		 		$this->success('上传成功');
		 	}
		   
		  	  
		}
	}
	
	//屏蔽轮播图
	public function isdel2($id,$isdel)
	{
		//数据库
		$res =Db::table('bw_banner')->update(['isdel'=>$isdel,'id'=>$id]);
		if ($res){
			echo "<script>alert('操作成功');window.location.href ='/admin/Videoclass/bannerlb';</script>";
		}else{
			echo "<script>alert('失败');history.go(-1);</script>";
		}
	}

	//删除轮播图
	public function dellb($bid)
	{
		//删除数据
		$res = Db::table('bw_banner')->delete($bid);
		if ($res) {
			echo json_encode('成功');
		}
	}
	//分类管理->分类列表2
	public function category2()
	{
		return  $this->fetch();
	}

	//广告列表
	public function guanggao()
	{
		//查询广告内容
		$list= Db::table('bw_guanggao')->select();
		$this->assign('list',$list);
		return $this->fetch();
	}
	//广告列表的删除
	public function delguanggao($vid)
	{
		//删除数据库数据
		$res =Db::table('bw_guanggao')->where('id',$vid)->delete();
		if ($res) {
			echo json_encode('成功');
		}
	}
	
}
