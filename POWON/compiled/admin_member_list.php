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
            <a href="./" class="nvhm" title="<?php echo $title; ?>"><?php echo $title; ?></a><em>&raquo;</em><a href="index.php">Home</a><em>&raquo;</em><a href="admin_member_list.php">Admin Center</a><em>&raquo;</em><a>Member List</a>
        </div>
    </div>
    <div class="boardnav">
        <div id="ct" class="wp cl" style="margin-left:145px">
            <div id="sd_bdl" class="bdl" style="width:130px;margin-left:-145px">
                <div class="tbn" id="forumleftside"><h2 class="bdl_h">Menue</h2>
                    <dl class="a" id="lf_group">
                        <dt><a href="javascript:;" title="Posts">Members</a></dt>
                        <dd class="bdl_a">
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
                        <dd>
                            <a href="admin_postlist.php" title="Member List">Public Post List</a>
                        </dd>
                    </dl>
                </div>
            </div>

            <div class="mn">
                <div id="threadlist" class="tl bm bmw">

                    <div class="bm_c">
                        <form method="post" autocomplete="off" name="moderate" id="moderate" action="admin_member_list.php">
                            <table summary="forum_2" id="forum_2" cellspacing="0" cellpadding="0">
                                <?php if(is_array($MemberList)){foreach($MemberList AS $key=>$val) { ?>
                                <tr style="width:80px;height:100px">
                                    <th style="width:80px;height:100px;text-align: center;">
                                        <a href="admin_member_home.php?uid=<?php echo $val['uid']; ?>" title="open in new window"><img src="<?php echo $val['picture']; ?>" style="width: auto; height: auto;max-width: 60px;max-height: 80px"></a>
                                        <h1 class="xs2"><a href="admin_member_home.php?uid=<?php echo $val['uid']; ?>" class="xst" ><?php echo $val['username']; ?></a></h1>
                                    </th>
                                    <td>
                                        <b><?php if($val['udertype']==1){?>Administrator<?php } else { ?>Common User<?php }?></b>
                                    </td>
                                    <?php if($val['udertype']!=1){?>
                                    <td class="by">
                                        <select name="status<?php echo $val['uid']; ?>" id="status<?php echo $val['uid']; ?>" class="ps">
                                        <option value="0" <?php if($val['status']==0){?>selected="selected"<?php }?>>active</option>
                                        <option value="1" <?php if($val['status']==1){?>selected="selected"<?php }?>>inactive</option>
                                        <option value="2" <?php if($val['status']==2){?>selected="selected"<?php }?>>suspended</option>
                                    </select>
                                    </td>
                                    <td class="by">
                                        <button type="submit" name="statussubmitbtn" id="statussubmitbtn" value="<?php echo $val['uid']; ?>" class="pn pnc"><strong>Change Status</strong></button>
                                    </td>
                                    <td class="by">
                                        <button type="submit" name="upgradesubmitbtn" id="upgradesubmitbtn" value="<?php echo $val['uid']; ?>" class="pn pnc"><strong>Upgrade</strong></button>
                                    </td>
                                    <td class="by">
                                        <button type="submit" name="deletesubmitbtn" id="deletesubmitbtn" value="<?php echo $val['uid']; ?>" class="pn pnc"><strong>Delete</strong></button>
                                    </td>
                                    <?php }?>
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

