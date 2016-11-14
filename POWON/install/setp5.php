<?php
	if(file_exists('../install.lock')){
		exit('the website has been installed, for re-install please delete ./install.lock ');
	}
	include '../config/database.php';
	if(!empty($_POST['submitname'])){

			$conn=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
			
			if(mysqli_errno($conn)){
			
				exit(mysqli_error($conn));
			}
			
			mysqli_set_charset($conn, DB_CHARSET);

            $username=trim($_POST['username']);
			
			$password=md5(trim($_POST['password']));
			
			$time=time();
			$expiretime = time() + 60*60*24*365*10;
			
			$email=trim($_POST['email']);
			
			$sql="insert into ".DB_PREFIX."user(uid,username,password,email,udertype,regtime,lasttime,expiretime) values(1,'{$username}','{$password}','{$email}',1,$time,$time,$expiretime)";


			$result=mysqli_query($conn, $sql);
			
			if($result && mysqli_affected_rows($conn))
			{

				$uid=$result[0]['uid'];
				//$n = "`uid`";
				//$v = "$uid";
				$sql="insert into ".DB_PREFIX."profileVisible (uid) values(1)";
				$result=mysqli_query($conn, $sql);

				echo 'installation done';
				file_put_contents('../install.lock','');
				header('location:../index.php');
				exit;
			
			}else{
			
				echo 'installation failed';
				
			}

			mysqli_close($conn);
			
	}
	
?>