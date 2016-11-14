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
                        <dd class="bdl_a">
                            <a href="group_postlist.php?gid=<?php echo $OnGid; ?>" title="Post List">Post List</a>
                        </dd>
                    </dl>
                    <dl class="a" id="lf_member">
                        <dt><a href="javascript:;" title="Members">Members</a></dt>
                        <dd>
                            <a href="group_memberlist.php?gid=<?php echo $OnGid; ?>&cat=0" title="Member List">Member List</a>
                        </dd>
                        <?php if($admin==1){?>
                        <dd>
                            <a href="group_pendinglist.php?gid=<?php echo $OnGid; ?>" title="Pending List">Pending List</a>
                        </dd>
                        <?php }?>
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
                <form method="post" autocomplete="off" id="postform" action="group_postlist.php?gid=<?php echo $groupId; ?>">
                <div id="pgt" class="bm bw0 pgs cl">
                    <button type="submit" name="newpostsubmitbtn" id="newpostsubmitbtn" value="true" class="pn pnc" /><strong>Add Post</strong></button>
                    <span ><b>Vote Set:</b>
                            <select name="vote" id="vote" class="ps">
                            <option value="0"  selected="selected">no vote option</option>
                            <option value="2">2 options</option>
                            <option value="3">3 options</option>
                            <option value="4">4 options</option>
                            <option value="5">5 options</option>
                            <option value="6">6 options</option>
                            <option value="7">7 options</option>
                            <option value="8">8 options</option>
                            <option value="9">9 options</option>
                            <option value="10">10 options</option>
                        </select>
                    </span>
                </div>
                </form>

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

