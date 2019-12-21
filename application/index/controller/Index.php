<?php
namespace app\index\controller;

class Index extends IndexBase
{   

    protected  $pageNum = 20; // 分页每页显示数量
    public function index()
    {   


        $p        = input("param.p")? (int)(input("param.p")) :1;
        $pageNum  = $this->pageNum;
        $total    = db('article')->where("article_status=0")->count();
        $page     = ceil($total/$pageNum);
        $articles = db('article')->where("article_status=0")->limit(($p-1)*$pageNum,$pageNum)->order("article_add_time DESC")->select();
        
        foreach ($articles as $k => &$v) {
            $content = trim(strip_tags(htmlspecialchars_decode($v['article_content'])));
            $v['article_content'] = mb_substr($content,0,150,'utf-8')."...";
            $v['article_add_time'] = date("Y-m-d",strtotime($v['article_add_time']));
            $v['article_tags']  = db('index_menu')->field('menu_id,menu_name')->where("menu_id IN (".$v['article_category'].")")->select();

        }

        $articles = $articles ?:'';
        $this->assign("latestNews",$this->latestNews());
      
        $this->assign("tagsList",$this->getTagList());
        $this->assign("articles",$articles);
        $this->assign("page",$page);
        $this->assign("p",$p);
        return $this->fetch();
    }
    
     public function articleList($cat_id)
    {   
        
        $cat_id   = (int)$cat_id;
        $tagIds   = db('index_menu')->field('menu_id as tag_id')->where("menu_pid =".$cat_id)->select();

        $tagIds = array_column($tagIds,'tag_id');
        $length = count($tagIds);
        $likes = "";
        for($i=0;$i<$length;$i++) {
            
            if(!$likes) {
                $likes .= " AND( article_category LIKE '%".$tagIds[$i]."%'";
            }else{
                $likes .= " OR article_category LIKE '%".$tagIds[$i]."%'";
            }
            
        }
        $likes .= ")";
      
        if($cat_id >=10) {
            $p        = input("param.p")? intval(input("param.p")) :1;
            $pageNum  = $this->pageNum;
            $where    = "article_status=0 ".$likes;
            $total    = db('article')->where($where)->count();
            $page     = ceil($total/$pageNum);

            $articles = db('article')->where($where)->limit(($p-1)*$pageNum,$pageNum)->order("article_add_time DESC")->select();

            foreach ($articles as $k => &$v) {
                $content = trim(strip_tags(htmlspecialchars_decode($v['article_content'])));
                $v['article_content'] = trim(mb_substr($content,0,150,'utf-8')."...");
                $v['article_add_time'] = date("Y-m-d",strtotime($v['article_add_time']));
                $v['article_tags']  = db('index_menu')->field('menu_id,menu_name')->where("menu_id IN (".$v['article_category'].")")->select();
            }
            
            $catName    = db('index_menu')->field('menu_name,menu_pid')->where("menu_id=".$cat_id)->find();
            $parentName = db('index_menu')->field('menu_name')->where("menu_id=".$catName['menu_pid'])->find();
            $articles   = $articles ?:'';
            $this->assign("cat_id",$cat_id);
            $this->assign("articles",$articles);
            $this->assign("page",$page);
            $this->assign("p",$p);
            $this->assign("catName",$catName);
            $this->assign("parentName",$parentName);
            $this->assign("latestNews",$this->latestNews());
            $this->assign("tagsList",$this->getTagList());

        }else{
            $this->assign("page",0);
            $this->assign("articles",'');
            $this->assign("latestNews",$this->latestNews());
        }
        
        return $this->fetch();
    }

    public function tagArticleList($tag_id) {
        $tag_id   = (int)$tag_id;
        if($tag_id <=0) {
            return json(['error'=>'参数不合法']);
        }
       
        $p        = input("param.p")? intval(input("param.p")) :1;
        $pageNum  = $this->pageNum;
        
        $where    = "article_status=0 AND article_category LIKE '%".$tag_id."%'";
        
        $total    = db('article')->where($where)->count();
        $page     = ceil($total/$pageNum);
        
        $articles = db('article')->where($where)->limit(($p-1)*$pageNum,$pageNum)->order("article_add_time DESC")->select();

        foreach ($articles as $k => &$v) {
            $content = trim(strip_tags(htmlspecialchars_decode($v['article_content'])));
            $v['article_content'] = mb_substr($content,0,150,'utf-8')."...";
            $v['article_add_time'] = date("Y-m-d",strtotime($v['article_add_time']));
            $v['article_tags']  = db('index_menu')->field('menu_id,menu_name')->where("menu_id IN (".$v['article_category'].")")->select();
        }
        
        $catName    = db('index_menu')->field('menu_name,menu_pid')->where("menu_id=".$tag_id)->find();
        $parentName = db('index_menu')->field('menu_name')->where("menu_id=".$catName['menu_pid'])->find();
        $articles   = $articles ?:'';
        $this->assign("tag_id",$tag_id);
        $this->assign("articles",$articles);
        $this->assign("page",$page);
        $this->assign("p",$p);
        $this->assign("catName",$catName);
        $this->assign("parentName",$parentName);
        $this->assign("latestNews",$this->latestNews());
        $this->assign("tagsList",$this->getTagList());

        return $this->fetch();
    }

    public function articleDetail($article_id){
        $article_id = (int)$article_id;
        $article    =  db('article')->where("article_id=".$article_id)->find();
        $updateRead = db('article')->where("article_id=".$article_id)->setField("article_read_count",$article['article_read_count']+1);
        if($article){
            $article['article_content'] = htmlspecialchars_decode($article['article_content']);
            $article['article_add_time'] = date("Y-m-d",strtotime($article['article_add_time']));
            if($article['article_category']) {
               $allCats = db('index_menu')->field('menu_name,menu_id')->where("menu_id IN(".$article['article_category'].")")->select();

               $this->assign("allCats",$allCats); 
            }
            

        }else{
            $article = ''; 
        }
        $this->assign("detail",$article);
        $this->assign("latestNews",$this->latestNews());
        $this->assign("tagsList",$this->getTagList());
        return $this->fetch();
    }

    public function searchArticle($key_word){
        $key_word     = trim($key_word);
        if($key_word) {
            $p        = input("param.p")? intval(input("param.p")) :1;
            $pageNum  = $this->pageNum;
            $where    = "article_status=0 AND (article_title LIKE '%".$key_word."%' OR article_content LIKE '%".$key_word."%')";
            $total    = db('article')->where($where)->count();
            $page     = ceil($total/$pageNum);

            $articles =  db('article')->where($where)->limit(($p-1)*$pageNum,$pageNum)->order("article_add_time DESC")->select();

            foreach ($articles as $k => &$v) {
                $content = trim(strip_tags(htmlspecialchars_decode($v['article_content'])));
                $v['article_content'] = mb_substr($content,0,150,'utf-8')."...";
                $v['article_add_time'] = date("Y-m-d",strtotime($v['article_add_time']));
                $v['article_tags']  = db('index_menu')->field('menu_id,menu_name')->where("menu_id IN (".$v['article_category'].")")->select();
            }

            $articles = $articles ?:'';
            $this->assign("key_word",$key_word);
            $this->assign("articles",$articles);
            $this->assign("page",$page);
            $this->assign("p",$p);
        }else {

            $this->assign("page",0);
            $this->assign("articles",'');
        }
        $this->assign("latestNews",$this->latestNews());
        $this->assign("tagsList",$this->getTagList());
        return $this->fetch();
    }

    public function latestNews() {

        $articles = db('article')->field('article_title,article_id')->where("article_status=0")->order("article_add_time DESC")->limit(5)->select();

        return $articles;
    }

    public function getTagList(){
        $tags  = db('index_menu')->field("menu_id,menu_name")->where("menu_status=0 AND type='tag'")->select();
        
        return $tags;
    }
}
