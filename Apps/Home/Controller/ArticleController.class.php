<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends Controller 
{
    public function show()
    {
    	$aid = I('get.aid');
        // 阅读量+1
        M('Article')->where(array('art_id'=>$aid))->setInc('read_num');
    	$artInfo = M('Article')->where(array('art_id'=>$aid))->find();

    	$catInfo = M('Category')->field('cat_id,cat_name')->where(array('cat_id'=>$artInfo['cat_id']))->find();

        // 查询分类导航
        $catList = D('Cat')->getNavigation();

        // 友情链接
        $linkList = M('FriendLink')->order('sort DESC')->select();

        // 查询推荐文章
        $recomList = D('Article')->getTop('is_red',9);

        // 查询热门文章
        $hotArt = D('Article')->getTop('is_hot',9);

        // 查询评论
        $comList = M('Comment')->where(array('art_id'=>$aid))->order("add_time DESC")->select();
        // p($comList);
        foreach ($comList as $key => $value)
        {
            $comList[$key]['reply'] = M('Reply')->where("comm_id='$value[comm_id]'")->select();
        }
    // p($comList);

        $this->assign('comList', $comList);
        $this->assign('catInfo', $catInfo);
    	$this->assign('catList', $catList);   
        $this->assign('linkList', $linkList);
        $this->assign('hotArt', $hotArt);
        $this->assign('recomList', $recomList);   
    	$this->assign('artInfo', $artInfo);
    	$this->display();
    }


    /**
     * 点赞
     *
     * @author BING
     * @return json
     */
    public function clickNum()
    {
        $artId = I('get.art_id');
        $where = "art_id='$artId'";

        // 查询该 IP 下有没有点赞记录
        $ip = get_client_ip();
        $logData = array('ip'=>$ip,'art_id'=>$artId);
        $clickLog = M('ClickLog')->where($logData)->find();

        $result = array('msg'=>'','error'=>0,'num'=>0);
        // error 0:错误 1：成功 
        
        if($clickLog)
        {
            $result['msg'] = '您已经点过了';
            $this->ajaxReturn($result);
        }

        // 点赞量增加+1
        $res = M('Article')->where($where)->setInc('click_num');
        // 记录IP
        M('ClickLog')->add($logData);

        if($res)
        {
            // 点赞总数返回给前台
            $clickNum = M('Article')->where($where)->getField("click_num");
            $result['error'] = 1;
            $result['num'] = $clickNum;
        }
        else
        {
            // 点赞失败
            $result['msg'] = '点赞失败';
        }
        $this->ajaxReturn($result);
    }


    /**
     * 發表評論
     *
     * @author BING
     * @return string
     */
    public function comment()
    {
        $data = I('post.');

        $data['add_time'] = time();

        $result = M('Comment')->add($data);
        if($result)
        {
            $this->assign('data',$data);
            $this->display();
        }
        else
        {
            echo '<script>alert("不要亂來，失敗了")</script>';
        }
    }

    /**
     * 回復評論
     *
     * @author BING
     * @return json
     */
    public function reply()
    {
        $replyData = I('get.');
        $replyData['reply_time'] = time();
        $res = M('Reply')->add($replyData);
        if($res)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }
}