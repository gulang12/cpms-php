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

				// array(
				// 	'name'=>'系统设置',

				// 	'action'=>'admin/System/systemSetup',

			   //    "auth"=>array(
			   //          array("name"=>'添加','action'=>"admin/System/add"),
			   //          array("name"=>'删除','action'=>"admin/System/delete"),
			   //          array("name"=>'编辑','action'=>"admin/System/edit"),
			   //     )
			   //  ),
	            
	            array(
					'name'=>'系统日志',

					'action'=>'admin/System/systemLog',

	                "auth"=>array(
	                	array("name"=>'添加','action'=>"admin/System/addLog"),
	                	array("name"=>'删除','action'=>"admin/System/delLog")
	                )
			    ),

			    array(
					'name'=>'字体图标1',

					'action'=>'admin/System/fontIcon',

	                "auth"=>array(
	                )
			    ),

			    array(
					'name'=>'字体图标2',

					'action'=>'admin/System/glyphIcon',

	                "auth"=>array(
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
	                	array("name"=>'添加','action'=>"admin/User/addUser"),
	                	array("name"=>'删除','action'=>"admin/User/delUser"),
	                	array("name"=>'编辑','action'=>"admin/User/updateUser"),
	                )
			    ),
	            
	            array(
					'name'=>'角色管理',

					'action'=>'admin/Role/roleList',

	                "auth"=>array(
	                    array("name"=>'添加','action'=>"admin/Role/addRole"),
	                	array("name"=>'删除','action'=>"admin/Role/delRole"),
	                	array("name"=>'编辑','action'=>"admin/Role/updateRole"),
	                )
			    ),

			    array(
					'name'=>'权限管理',

					'action'=>'admin/Role/roleAuth',

	                "auth"=>array(
	                    array("name"=>'添加','action'=>"admin/Role/addRoleAuth")
	                )
			    ),
		    )
		    
		),


		array(
			'name'=>'订单管理',
	        'controller'=>'admin/Order',
	        'icon'=>'fa-balance-scale',
			'child'=>array(

				array(
					'name'=>'订单列表',

					'action'=>'admin/Order/orderList',

	                "auth"=>array(
	                	array("name"=>'添加','action'=>"admin/Order/add"),
	                	array("name"=>'删除','action'=>"admin/Order/delete"),
	                	array("name"=>'编辑','action'=>"admin/Order/edit"),
	                )
			    ),
	            
		    )
		    
		),
        
	),
	
);