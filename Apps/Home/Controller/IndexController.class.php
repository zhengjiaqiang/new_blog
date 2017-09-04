<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index()
    {
        // 获取系统设置
        $cfgList = M('Config')->select();

        $config = array();
        foreach ($cfgList as $key => $value)
        {
            $config[$value['cfg_name']] = $value['cfg_value'];
        }

    	// 分类导航
        $catList = D('Cat')->getNavigation();

    	// 友情链接
    	$linkList = M('FriendLink')->order('sort DESC')->select();

        // 查询博文
        $artList = D('Article')->getTop('is_new');

        // 查询推荐文章
        $comList = D('Article')->getTop('is_red',9);

        // 查询热门文章
        $hotArt = D('Article')->getTop('is_hot',9);


        $this->assign('config', $config);
        $this->assign('hotArt', $hotArt);
        $this->assign('comList', $comList);
        $this->assign('artList', $artList);
    	$this->assign('linkList', $linkList);
    	$this->assign('catList', $catList);
    	$this->display();
    }


}