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

    public function navMenu()   
    {
        
        $menus  =  model('IndexMenu')->getAllmenus();
          
        $this->assign("menus",$menus);
        return $this->fetch();
    }
    
    public function addMenu(){
        $input = input();

        $info  =  model('IndexMenu')->addMenu($input);
       
        return $info;
    }
 
    public function delMenu(){
        $menuId = input('param.menuId');

        $info  =  model('IndexMenu')->delMenu($menuId);
       
        return $info;

    }

    public function editMenu(){
        
        $input = input();
        
        $info  =  model('IndexMenu')->editMenu($input);
       
        return $info;
    }
    
    public function getMenu(){
        
        $menuId = input('param.menu_id');

        $info  =  model('IndexMenu')->getMenu($menuId);

        return $info;
    }

    public function getTopMenus() {

        $menus =  model('IndexMenu')->getTopMenus();

        return $menus;
    }
}
