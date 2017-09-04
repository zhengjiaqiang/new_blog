<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index()
    {
    	if(IS_POST)
    	{
    		$user = I('post.username');
    		$pwd = I('post.pwd','','md5');
    		$admInfo = D('Admin')->check($user,$pwd);
    		
    		if($admInfo)
    		{
                session('admInfo',$admInfo);
                
    			cookie('isLogined',true);
                cookie('admInfo', $admInfo);
    			$this->redirect('Index/index');
    		}
    		else
    		{
    			$this->error('账号或密码错误');
    		}

    	}
    	else
    	{
       		$this->display('login');
    	}
    }
}