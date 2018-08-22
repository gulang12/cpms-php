/**
* @param len  生成字符串长度 

**/
function createRandomStr(len){
	var len = len || 10;
    var str = '0123456789qazwsxedcrfvtgbyhnujmiklopQAZWSXEDCRFVTGBYHUJNIKMIOPLK'; 
    var random = "";
    for (var i =0; i < len; i++) {
    	
    	random+= str[Math.ceil(Math.random()*62)];
    }
    
    return random;
} 

/**
* des:刷新表单数据
* @param form_name  表单ID
**/
function refresh_form(form_name){

    $('#'+form_name)[0].reset();
}

/**
  des:自定义ajax分页功能，动态刷新分页代码
  @param page  总页数
  @param p     页码
  @param rand  默认显示页数

  author:liu zai chun 
**/

function ajax_pagination(page,p,rand=6) {
    var  pageHtml = '',disabled ="",prev_page='',next_page = "";

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

        	for(var i = (p - Math.ceil(rand/2)); i <= (p + Math.ceil(rand/2));i++) {

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

    return pageHtml;

}

