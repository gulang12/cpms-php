<?php
namespace app\admin\controller;

class Article extends AdminBase
{
   
    public function articleList()   
    {
    	
        $articles =  model('article')->getArticles();
        
        $this->assign("articles",$articles);

        return $this->fetch();
    }
    
    public function publishArticle() {
       
       $type  = input("param.type",'');

       $this->assign("type",$type);

       return $this->fetch();
    }

    
    public function addArticle() {
        $input = input();
  
        $info  = model('article')->addArticle($input);

        return $info;
    }

    public function delArticle() {

    }

    public function updateArticle() {

    }
}
