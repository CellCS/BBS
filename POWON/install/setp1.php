<?php

	include 'top.php';
	
	function userOS(){
	
		//$user_OSagent = $_SERVER['HTTP_USER_AGENT'];
		$user_OSagent = PHP_OS;

		if($user_OSagent)
		{
			$visitor_os = $user_OSagent;
		
		} else {
		
			$visitor_os = 'Other';
		
		}
		
		return $visitor_os;
	
	}
	
?>
<div class="container">

	<div class="header">
		<h2>Setup Guide</h2>
		<span>Group 6</span>
	<div class="setup step1">
		<h2>Install status</h2>
		<p>Environment check</p>
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
<h2 class="title">Examine environment</h2>
<table class="tb" style="margin:20px 0 20px 55px;">
<tr>
	<th>Options</th>
	<th class="padleft">Basic Hardware</th>
	<th class="padleft">Best Hardware</th>
	<th class="padleft">Current Server</th>
</tr>
<tr>
<td>Operation System</td>
<td class="padleft">Not limited</td>
<td class="padleft">Linux</td>
<td class="w pdleft1"><?php echo userOS() ?></td>
</tr>
<tr>
<td>PHP version</td>
<td class="padleft">5.5.x</td>
<td class="padleft">5.5.x</td>
<td class="w pdleft1"><?php echo PHP_VERSION ?></td>
</tr>
</table>
<form action="setp2.php" method="post">
<div class="btnbox marginbot">
	<input type="button" onclick="history.back();" value="Last Step">
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

