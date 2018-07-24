<?php
namespace app\admin\model;
use think\Model;

class User extends Model
{
    
    protected $pk = 'user_id';
    protected $autoWriteTimestamp = 'datetime'; //时间字段类型

    // 指定自动写入的时间戳字段名
    protected $createTime = 'user_registered';

    public  function getUserList(){
       
        $users  =   $this->alias('u')->field('u.*,r.role_name')
                    ->join('role r','r.role_id = u.user_role','LEFT')
                    ->where('u.user_status=0')
                    ->select();

        if($users) {

        	$users = collection($users)->toArray();
        }
        
        return $users;

    } 
    
    public function getUser($userId) {
        if(request()->isPost()){
        	$user  = $this->where("user_id=".$userId)->find();

	        $roles = model('Role')->getSelectRoles();

	        if($user) {

	            $user = $user->toArray();

	            return json(['code'=>1,'msg'=>'数据获取成功','data'=>$user,'roles'=>$roles]);
	            
	        }else{

	            return json(['code'=>2,'msg'=>'数据丢失','data'=>'']); 
	        }

        }else{
            
            return json(['code'=>3,'msg'=>'非法请求','data'=>'']);
        }
        

    }

    public function addUser($input){

        if(request()->isPost()) {

	        if($input['handle_type'] == 'add') {
                
                $isHaveUser = $this->where("user_login ='".$input['user_login']."'")->find();

                if(!$isHaveUser) {

                    $save = $this->allowField(true)->save($input);
                
	                if($save) {
	                	return json(['code'=>1,'msg'=>'添加成功']);

	                }else{

	                    return json(['code'=>2,'msg'=>'添加失败']);
	                }

                }else{
                    
                    return json(['code'=>3,'msg'=>'登入名已存在']);
                }

	        }else{

	            return json(['code'=>4,'msg'=>'非法数据']);

	        }

        }else {
           
            return json(['code'=>5,'msg'=>'非法请求']);
        }
		
    } 


    public function delUser($userId){
        
        $del = $this->where('user_id='.$userId.' AND user_id <> 1')->delete();
        
        if($del) {

        	return json(['code'=>1,'msg'=>'删除成功']);

        }else{
            return json(['code'=>0,'msg'=>'删除失败']);
        }

    } 

    public function updateUser($input) {

    	if(request()->isPost()) {
            if($input['handle_type'] == 'update') {
                
                $isHaveUser = $this->where("user_login='".$input['user_login']."'"." AND user_id <>".$input['user_id'])->find();
                
                if(!$isHaveUser) {
    
                    $update = $this->allowField(true)->save($input,$input['user_id']);

	            	if($update !==false) {

	            		return json(['code'=>1,'msg'=>'更新成功']);

	            	}else{

	            		return json(['code'=>2,'msg'=>'更新失败']);
	            	}

                }else{
                        return json(['code'=>3,'msg'=>'登入名已存在']);
                }
            	

            }else{

            	return json(['code'=>4,'msg'=>'非法数据']);
            }

    	}else{

    		    return json(['code'=>5,'msg'=>'非法请求']);
    	}

    }
       
}