<?php
// +----------------------------------------------------------------------
// | des: admin应用模块的基类
// +----------------------------------------------------------------------
// | Author: liu <1226740471@qq.com>
// +----------------------------------------------------------------------
namespace app\admin\controller;

use think\Controller;

class AdminBase extends Controller
{
    
    public function __construct()
    {
       parent::__construct();
       
       // do something...

       // echo "this is a base controller";

    }


    /**
     * 初始化操作
    */
    public function _initialize()
    {
    	
        error_reporting(E_ALL ^ E_NOTICE); // 屏蔽模板输出不存在的变量时的错误提示信息
        
        // 不需要登入的请求
        $noLogin =array( 
            'admin/Index/login',
            'admin/Index/loginOut',
            'admin/Index/vertify',
        ); 
        
        $module      = request()->module();
        $controller  = request()->controller();
        $action      = request()->action();

        $request_url = $module."/".$controller."/".$action;

        if(!in_array($request_url,$noLogin) && !session('is_login')) {

            $this->redirect('admin/Index/login',302); // 跳转到登入页面
           
        }

    }

}
