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
    	// do something...

    	// echo "this is a admin  _initialize function";
    }
}
