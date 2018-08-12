<?php
namespace app\admin\model;
use think\Model;
use app\admin\controller\Upload;
class Article extends Model
{
    
    protected $pk = 'article_id';

    protected $autoWriteTimestamp = 'datetime'; //时间字段类型

    // 指定自动写入的时间戳字段名
    protected $createTime = 'article_add_time';
    
    public  function getArticles(){
        
        $articles     = $this->select();

        if($articles) {

        	$articles = collection($articles)->toArray();
        }
        
        return $articles;

    } 
    
    public function getArticle($articleId){

        $article = $this->where("article_id=".$articleId)->find();

        if($article) {
            $article = $article->toArray();

            return $article;
        }else{
            
            return '';
            
        }
       
    }

    public function addArticle($input){
        
        if(request()->isPost()){

            if($input['handle_type'] == 'add') {

                $upload = new Upload();

                if($_FILES['file']['name']) {
                    $article_poster_url = $upload->uploadFile('article');

                    $input['article_poster'] = $article_poster_url;
                }
                
                $input['article_author']  = getLoginUserInfo('user_id');
                $input['article_content'] = htmlspecialchars($input['article_content']);

                $save = $this->allowField(true)->save($input);
                
                if($save) {
                    return json(['code'=>1,'msg'=>'保存成功']);

                }else{

                    return json(['code'=>2,'msg'=>'保存失败']);
                }
                
            }else{

               return json(['code'=>4,'msg'=>'非法数据']); 
            }

        }else{
            
               return json(['code'=>5,'msg'=>'非法请求']);
        }
    } 


    public function delArticle($articleId){
        
        $del = $this->where('article_id='.$articleId)->delete();

        if($del) {

            return json(['code'=>1,'msg'=>'删除成功']);

        }else{

            return json(['code'=>0,'msg'=>'删除失败']);
        }
    } 

    public function updateArticle($input){
        
        if(request()->isPost()) { 
            
            if($input['handle_type'] == 'update') {

                
                
            }else{

               return json(['code'=>4,'msg'=>'非法数据']); 
            }
           
        }else{

            return json(['code'=>5,'msg'=>'非法请求']);
        }

        
    }
 
}