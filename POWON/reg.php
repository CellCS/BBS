<?php
/**
 * registration
 */
	include './common/common.php';

	$title = 'Register - ' . WEB_NAME;

	//check whether the apply has been submitted
	if (!empty($_POST['regsubmit']))
	{
		$uname = strMagic($_POST['username']);
		$upass = trim($_POST['password']);
		$urpass = trim($_POST['repassword']);
		$mfirstname = trim($_POST['memberfirstname']);
		$email = $_POST['mail'];
		$pyzm = $_POST['yzm'];
		
		//error handle
		$url = $_SERVER['HTTP_REFERER'];
		$style = 'alert_error';
		$toTime = 3000;

		$alterNotice = false;
		//check the length of the username
		if(stringLen($uname))
		{
			$alterNotice = true;
			$msgArr[] = '<font color=red><b>Wrong length of username：consist of 3 to 12 characters</b></font>';
		}

		//check the validation of the email
		if(checkEmail($email))
		{
			$alterNotice = true;
			$msgArr[] = '<font color=red><b>Error：not valid email address</b></font>';
		}

		//check whether there exists a same user
		$exists = dbSelect('user','uid', 'username="'.$uname.'"','uid desc',1);
		if($exists)
		{
			$alterNotice = true;
			$msgArr[] = '<font color=red><b>username has been used</b></font>';
		}
		
		//check the length of the pass
		if(stringLen($upass))
		{
			$alterNotice = true;
			$msgArr[] = '<font color=red><b>Wrong length of password：consists of 3 to 12 characters</b></font>';
		}
		
		//check whether the two passwords are identical
		if(str2Equal($upass, $urpass))
		{
			$alterNotice = true;
			$msgArr[] = '<font color=red><b>Error：passwords are not identical</b></font>';
		}

		//check whether the entered first name of an existing member is correct
		$FNexists = dbSelect('user','uid', 'firstname="'.$mfirstname.'"','uid desc',1);
		if (!$FNexists){
			$alterNotice = true;
			$msgArr[] = '<font color=red><b>Error：cannot find the corresponding first name</b></font>';
		}

		if($alterNotice)
		{
			$msg = join('<br />', $msgArr);
			include 'notice.php';
			exit;
		}

		//create new member
		$monthlater=time()+60*60*24*30;
		$n = 'username, password, email, udertype, regtime, lasttime, expiretime';
		$v = "'$uname','".md5($upass)."', '$email', 0, ".time().", ".time().", "."$monthlater";
		$result = dbInsert('user', $n, $v);
		if(!$result)
		{
			$msg = '<font color=red><b>Fail to register, pleas contact the administrator</b></font>';
			include 'notice.php';
		}else{
			//automatic login after the registration
			$result = dbSelect('user', 'uid, username, email, udertype,picture', 'username="'.$uname.'" and password="'.md5($upass).'"', 'uid desc', 1);

			setcookie('uid',$result[0]['uid'],time()+86400);
			setcookie('username',$result[0]['username'],time()+2592000);
			setcookie('udertype',$result[0]['udertype'],time()+86400);
			setcookie('picture',$result[0]['picture'],time()+86400);
			//setcookie('grade',$result[0]['grade'],time()+86400);
			$uid=$result[0]['uid'];
			$n = "`uid`";
			$v = "$uid";
			$result = dbInsert('profilevisible',$n,$v);
			
			$msg = '<font color=green><b>Thanks for your registration, now you will login as a member</b></font>';
			$url = 'index.php';
			$style = 'alert_right';
			include 'notice.php';

		}
	
	}else{
		include template("reg.html");
	}

?>
