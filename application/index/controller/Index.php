<?php
namespace app\index\controller;

class Index extends IndexBase
{
    public function index()
    {
     
        
        return $this->fetch();
    }

    public function test(){    //访问方式  http://域名/模块/控制器/方法/参数/参数值
        
        // $data = ['name'=>'thinkphp','url'=>'thinkphp.cn'];
    	 
        // return ['data'=>$data,'code'=>1,'message'=>'操作完成'];
        return 'this is a test contrll';
    }
    

}
