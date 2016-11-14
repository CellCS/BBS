<?php include template("header.html");?>
<!--TOP start-->
<?php include template("top.html");?>
<!--TOP end-->

<!--HEAD start-->
<?php include template("head.html");?>
<!--HEAD end-->

<!--close START-->

	<?php if(empty($_COOKIE['uid'])){?>
		<div class="nfl" id="main_message">
			<div class="f_c altw">
				<div id="messagetext" class="alert_info">
					<p><?php if(empty($notice)){?>网站关闭<?php } else { ?><?php echo $notice; ?><?php }?></p>
				</div>
				<div id="messagelogin"></div>
				
				<div id="main_messaqge_LAPpm">
				<div id="layer_login_LAPpm">
				<h3 class="flb">
				<em id="returnmessage_LAPpm">
				Member Login</em>
				<span></span>
				</h3>
				<form method="post" autocomplete="off" name="login" id="loginform_LAPpm" class="cl" action="login.php">
				<div class="c cl">
				<div class="rfm">
				<table>
				<tr>
				<th><label for="username_LAPpm">User Name:</label></th>
				<td><input type="text" name="username" id="username_LAPpm" autocomplete="off" size="30" class="px p_fre" /></td>
				<td class="tipcol"><a href="reg.php">Register Now</a></td>
				</tr>
				</table>
				</div>
				<div class="rfm">
				<table>
				<tr>
				<th><label for="password3_LAPpm">Password:</label></th>
				<td><input type="password" id="password3_LAPpm" name="password" size="30" class="px p_fre" /></td>
				</tr>
				</table>
				</div>

				
				
				<div class="rfm  bw0">
				<table>
				<tr>
				<th></th>
				<td><label for="cookietime_LAPpm"><input type="checkbox" class="pc" name="cookietime" id="cookietime_LAPpm" tabindex="1" value="true"  />Automatic Login</label></td>
				</tr>
				</table>
				</div>
				
				<div class="rfm mbw bw0">
				<table width="100%">
				<tr>
				<th>&nbsp;</th>
				<td>
				<button class="pn pnc" type="submit" name="loginsubmit" value="true" tabindex="1"><strong>Login</strong></button>
				</td>
				<td>
				</td>
				</tr>
				</table>
				</div>
				
				</div>
				</form>
				</div>
				</div>
				
		
			</div>
		</div>
	<?php } else { ?>
		<div id="wp" class="wp">
			<div id="ct" class="wp cl w">
				<div class="nfl">
					<div class="f_c altw">
						<div id="messagetext" class="alert_error">
						<p>抱歉，本站点暂时关闭，<br />详情请 <a href="mailto:ccgy_yhsong@126.com">联系管理员</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php }?>

<!--close END-->

<!--FOOT start-->
<?php include template("footer.html");?>
<!--FOOT end-->
</body>
</html>

