<?php
/**
 * 登陆
 */
	include './common/common.php';

    $username = strMagic($_POST['username']);
	$password = trim($_POST['password']);
	$cookietime = $_POST['cookietime'];

    $result = dbSelect('user','uid,username,udertype,picture,status,lasttime,expiretime', 'username="'.$username.'" and password="'.md5($password).'"');

	//check whether the auto login has been selected
	if($cookietime)
    {
        $longTime = time()+2592000;
    }else {
		$longTime = time() + 86400;

		if (!$result) {
			$msg = '<font color=red><b>login failed，incorrect username or password</b></font>';
			$url = 'index.php';
			$style = 'alert_error';
			$toTime = 3000;
			include 'notice.php';
		} else {

			if (time() > $result[0]['expiretime']) {
				dbUpdate('user', 'status=2', 'uid=' . $result[0]['uid'] . '');
				setcookie('uid', $result[0]['uid'], $longTime);
//				setcookie('username', "!" , $longTime);
				$msg = '<font color=red><b>Your membership is expired. Redirect to payment page</b></font>';
				$url = 'external_membership.php';
				$style = 'alert_error';
				$toTime = 3000;
				include 'notice.php';
				exit;
			}

			if ($result[0]['status'] == 2) {
				$msg = '<font color=red><b>you have been suspended by the administrator</b></font>';
				$url = 'logout.php';
				$style = 'alert_error';
				$toTime = 3000;
				include 'notice.php';
				exit;
			}
			//$money = REWARD_LOGIN;
			if (formatTime($result[0]['lasttime']) < date('Y-m-d')) {
				//update the last login time
				$lasttime = dbUpdate('user', 'lasttime=' . time() . 'uid=' . $result[0]['uid'] . '');
			} else {
				//update the last login time
				$lasttime = dbUpdate('user', 'lasttime=' . time() . '', 'uid=' . $result[0]['uid'] . '');
			}
			setcookie('uid', $result[0]['uid'], $longTime);
			setcookie('username', $result[0]['username'], time() + 2592000);
			setcookie('udertype', $result[0]['udertype'], $longTime);
			setcookie('picture', $result[0]['picture'], $longTime);
			//setcookie('grade',$grade,$longTime);

			$_SESSION['uid']=$result[0]['uid'];
			$_SESSION['username']=$result[0]['username'];
			$_SESSION['udertype']=$result[0]['udertype'];


			$msg = '<font color=green><b>login succeeded</b></font>';
			$url = $_SERVER['HTTP_REFERER'];
			$style = 'alert_right';
			$toTime = 3000;

			include 'notice.php';
			
		}
	}


