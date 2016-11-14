<?php

	include 'top.php';

	if(!empty($_POST['dbsubmitname'])){
	
		$str=file_get_contents('../config/database.php');
		
		foreach($_POST as $key=>$val){
			
			$pattern="/define\('$key','.*?'\);/";
			$replace="define('$key','$val');";
		
			$str=preg_replace($pattern, $replace, $str);

		}
		
		file_put_contents('../config/database.php',$str);

		//执行数据库导入
		include '../config/database.php';
		
		//新建数据库
		$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS);
		if(mysqli_get_server_info($link) > '4.1') {
			mysqli_query($link, "CREATE DATABASE IF NOT EXISTS `".DB_NAME."` DEFAULT CHARACTER SET ".DB_CHARSET);
		} else {
			mysqli_query($link, "CREATE DATABASE IF NOT EXISTS `".DB_NAME."`");
		}
		if(mysqli_connect_errno($link)){
			exit('Database does not exist');
		}
		mysqli_close($link);
			
		$sql=file_get_contents('apple_bbs.sql');
		$conn=mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if(mysqli_errno($conn)){

			exit(mysqli_error($conn));
		}
		mysqli_set_charset($conn, DB_CHARSET);
		
		$arr=explode('dbg6;',$sql);

		foreach($arr as $val){
			if(!empty($val))
			{
				$Nval = str_replace('bbs_', DB_PREFIX, $val);
				$result = mysqli_query($conn, $Nval);

				if($result){
						$sql = '<font color="green">Data writing succeeded</font>';
				}else{
						$sql = '<font color="red">Data writing failed</font>';
				}
			}
		}

		mysqli_close($conn);
		
	}
	
?>
<div class="container">
	<div class="header">
		<span>Group 6</span>
		<div class="setup step4">
			<h2>File authority</h2>
			<p>Root authority</p>
		</div>
	<div class="stepstat">
		<ul>
			<li class="current">Environment</li>
			<li class="unactivated">Authorisation</li>
			<li class="unactivated">Data base</li>
			<li class="unactivated last">Install</li>
		</ul>
		<div class="stepstatbg stepstat1"></div>
	</div>
	</div>
<div class="main">
<form method="post" action="setp5.php">
<div id="form_items_3" >
<br />
<div class="desc"><b>Administrator infomation</b></div>
<table class="tb2">
<tr><th class="tbopt" align="left">&nbsp;Admin name:</th>
<td><input type="text" name="username" value="admin" size="35" class="txt"></td>
<td></td>
</tr>
<tr><th class="tbopt" align="left">&nbsp;Admin password:</th>
<td><input type="password" name="password" value="" size="35" class="txt"></td>
<td>Admin password cannot be null</td>
</tr>
<tr><th class="tbopt" align="left">&nbsp;Admin Email:</th>
<td><input type="text" name="email" value="" size="35" class="txt"></td>
<td></td>
</tr>
<tr><th class="tbopt" align="left">&nbsp;</th>
<td><input type="submit" name="submitname" value="Finish" class="btn"></td>
<td></td>
</tr>
</table>
</div>
</form>

		<?php
		
			include 'foot.php';
		
		?>
	</div>
</div>
</body>
</html>

