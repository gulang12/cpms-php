<?php
namespace app\admin\model;
use think\Model;

class Role extends Model
{
    
    protected $pk = 'role_id';
    
    public  function getRoles(){
        // $users = $this->where('user_status=0 and user_login="admin123"')->select(); // 多条件查询

        $roles     = $this->select();

        if($roles) {

        	$roles = collection($roles)->toArray();
        }
        
        return $roles;

    } 

    public function addRole($input){
        

		$save = $this->allowField(true)->save($input);

		return $save;

          // to do
    } 


    public function delRole($roleId){
        
        $del = $this->where('role_id='.$roleId)->delete();

        return $del;
          // to do
    } 

    public function updateRole($input,$roleId) {

    	$update = $this->allowField(true)->save($input,['role_id' =>$roleId]);

    	return $update;
    }
       
}