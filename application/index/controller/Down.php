<?php
namespace app\index\controller;

class Down extends IndexBase
{ 

  private static $file_dir = ROOT_PATH . 'public' . DS . 'upload'. DS . 'down' .DS;

  public function index(){

	$file_full_path = self::$file_dir . 'a.jpg' ;
	$imgBase64 = $this->base64EncodeImage($file_full_path);
	$this->assign("dataImg",$imgBase64);
  	return $this->fetch();
  }

  public function testDown(){
  	$file_name      = input("param.file",''); //下载文件名    
	
	$file_full_path = self::$file_dir . $file_name ;
	//检查文件是否存在    
	if (! file_exists ( $file_full_path)) {    
	    header('HTTP/1.1 404 NOT FOUND');  
	} else {    
	    //以只读和二进制模式打开文件   
	    $file = fopen ( $file_full_path, "rb" ); 

	    //告诉浏览器这是一个文件流格式的文件    
	    Header ( "Content-type: application/octet-stream" ); 
	    //请求范围的度量单位  
	    Header ( "Accept-Ranges: bytes" );  
	    //Content-Length是指定包含于请求或响应中数据的字节长度    
	    Header ( "Accept-Length: " . filesize ( $file_full_path ) );  
	    //用来告诉浏览器，文件是可以当做附件被下载，下载后的文件名称为$file_name该变量的值。
	    Header ( "Content-Disposition: attachment; filename=" . $file_name );     
	    //读取文件内容并直接输出到浏览器    
	    echo fread ( $file, filesize ( $file_full_path ) );    
	    fclose ( $file );    
	    exit ();    
	} 

  }

    public function base64EncodeImage ($image_file) {
	  $base64_image = '';
	  $image_info = getimagesize($image_file);
	  $image_data = fread(fopen($image_file, 'r'), filesize($image_file));
	  $base64_image = 'data:' . $image_info['mime'] . ';base64,' . chunk_split(base64_encode($image_data));
	  return $base64_image;
	}

}  
