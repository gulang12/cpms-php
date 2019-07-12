<?php
namespace app\socket\controller;

use think\Controller;
use think\Db;
class Index extends Controller   
{

    public function index()
    {

       	
       	$userInfo = Db::name('user')->where('user_id',session("user_id"))->find();

      
        $this->assign("userInfo",	$userInfo);

        return $this->fetch();
    }


}
