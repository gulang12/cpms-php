/**
  JQuery 插件开发
  des:1.简单的分页插件，动态加载分页代码(不会一次性加载所有分页代码)
  2.本插件主要用于ajax分页，可以通过ajax_onClick（）这个回调函数向服务器发送ajax请求，服务器必须要返回总页码数
  3.本插件也可以实现跳转分页
  author:liu zai chun 
  Email:1226740471@qq.com 
**/
;(function($, window, document, undefined) {
    
    var defaults = {
    	totalPage  : null,  // 总页数
        current_p  : null,  // 当前页数
        random_num : 6,     // 默认显示页码数量
        isAjax     : true,  // 是否开启ajax分页
        http_url   : '',    // 跳转链接
        url_param  : '',    // 跳转链接的参数 不包括url?p部分
        callback   : {
            ajax_onClick : null,
        }
    },

    _creatAjaxPageDom = function(page,p){
        var  pageHtml = '',disabled ="",prev_page='',next_page = "",rand = defaults.random_num;
        
	    pageHtml+="<ul>";
	    if(p == 1) {
	   	   disabled = "disabled";
	    }else if( p > 1) {
	       prev_page = p - 1;
	    }

	    pageHtml+="<li><a href='javascript:;' data-page='1' class='"+disabled+"'>首页</a></li>";
	    pageHtml+="<li class='prev_page'><a href='javascript:;' data-page='"+prev_page+"' class='"+disabled+"'>上一页</a></li>";

	    if(page <= rand) {
	    	for(var i=1;i<=page;i++){

	    		if(i==p) {
	    			pageHtml+="<li><a href='javascript:;' data-page='"+i+"' class='current_page disabled'>"+i+"</a></li>";
	    		}else{
	                pageHtml+="<li><a href='javascript:;' data-page='"+i+"'>"+i+"</a></li>";
	    		}
	    	}

	    }else if(page > rand){
	          
	        if(p < rand) {
	        	for (var i = 1; i <= rand; i++) {
	        		if(i==p) {
	        			pageHtml+="<li><a href='javascript:;' data-page='"+i+"' class='current_page disabled'>"+i+"</a></li>";
	        		}else{
	        			pageHtml+="<li><a href='javascript:;' data-page='"+i+"'>"+i+"</a></li>";
	        		}
	        	}
	        }else if(p >=(page - Math.ceil((rand / 2)))) {

	            for(var i = page - rand;i<=page;i++) {

	                if(i==p) {
	        			pageHtml+="<li><a href='javascript:;' data-page='"+i+"' class='current_page disabled'>"+i+"</a></li>";
	        		}else{
	        			pageHtml+="<li><a href='javascript:;' data-page='"+i+"'>"+i+"</a></li>";
	        		}  
	            }
	        }else if(p >= rand && p < (page - Math.ceil((rand / 2)))) {

	        	for(var i = (p - Math.ceil(rand/2))+1; i < (p + Math.ceil(rand/2));i++) {

	                if(i==p) {
	        			pageHtml+="<li><a href='javascript:;' data-page='"+i+"' class='current_page disabled'>"+i+"</a></li>";
	        		}else{
	        			pageHtml+="<li><a href='javascript:;' data-page='"+i+"'>"+i+"</a></li>";
	        		}  
	            }

	        }
	 
	    }

	    if(p == page) {
	   	   disabled = "disabled";
	    }else if( p < page) {
	       next_page = p + 1;
	       disabled  = "";
	    }

	    pageHtml+="<li class='next_page'><a href='javascript:;' data-page='"+next_page+"' class='"+disabled+"'>下一页</a></li>";
	    pageHtml+="<li class='prev_page'><a href='javascript:;' data-page='"+page+"' class='"+disabled+"'>尾页</a></li>";

	    pageHtml+="<span class='pageCount' data-pagecount='"+page+"'>共"+page+"页<span>";
	    
	   
        defaults.obj.empty().append(pageHtml);

    },
    _creatUrlPageDom = function(page,p){
        var  pageHtml = '',disabled ="",prev_page='',next_page = "",rand = defaults.random_num,href = defaults.http_url,param = defaults.url_param;
        p = parseInt(p);
	    pageHtml+="<ul>";
	    if(p == 1) {
	   	   disabled = "disabled";
	    }else if( p > 1) {
	       prev_page = p - 1;
	    }

	    pageHtml+="<li><a href='"+href+"?p=1"+param+"' data-page='1' class='"+disabled+"'>首页</a></li>";
	    pageHtml+="<li class='prev_page'><a href='"+href+"?p="+prev_page+param+"' data-page='"+prev_page+"' class='"+disabled+"'>上一页</a></li>";

	    if(page <= rand) {
	    	for(var i=1;i<=page;i++){

	    		if(i==p) {
	    			pageHtml+="<li><a href='"+href+"?p="+i+param+"' data-page='"+i+"' class='current_page disabled'>"+i+"</a></li>";
	    		}else{
	                pageHtml+="<li><a href='"+href+"?p="+i+param+"' data-page='"+i+"'>"+i+"</a></li>";
	    		}
	    	}

	    }else if(page > rand){
	         
	        if(p < rand) {
	        	for (var i = 1; i <= rand; i++) {
	        		if(i==p) {
	        			pageHtml+="<li><a href='"+href+"?p="+i+param+"' data-page='"+i+"' class='current_page disabled'>"+i+"</a></li>";
	        		}else{
	        			pageHtml+="<li><a href='"+href+"?p="+i+param+"' data-page='"+i+"'>"+i+"</a></li>";
	        		}
	        	}
	        }else if(p >=(page - Math.ceil((rand / 2)))) {
	            for(var i = page - rand;i<=page;i++) {

	                if(i==p) {
	        			pageHtml+="<li><a href='"+href+"?p="+i+param+"' data-page='"+i+"' class='current_page disabled'>"+i+"</a></li>";
	        		}else{
	        			pageHtml+="<li><a href='"+href+"?p="+i+param+"' data-page='"+i+"'>"+i+"</a></li>";
	        		}  
	            }
	        }else if(p >= rand && p < (page - Math.ceil((rand / 2)))) {
	        	
	        	for(var i = parseInt(p - Math.ceil(rand/2)); i <= parseInt((p + Math.ceil(rand/2)));i++) {

	                if(i==p) {
	        			pageHtml+="<li><a href='"+href+"?p="+i+param+"' data-page='"+i+"' class='current_page disabled'>"+i+"</a></li>";
	        		}else{
	        			pageHtml+="<li><a href='"+href+"?p="+i+param+"' data-page='"+i+"'>"+i+"</a></li>";
	        		}  
	            }

	        }
	 
	    }

	    if(p == page) {
	   	   disabled = "disabled";
	    }else if( p < page) {
	       next_page = p + 1;
	       disabled  = "";
	    }

	    pageHtml+="<li class='next_page'><a href='"+href+"?p="+next_page+param+"' data-page='"+next_page+"' class='"+disabled+"'>下一页</a></li>";
	    pageHtml+="<li class='prev_page'><a href='"+href+"?p="+page+param+"' data-page='"+page+"' class='"+disabled+"'>尾页</a></li>";

	    pageHtml+="<span class='pageCount' data-pagecount='"+page+"'>共"+page+"页<span>";
	    
	   
        defaults.obj.empty().append(pageHtml);

    },

    _bindEvent = function(){

    	var b = defaults.obj;

        if(defaults.isAjax) {

        	b.on("click",'a',function(){
        		var _that = this;

                defaults.callback.ajax_onClick(_that,_resetPageDom);

        	});
        }
    	
    },
    _resetPageDom = function(page,p){
    	
        defaults.totalPage = page;
        defaults.current_p = p;
        _creatAjaxPageDom(page,p);
    }

    ;$.fn.ajaxPagination = {

    	init : function(obj,settiing){

            $.extend(defaults,settiing); // 合并参数
            
            defaults.obj = obj;
            
            if(defaults.isAjax) {

            	_creatAjaxPageDom(defaults.totalPage,defaults.current_p);

            }else{

                _creatUrlPageDom(defaults.totalPage,defaults.current_p);
            }

            _bindEvent();
    	}
    }
   

	////**** 简单的插件格式****//
    // $.fn.ajaxPagination = function(options){
        
    //     var defaults = {
    //         totalPage:1,
    //         current_p :1
    //     }
    
    //     var options = $.extend(defaults,options);
        
    //     this.each(function(){
            
    //         console.log(this);
    //     });

    //     return this;
    // }

})(jQuery, window, document);