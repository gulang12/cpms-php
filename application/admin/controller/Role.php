<?php
namespace app\admin\controller;

class Role  extends AdminBase
{
   
    public function roleList()   
    {
    	
        $roles =  model('Role')->getRoles();

        $this->assign("roles",$roles);

        return $this->fetch();
    }
    

    public function getRole() {

        $roleId = input('param.role_id');

        $role   = model("Role")->getRole($roleId);

        return $role;
    }

    public function addRole()   
    {
        
        $input = input();

        $info  =  model('Role')->addRole($input);

        return $info;
    }
    
    public function delRole(){
        
        $roleId = input('param.role_id');

        $info   =  model('Role')->delRole($roleId);
        
        return $info;
        
    }
    
    public function updateRole(){

        $input  = input();

        $info   =  model('Role')->updateRole($input);

        return $info;
        
    }


    public function roleAuth()   
    {
    
        include APP_PATH."admin/conf/menu.php";
          
        $roles = model("Role")->getSelectRoles();
        
        $this->assign("roles",$roles); 

        $this->assign("menu",$menu['admin']);	

        return $this->fetch();
    }


    public function addRoleAuth(){

        $input  = input();
        
        $info   = model("Role")->addRoleAuth($input);

        return $info;
    }

}
