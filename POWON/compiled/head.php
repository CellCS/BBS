<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	.dropbtn {
		background-color: #6bf3ff;
		color: black;
		padding: 12px;
		font-size: 14px;
		border: none;
		cursor: pointer;
	}

	.dropbtn:hover, .dropbtn:focus {
		background-color: #2500ff;
	}

	.dropdown {
		position: relative;
		display: inline-block;
	}

	.dropdown-content {
		display: none;
		position: absolute;
		background-color: #ffffff;
		min-width: 160px;
		overflow: auto;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	}

	.dropdown-content a {
		color: black;
		padding: 12px 16px;
		text-decoration: none;
		display: block;
	}

	.divider{
		width:128px;
		height:auto;
		display:inline-block;
	}

	.divider_big{
		width:200px;
		height:auto;
		display:inline-block;
	}
	.divider_small{
		width:65px;
		height:auto;
		display:inline-block;
	}

	.dropdown a:hover {background-color:  #2500ff}

	.show {display:block;}
</style>

<?php

    $UserListhead = dbSelect('user','uid,username,picture','status!=1','username asc');
    $UserListResthead = 8-count($UserListhead)%8;
    $UserListResthead = ($UserListResthead ==8)? 0:$UserListResthead;

    $select='u.uid as uid, u.username as username, u.picture as picture';
    $FriendListhead = DBduoSelect('user as u','friend as f','on u.uid = f.fid and f.approved=1',null,null,$select,'f.uid ='.$_COOKIE['uid'].' and u.status!=1','u.username asc');
    $FriendListResthead = 8-count($FriendList)%8;
    $FriendListResthead = ($FriendListResthead ==8)? 0:$FriendListResthead;

    $FriendRequest = dbSelect('friend','uid,approved,type','fid='.$_COOKIE['uid'].' and approved=0','');

    $GrMenuAllhead = dbSelect('groups','gid,name,owner, grouppic',null,'name asc');

    $select='g.gid as gid, g.name as name, g.grouppic as grouppic,g.owner as owner';
    $GrMenuhead = DBduoSelect('groups as g','gmembers as m','on g.gid = m.gid and m.approved=1',null,null,$select,'m.uid ='.$_COOKIE['uid'].'','g.name asc');

?>

<div id="hd">
	<div class="wp">
		<div class="hdc cl">
			<h1><a href="./" title="<?php echo $title; ?>">POWON</a></h1>
			<!--<img src="<?php echo $domain_resource; ?>/images/logo.jpg" height="80" border="0" />-->
			<?php if($thispage!='logout.php'){?>
				<?php if($_COOKIE['uid'] && $_COOKIE['username']){?>
				<div id="um">
					<div class="avt y"><a href="home_tx.php"><img src="<?php echo $GGpicture; ?>" /></a></div>
					<p>
						<img src="public/images/mailbox.png" style="width: auto; height: auto;max-width: 30px;max-height: 50px" ><a href="mailbox.php"  target="_blank"><b>Mailbox</b></a>
						<strong class="vwmy"><a href="home.php"><?php echo $_COOKIE['username']; ?></a></strong>
					<span class="pipe">|</span><a href="home.php">User Page</a>
					<?php if($_COOKIE['udertype']){?>
					<span class="pipe">|</span><a href="admin_member_list.php">Administration center</a>
					<?php }?>
					<span class="pipe">|</span><a href="logout.php">Exit</a>
					</p>
					<p>
						<a id="extcreditmenu" href="#">Coins: <?php echo $GGcoins; ?></a>
						<span class="pipe">|</span>User Group: <?php echo userGroup($_COOKIE['udertype']); ?>
					</p>
				</div>
				<?php } else { ?>
				<form method="post" autocomplete="off" id="lsform" action="login.php">
				<div class="fastlg cl">
					<div class="y pns">
						<table cellspacing="0" cellpadding="0">
							<tr>
								<td><span class="ftid">username</span></td>
								<td><input type="text" name="username" value="<?php echo $_COOKIE['username']; ?>" id="ls_username" autocomplete="off" class="px vm" /></td>
								<td class="fastlg_l">
									<label for="ls_cookietime"><input type="checkbox" name="cookietime" id="ls_cookietime" class="pc" value="true" />Automatic Login</label>
								</td>
								<td>&nbsp;<a href="getpass.php">Retrieve Password</a></td>
							</tr>
							<tr>
								<td><label for="ls_password" class="z psw_w">Password</label></td>
								<td><input type="password" name="password" id="ls_password" class="px vm" autocomplete="off" /></td>
								<td class="fastlg_l"><button type="submit" class="pn vm" name="loginsubmit" value="true" style="width:75px;"><em>Login</em></button></td>
								<td>&nbsp;<a href="reg.php" class="xi2 xw1">Register</a></td>
							</tr>
						</table>
					</div>
				</div>
				</form>
				<?php }?>
			<?php }?>
		</div>
		</br>

		<script>
			/* When the user clicks on the button,
			 toggle between hiding and showing the dropdown content */
			function myFunction() {
				document.getElementById("myDropdown").classList.toggle("show");
			}

			function myFunction1() {
				document.getElementById("myDropdown1").classList.toggle("show");
			}

			function myFunction2() {
				document.getElementById("myDropdown2").classList.toggle("show");
			}

			function myFunction3() {
				document.getElementById("myDropdown3").classList.toggle("show");
			}

			// Close the dropdown if the user clicks outside of it
			window.onclick = function(event) {
				if (!event.target.matches('.dropbtn')) {

					var dropdowns = document.getElementsByClassName("dropdown-content") ;
					var i;
					for (i = 0; i < dropdowns.length; i++) {
						var openDropdown = dropdowns[i];
						if (openDropdown.classList.contains('show')) {
							openDropdown.classList.remove('show');
						}
					}
				}
			}

		</script>


		<div style="text-align: left">

			<a href="index.php" class="dropbtn"><B>Home</B></a> <span></span>

			<div class="dropdown">
				<div class="divider">
					<a href="member.php?mlist=1&cat=0"  title="My Friends" class="dropbtn"><B>My Friends</B></a>
					<button onclick="myFunction()" class="dropbtn" style="background-image: url(public/images/dropdown_menu_icon.png) " ></button>
					<div id="myDropdown" class="dropdown-content">
						<?php if(is_array($FriendListhead)){foreach($FriendListhead AS $key=>$val) { ?>
						<?php if($key%8==0 and $key!=0){?><tr> </tr><?php }?>
						<?php
                        $chatmsg = dbselect('chat','*','uid='.$val['uid'].' and fid='.$_COOKIE['uid'].' and isread=0')
                    ?>
						<td style="width:80px;height:100px;text-align: center;" >
							<a href="member_home.php?uid=<?php echo $val['uid']; ?>"><img src="<?php echo $val['picture']; ?>" style="width: auto; height: auto;max-width: 40px;max-height: 60px" >
								<span class="xi2"><?php echo $val['username']; ?>
									<a href="member_chatbox_index.php?uid=<?php echo $val['uid']; ?>"target="_blank">
										<?php if(!empty($chatmsg)){?>
										<img src="public/images/unread_Chat.png" style="width: auto; height: auto;max-width: 20px;max-height: 30px" >
										<?php } else { ?>
										<img src="public/images/read_Chat.png" style="width: auto; height: auto;max-width: 20px;max-height: 30px" >
										<?php }?>
									</a>
								</span>
							</a>
						</td>
						<?php }}?>
						<?php if($FriendListResthead!=0 and !empty($FriendListhead)){?>
						<?php
                    for($i = 1;$i <= $FriendListResthead; $i++){
                    echo '<td style="width:80px;height:100px;text-align: center;" ></td>';
						}
						?>
						<?php }?>
					</div>
				</div>


				<div class="divider">
					<a href="group.php?glist=1" class="dropbtn" title="My Groups"><b>My Groups</b></a>
					<button onclick="myFunction1()" class="dropbtn" style="background-image: url(public/images/dropdown_menu_icon.png) "></button>
					<div id="myDropdown1" class="dropdown-content">
							<?php if(is_array($GrMenuhead)){foreach($GrMenuhead AS $key=>$val) { ?>
						<td style="width:80px;height:100px;text-align: center;" >
							<a href="group_postlist.php?gid=<?php echo $val['gid']; ?>" style="color:<?php echo $val['namestyle']; ?>"><?php echo $val['name']; ?>
									<p class="xg2"><?php echo $val['description']; ?></p>
									<?php if(!empty($val['owner'])){?>
									<p>Owner: <span class="xi2"><?php echo getUserName($val['owner']); ?></span></p>
										<?php }?>
									</a>
								</span>
							</a>
						</td>
						<?php }}?>
					</div>
				</div>

				<div class="divider_big">
				<a href="member.php?mlist=0&cat=0"  title="All members" class="dropbtn"><B>All POWON Members</B></a>
				<button onclick="myFunction2()" class="dropbtn" style="background-image: url(public/images/dropdown_menu_icon.png) "></button>
				<div id="myDropdown2" class="dropdown-content">
					<?php if(is_array($UserListhead)){foreach($UserListhead AS $key=>$val) { ?>
					<?php
                        $chatmsg = dbselect('chat','*','uid='.$val['uid'].' and fid='.$_COOKIE['uid'].' and isread=0')
                    ?>
					<td style="width:80px;height:100px;text-align: center;" >
						<a href="member_home.php?uid=<?php echo $val['uid']; ?>"><img src="<?php echo $val['picture']; ?>" style="width: auto; height: auto;max-width: 40px;max-height: 60px" >
								<span class="xi2"><?php echo $val['username']; ?>
									<a href="member_chatbox_index.php?uid=<?php echo $val['uid']; ?>"target="_blank">
										<?php if(!empty($chatmsg)){?>
										<img src="public/images/unread_Chat.png" style="width: auto; height: auto;max-width: 20px;max-height: 30px" >
										<?php } else { ?>
										<img src="public/images/read_Chat.png" style="width: auto; height: auto;max-width: 20px;max-height: 30px" >
										<?php }?>
									</a>
								</span>
						</a>
					</td>
					<?php }}?>
				</div>
				</div>

				<div class="divider_big">
				<a href="group.php?glist=0&cat=0" class="dropbtn" title="All Groups"><b>All Groups</b></a>
				<button onclick="myFunction3()" class="dropbtn" style="background-image: url(public/images/dropdown_menu_icon.png) "></button>
				<div id="myDropdown3" class="dropdown-content">
					<?php if(is_array($GrMenuAllhead)){foreach($GrMenuAllhead AS $key=>$val) { ?>
					<td style="width:80px;height:100px;text-align: center;" >
						<a href="group_postlist.php?gid=<?php echo $val['gid']; ?>" style="color:<?php echo $val['namestyle']; ?>"><?php echo $val['name']; ?>
							<p class="xg2"><?php echo $val['description']; ?></p>
							<?php if(!empty($val['owner'])){?>
							<p>Owner: <span class="xi2"><?php echo getUserName($val['owner']); ?></span></p>
							<?php }?>
						</a>
						</span>
						</a>
					</td>
					<?php }}?>
				</div>
				</div>

			</div>

		</div>



		<!--<div id="nv">-->
			<!--<ul>-->
				<!--<li><a href="index.php" hidefocus="true" title="<?php echo $web_name; ?>">Home</a><span><?php echo $web_name; ?></span></li>-->
				<!--<li>-->
					<!--<a href="member.php?mlist=1" hidefocus="true" title="My Friends">My Friends</a>-->
					<!--<span><?php echo $web_name; ?></span>-->
				<!--</li>-->
				<!--<li><a href="group.php?glist=1" hidefocus="true" title="My Groups">My Groups</a><span><?php echo $web_name; ?></span></li>-->
			<!--</ul>-->
		<!--</div>-->

		<div id="scbar" class="cl">
			<form id="scbar_form" method="get" autocomplete="off" action="search.php" target="_blank">
			<table cellspacing="0" cellpadding="0">
				<tr>
					<td class="scbar_icon_td"></td>
					<td class="scbar_txt_td"><input type="text" name="keywords" id="scbar_txt" onfocus="if(this.value=='please enter search detail'){this.value='';this.style.color='#666';}" onblur="if(this.value==''){this.value='please enter search detail';this.style.color='#ccc';}" value="please enter search detail" style="color:#CCCCCC" autocomplete="off" /></td>
					<td class="scbar_btn_td">
						<button type="submit" name="searchsubmit" id="scbar_btn" class="pn pnc" value="true"><strong class="xi2 xs2">Search</strong></button>
					</td>
					<td class="scbar_hot_td">
						<div id="scbar_hot">

						</div>
					</td>
				</tr>
			</table>
			</form>
		</div>
	</div>
</div>
