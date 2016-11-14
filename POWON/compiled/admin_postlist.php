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
            <a href="./" class="nvhm" title="<?php echo $title; ?>"><?php echo $title; ?></a><em>&raquo;</em><a href="index.php">Home</a><em>&raquo;</em><a >Public Post List</a>
        </div>
    </div>
    <div class="boardnav">
        <div id="ct" class="wp cl" style="margin-left:145px">
            <div id="sd_bdl" class="bdl" style="width:130px;margin-left:-145px">
                <div class="tbn" id="forumleftside"><h2 class="bdl_h">Menue</h2>
                    <dl class="a" id="lf_group">
                        <dt><a href="javascript:;" title="Posts">Members</a></dt>
                        <dd >
                            <a href="admin_member_list.php" title="Post List">Member List</a>
                        </dd>
                    </dl>
                    <dl class="a" id="lf_member">
                        <dt><a href="javascript:;" title="Members">Groups</a></dt>
                        <dd>
                            <a href="admin_group_list.php" title="Member List">Group List</a>
                        </dd>
                    </dl>
                    <dl class="a" id="lf_member">
                        <dt><a href="javascript:;" title="Members">Public Post</a></dt>
                        <dd class="bdl_a">
                            <a href="admin_postlist.php" title="Member List">Public Post List</a>
                        </dd>
                    </dl>
                </div>
            </div>

            <div class="mn">


                <form method="post" autocomplete="off" id="postform" action="admin_postlist.php">
                    <div id="pgt" class="bm bw0 pgs cl">
                        <button type="submit" name="newpostsubmitbtn" id="newpostsubmitbtn" value="true" class="pn pnc" /><strong>Add Post</strong></button>
                    </div>
                </form>

                <div id="threadlist" class="tl bm bmw">
                    <div class="th">
                        <table cellspacing="0" cellpadding="0">
                            <tr>
                                <th colspan="2">
                                    Title
                                </th>
                                <td class="by" style="text-align: center">&nbsp;&nbsp;&nbsp; Author&nbsp; &nbsp; &nbsp;  &nbsp;Post Time</td>
                            </tr>
                        </table>
                    </div>
                    <div class="bm_c">
                        <form method="post" autocomplete="off" name="moderate" id="moderate" action="">
                            <table summary="forum_2" id="forum_2" cellspacing="0" cellpadding="0">
                                <?php if(is_array($ListContent)){foreach($ListContent AS $key=>$val) { ?>
                                <tr>
                                    <td class="icn">
                                        <a href="admin_post_detail.php?pid=<?php echo $val['pid']; ?>" title="public post"><img src="<?php echo $domain_resource; ?>/images/folder_<?php if($val['addtime']>$newt){?>new<?php } else { ?>common<?php }?>.gif" /></a>
                                    </td>
                                    <th class="<?php if($val['addtime']>$newt){?>new<?php } else { ?>common<?php }?>">
                                        <a href="admin_post_detail.php?pid=<?php echo $val['pid']; ?>" class="xst"><?php echo $val['title']; ?></a>
                                    </th>
                                    <td class="by" style="text-align: center">
                                        <cite><?php echo getUserName($val['authorid']); ?></cite>
                                        <em><span class="xi1"><?php echo formatTime($val['addtime']); ?></span></em>
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

