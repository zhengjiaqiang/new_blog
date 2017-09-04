<?php
namespace Admin\Controller;
use Think\Controller;
class SysController extends CommonController 
{
    public function config()
    {
    	$configList = M('Config')->select();
    	$config = array();

    	foreach ($configList as $key => $value)
    	{
    		$config[$value['cfg_name']] = $value['cfg_value'];
    	}
    	// p($config);
    	$this->assign('config', $config);
       	$this->display();
    }
}