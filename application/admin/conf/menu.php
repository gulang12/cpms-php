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
					'name'=>'首页菜单',

					'action'=>'admin/System/navMenu',

			      "auth"=>array(
			            array("name"=>'添加','action'=>"admin/System/addMenu"),
			            array("name"=>'删除','action'=>"admin/System/delMenu"),
			            array("name"=>'编辑','action'=>"admin/System/editMenu"),
			       )
			    ),

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
	                	array("name"=>'修改','action'=>"admin/User/updateUser"),
	                )
			    ),
	            
	            array(
					'name'=>'角色管理',

					'action'=>'admin/Role/roleList',

	                "auth"=>array(
	                    array("name"=>'添加','action'=>"admin/Role/addRoleAuth"),
	                	array("name"=>'删除','action'=>"admin/Role/delRole"),
	                	array("name"=>'修改','action'=>"admin/Role/updateRoleAuth"),
	                )
			    ),
			    
		    )
		    
		),


		array(
			'name'=>'文章管理',
	        'controller'=>'admin/Order',
	        'icon'=>'fa-edit',
			'child'=>array(

				array(
					'name'=>'文章列表',

					'action'=>'admin/Article/articleList',

	                "auth"=>array(
	                	array("name"=>'添加','action'=>"admin/Article/addArticle"),
	                	array("name"=>'删除','action'=>"admin/Article/delArticle"),
	                	array("name"=>'修改','action'=>"admin/Article/updateArticle"),
	                )
			    ),
	            
		    )
		    
		),

		array(
			'name'=>'即时通讯',
	        'controller'=>'socket/wechat',
	        'icon'=>'fa-wechat',
			'child'=>array(

				array(
					'name'=>'WeChat',

					'action'=>'socket/Index/index',

	                "auth"=>array()
			    ),
	            
		    )
		    
		),
        
	),
	
);