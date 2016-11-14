<?php

	include 'top.php';
	
	function iswriteable($file){
		if(is_dir($file)){
			$dir=$file;
			if($fp = fopen("$dir/test.txt", 'w')) {
				fclose($fp);
				unlink("$dir/test.txt");
				$writeable = 1;
			}else{
				$writeable = 0;
			}
		}else{
			if($fp = fopen($file, 'a+')) {
				fclose($fp);
				$writeable = 1;
			}else {
				$writeable = 0;
			}
		}
		return $writeable;
	}

?>
<div class="container">
	<div class="header">
		<h2>Setup Guide</h2>
		<span>Group 6</span>
	<div class="setup step2">
		<h2>File authorisation</h2>
		<p>Root authorisation</p>
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
<h2 class="title">Authorisation xamination</h2>
<table class="tb" style="margin:20px 0 20px 55px;width:90%;">
	<tr>
		<th>root file</th>
		<th class="padleft">condition needed</th>
		<th class="padleft">current condition</th>
	</tr>
	<tr>
		<td>./compiled</td><td class="w pdleft1">Writable</td>
		<?php if(iswriteable('../compiled')){ ?>
		<td class="w pdleft1">support</td>
		<?php }else{ ?>
		<td class="nw pdleft1">not supported</td>
		<?php } ?>
	</tr>
	<tr>
		<td>./theme</td><td class="w pdleft1">Writable</td>
		<?php if(iswriteable('../theme')){ ?>
		<td class="w pdleft1">support</td>
		<?php }else{ ?>
		<td class="nw pdleft1">not supported</td>
		<?php } ?>
	</tr>
	<tr>
		<td>./upload</td><td class="w pdleft1">Writable</td>
		<?php if(iswriteable('../upload')){ ?>
		<td class="w pdleft1">support</td>
		<?php }else{ ?>
		<td class="nw pdleft1">not supported</td>
		<?php } ?>
	</tr>
	<tr>
		<td>./config/config.php</td><td class="w pdleft1">Writable</td>
		<?php if(is_writable('../config/config.php')){ ?>
		<td class="w pdleft1">support</td>
		<?php }else{ ?>
		<td class="nw pdleft1">not supported</td>
		<?php } ?>
	</tr>
	<tr>
		<td>./config/database.php</td><td class="w pdleft1">Writable</td>
		<?php if(is_writable('../config/database.php')){ ?>
		<td class="w pdleft1">support</td>
		<?php }else{ ?>
		<td class="nw pdleft1">not supporteted</td>
		<?php } ?>
	</tr>
</table>
<h2 class="title">function dependency check</h2>
<table class="tb" style="margin:20px 0 20px 55px;width:90%;">
	<tr>
		<th>function name</th>
		<th class="padleft">check result</th>
		<th class="padleft"></th>
	</tr>
	<tr>
		<td>mysqli_connect()</td>
		<?php if(function_exists('mysqli_connect')){ ?>
		<td class="w pdleft1">supported</td>
		<?php }else{ ?>
		<td class="nw pdleft1">not supported</td>
		<?php } ?>
		<td class="padleft"></td>
	</tr>
	<tr>
		<td>file_get_contents()</td>
		<?php if(function_exists('file_get_contents')){ ?>
		<td class="w pdleft1">supported</td>
		<?php }else{ ?>
		<td class="nw pdleft1">not supported</td>
		<?php } ?>
		<td class="padleft"></td>
	</tr>
</table>
<form action="setp3.php" method="post">
<div class="btnbox marginbot">
	<input type="button" onclick="history.back();" value="Last step">
	<input type="submit" value="Next step">
</div>
</form>
		<?php
			include 'foot.php';
		?>
	</div>
</div>
</body>
</html>

