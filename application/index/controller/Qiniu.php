<?php
namespace app\index\controller;
use think\Controller;
Vendor('sdk.autoload'); 
use \Qiniu\Auth;
use \Qiniu\Storage\UploadManager;
class Qiniu extends Controller {
    public function qiniu(){
        // 用于签名的公钥和私钥
        $accessKey = 'XxXcTXsjfX6rse1v4And5Ts38ssKNLNIHclLSyZA';
        $secretKey = 'AoKkmKNX2cfS1eOQd9EVnbamSjwWJUGCtpah6Rbz';
        // 初始化签权对象
        $auth = new Auth($accessKey, $secretKey);
        // 空间名  https://developer.qiniu.io/kodo/manual/concepts
        $bucket = 'tpmovie';
        // 生成上传Token
        $token = $auth->uploadToken($bucket);
        // 构建 UploadManager 对象
        $uploadMgr = new UploadManager();
        // 上传文件到七牛
        $filePath = 'static/video/6.mp4';
        $key = uniqid();
        list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
        echo "\n====> putFile result: \n";
        if ($err !== null) {
            var_dump($err);
        } else {
            var_dump($ret);
        }
    }
    public function qiniuDown($url = "http://p3ezsim3h.bkt.clouddn.com/move"){
    	// 通过传过来的$url查询电影名字，将名字作为下载文件的名字
    	// 文件类型
    	header('Content-type:video/mp4');
    	// 生成的文件名
		header("Content-Disposition:attachment;filename=1.mp4");
		// 读取链接,下载
		readfile("$url");
    }
    // 保存视频截图
    public function qiniuImg($url = 'http://p3ezsim3h.bkt.clouddn.com/5a71bf076993a')
    {
    	// 形参是视频外链
    	$url .= '?vframe/jpg/offset/2';
    	$gif = file_get_contents($url);
    	// $gif = file_get_contents('http://p3ezsim3h.bkt.clouddn.com/5a71bf076993a?vframe/jpg/offset/10');
    	file_put_contents('static/1.jpg',$gif);
    	var_dump($gif);
    }
}

















// namespace app\index\controller;
// use think\Controller;
// use think\View;
// use think\Db;
// use vendor\autoload;
// // require '\vendor\autoload.php';
// use Qiniu\Auth;
// use Qiniu\Storage\UploadManager;
// class Qiniu extends Controller
// {
// 	public function qiniu()
// 	{
//     $auth = new Auth('Kcj1ciBT_TG0smY8t-eJi3mc_l4ACN4Ls34b42E5','EwQiAJ6IEVT7L3eerDdNTz9WZ2Ok5SlNy20fFemh');
//     $bucket = 'tpmovie';
//     // 生成上传Token
//     $token = $auth->uploadToken($bucket);
//     // 构建 UploadManager 对象
//     $uploadMgr = new UploadManager();
//     // var_dump($token);
//     // var_dump($uploadMgr);
//         $filePath = 'static/video/8.mp4';
//         $key = '123';
//         list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
//         echo "\n====> putFile result: \n";
//         if ($err !== null) {
//             var_dump($err);
//         } else {
//             var_dump($ret);
//         }


// 	}
// }