<?php
namespace app\admin\controller;

class Upload  extends AdminBase
{
   


    public function checkFileInfo() {
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');

        $info = $file->validate(['size'=>125678,'ext'=>'jpg,png,gif'])->check();  //检测上传文件信息，为了节省空间，所以并不会立即上传文件

        if(!$info) {
           
           return json(['code'=>1,'msg'=>'图片符合规定']);
        }else{

           return json(['code'=>2,'msg'=>$file->getError()]);
        }

    }


    public function upload(){

        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');

        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->validate(['size'=>15678,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'upload');

        if($info){
            // 成功上传后 获取上传信息
            // 输出 jpg
            echo $info->getExtension();
            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
            echo $info->getSaveName();
            // 输出 42a79759f284b767dfcb2a0197904287.jpg
            echo $info->getFilename(); 
        }else{
            // 上传失败获取错误信息
            echo $file->getError();
        }
    }
    
}
