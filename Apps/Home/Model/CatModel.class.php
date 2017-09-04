<?php 
namespace Home\Model;
use Think\Model;
class CatModel extends Model 
{
    protected $tableName = 'category'; 

    public function getNavigation()
    {
    	$catList = M($this->tableName)->order('sort DESC')->limit(8)->select();
    	foreach ($catList as $key => $value)
    	{
    		$catList[$key]['url'] = U('Cat/index',array('cid'=>$value['cat_id']));
    	}
    	return $catList;    	
    }

}