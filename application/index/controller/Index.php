<?php
namespace app\index\controller;

class Index extends IndexBase
{
    public function index()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"><p><span style="font-size:30px">1111</span>';
    }

    public function test(){    //访问方式  http://域名/模块/控制器/方法/参数/参数值
        
        // $data = ['name'=>'thinkphp','url'=>'thinkphp.cn'];
    	 
        // return ['data'=>$data,'code'=>1,'message'=>'操作完成'];
    }
    

}
