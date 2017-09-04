<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller 
{

    public function __construct()
    {
        parent::__construct();

        // 验证是否登录
        $isLogined = cookie('isLogined');
        if(!isset($isLogined))
        {
        	$this->redirect('Login/index', '', 1, '请先登录...');
        }
        // 验证是否拥有权限
        
    }
}