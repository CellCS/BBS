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
			<a href="./" class="nvhm" title="首页"><?php echo $title; ?></a> <em>&rsaquo;</em><a href="home.php">User Page</a> <em>&rsaquo;</em>Change Avatar
		</div>
	</div>
	<div id="ct" class="ct2_a wp cl">
		<div class="mn">
		<div class="bm bw0">
		<form action="" method="post" autocomplete="off" enctype="multipart/form-data">
		<table cellspacing="0" cellpadding="0" class="tfm">
		<caption>
			<h2 class="xs2">My Current Avatar</h2>
		</caption>
			<tr>
				<td>
				<img src="<?php echo $result[0]['picture']; ?>" style="border:1px solid #ccc;width:auto;height:auto;max-width: 150px;max-height:200px;" /><br /><br /><br />
				<h2 class="xs2">Set My New Avatar</h2><br />
				<input name="pic" type="file" style="height:23px; width:300px;" />
				</td>
			</tr>
			<tr>
				<td>
					<button type="submit" name="profilesubmitbtn" id="profilesubmitbtn" value="true" class="pn pnc" /><strong>Save</strong></button>
				</td>
			</tr>
		</table>
		</form>
		</div>
		</div>
	
		<div class="appl">
			<div class="tbn">
				<h2 class="mt bbda">User Page</h2>
				<ul>
					<li class="a"><a href="home_tx.php">Change Avatar</a></li>
					<li><a href="home.php">Personal Info</a></li>
					<li><a href="home_friend.php">Friend Requests</a></li>
					<li><a href="home_postlist.php">Post List</a></li>
					<li><a href="home_membership.php">Membership</a></li>
					<li><a href="home_inviteToPOWON.php">Invite new member</a></li>
					<li ><a href="home_pass.php">Password/Email</a></li>
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

