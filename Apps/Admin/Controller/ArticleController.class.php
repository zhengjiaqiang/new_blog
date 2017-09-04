<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends CommonController 
{
	/**
	 * 博文管理
	 *
	 * @author BING
	 * @return void
	 */
    public function index()
    {
        // 接收搜索条件
        $cat_id = I('get.cat_id',0);
        $title = I('get.title','','trim');
        $map['is_delete'] = 0;  // 查询非回收站的博文
        if($cat_id)
        {
            $map['a.cat_id'] = array('eq',$cat_id);
        }

        if(!empty($title))
        {
            $map['title'] = array('like',"%$title%");
        }

        $count = M('Article a')->where($map)->count();

        $p = I('get.p',1);                  // 当前页
        $show = $this->getPages($count);

        $artList = M('Article a')->join('blog_category c ON a.cat_id=c.cat_id')->page($p.','.C('PAGESIZE'))->where($map)->order('art_id DESC')->select();

        // 读取所有博文分类
        $catList = M('Category')->select();

        $this->assign('title', $title);
        $this->assign('cat_id', $cat_id);
        $this->assign('show', $show);
        $this->assign('catList', $catList);
        $this->assign('artList', $artList);
        $this->display();
    }

    /**
     * 博文添加
     *
     * @author BING
     */
    public function add()
    {
        if(IS_POST)
        {
            $artData = I('post.');
            $artData['content'] = I('post.content','','stripslashes');
            $artData['add_time'] = time();
            $result = M('Article')->add($artData);
            if($result)
            {
                $this->success('博文发布成功',U('Article/index'));
            }
            else
            {
                $this->error('博文发布失败');
            }
        }
        else
        {
            $catList = M('Category')->select();
            $this->assign('catList', $catList);
            $this->display();
        }
    }

    /**
     * 删除博文
     *
     * @author BING
     * @return void
     */
    public function delete()
    {
        $artId = I('get.art_id');
        $res = M('Article')->where(array('art_id'=>$artId))->delete();
        
        // 定义一个返回数据
        // status 1:成功；0：失败；
        $result = array('status'=>0,'err_msg'=>'');
        if($res)
        {
           $result['status'] = 1;
        }
        else
        {
           $result['err_msg'] = '删除失败！';
        }
        // exit(json_encode($result));
        $this->ajaxReturn($result);
    }

    /**
     * 回收站列表
     *
     * @author BING
     * @return void
     */
    public function recoverList()
    {
        // 接收搜索条件
        $cat_id = I('get.cat_id',0);
        $title = I('get.title','','trim');
        $map['is_delete'] = 1;  // 查询回收站的博文
        if($cat_id)
        {
            $map['a.cat_id'] = array('eq',$cat_id);
        }

        if(!empty($title))
        {
            $map['title'] = array('like',"%$title%");
        }

        $count = M('Article a')->where($map)->count();

        $p = I('get.p',1);                  // 当前页
        $show = $this->getPages($count);

        $artList = M('Article a')->join('blog_category c ON a.cat_id=c.cat_id')->page($p.','.C('PAGESIZE'))->where($map)->order('art_id DESC')->select();

        // 读取所有博文分类
        $catList = M('Category')->select();

        $this->assign('title', $title);
        $this->assign('cat_id', $cat_id);
        $this->assign('show', $show);
        $this->assign('catList', $catList);
        $this->assign('artList', $artList);
        $this->display('recoverList');
    }


    /**
     * 删除到回收站
     *
     * @author BING
     * @return JSON
     */
    public function recover()
    {
        $artId = I('get.art_id');

        $res = M('Article')->where(array('art_id'=>$artId))->save(array('is_delete'=>1));
        // 定义一个返回数据
        // status 1:成功；0：失败；
        $result = array('status'=>0,'err_msg'=>'');

        if($res)
        {
           $result['status'] = 1;
        }
        else
        {
           $result['err_msg'] = '删除失败！';
        }
        $this->ajaxReturn($result);
        

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