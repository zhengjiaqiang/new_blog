<?php 
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model 
{
    protected $tableName = 'admin_user'; 

    
    /**
     * 检测管理账号是否存
     *
     * @author BING
     * @param  string $user 管理员账号
     * @param  string $pwd  密码
     * @return array/boolen       
     */
    public function check($user,$pwd)
    {

		$admInfo = M($this->tableName)->where(array('adm_name'=>$user,'password'=>$pwd))->find();
		if($admInfo)
		{
			return $admInfo;
		}
		else
		{
			return false;
		}
    }
}


?>