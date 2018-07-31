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
    
    public function getRole($roleId){

        $role = $this->where("role_id=".$roleId)->find();

        if($role) {
            $role = $role->toArray();

            return $role;
        }else{
            
            return '';
            
        }
       
    }

    public function getSelectRoles() {

        $roles = $this->where("role_id > 1")->select();
        
        $roles = collection($roles)->toArray();

        return $roles;
  
    }

    public function addRoleAuth($input){
        
        if(request()->isPost()){

            if($input['handle_type'] == 'add') {

                $input['role_auth']   = isset($input['role_auth']) ? implode(",",$input['role_auth']) :'';

                $isHaveRole = $this->where("role_name ='".$input['role_name']."'")->find();

                if(!$isHaveRole) {

                    $save = $this->allowField(true)->save($input);

                    if($save) {
                        return json(['code'=>1,'msg'=>'添加成功']); 

                    }else{
                        return json(['code'=>2,'msg'=>'添加失败']); 
                    }

                }else{
                    
                    return json(['code'=>3,'msg'=>'角色名已存在']); 
                }
                
            }else{

               return json(['code'=>4,'msg'=>'非法数据']); 
            }

        }else{
            
               return json(['code'=>5,'msg'=>'非法请求']);
        }
    } 


    public function delRole($roleId){
        
        $del = $this->where('role_id='.$roleId.' AND role_id <> 1')->delete();

        if($del) {

            return json(['code'=>1,'msg'=>'删除成功']);

        }else{

            return json(['code'=>0,'msg'=>'删除失败']);
        }
    } 

    public function updateRoleAuth($input){
        
        if(request()->isPost()) { 

            if($input['handle_type'] == 'update') {

                $input['role_auth']   = isset($input['role_auth']) ? implode(",",$input['role_auth']) :'';
                $isHaveRole = $this->where("role_name ='".$input['role_name']."'"." AND role_id <>".$input['role_id'])->find();

                if(!$isHaveRole) {
                    
                    if($input['role_id']==1) { // 只有admin才能编辑

                        if(session("user_id")==1) {

                            $update = $this->allowField(true)->save($input,['role_id' =>$input['role_id']]);

                        }else{
                             
                            return json(['code'=>6,'msg'=>' NO！你不是超级管理员']);
                        }
                       
                    }else{
                           
                           $update = $this->allowField(true)->save($input,['role_id' =>$input['role_id']]);
                    }

                    if($update !==false) {

                        return json(['code'=>1,'msg'=>'更新成功']); 

                    }else{
                        
                        return json(['code'=>2,'msg'=>'更新失败']); 
                    }

                }else{

                    return json(['code'=>3,'msg'=>'角色名已存在']); 
                }

            }else{

                return json(['code'=>4,'msg'=>'非法数据']);  
            }

        }else{

            return json(['code'=>5,'msg'=>'非法请求']);
        }

        
    }
 
}