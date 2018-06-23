<?php
namespace app\admin\controller;

use think\Config;
use think\Request;
// use app\index\controller\Test;  

class Index  extends AdminBase
{
    public function index()   //访问方式  http://域名/模块/控制器/方法/参数/参数值
    {
    	
    /********************** 实例化引入库对象 ********************************/
        // $class = new Test();  // 其它应用模块引入控制器方式

    	// $data = $class->test();

    	
    /********************** 指定返回数据格式 ********************************/
        // $data = ['name'=>'thinkphp','url'=>'thinkphp.cn'];

        // return json(['data'=>$data,'code'=>1,'message'=>'操作完成']);  //  指定返回数据格式

        
    /********************** 读取配置文件数据 ********************************/  
       
        // print_r(Config::get('admin_test')); // 读取admin模块或其它模块下的config文件参数

        // print_r(Config::get('queue'));   //  读取extra扩展目录下的某个扩展配置文件的全部数据  queue 文件名




    /********************** 渲染页面 ********************************/        
        // $this->assign('domain',$this->request->url(true));  // 获取包含域名的完整URL地址

        // return $this->fetch('index');  // 渲染页面
        // Session('name_liu','liuzaichun');
       
       return view('index');

       // return 'name:'.$name;   // 可以直接获取方法的参数 无需用get获取 

       
        
    /**********************获取参数 GET POST ...*********************/
            // 方式一：
        // $request = Request::instance();
       
        // print_r($request->param('name')); // 适用pathinfo的URL  

        // print_r($request->get('name')); // 只能获取这种形式的 http://域名/模块/控制器/方法?参数=参数值

        // 使用助手函数获取参数    
        //print_r(input('get.name'));  // 只能获取这种形式的 http://域名/模块/控制器/方法?参数=参数值
        // input('get.');
        
        /************* 这种方式适用所有URL规则 **************/

        // print_r(input('param.name'));  
        // print_r(input('name'));
        // print_r(input(''));  // 获取所有参数

        // var_dump(request()->isGet());  //判断请求方式  isAjax、isPost



        
       
    }
    
    public function route()   
    {
    	echo "在应用目录里的route.php文件里设置路由规则";

    }


}
