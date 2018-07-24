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

        if(request()->isPost()){

            $role = $this->where("role_id=".$roleId)->find();

            if($role) {
                $role = $role->toArray();

                return json(['code'=>1,"data"=>$role,'msg'=>'数据获取成功']);

            }else{
               
                return json(['code'=>2,"data"=>'','msg'=>'数据获取失败']);
            }

        }else{
            
            return json(['code'=>3,'data'=>'','msg'=>'非法请求']);
        }
    }

    public function getSelectRoles() {

        $roles = $this->where("role_id > 1")->select();
        
        $roles = collection($roles)->toArray();

        return $roles;
  
    }

    public function addRole($input){
        
        if(request()->isPost()){

            if($input['handle_type'] == 'add') {

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

    public function updateRole($input) {
      
        if(request()->isPost()) { 

            if($input['handle_type'] == 'update') {

                $isHaveRole = $this->where("role_name ='".$input['role_name']."'"." AND role_id <>".$input['role_id'])->find();

                if(!$isHaveRole) {
                    $update = $this->allowField(true)->save($input,['role_id' =>$input['role_id']]);

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


    public function addRoleAuth($input){

        if(request()->isPost()) {

            // microtime()前部分为毫秒 后半部分为秒   用前后先加 就可以获取到当前时间
            // 精确到毫秒的时间戳 多次提交表单 时间差在1秒之内就提示
            $submit_time = explode(' ', microtime());
            $submit_time = ($submit_time[0]/1000)+$submit_time[1];

            $role_id  = $input["role_id"];
            $action   = implode(",",$input['action']);

            
            // 防止表单在极短时间重复提交  （有些强迫症患者提交按钮时喜欢快速点击两次）
            if(!Session('submit_time')) {

                Session('submit_time',$submit_time);
               
                $save = $this->where('role_id='.$role_id.' AND role_id <> 1')->setField('role_auth',$action);
                
                if($save) 

                    return json(['code'=>1,'msg'=>'提交成功']);

                else

                    return json(['code'=>2,'msg'=>'提交失败']);
  
            }else{

                $session_submit_time = Session('submit_time');

                if(($submit_time - $session_submit_time) < 1)  

                    return json(['code'=>3,'msg'=>'不要重复提交表单']);
                else

                    Session('submit_time',$submit_time); // 刷新session值
                    
                    $save = $this->where('role_id='.$role_id.' AND role_id <> 1')->setField('role_auth',$action);

                    if($save) 
                    
                        return json(['code'=>1,'msg'=>'提交成功']);
                    else

                        return json(['code'=>2,'msg'=>'提交失败']);
            }
            
        }else{

            return json(['code'=>4,'msg'=>'非法请求']); 
        }
       
    }
       
}