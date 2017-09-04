<?php
namespace Home\Controller;
use Think\Controller;
class CatController extends Controller
{
    public function index()
    {
    	$catId = I('get.cid');
        $p = I('get.p',1);

        // 查询分类导航
        $catList = D('Cat')->getNavigation();

        // 友情链接
        $linkList = M('FriendLink')->order('sort DESC')->select();

        $where = array('cat_id'=>$catId);
        // 获取分页
        $count = M('Article')->where($where)->count();
        $show = $this->getPages($count);

        // 查询该分类下最新文章
        $artList = M('Article')->where($where)->order('add_time DESC')->page($p.',2')->select();

        // 查询推荐文章
        $comList = D('Article')->getTop('is_red',9);

        // 查询热门文章
        $hotArt = D('Article')->getTop('is_hot',9);

        $this->assign('show', $show);
        $this->assign('linkList', $linkList);
        $this->assign('artList', $artList);
        $this->assign('hotArt', $hotArt);
        $this->assign('comList', $comList);        
    	$this->assign('catList', $catList);    	
    	$this->display('list');
    }


    /**
     * 获取分页码
     *
     * @author BING
     * @return string 
     */
    public function getPages($count)
    {
        $size =     2;              // 每页显示条数
        $Page       = new \Think\Page($count,$size);
        $show       = $Page->show();        // 分页显示输出
        return $show;
    }

}