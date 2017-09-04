<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends CommonController 
{

	/**
	 * 修改管理员密码
	 *
	 * @author BING
	 * @return void
	 */
	public function editorAdmin()
	{
		if(IS_POST)
		{
			$data = I('post.');
			$oldPwd = I('post.oldPwd','','md5');
			$newPwd = I('post.newPwd','','md5');
			$reNewPwd = I('post.reNewPwd','','md5');

			$admInfo = cookie('admInfo');

			// 验证旧密码是否正确
			if($oldPwd !== $admInfo['password'])
			{
				$this->error('旧密码不正确，请重新输入');
			}

			if($newPwd == $oldPwd)
			{
				$this->error('新密码和旧密码相同，请重新输入');
			}
			else if($newPwd !== $reNewPwd)
			{
				$this->error('两次密码不一致，请重新输入');
			}
			else
			{
				$result = M('AdminUser')->where(array('adm_id'=>$admInfo['adm_id']))->save(array('password'=>$newPwd));
				if($result)
				{
					// 退出登录状态
					cookie('isLogined',null);
					cookie('admInfo',null);
					$this->success('密码修改成功',U('Login/index'));
				}
				else
				{
					$this->error('密码修改失败，请重新修改');
				}
			}

		}
		else
		{
			$this->display();
		}
	}
}