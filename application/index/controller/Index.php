<?php
namespace app\index\controller;

class Index extends IndexBase
{   

    protected  $pageNum = 1;
    public function index()
    {   


        $p        = input("param.p")? intval(input("param.p")) :1;
        $pageNum  = $this->pageNum;
        $total    = db('article')->where("article_status=0")->count();
        $page     = ceil($total/$pageNum);
        $articles = db('article')->where("article_status=0")->limit(($p-1)*$pageNum,$pageNum)->select();
        
        $articles = $articles ? $articles : '';
        $this->assign("articles",$articles);
        $this->assign("page",$page);
        $this->assign("p",$p);
        return $this->fetch();
    }
    
     public function articleCat($cat_id)
    {   

        $p        = input("param.p")? intval(input("param.p")) :1;
        $pageNum  = $this->pageNum;
        $total    = db('article')->where("article_status=0 AND article_category LIKE '%".$cat_id."%'")->count();

        $page     = ceil($total/$pageNum);

        $articles =  db('article')->where("article_status=0 AND article_category LIKE '%".$cat_id."%'")->limit(($p-1)*$pageNum,$pageNum)->select();

        $articles = $articles ? $articles : '';
        $this->assign("articles",$articles);
        $this->assign("page",$page);
        $this->assign("p",$p);
        return $this->fetch();
    }

    public function articleDetail($article_id){

        $article =  db('article')->where("article_id=".(int)$article_id)->find();

        if($article){
            $article['article_content'] = htmlspecialchars_decode($article['article_content']);
        }else{
            $article = ''; 
        }
        
        $this->assign("detail",$article);
        return $this->fetch();
    }
}
