<?php
/**
 * 个人资料，修改密码
 */

	include './common/common.php';
	include 'logincheck.php';
	//check whether the user has logged in
	if(empty($_COOKIE['uid']))
	{

		$msg = '<font color=red><b>You are not login </b></font>';
		$url = $_SERVER['HTTP_REFERER'];
		$style = 'alert_error';
		$toTime = 3000;
		include 'notice.php';
		exit;
	
	}

	//modify the password
	if($_POST['pwdsubmit'])
	{
		$oldpassword = md5(trim($_POST['oldpassword']));
		$newpassword = trim($_POST['newpassword']);
		$newpassword2 = trim($_POST['newpassword2']);
		$emailnew = $_POST['emailnew'];

		
		//error handle
		$url = $_SERVER['HTTP_REFERER'];
		$style = 'alert_error';
		$toTime = 3000;
		
		//check the correctness of the old password
		$old = dbSelect('user','uid', 'uid='.$_COOKIE['uid'].' and password="'.$oldpassword.'"');
		if(!$old)
		{
			$msg = '<font color=red><b>old password is not correct</b></font>';
			include 'notice.php';
			exit;
		}

		//check the length of the password
		if(stringLen($newpassword))
		{
			$msg = '<font color=red><b>password length is wrong</b></font>';
			include 'notice.php';
			exit;
		}
		
		//check whether the two passwords are identical
		if(str2Equal($newpassword, $newpassword2))
		{
			$msg = '<font color=red><b>error: different password input</b></font>';
			include 'notice.php';
			exit;
		}

		//check the email


		if (!empty($emailnew)){
			if(checkEmail($emailnew))
			{
				$msg = '<font color=red><b>error in mailaddress</b></font>';
				include 'notice.php';
				exit;
			}
			$owner = dbUpdate('user', 'password="'.md5($newpassword).'",email="'.$emailnew.'"', 'uid='.$_COOKIE['uid'].'');
		}else{
			$owner = dbUpdate('user', 'password="'.md5($newpassword).'"', 'uid='.$_COOKIE['uid'].'');
		}

		if($owner)
		{
			$msg = '<font color=red><b>operation succeeded</b></font>';
			$url = $_SERVER['HTTP_REFERER'];
			$style = 'alert_right';
			$toTime = 3000;
			include 'notice.php';
			exit;
			header('location:home_pass.php');
		}else{
			$msg = '<font color=red><b>error please contact admin</b></font>';
			$url = $_SERVER['HTTP_REFERER'];
			$style = 'alert_error';
			$toTime = 3000;
			include 'notice.php';
			exit;
		}
	}


	
	$title = 'change password - '.WEB_NAME;
	include template("home_pass.html");

?>
