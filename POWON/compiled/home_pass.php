<?php include template("header.html");?>
<!--TOP start-->
<?php include template("top.html");?>
<!--TOP end-->

<!--HEAD start-->
<?php include template("head.html");?>
<!--HEAD end-->

<!--LIST start-->
<div id="wp" class="wp">
	<div id="pt" class="bm cl">
		<div class="z">
			<a href="./" class="nvhm" title="Home"><?php echo $title; ?></a> <em>&rsaquo;</em><a href="home.php">User Page</a> <em>&rsaquo;</em>Password modification
		</div>
	</div>
	<div id="ct" class="ct2_a wp cl">
		<div class="mn">
		<div class="bm bw0">
		<p class="bbda pbm mbm">you must enter the old password to modify the information below</p>
		<form action="" method="post" autocomplete="off">
			<table summary="personal information" cellspacing="0" cellpadding="0" class="tfm">
			<tr>
			<th><span class="rq" title="Please enter">*</span>Old Password</th>
			<td><input type="password" name="oldpassword" id="oldpassword" class="px" /></td>
			</tr>
			<tr>
			<th>New Password</th>
			<td>
			<input type="password" name="newpassword" id="newpassword" class="px" />
			<p class="d">leave it as bland if no new password is needed </p>
			</td>
			</tr>
			<tr>
			<th>confirm new password</th>
			<td>
			<input type="password" name="newpassword2" id="newpassword2"class="px" />
			<p class="d">leave it as bland if no new password is needed </p>
			</td>
			</tr>
			<tr id="contact">
			<th>New Email</th>
			<td>
			<input type="text" name="emailnew" id="emailnew" value="<?php echo $result[0]['email']; ?>" class="px" />
			</td>
			</tr>

			<tr>
			<th>&nbsp;</th>
			<td><button type="submit" name="pwdsubmit" value="true" class="pn pnc" /><strong>Save</strong></button></td>
			</tr>
			</table>
		</form>



		</div>
		</div>
	
		<div class="appl">
			<div class="tbn">
				<h2 class="mt bbda">设置</h2>
				<ul>
					<li><a href="home_tx.php">Change Avatar</a></li>
					<li ><a href="home.php">Personal Info</a></li>
					<li ><a href="home_friend.php">Friend Requests</a></li>
					<li><a href="home_postlist.php">Post List</a></li>
					<li><a href="home_friend.php">Membership</a></li>
					<li><a href="home_inviteToPOWON.php">Invite new member</a></li>
					<li class="a"><a href="home_pass.php">Password/Email</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--LIST end-->

<!--FOOT start-->
<?php include template("footer.html");?>
<!--FOOT end-->
</body>
</html>

