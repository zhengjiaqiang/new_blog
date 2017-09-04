<?php 
namespace Home\Model;
use Think\Model;
class ArticleModel extends Model 
{


	/**
	 * 查询博文 推荐|热门|最新
	 *
	 * @author BING
	 * @param  string $sign  获取文章的标识 
	 * @return array       
	 */
	public function getTop($sign,$length=5)
	{
		switch ($sign) {
			case 'is_hot':
				$list = M('Article a')->field('art_id,a.cat_id,title,cat_name')->join("blog_category c ON a.cat_id=c.cat_id")->order('read_num DESC')->limit($length)->select();
				break;
			case 'is_red':
		 		$list = M('Article')->where(array('is_top'=>1))->order('add_time DESC')->limit($length)->select();
				break;
			case 'is_new':
				$list = M('Article')->order('add_time DESC')->limit($length)->select();
				break;
			default:
				break;
		}
		return $list;
	}


	
}