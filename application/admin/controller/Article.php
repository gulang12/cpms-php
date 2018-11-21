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
       
        $type      = input("param.type",'');
        $category  =  $this->getArticleCategory();
        if($type=='update') {
           
            $article =  model('article')->getArticle(input("param.article_id",''));
            $article['article_content']  = htmlspecialchars_decode($article['article_content']);
            $article['article_category'] = explode(",", $article['article_category']);
            $this->assign("article",$article);
            $this->assign("article_category",$article['article_category']);
        }else{

            $this->assign("article_category",[]);
        }
        
        $this->assign("category",$category);

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


    public function getArticleCategory(){
        $cat  = db('index_menu')->field("menu_id,menu_name,menu_pid")->where('menu_status=0')->select();
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
                    }
                }
            }
        }

        return $treeCat;
    }
}
