<?php

	include 'top.php';
	
?>
<div class="container">
	<div class="header">
		<h2>Setup Guide</h2>
		<span>Group 6</span>
	<div class="setup step3">
		<h2>Database</h2>
		<p>Database Install</p>
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
<form method="post" action="setp4.php">
<div id="form_items_3" >
<br />
<div class="desc"><b>Fill in the information</b></div>
<table class="tb2">
<tr><th class="tbopt" align="left">&nbsp;Database server:</th>
<td><input type="text" name="DB_HOST" value="localhost" size="35" class="txt"></td>
<td>Normally the address of database server should be localhost</td>
</tr>

<tr><th class="tbopt" align="left">&nbsp;Name of Database:</th>
<td><input type="text" name="DB_NAME" value="apple_bbs" size="35" class="txt"></td>
<td></td>
</tr>

<tr><th class="tbopt" align="left">&nbsp;User name of Database:</th>
<td><input type="text" name="DB_USER" value="root" size="35" class="txt"></td>
<td></td>
</tr>

<tr><th class="tbopt" align="left">&nbsp;Password of Database:</th>
<td><input type="text" name="DB_PASS" value="" size="35" class="txt"></td>
<td></td>
</tr>

<tr><th class="tbopt" align="left">&nbsp;Pre-name of Database:</th>
<td><input type="text" name="DB_PREFIX" value="bbs_" size="35" class="txt"></td>
<td>When the same database runs multipul POWON System, please change the pre-name</td>
</tr>
<tr><th class="tbopt" align="left">&nbsp;</th>
<td><input type="submit" name="dbsubmitname" value="Next step" class="btn"></td>
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

