<?php
// +----------------------------------------------------------------------
// | des: index应用模块的基类
// +----------------------------------------------------------------------
// | Author: liu <1226740471@qq.com>
// +----------------------------------------------------------------------
namespace app\index\controller;

use think\Controller;

class IndexBase extends Controller
{
    
    public function __construct()
    {
       parent::__construct();
       
       // do something...

       // echo "this is a index base controller";

    }
    
    /**
     * 初始化操作
     */
    public function _initialize()
    {
    	// do something...

    	// echo "this is a index  _initialize function";
    }
}
