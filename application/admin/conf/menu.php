<?php
//  各模块菜单栏以及权限配置
// +----------------------------------------------------------------------
// | Author: liu
// +----------------------------------------------------------------------
$menu = array(	
    
	"admin"=>array(
        
        array(
			'name'=>'系统管理',
	        'controller'=>'admin/System',
	        'icon'=>'fa-gear',
			'child'=>array(

				array(
					'name'=>'系统设置',

					'action'=>'admin/System/systemSetup',

	                "auth"=>array(
	                	array("name"=>'添加','action'=>"admin/System/add"),
	                	array("name"=>'删除','action'=>"admin/System/delete"),
	                	array("name"=>'编辑','action'=>"admin/System/edit"),
	                )
			    ),
	            
	            array(
					'name'=>'系统日志',

					'action'=>'admin/System/systemLog',

	                "auth"=>array(
	                	array("name"=>'添加','action'=>"admin/System/add"),
	                	array("name"=>'删除','action'=>"admin/System/delete"),
	                	array("name"=>'编辑','action'=>"admin/System/edit"),
	                )
			    ),
		    )
		   
		),

       
	    array(
			'name'=>'用户管理',
	        'controller'=>'admin/User',
	        'icon'=>'fa-user',
			'child'=>array(

				array(
					'name'=>'管理员列表',

					'action'=>'admin/User/userList',

	                "auth"=>array(
	                	array("name"=>'添加','action'=>"admin/User/add"),
	                	array("name"=>'删除','action'=>"admin/User/delete"),
	                	array("name"=>'编辑','action'=>"admin/User/edit"),
	                )
			    ),
	            
	            array(
					'name'=>'角色管理',

					'action'=>'admin/User/userRole',

	                "auth"=>array(
	                    array("name"=>'添加','action'=>"admin/User/add"),
	                	array("name"=>'删除','action'=>"admin/User/delete"),
	                	array("name"=>'编辑','action'=>"admin/User/edit"),
	                )
			    ),

			    array(
					'name'=>'权限管理',

					'action'=>'admin/User/roleAuth',

	                "auth"=>array(
	                    array("name"=>'添加','action'=>"admin/User/add"),
	                	array("name"=>'删除','action'=>"admin/User/delete"),
	                	array("name"=>'编辑','action'=>"admin/User/edit"),
	                )
			    ),
		    )
		    
		),
        
	),
	
);