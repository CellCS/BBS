<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo $domain_resource; ?>/css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $domain_resource; ?>/css/search.css" />
	</head>

<body>
	<div id="toptb" class="cl">
		<div class="z">
			<a href="./" class="showmenu xi2">Back to home page</a>
		</div>
		<div class="y">
			<?php if($_COOKIE['uid']){?>
			<strong><a href="#" target="_blank"><?php echo $_COOKIE['username']; ?></a></strong>
			<a href="#">User Page</a>
			<a href="loginout.php">Exit</a>
			<?php } else { ?>
			<a href="index.php">Login</a>
			<a href="reg.php">Register</a>
			<?php }?>
		</div>
	</div>

	<div id="ct" class="cl w">
		<div class="mw">
			<form class="searchform" method="get" autocomplete="off" action="search.php">
			<table id="scform" class="mbm" cellspacing="0" cellpadding="0">
				<tr>
					<td>
						<table id="scform_form" cellspacing="0" cellpadding="0">
							<tr>
								<td class="td_srchtxt">
									<input type="text" id="scform_srchtxt" name="keywords" size="45" maxlength="40" value="<?php echo $key; ?>" tabindex="1" />
								</td>
								<td class="td_srchbtn">
									<button type="submit" id="scform_submit" class="schbtn"><strong>Search</strong></button>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			</form>
		
			<div class="tl">
				<?php if($uSearch or $gSearch){?>
				<div class="slst mtw" id="threadlist"  style="position: relative;">
					<ul>
						<b><font color="#00008b">Members</font></b>
						<?php if(is_array($uSearch)){foreach($uSearch AS $key=>$val) { ?>
						<li class="pbw" id="2">
							<a href="member_home.php?uid=<?php echo $val['uid']; ?>"><img src="<?php echo $val['picture']; ?>" style="width: auto; height: auto;max-width: 60px;max-height: 80px" ></a>
							<h2><p><span class="xi2"><?php echo $val['username']; ?></span></p></h2>
						</li>
						<?php }}?>
					</ul>
					<ul>
						<b><font color="#00008b">Groups</font></b>
						<?php if(is_array($gSearch)){foreach($gSearch AS $key=>$val) { ?>
						<li class="pbw" id="3">
							<p>
								<h2><a href="group_postlist.php?gid=<?php echo $val['gid']; ?>"><?php echo $val['name']; ?></a></h2>
								<p class="xg2">Description: <?php echo $val['description']; ?></p>
								<p>Owner: <span class="xi2"><?php echo getUserName($val['owner']); ?></span></p>
							</p>
						</li>
						<?php }}?>
					</ul>
				</div>
				<?php } else { ?>
				<p class="emp xs2 xg2">Sorry, could not find any related member or group</p>
				<?php }?>
			</div>
		</div>
	</div>

	<div id="ft" class="w cl">
		<em>Powered by <strong><a href="<?php echo $web_url; ?>" target="_blank"><?php echo $web_btm; ?></a></strong> <em>V2</em></em> &nbsp;
		<em>&copy; 2016 <a href="<?php echo $web_url; ?>" target="_blank"><?php echo $web_btm; ?> Inc.</a></em>
	</div>
</body>
</html>