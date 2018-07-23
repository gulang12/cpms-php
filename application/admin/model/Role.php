<?php
namespace app\admin\model;
use think\Model;

class Role extends Model
{
    
    protected $pk = 'role_id';

    protected $autoWriteTimestamp = 'datetime'; //时间字段类型

    // 指定自动写入的时间戳字段名
    protected $createTime = 'role_add_time';
    
    public  function getRoles(){
        
        $roles     = $this->select();

        if($roles) {

        	$roles = collection($roles)->toArray();
        }
        
        return $roles;

    } 

    public function getSelectRoles() {

        $roles = $this->where("role_id > 1")->select();

        
        $roles = collection($roles)->toArray();

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