<?php
namespace app\index\controller;

use app\index\controller\Index;   // 引入同一模块下的指定控制器

class Test  extends IndexBase
{
   
    public function test(){    //访问方式  http://域名/模块/控制器/方法/参数/参数值

     //    $class = new Index();  // 实例化引入的控制器

    	// $class->test();

        echo "this is a new controller";
    }


}
