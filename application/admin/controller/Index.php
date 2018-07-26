<?php
namespace app\admin\controller;

use think\Config;
use think\Db;
use think\captcha\Captcha;
use app\common\util\PasswordHash;
class Index  extends AdminBase
{
    public function test()   //访问方式  http://域名/模块/控制器/方法/参数/参数值
    {
        
    /********************** 读取配置文件数据 ********************************/  
       
        // print_r(Config::get('admin_test')); // 读取admin模块或其它模块下的config文件参数

        // print_r(Config::get('queue'));   //  读取extra扩展目录下的某个扩展配置文件的全部数据  queue 文件名




    /********************** 渲染页面 ********************************/        
        // $this->assign('domain',$this->request->url(true));  // 获取包含域名的完整URL地址

        // return $this->fetch('index');  // 渲染页面
        // Session('name_liu','liuzaichun');
       
       return $this->fetch();  // 渲染页面

       // return 'name:'.$name;   // 可以直接获取方法的参数 无需用get获取 

    }
    
    public function index()   
    {
    	
        include APP_PATH."admin/conf/menu.php";

        $this->assign("menu",$menu['admin']);
        return $this->fetch();
    }

    public function welcome(){

      
        return $this->fetch(); 
    }


    public function sendToSocket() {

        //利用API推送信息给socket服务器  推送的url地址，使用自己的服务器地址
        $push_api_url = "http://127.0.0.1:2121";  // 这个要与服务端的 new Worker('http://0.0.0.0:2121')做区分
        $post_data    = array(
           "type"     => "publish",
           "content"  => "这个是推送给服务器的测试数据",
           "to"       => '222',   // 给指定用户推送信息  to为组名
        );
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $push_api_url );
        curl_setopt ( $ch, CURLOPT_POST, 1 );
        curl_setopt ( $ch, CURLOPT_HEADER, 0 );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $post_data );
        curl_setopt ($ch, CURLOPT_HTTPHEADER, array("Expect:"));
        $return = curl_exec ( $ch );
        curl_close ( $ch );
        var_dump($return);
    }

    public function login() {

        if(request()->isPost()) {

            $captcha    = new Captcha();

            $user_login = input('param.user_login');
            $user_pass  = input('param.user_pass');
            $vertify    = input('param.vertify');
            
            if(!$captcha->check($vertify)) {
                
                return json(['code'=>4,'msg'=>'验证码错误']);  
            }

            $checkLogin = Db::name('user')->where('user_login',$user_login)->find();
            
            if(is_array($checkLogin) && count($checkLogin) > 0) {

                $hasher = new PasswordHash(8,true);
                
                $chekcPass = $hasher->CheckPassword($user_pass, $checkLogin['user_pass']);
               
                if(!$chekcPass){
                    
                    return json(['code'=>3,'msg'=>'密码不正确']);  
                }
                
                session('is_login',true);
                session('user_id',$checkLogin['user_id']);
                session('user_login',$checkLogin['user_login']);
                session('user_status',$checkLogin['user_status']);
                session('user_role',$checkLogin['user_role']);

                return json(['code'=>1,'msg'=>'登入成功','jumpUrl'=>"index"]);  
                
            }else{

                return json(['code'=>2,'msg'=>'用户名不正确']);  
            }

            exit();
        }

        return $this->fetch(); 
    }

    public function loginOut() {
        
        session(null); // 清除session 安全退出帐号

        $this->redirect('admin/Index/login',302);
    }



    public function vertify() {
       
        $config =    [
            // 验证码字体大小
            'fontSize'    =>    30,    
            // 验证码位数
            'length'      =>    4,   
            // 关闭验证码杂点
            'useNoise'    =>    false, 
        ];

        $captcha = new Captcha($config);

        return $captcha->entry();

    }

}
