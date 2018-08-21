<?php
namespace app\admin\controller;

class Article extends AdminBase
{

    public function articleList()   
    {
    	
        $data =  model('article')->getArticles(20);
        
        $this->assign("articles",$data['data']);
        $this->assign("per_page_nun",$data['per_page_nun']);
        $this->assign("total",$data['total']);

        return $this->fetch();
    }

    public function ajax_get_articleList() {
        // print_r(input());exit;
        $data =  model('article')->getArticles();

        return json($data);

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
