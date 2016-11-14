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
            <a href="./" class="nvhm" title="<?php echo $title; ?>"><?php echo $title; ?></a><em>&raquo;</em><a href="index.php">Home</a><em>&raquo;</em><a href="member.php">Member</a><em>&raquo;</em><a href="member_home.php?uid=<?php echo $uid; ?>"><?php echo $uname; ?> Post List</a>
        </div>
    </div>
    <div class="boardnav">
        <div id="ct" class="wp bm cl" style="margin-left:145px;">
            <div id="sd_bdl" class="bdl" style="width:130px;margin-left:-145px">
                <div class="tbn" id="forumleftside"><h2 class="bdl_h">Menue</h2>
                    <dl class="a" id="lf_member">
                        <dt><a href="javascript:;" title="Member">Member</a></dt>
                        <dd>
                            <a href="member_home.php?uid=<?php echo $uid; ?>" title="Information">Information</a>
                        </dd>
                        <dd class="bdl_a">
                            <a href="member_home.php?uid=<?php echo $uid; ?>" title="Post List">Post List</a>
                        </dd>
                    </dl>
                </div>
            </div>

            <div class="mn">

                <div class="bm bml pbn">
                    <div class="bm_h cl">
                        <h1 class="xs2">
                            <a href="member_home.php?uid=<?php echo $uid; ?>"><?php echo getUserName($uid); ?></a>
                            <span class="xs1 xw0 i">Today: <strong class="xi1"><?php echo $JCount; ?></strong><span class="pipe">|</span>Themes: <strong class="xi1"><?php echo $zCount; ?></strong></span></h1>
                    </div>
                </div>

                <div id="pgt" class="bm bw0 pgs cl">
                    <span class="pgb y"  ><a href="member.php?mlist=1">Back</a></span>
                </div>

                <div id="threadlist" class="tl bm bmw">
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
                                    <td class="num"><a href="member_post_detail.php?pid=<?php echo $val['pid']; ?>" class="xi2"><?php echo $val['replycount']; ?></a><em><?php echo $val['hits']; ?></em></td>
                                    <td class="by">
                                        <?php echo creatLast(getListUName($val['pid'])); ?>
                                    </td>
                                </tr>
                                <?php }}?>
                            </table>
                        </form>
                    </div>
                </div>

                <div class="bm bw0 pgs cl">
                    <span  class="pgb y"><a href="member.php?mlist=1">Back</a></span>
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

