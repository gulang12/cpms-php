<?php
namespace app\admin\controller;

class User  extends AdminBase
{
   
    public function index()   
    {
    	

        return $this->fetch();
    }

}
