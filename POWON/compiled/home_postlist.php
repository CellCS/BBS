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
            <a href="./" class="nvhm" title="Home"><?php echo $title; ?></a> <em>&rsaquo;</em><a href="home.php">User Page</a> <em>&rsaquo;</em>Post List
        </div>
    </div>
        <div class="mn"  >

            <div id="ct" class="ct2_a wp cl" >
                <div style="float:left;margin-top:8px;border:none;background-color:transparent;margin-left: 10px;width:117px;" >
                    <div class="tbn">
                        <h2 class="mt bbda">User page</h2>
                        <ul>
                            <li><a href="home_tx.php">Change Avatar</a></li>
                            <li ><a href="home.php">Personal Info</a></li>
                            <li ><a href="home_friend.php">Friend Requests</a></li>
                            <li class="a"><a href="home_postlist.php">Post List</a></li>
                            <li class="a"><a href="home_friend.php">Membership</a></li>
                            <li><a href="home_inviteToPOWON.php">Invite new member</a></li>
                            <li ><a href="home_pass.php">Password/Email</a></li>
                        </ul>
                    </div>
                </div>

            <div class="bm bml pbn" style="margin-left:145px;margin-top: 20px;margin-right: 10px;">
                <div class="bm_h cl">
                    <h1 class="xs2">
                        <a href="home.php"><?php echo $_COOKIE['username']; ?></a>
                        <span class="xs1 xw0 i">Today: <strong class="xi1"><?php echo $JCount; ?></strong><span class="pipe">|</span>Themes: <strong class="xi1"><?php echo $zCount; ?></strong></span></h1>
                </div>
            </div>
            <form method="post" autocomplete="off" id="postform" action="home_postlist.php">
            <div id="pgt" class="bm bw0 pgs cl" style="margin-left:145px;margin-right: 10px">
                <button type="submit" name="newpostsubmitbtn" id="newpostsubmitbtn" value="true" class="pn pnc" /><strong>Add Post</strong></button>
            </div>
            </form>

            <div id="threadlist" class="tl bm bmw" style="margin-left:145px;margin-right: 10px;">
                <div class="th">
                    <table cellspacing="0" cellpadding="0">
                        <tr>
                            <th colspan="2">
                                Title

                            </th>
                            <td class="by">Author</td>
                            <td class="num">Reply    &nbsp;     View</td>
                            <td class="by">Last Comment</td>
                        </tr>
                    </table>
                </div>
                <div class="bm_c">
                    <form method="post" autocomplete="off" name="moderate" id="moderate" action="">
                        <table summary="forum_2" id="forum_2" cellspacing="0" cellpadding="0">
                            <?php if(is_array($ListContent)){foreach($ListContent AS $key=>$val) { ?>
                            <tr>
                                <td class="icn">
                                    <a href="member_post_detail.php?pid=<?php echo $val['pid']; ?>" title="<?php if($val['addtime']>$newt){?>有新回复 - <?php }?>新窗口打开" target="_blank"><img src="<?php echo $domain_resource; ?>/images/folder_<?php if($val['addtime']>$newt){?>new<?php } else { ?>common<?php }?>.gif" /></a>
                                </td>
                                <th class="<?php if($val['addtime']>$newt){?>new<?php } else { ?>common<?php }?>">
                                    <a href="member_post_detail.php?pid=<?php echo $val['pid']; ?>" class="xst"><?php echo $val['title']; ?></a>
                                </th>
                                <td class="by">
                                    <cite><?php echo getUserName($val['authorid']); ?></cite>
                                    <em><span class="xi1"><?php echo formatTime($val['addtime']); ?></span></em>
                                </td>
                                <td class="num"><a href="group_post_detail.php?pid=<?php echo $val['pid']; ?>" class="xi2"><?php echo $val['replycount']; ?></a><em><?php echo $val['hits']; ?></em></td>
                                <td class="by">
                                    <?php echo creatLast(getListUName($val['pid'])); ?>
                                </td>
                            </tr>
                            <?php }}?>
                        </table>
                    </form>
                </div>
            </div>
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

