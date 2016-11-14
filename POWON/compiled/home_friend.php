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
            <a href="./" class="nvhm" title="Home"><?php echo $title; ?></a> <em>&rsaquo;</em><a href="home.php">User Page</a> <em>&rsaquo;</em>Friend Requests
        </div>
    </div>
    <div id="ct" class="ct2_a wp cl">
        <div class="mn">
            <div class="bm bw0">
                <h1 class="mt">Friend Requests</h1>
                <ul class="tb cl">
                    <li class="a"><a href="home_friend.php">Friend Requests</a></li>
                </ul>
                <form action="home_friend.php" method="post" autocomplete="off">
                    <table cellspacing="0" cellpadding="0" class="tfm">
                        <?php if(is_array($Friend)){foreach($Friend AS $key=>$val) { ?>
                        <tr style="width:80px;height:100px">
                            <td style="width:80px;height:100px;text-align: center;">
                                <a href="member_home.php?uid=<?php echo $val['uid']; ?>"><img src="<?php echo $val['picture']; ?>" style="width: auto; height: auto;max-width: 60px;max-height: 80px"></a>
                                <h1 class="xs2"><a href="member_home.php?uid=<?php echo $val['uid']; ?>" class="xst" ><?php echo $val['username']; ?></a></h1>
                            </td>
                            <td style="vertical-align: middle;width: 100px;">
                                <button type="submit" name="approvesubmitbtn" id="approvesubmitbtn" value="<?php echo $val['uid']; ?>" style="background-color: #4CAF50; border: none;padding: 7px 16px;text-align: center;font-size:12px;margin: 4px 2px;border-radius: 8px;cursor: pointer;color:white;"><strong>Approve</strong></button>
                            </td>
                            <td td style="vertical-align: middle;font-size: medium;width: 20px;">
                                as
                            </td>
                            <td id="friendRequest" td style="vertical-align: middle;width: 120px;">
                                <select name="type_<?php echo $val['uid']; ?>" id="type_<?php echo $val['uid']; ?>" class="ps">
                                    <option value="0" selected="selected">friend</option>
                                    <option value="1">family</option>
                                    <option value="2">colleague</option>
                                </select>
                            </td>
                            <td style="vertical-align: middle;">
                                <button type="submit" name="rejectsubmitbtn" id="rejectsubmitbtn" value="<?php echo $val['uid']; ?>" style="background-color: #9f1b05; border: none;padding: 7px 16px;text-align: center;font-size:12px;margin: 4px 2px;border-radius: 8px;cursor: pointer;color:white;"><strong>Reject</strong></button>
                            </td>
                        </tr>
                        <?php }}?>
                    </table>
                </form>
            </div>
        </div>

        <div class="appl">
            <div class="tbn">
                <h2 class="mt bbda">User Page</h2>
                <ul>
                    <li><a href="home_tx.php">Change Avatar</a></li>
                    <li ><a href="home.php">Personal Info</a></li>
                    <li class="a"><a href="home_friend.php">Friend Requests</a></li>
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

