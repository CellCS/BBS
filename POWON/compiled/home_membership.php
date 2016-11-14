<?php include template("header.html");?>
<!--TOP start-->
<?php include template("top.html");?>
<!--TOP end-->

<!--HEAD start-->
<?php include template("head.html");?>
<!--HEAD end-->

<!--LIST start-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="/POWON/public/js/moment.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js" type="text/javascript"></script>

<div id="wp" class="wp">
    <div id="pt" class="bm cl">
        <div class="z">
            <a href="./" class="nvhm" title="Home"><?php echo $title; ?></a> <em>&rsaquo;</em><a href="home.php">Settings</a> <em>&rsaquo;</em>Membership
        </div>
    </div>
    <div id="ct" class="ct2_a wp cl">
        <div class="mn">
            <div class="bm bw0">

                <?php
                        $user  = dbSelect('user','*','uid='.$_COOKIE['uid'].'');
                 ?>
                <form action="checkout.php" method="post" autocomplete="off">
                    <tr>
                        <h2>Your account will be expired at</h2>

                            <!--{if !empty($user)}-->
                                <span class="xi2" id="expiretime"></span> </br> </br></br>
                        <script>
                            document.getElementById("expiretime").innerHTML = moment.unix(<?php echo $user[0]['expiretime']; ?>).format("YYYY/MM/DD");
                        </script>
                            <!--/if-->


                    </tr>
                    <label >
                        <h2>Renew your membership </h2></br>
                        Period
                        <td id="td_amount">
                            <select name="amount" id="amount" class="ps">
                                <option value="0"> $20 per year</option>
                                <!--<option value="1" >$10 half year</option>-->
                            </select>
                        </td>
                    </label>
                    <input type="submit" value="Pay">
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
                    <li class="a"><a href="home_friend.php">Membership</a></li>
                    <li><a href="home_inviteToPOWON.php">Invite new member</a></li>
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

