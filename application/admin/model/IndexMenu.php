<?php
namespace app\admin\model;
use think\Model;
use app\common\util\PasswordHash;
class IndexMenu extends Model
{
    
    protected $pk = 'menu_id';
    
    public function getMenu($menuId) {

        $topMenus = $this->where("menu_pid=0 AND menu_status=0")->select();

        $topMenus = collection($topMenus)->toArray();
        $menu = $this->where("menu_pid=".$menuId." AND menu_status=0")->find();
        
        $menu = $menu->toArray();

        return json(['topMenu'=>$topMenus,'menu'=>$menu]);

    }
    
    public function getTopMenus() {

        if(request()->isPost()){
        	$menus  = $this->where("menu_pid=0 AND menu_status=0")->select();
            
	        if($menus) {

	            $menus = collection($menus)->toArray();

	            return json(['code'=>1,'msg'=>'数据获取成功','data'=>$menus]);
	            
	        }else{

	            return json(['code'=>2,'msg'=>'数据丢失','data'=>'']); 
	        }

        }else{
            
            return json(['code'=>3,'msg'=>'非法请求','data'=>'']);
        }
        

    }

    public function addMenu($input){

        if(request()->isPost()) {

	        if($input['handle_type'] == 'add') {

                $save = $this->allowField(true)->save($input);
                
                if($save) {

                    return json(['code'=>1,'msg'=>'添加成功']);

                }else{

                    return json(['code'=>2,'msg'=>'添加失败']);
                }
                
	        }else{

	            return json(['code'=>4,'msg'=>'非法数据']);

	        }

        }else {
           
            return json(['code'=>5,'msg'=>'非法请求']);
        }
		
    } 


    public function delMenu($menuId){
        
        $del = $this->update(['menu_id' => $menuId, 'menu_status' =>1]);
        
        if($del) {

        	return json(['code'=>1,'msg'=>'删除成功']);

        }else{
            return json(['code'=>0,'msg'=>'删除失败']);
        }

    } 

    public function editMenu($input) {

    	if(request()->isPost()) {
            if($input['handle_type'] == 'update') {
                

            }else{

            	return json(['code'=>4,'msg'=>'非法数据']);
            }

    	}else{

    		    return json(['code'=>5,'msg'=>'非法请求']);
    	}

    }

    public function getAllmenus(){
        $menus  = $this->where('menu_status=0')->select();
        $menus  = collection($menus)->toArray();
        
        $menus  = $this->getMenuTree($menus);
        return $menus;
    }

    public function getMenuTree($data){
        $treeMenu   = [];
        $parentMenu = [];
        foreach ($data as $k => &$v) {

            if($v['menu_pid'] ==0) {
                $parentMenu[] = $v;
               
                unset($data[$k]);
            }
        }
        
        foreach ($parentMenu as $k1 => &$v1) {
            
            $v1['level'] = '';

            array_push($treeMenu, $v1);

            foreach ($data as $k2 => &$v2) {
                if($v2['menu_pid'] ==$v1['menu_id'] ) {
                     $v2['level'] = str_repeat('--',2);
                
                   array_push($treeMenu, $v2); 
                }
                 
            }
        }

        return $treeMenu;
    }
       
}