<?php
namespace app\admin\model;
use think\Model;

class User extends Model
{
    
    protected $pk = 'user_id';
    
    public  function getUsers(){
        // $users = $this->where('user_status=0 and user_login="admin123"')->select(); // 多条件查询

       
        $users  =   $this->alias('u')->field('u.*,r.role_name')
                    ->join('role r','r.role_id = u.user_role','LEFT')
                    ->where('u.user_status=0')
                    ->select();
                    
        if($users) {

        	$users = collection($users)->toArray();
        }
        
        return $users;

    } 

    public function addUser($input){
        

		$save = $this->allowField(true)->save($input);

		return $save;

          // to do
    } 


    public function delUser($userId){
        
        $del = $this->where('user_id='.$userId)->delete();

        return $del;
          // to do
    } 

    public function updateUser($input,$userId) {

    	$update = $this->allowField(true)->save($input,['user_id' =>$userId]);

    	return $update;
    }
       
}