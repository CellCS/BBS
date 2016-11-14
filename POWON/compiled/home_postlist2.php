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
            <a href="./" class="nvhm" title="首页"><?php echo $title; ?></a> <em>&rsaquo;</em><a href="home.php">设置</a> <em>&rsaquo;</em>修改头像
        </div>
    </div>
    <div id="ct" class="ct2_a wp cl" style="margin-left:145px">
            <div class="mn">

                <div class="bm bml pbn">
                    <div class="bm_h cl">
                        <h1 class="xs2">
                            <a href="group_postlist.php?gid=<?php echo $OnGid; ?>"><?php echo $OnGname; ?></a>
                            <span class="xs1 xw0 i">Today: <strong class="xi1"><?php echo $JCount; ?></strong><span class="pipe">|</span>Themes: <strong class="xi1"><?php echo $zCount; ?></strong></span></h1>
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
                    <span class="pgb y"  ><a href="index.php">Back</a></span>
                    <a href="group_addc.php?gid=<?php echo $OnGid; ?>" id="newspecial" title="发新帖"><img src="<?php echo $domain_resource; ?>/images/pn_post.png" alt="发新帖" /></a>
                </div>

                <div id="threadlist" class="tl bm bmw">
                    <div class="th">
                        <table cellspacing="0" cellpadding="0">
                            <tr>
                                <th colspan="2">

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
                                        <a href="group_post_detail.php?pid=<?php echo $val['pid']; ?>" title="<?php if($val['addtime']>$newt){?>有新回复 - <?php }?>新窗口打开" target="_blank"><img src="<?php echo $domain_resource; ?>/images/folder_<?php if($val['addtime']>$newt){?>new<?php } else { ?>common<?php }?>.gif" /></a>
                                    </td>
                                    <th class="<?php if($val['addtime']>$newt){?>new<?php } else { ?>common<?php }?>">
                                        <a href="group_post_detail.php?pid=<?php echo $val['pid']; ?>" class="xst"><?php echo $val['title']; ?></a>
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

                <div class="bm bw0 pgs cl">
                    <span  class="pgb y"><a href="index.php">Back</a></span>
                    <a href="group_addc.php?gid=<?php echo $OnGid; ?>" id="newspecialtmp" title="发新帖"><img src="<?php echo $domain_resource; ?>/images/pn_post.png" alt="发新帖" /></a></div>
                <div style="width:800px; margin:0 auto; padding:10px 0px; text-align:right">
                    <?php echo fpage($zCount,$linum,[8,3,4,5,6,7,0,1,2]); ?>
                </div>
            </div>

        <div class="appl">
            <div class="tbn">
                <h2 class="mt bbda">设置</h2>
                <ul>
                    <li class="a"><a href="home_tx.php">Change Avatar</a></li>
                    <li><a href="home.php">Personal Info</a></li>
                    <li><a href="home_friend.php">Friend Requests</a></li>
                    <li><a href="home_qm.php">个人签名</a></li>
                    <li><a href="home_pass.php">密码安全</a></li>
                    <!--<li><a href="home_sc.php">收藏管理</a></li>-->
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

