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
            <a href="./" class="nvhm" title="<?php echo $title; ?>"><?php echo $title; ?></a><em>&raquo;</em><a href="index.php">Home</a><em>&raquo;</em><a href="admin_member_list.php">Admin Center</a><em>&raquo;</em><a>Group List</a>
        </div>
    </div>
    <div class="boardnav">
        <div id="ct" class="wp cl" style="margin-left:145px">
            <div id="sd_bdl" class="bdl" style="width:130px;margin-left:-145px">
                <div class="tbn" id="forumleftside"><h2 class="bdl_h">Menue</h2>
                    <dl class="a" id="lf_group">
                        <dt><a href="javascript:;" title="Posts">Members</a></dt>
                        <dd>
                            <a href="admin_member_list.php" title="Post List">Member List</a>
                        </dd>
                    </dl>
                    <dl class="a" id="lf_member">
                        <dt><a href="javascript:;" title="Members">Groups</a></dt>
                        <dd class="bdl_a">
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
                        <form method="post" autocomplete="off" name="moderate" id="moderate" action="admin_group_list.php">
                            <table summary="forum_2" id="forum_2" cellspacing="0" cellpadding="0">
                                <?php if(is_array($GroupList)){foreach($GroupList AS $key=>$val) { ?>
                                <tr style="width:80px;height:100px">
                                    <td style="width:60px;height:80px;text-align: center;" >
                                        <a href="group_info.php?gid=<?php echo $val['gid']; ?>"><img src="<?php echo $val['grouppic']; ?>" style="width: auto; height: auto;max-width: 60px;max-height: 80px" alt="<?php echo $val['name']; ?>" /></a>
                                    </td>
                                    <td>
                                        <h2><a href="group_info.php?gid=<?php echo $val['gid']; ?>" style="color:<?php echo $val['namestyle']; ?>"><?php echo $val['name']; ?></a></h2>
                                        <p class="xg2"><?php echo $val['description']; ?></p>
                                        <?php if(!empty($val['owner'])){?>
                                        <p>Owner: <span class="xi2"><?php echo getUserName($val['owner']); ?></span></p>
                                        <?php }?>
                                    </td>
                                    <td class="by">
                                        <button type="submit" name="deletesubmitbtn" id="deletesubmitbtn" value="<?php echo $val['gid']; ?>" class="pn pnc"><strong>Dismiss</strong></button>
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

