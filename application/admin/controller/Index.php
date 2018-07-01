<?php
namespace app\admin\controller;

use think\Config;
use think\Request;
// use app\index\controller\Test;  

class Index  extends AdminBase
{
    public function test()   //访问方式  http://域名/模块/控制器/方法/参数/参数值
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
       
       return $this->fetch();  // 渲染页面

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
    
    public function index()   
    {
    	

        return $this->fetch();
    }

    public function welcome(){
       
        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"><p><span style="font-size:30px">欢迎使用yx-admin v1.0后台管理系统！！！</span>';
       // return $this->fetch(); 
    }

}
