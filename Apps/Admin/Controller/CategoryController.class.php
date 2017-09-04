<?php
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends CommonController 
{
	/**
	 * 分类管理
	 *
	 * @author BING
	 * @return void
	 */
    public function index()
    {
        $catList = M('Category')->select();
        foreach ($catList as $key => $value)
        {
            $count = M('Article')->where(array('cat_id'=>$value['cat_id']))->count();
            $catList[$key]['count'] = $count;
        }

        $this->assign('catList', $catList);
        $this->display();
    }

    /**
     * 分类添加
     *
     * @author BING
     */
    public function add()
    {
        if(IS_POST)
        {
            // 接收数据并入库
            
            $data = I('post.');
            $result = M('Category')->add($data);
            if($result)
            {
                $this->success('分类添加成功',U('Category/index'));
            }
            else
            {
                $this->error('分类添加失败');
            }
        }
        else
        {
            $this->display();
        }
    }

    /**
     * 分类修改
     *
     * @author BING
     * @return void
     */
    public function editor()
    {
        if(IS_POST)
        {
            $catId = I('post.catId');
            $data = I('post.');
            $result = M('Category')->where("cat_id='$catId'")->save($data);
            if($result === false)
            {
                $this->error('分类修改失败');
            }
            else
            {
                $this->success('分类修改成功',U('Category/index'));
            }
        }
        else
        {
            $catId = I('get.catId');
            $catInfo = M('Category')->where(array('cat_id'=>$catId))->find();
            $this->assign('catInfo',$catInfo);
            $this->display();            
        }
    }

    /**
     * 分类删除
     *
     * @author BING
     * @return integle
     */
    function delete()
    {
        $aid = I('get.aid');
        // 验证该分类下是否有文章
        $artCount = M('Article')->where("cat_id='$aid'")->count();
        if($artCount > 0)
        {
            echo 2;exit;
        }

        $result = M('Category')->where("cat_id='$aid'")->delete();
        if($result)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }
}