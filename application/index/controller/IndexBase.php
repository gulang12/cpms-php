<?php
// +----------------------------------------------------------------------
// | des: index应用模块的基类
// +----------------------------------------------------------------------
// | Author: liu <1226740471@qq.com>
// +----------------------------------------------------------------------
namespace app\index\controller;

use think\Controller;

class IndexBase extends Controller
{
    
    public function __construct()
    {
       parent::__construct();
       
       // do something...

       // echo "this is a index base controller";

    }
    
    /**
     * 初始化操作
     */
    public function _initialize()
    {
        
        error_reporting(E_ALL ^ E_NOTICE); // 屏蔽模板输出不存在的变量时的错误提示信息
        
        $category   =  $this->getArticleCategory(); // 调用子类的方法
        $other      =  array_pop($category);
        $active_cat =  intval(input("param.cat_id"))?:'';

        if(!$_SERVER['QUERY_STRING']) { // 判断是否显示首页
            $active_cat = 'index';
        }
        $this->assign("active_cat",$active_cat);
        $this->assign("category",$category);
        $this->assign("other",$other);
    	
    }

    public function getArticleCategory(){
        $cat  = db('index_menu')->field("menu_id,menu_name,menu_pid")->where('menu_status=0')->order('menu_sort asc')->select();
        $cat  = collection($cat)->toArray();
        
        $treeCat   = [];
        foreach ($cat as $k => $v) {

            if($v['menu_pid'] ==0) {
                $treeCat[$v['menu_id']]['parent_name']  = $v['menu_name'];
                $menu_id      = $v['menu_id'];
                unset($cat[$k]);
                foreach ($cat as $k2 => &$v2) {
                    if($v2['menu_pid'] == $v['menu_id'] ) {

                        $treeCat[$v['menu_id']]['children'][] = $v2;
                        $treeCat[$v['menu_id']]['children_ids'][] = $v2['menu_id'];
                    }
                }
            }
        }
        return $treeCat;
    }
}
