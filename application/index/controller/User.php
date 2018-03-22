<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Ucpaas;
use think\Session;
use think\open51094;
use think\Wxj;
use app\index\model\User as UserModel;
use app\index\model\Category as CategoryModel;
use app\index\model\Fwjl as FwjlModel;
use app\index\model\Sign as SignModel;
use app\index\model\Vip as VipModel;
use think\Email;
class User extends Controller
{
    // public function index() 
    // {
    //     return $this->fetch();
    // }

    public function downjl()
    {
       // 查询所有大板块总数
        $zongshu = CategoryModel::where('pid','=',0)->where('isdel' , '=' , 0)->count();

        // 遍历大板块
        $data1 = CategoryModel::where('pid','=',0)->where('isdel' , '=' , 0)->order('ordeby' , 'desc')->limit(5)->select();
        $this->assign('data1' , $data1);
        // dump($data1);die;

        // 遍历收缩起来的大板块
        $data2 = CategoryModel::where('pid','=',0)->where('isdel' , '=' , 0)->order('ordeby' , 'desc')->limit('5' , $zongshu)->select();
        $this->assign('data2' , $data2);
        // dump($data2);die;

        // 轮播图
        $data3 = Db::table('bw_banner')->where('isdel' , '=' , 0)->order('orderby' , 'desc')->select();
        // dump($data3);
        $this->assign('data3',$data3);

      // 友情链接
      $data = Db::table('bw_link')->order('order' , 'asc')->select();
      $this->assign('data',$data);
      // 网站信息
      $wzxx = Db::table('bw_website')->select();
      $this->assign('wzxx',$wzxx[0]);
      //查询下载有记录的视频数据
      $downv= Db::table('bw_down')->where('uid',Session::get('uid'))->select();
      $this->assign('downv',$downv);
      //查询收藏记录
      $cdown = Db::table('bw_scang')->where('uid',Session::get('uid'))->select();
   
      $this->assign('cdown',$cdown);
      return $this->fetch();
    }

    //修改个人信息的方法
    public function  change($name,$phone,$pwd,$email)
    {
        if(empty($pwd)){//不修改密码区间
          $res = Db::table('bw_user')->update(['user_name'=>$name,'phone'=>$phone,'email'=>$email,'id'=>Session::get('uid')]);
          if($res)
          {
            Session::set('uname',$name);
            echo json_encode(1);
          }
        }else{//修改密码区间
             $resu = Db::table('bw_user')->update(['user_name'=>$name,'phone'=>$phone,'password'=>$pwd,'email'=>$email,'id'=>Session::get('uid')]);
          if($resu)
          {
            Session::set('uname',$name);
            echo json_encode(1);
          }
        }
    }

    //上传头像的方法
    public function upic()
    {
       
        $file = request()->file('img');
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
            // 成功上传后 获取上传信息  路径
                $path= '\uploads\\'. $info->getSaveName();
              //将修改的头像放入数据库
              $res = Db::table('bw_user')->update(['picture'=>$path,'id'=>Session::get('uid')]);
              if($res)
              {
                $this->success('修改头像成功');
              }
                }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
          }
    }

    // 查看签到
    public function chaqiandao($a = null)
    {
      $shu = '';
      $shu = Db::table('bw_sign')->where('uid' , Session::get('uid'))->count();
      if (empty($a)) {
        echo $shu;
      } else {
        return $shu;
      }
    }
    // 是否可签到
    public function qiandao()
    {
      // 查出来最后一次的time
      $qianT = Db::table('bw_sign')->where('uid' , Session::get('uid'))->order('qdtime' , 'desc')->limit(0,1)->value('qdtime');
      if ($qianT) {
        // 有值的区间

        // 最后一次的time加一天的时间
        $qiantime = $qianT+3600*24;
        // 当前的time
        $a = time();
        // 判断当前的时间是否大于$qiantime
        if ($qiantime <= $a) {
          echo 1;
        } else {
          echo 0;
        }
      } else {
        // 没有值的区间
        echo 1;
      }
      // 返回值为1是可以签到0时不可以
    }
    // 点击签到
    public function dqiandao()
    {
      $tianshu = $this->chaqiandao(2);
      if ($tianshu >= 9) {
        // 到第9天时删除签到记录
        SignModel::where('uid' , Session::get('uid'))->delete();
        // 查询VIP表 是否有此人
        $result = Db::table('bw_vip')->where('uid' , Session::get('uid'))->select();
        // dump($result);
        // 判断
        if ($result) {
          // 有值的区间 进行vip过期时间的叠加
          $jiagq = $result[0]['gqtime']+3600*24*7;
          $vip = new VipModel;
          $vip->where('uid' , Session::get('uid'))->update(['gqtime' => $jiagq]);

          // 更新用户VIP权限
          $res = Db::table('bw_user')->where('id' , Session::get('uid'))->update(['isvip' => 2]);
          Session::set('isvip' , 2);
        } else {
          // 没有值的区间 创建此人的vip
          $vip = new VipModel;
          $vip->data([
          'uid' => Session::get('uid'),
          'uname' => Session::get('uname'),
          'ctime' => time(),
          'gqtime' => time()+3600*24*7
          ]);
          $vip->save();

          // 更新用户VIP权限
          $res = Db::table('bw_user')->where('id' , Session::get('uid'))->update(['isvip' => 2]);
          Session::set('isvip' , 2);
        }

      } else {
        // 添加用户签到表
        $sing = new SignModel;
        $sing->data([
        'uid' => Session::get('uid'),
        'uname' => Session::get('uname'),
        'qdtime' => time()
        ]);
        $sing->save();
      }
    }

    // 个人信息
    public function person()
    {
      if (empty(Session::get('uid'))) {
        $this->success('请登陆' , '/index');
      }
      
      // 查询所有大板块总数
      $zongshu = CategoryModel::where('pid','=',0)->where('isdel' , '=' , 0)->count();
      // 遍历大板块
      $data3 = CategoryModel::where('pid','=',0)->where('isdel' , '=' , 0)->order('ordeby' , 'desc')->limit(5)->select();
      $this->assign('data3' , $data3);
      // 遍历收缩起来的大板块
      $data2 = CategoryModel::where('pid','=',0)->where('isdel' , '=' , 0)->order('ordeby' , 'desc')->limit('5' , $zongshu)->select();
      $this->assign('data2' , $data2);

      // 友情链接
      $data4 = Db::table('bw_link')->order('order' , 'asc')->select();
      $this->assign('data4',$data4);

      // 网站信息
      $wzxx = Db::table('bw_website')->select();
      $this->assign('wzxx',$wzxx[0]);
      // dump($wzxx[0]);die;

      // 遍历所有的板块
      $array = Db::table('bw_category')->where('isdel' , '=' , 0)->select();
      // $data = CategoryModel::select();
      // 用的无限极分类
      $tool = new Wxj();
      $data = $tool->tree($array,'cid');
      // dump($data);
      $this->assign('data' , $data);
      //查询个人信息
      $data1 = UserModel::getById(Session::get('uid'));
      $this->assign('data1' , $data1);

      //查询该用户的访问记录
      $jl = Db::table('bw_fwjl')->where('uid','=',Session::get('uid'))->order('retime','desc')->limit(5)->select();
      $this->assign('jl',$jl);
      //查询当前登录用户的信息
      $res= Db::table('bw_user')->where('id','=',Session::get('uid'))->select();
      $info=$res[0];
      $this->assign('info',$info);

      // 判断有登陆者时，登陆者vip是否过期
      $this->pdvip();

      return $this->fetch();
    }


    // 登陆
    public function login()
    {
      $result = UserModel::getByPhone(input('post.username'));
      if (!$result) {
        $this->error('没有该账号');
        die;
      }
      if ($result->isdel == 1) {
        $this->error('该账号已锁定，请联系管理员');
        die;
      }
      if (input('post.password') != $result->password) {
        $this->error('密码不正确');
        die;
      } else {
        Session::set('uname' , input('post.username'));
        Session::set('uid' , $result->id);
        Session::set('isvip' , $result->isvip);

        // 判断有登陆者时，登陆者vip是否过期
        $this->pdvip();
        
        // 添加访问记录
        $ip = $_SERVER['REMOTE_ADDR'];
        $fwjl = new FwjlModel;
        $fwjl->data([
        'uid' => $result->id,
        'username' => input('post.username'),
        'ip' => $ip,
        'retime' => date('Y-m-d H:i:s' , time())
        ]);
        $fwjl->save();

        $this->success('登陆成功', 'index/index/index');
      }
    }

    // 第三方登陆
    public function sanf()
    {
      $open = new open51094();
      $code = $_GET['code'];
      $data = $open->me($code);
      // dump($data['img']);die;
      $result = UserModel::getByPassword($data['uniq']);
      if (!$result) {
        // 注册
        // 返回是数据库的ID
        $user = new UserModel();
        $user->user_name = $data['name'];
        $user->password = $data['uniq'];
        $user->last_login_time = time();
        $user->picture = $data['img'];
        $user->laiyuan = $data['from'];
        if ($user->save()) {
          Session::set('uname' , $data['name']);
          Session::set('uid' , $user->id);
          Session::set('isvip' , '1');

          // 判断有登陆者时，登陆者vip是否过期
          $this->pdvip();

            // 添加访问记录
            $ip = $_SERVER['REMOTE_ADDR'];
            $fwjl = new FwjlModel;
            $fwjl->data([
            'uid' => $user->id,
            'username' => $data['name'],
            'ip' => $ip,
            'retime' => date('Y-m-d H:i:s' , time())
            ]);
            $fwjl->save();
          $this->success('注册成功', 'index/index/index');
        } else {
          $this->error('注册失败');
        }
      } else {
        // 判断是否锁定账号
        if ($result->isdel == 1) {
          $this->error('该账号已锁定，请联系管理员');
          die;
        }
        // 登陆
        // 查询数据库的ID
        Session::set('uname' , $result->user_name);
        Session::set('uid' , $result->id);
        Session::set('isvip' , $result->isvip);

        // 判断有登陆者时，登陆者vip是否过期
        $this->pdvip();

            // 添加访问记录
            $ip = $_SERVER['REMOTE_ADDR'];
            $fwjl = new FwjlModel;
            $fwjl->data([
            'uid' => $result->id,
            'username' => $result->user_name,
            'ip' => $ip,
            'retime' => date('Y-m-d H:i:s' , time())
            ]);
            $fwjl->save();
            $this->success('登陆成功', 'index/index/index');
      }
   
    }

    // 注册
   	public function register()
   	{
      // 手机验证码是否一致
      // if($_POST['yzm'] != Session::get('dx')){
      //   $this->error('验证码不一致');
      //   die;
      // }
      // 俩次密码是否一致
   		if ($_POST['password'] != $_POST['pwd']) {
   			$this->error('俩次密码不一致');
        die;
   		}
   		$user = new UserModel();
  		$user->user_name = $_POST['phone'];
  		$user->password = $_POST['password'];
  		$user->phone = $_POST['phone'];
  		$user->last_login_time = time();
      $user->laiyuan = 'phone';
      $res = $user->save();
      // var_dump($res);
      // die;
  		if ($res) {
        Session::set('uname' , $_POST['phone']);
        Session::set('uid' , $user->id);
        Session::set('isvip' , 1);

            // 添加访问记录
            $ip = $_SERVER['REMOTE_ADDR'];
            $fwjl = new FwjlModel;
            $fwjl->data([
            'uid' => $user->id,
            'username' => $_POST['phone'],
            'ip' => $ip,
            'retime' => date('Y-m-d H:i:s' , time())
            ]);
            $fwjl->save();
  			   $this->success('注册成功', 'index/index/index');
  		} else {
  			$this->error('注册失败');
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

   	// 判断用户输入的手机号是否被注册
   	public function isPD($phone)
   	{
   		// echo $phone;die;
   		$result = UserModel::getByPhone($phone);
  		if ($result) {
  			echo 1;
  		} else {
  			echo 2;
  		}
   	}

    //短信验证
    public function dx($phone)
    { 
      // echo $phone;
      // die;
      //接受手机号
      
      // $phone=$_POST['phone'];
      //初始化必填
      $options['accountsid']='2dee17ec85c76f95de8718f48e070f9c';
      $options['token']='0c8aec84111675d9f36c376f857a26c2';
      
      //初始化 $options必填
      $ucpass = new Ucpaas($options);
      $str='0123456789';
      $str1=substr(str_shuffle($str) , 0, 4);
      // $_SESSION['dx']=$str1;
      Session::set('dx' , $str1);
      //开发者账号信息查询默认为json或xml
      header("Content-Type:text/html;charset=utf-8");
      $appId = "272a9e1f1dca44ffbfa3b3e4ce8046b2";
      $to = "$phone";
      $templateId = "244629";
      $param="$str1";
      echo $ucpass->templateSMS($appId,$to,$templateId,$param);
    }

    //邮箱验证
    
    public function email()
    {
      return  $this->fetch();
    }



    //开始邮箱验证
    public function doemail($email)
    {

        include './mail/mail.php';

      //获取输入的邮箱号
          $semail= input('param.email');
          //查询数据库中该邮箱是否注册
          $res = Db::table('bw_user')->where('email',$semail)->select();
          if ($res){
              //邮箱里面的验证码
         $str = '1234567890';
         $code = substr(str_shuffle($str),0,6);
         sendMails($semail,'博文尚美影视互联',$code);
    

          //修改密码
          $data= Db::table('bw_user')->where('email',$semail)->update(['password'=>$code]);
          if ($data){
            echo 3;
          }
        }else{
          return  2;die;
        }
      }
}
