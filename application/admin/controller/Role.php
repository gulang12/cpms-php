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

    public function addRoleAuth()   
    {
        
        $input = input();

        $info  =  model('Role')->addRoleAuth($input);

        return $info;
    }
    
    public function delRole(){
        
        $roleId = input('param.role_id');

        $info   =  model('Role')->delRole($roleId);
        
        return $info;
        
    }


    public function roleAuth()   
    {
    
        include APP_PATH."admin/conf/menu.php";
          
        $input   = input("param.type",'');
        $role_id = input("param.role_id",'');
        $action  = array(); 
        if($input=='add') {

            $type = 'add';

        }elseif($input=='update'){

            $type = 'update'; 

            $roleInfo = model('Role')->getRole($role_id);
            $action   = explode(',', $roleInfo['role_auth']);
            $this->assign("roleInfo",$roleInfo);
            
        }
        
        $this->assign("action",$action);
        $this->assign("type",$type);
        $this->assign("menu",$menu['admin']);	

        return $this->fetch();
    }


    public function updateRoleAuth(){

        $input  = input();

        $info   = model("Role")->updateRoleAuth($input);

        return $info;
    }

}
