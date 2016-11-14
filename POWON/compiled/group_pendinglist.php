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
            <a href="./" class="nvhm" title="<?php echo $title; ?>"><?php echo $title; ?></a><em>&raquo;</em><a href="index.php">Home</a><em>&raquo;</em><a href="group.php">Group</a><em>&raquo;</em><a href="group_postlist.php?gid=<?php echo $groupId; ?>"><?php echo $OnGname; ?></a>
        </div>
    </div>
    <div class="boardnav">
        <div id="ct" class="wp cl" style="margin-left:145px">
            <div id="sd_bdl" class="bdl" style="width:130px;margin-left:-145px">
                <div class="tbn" id="forumleftside"><h2 class="bdl_h">Menue</h2>
                    <dl class="a" id="lf_group">
                        <dt><a href="javascript:;" title="Posts">Posts</a></dt>
                        <dd>
                            <a href="group_postlist.php?gid=<?php echo $OnGid; ?>" title="Post List">Post List</a>
                        </dd>
                    </dl>
                    <dl class="a" id="lf_member">
                        <dt><a href="javascript:;" title="Members">Members</a></dt>
                        <dd>
                            <a href="group_memberlist.php?gid=<?php echo $OnGid; ?>&cat=0" title="Member List">Member List</a>
                        </dd>
                        <dd class="bdl_a">
                            <a href="group_pendinglist.php?gid=<?php echo $OnGid; ?>" title="Pending List">Pending List</a>
                        </dd>
                    </dl>
                    <dl class="a" id="lf_operation">
                        <dt><a href="javascript:;" title="Operation">Opeation</a></dt>
                        <dd>
                            <a href="group_info.php?gid=<?php echo $OnGid; ?>" title="Post List">Opeation</a>
                        </dd>
                    </dl>
                </div>
            </div>

            <div class="mn">

                <div class="bm bml pbn">
                    <div class="bm_h cl">
                        <h1 class="xs2">
                            <a href="group_postlist.php?gid=<?php echo $OnGid; ?>"><?php echo $OnGname; ?></a>
                            <span class="xs1 xw0 i">Members: <strong class="xi1"><?php echo $zCount; ?></strong></span>
                        </h1>
                    </div>
                    <?php if(!empty($Owner)){?>
                    <div class="bm_c cl pbn">

                        <div>
                            Owner: <span class="xi2"><?php echo getUserName($Owner); ?></span>
                        </div>

                    </div>
                    <?php }?>
                </div>

                <div id="pgt" class="bm bw0 pgs cl">
                    <span class="pgb y"  ><a href="group.php">Back</a></span>
                </div>


                <div id="threadlist" class="tl bm bmw">
                    <div class="th">
                        <table cellspacing="0" cellpadding="0">
                            <tr>
                                <th style="width:80px;text-align: center;">Username</th>
                                <td class="common">Latest Post</td>
                                <td class="by">Post Time</td>
                                <td class="by"><?php if(admin){?>Decline<?php }?></td>
                                <td class="by"><?php if(admin){?>Approve<?php }?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="bm_c">
                        <form method="post" autocomplete="off" name="moderate" id="moderate" action="">
                            <table summary="forum_2" id="forum_2" cellspacing="0" cellpadding="0">
                                <?php if(is_array($PendingList)){foreach($PendingList AS $key=>$val) { ?>
                                <tr style="width:80px;height:100px">
                                    <th style="width:80px;height:100px;text-align: center;">
                                        <a href="member_home.php?uid=<?php echo $val['uid']; ?>" title="open in new window" target="_blank"><img src="<?php echo $val['picture']; ?>" style="width: auto; height: auto;max-width: 60px;max-height: 80px"></a>
                                        <h1 class="xs2"><a href="member_home.php?uid=<?php echo $val['uid']; ?>" class="xst" ><?php echo $val['username']; ?></a></h1>
                                    </th>
                                    <td class="common">
                                        <a></a>
                                    </td>
                                    <td class="by">
                                        <em><span class="xi1"></span></em>
                                    </td>
                                    <td class="by">
                                        <h2><a href="group_pendinglist.php?gid=<?php echo $groupId; ?>&uid=<?php echo $val['uid']; ?>&del=1" style="color: rgba(159, 27, 5, 0.94);"><?php if($admin==1 and $val['admin']!=1){?>Decline<?php }?></a></h2>
                                    </td>
                                    <td class="by">
                                        <h2><a href="group_pendinglist.php?gid=<?php echo $groupId; ?>&uid=<?php echo $val['uid']; ?>&app=1"><font color="green"><?php if($admin==1 and $val['admin']!=1){?>Approve<?php }?></font></a></h2>
                                    </td>
                                </tr>
                                <?php }}?>
                            </table>
                        </form>
                    </div>
                </div>

                <div class="bm bw0 pgs cl">
                    <span  class="pgb y"><a href="index.php">Back</a></span>
                    <a></a></div>
                <div style="width:800px; margin:0 auto; padding:10px 0px; text-align:right">
                    <?php echo fpage($zCount,$linum,[8,3,4,5,6,7,0,1,2]); ?>
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

