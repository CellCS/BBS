<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $title; ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<link rel="stylesheet" type="text/css" href="<?php echo $domain_resource; ?>/css/style.css" />
	<?php if($thispage=="group.php" ){?>
	<link rel="stylesheet" type="text/css" href="<?php echo $domain_resource; ?>/css/index.css" />
	<?php } else if($thispage=='group_postlist.php' or $thispage == 'group_memberlist.php' or $thispage=='group_pendinglist.php' or $thispage=='group_info.php' or $thispage=='member_home.php' or $thispage=='home_postlist.php' or $thispage=='member_postlist.php' or $thispage=='index.php' or $thispage=='admin_member_list.php' or $thispage=='admin_member_home.php' or $thispage=='admin_postlist.php' or $thispage=='admin_group_list.php'){ ?>
	<link rel="stylesheet" type="text/css" href="<?php echo $domain_resource; ?>/css/list.css" />
	<?php } else if($thispage=='detail.php' or $thispage=='group_post_detail.php' or $thispage=='member_post_detail.php' or $thispage=='admin_post_detail.php'){ ?>
	<link rel="stylesheet" type="text/css" href="<?php echo $domain_resource; ?>/css/view.css" />
	<?php } else if($thispage=='user.php'){ ?>
	<link rel="stylesheet" type="text/css" href="css/home.css" />
	<?php }?>
</head>

<body>
