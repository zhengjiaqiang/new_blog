<?php
namespace Admin\Controller;
use Think\Controller;
class FriendController extends CommonController 
{
	/**
	 * 友链管理
	 *
	 * @author BING
	 * @return void
	 */
    public function index()
    {
    	$count = M('FriendLink')->count();

        $p = I('get.p',1);                  // 当前页
        $show = $this->getPages($count);

    	$linkList = M('FriendLink')->page($p.','.C('PAGESIZE'))->select();

    	$this->assign('show', $show);
    	$this->assign('linkList', $linkList);
    	$this->display();
    }

    /**
     * 获取分页码
     *
     * @author BING
     * @return string 
     */
    public function getPages($count)
    {
        $size = C('PAGESIZE');              // 每页显示条数
        $Page       = new \Think\Page($count,$size);
        $show       = $Page->show();        // 分页显示输出
        return $show;
    }

}