<?php
// +----------------------------------------------------------------------
// | des: 第三方登录类
// +----------------------------------------------------------------------
// | Author: liu <1226740471@qq.com>
// +----------------------------------------------------------------------
namespace app\api\controller;

/**
*
* url 访问驼峰的控制器 
*  http: //domain / api/ third_login/getWechatLoginAuthorCode
*/
class ThirdLogin
{   
    

    // 微信用户进入授权页面确认授权回调地址 获取code
    public function getWechatLoginAuthorCode() {
        

        echo "codeee";
    }


    public function wechatLogin() {
        echo "login";
    }

    // 微信用户进入授权页面 回调网址设置为http://your domain/third_login/getWechatLoginAuthorCode
    public function getAuthorizeUrl () {
        $appid = "liuzaichun.cn"; // 微信登录唯一标识
        $scope = "snsapi_login";

        $redirect_uri = urlencode("http://liuzaichun.cn/third_login/getWechatLoginAuthorCode") ;

        $authorize_url = 'https://open.weixin.qq.com/connect/qrconnect?appid='.$appid.'&redirect_uri='.$redirect_uri.'&response_type=code&scope='.$scope.'#wechat_redirect';
        return $authorize_url;
    }
}
