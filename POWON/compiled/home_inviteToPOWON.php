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
                    <li class="a"><a href="">Candidate information</a></li>
                </ul>
                <form action="home_inviteToPOWON.php" method="post" autocomplete="off">
                    <table cellspacing="0" cellpadding="0" class="tfm">
                        <div>
                            </br>
                            Candidate email address  <input type="text" name="emailaddress" id="emailaddress"> </br>
                        </div>
                        <td style="vertical-align: middle;width: 100px;">
                            <button type="submit" name="invitesubmitbtn" id="invitesubmitbtn" value="invitesubmitbtn" style="background-color: #4CAF50; border: none;padding: 7px 16px;text-align: center;font-size:12px;margin: 4px 2px;border-radius: 8px;cursor: pointer;color:white;"><strong>Send</strong></button>
                        </td>
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
                    <li ><a href="home_friend.php">Friend Requests</a></li>
                    <li><a href="home_postlist.php">Post List</a></li>
                    <li><a href="home_membership.php">Membership</a></li>
                    <li class="a"><a href="home_inviteToPOWON.php">Invite new member</a></li>
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

