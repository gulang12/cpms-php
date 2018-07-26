<?php
namespace app\admin\controller;

class System extends AdminBase
{
   
    public function systemSetup()   
    {
    	

        return $this->fetch();
    }
  
    public function systemLog()   
    {
        

        return $this->fetch();
    }

    public function fontIcon() {


    	return $this->fetch();
    }

    public function glyphIcon() {


    	return $this->fetch();
    }
}
