<?php
namespace app\admin\controller;

class Article extends AdminBase
{

    public function articleList()   
    {
    	
        $data =  model('article')->getArticles(10);
        
        $this->assign("data",$data['data']);
        $this->assign("page",$data['page']);
        $this->assign("keywords",input('param.keywords',''));
        return $this->fetch();
    }


    public function publishArticle() {
       
        $type  = input("param.type",'');
       
        if($type=='update') {
           
            $article =  model('article')->getArticle(input("param.article_id",''));
            $article['article_content'] = htmlspecialchars_decode($article['article_content']);
            $this->assign("article",$article);
        }
       

        $this->assign("type",$type);

        return $this->fetch();
    }

    
    public function addArticle() {
        $input = input();
  
        $info  = model('article')->addArticle($input);

        return $info;
    }

    public function delArticle() {
       $article_id = input("param.article_id");

       $info  = model('article')->delArticle($article_id);

        return $info;

    }

    public function updateArticle() {
        
        $input = input();
  
        $info  = model('article')->updateArticle($input);

        return $info;
    }
}
