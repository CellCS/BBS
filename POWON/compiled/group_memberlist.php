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
                        <dd class="bdl_a">
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
                <div class="bmw cl">
                <div class="bm_h cl">
                    <table cellspacing="0" cellpadding="0">
                        <th>
                            <h2><a>Group Members</a></h2>
                        </th>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td><h2>Order by<a href="group_memberlist.php?gid=<?php echo $groupId; ?>&cat=0"> default</a></h2></td>
                        <td><span class="pipe">|</span></td>
                        <td><h2><a href="group_memberlist.php?gid=<?php echo $groupId; ?>&cat=1"> age</a></h2></td>
                        <td><span class="pipe">|</span></td>
                        <td><h2><a href="group_memberlist.php?gid=<?php echo $groupId; ?>&cat=2"> profession</a></h2></td>
                        <td><span class="pipe">|</span></td>
                        <td><h2><a href="group_memberlist.php?gid=<?php echo $groupId; ?>&cat=3"> region</a></h2></td>
                    </table>
                </div>
                    </div>


                <div id="threadlist" class="tl bm bmw">
                    <div class="th">
                        <table cellspacing="0" cellpadding="0">
                            <tr>
                                <th style="width:80px;text-align: center;">Username</th>
                                <td class="common">Latest Post</td>
                                <td class="by">Post Time</td>
                                <td class="by"><?php if(admin){?>Kick out<?php }?></td>
                                <td class="by"><?php if(admin){?>Mute<?php }?></td>
                                <td class="by">send gift</td>

                            </tr>
                        </table>
                    </div>
                    <div class="bm_c">
                        <form method="post" autocomplete="off" name="moderate" id="moderate" action="">
                            <table summary="forum_2" id="forum_2" cellspacing="0" cellpadding="0">
                                <?php if($Cat==0){?>
                                <?php if(is_array($MemberList)){foreach($MemberList AS $key=>$val) { ?>
                                <?php
                                    $chatmsg = dbselect('chat','*','uid='.$val['uid'].' and fid='.$_COOKIE['uid'].' and isread=0')
                                ?>
                                <tr style="width:80px;height:100px">
                                    <?php
                                    $LatestPost = dbSelect('gposts','pid, title,addtime','first=1 and gid='.$groupId.' and authorid='.$val['uid'].' and isdel = 0','pid desc');
                                ?>
                                    <th style="width:80px;height:100px;text-align: center;">
                                            <a href="member_home.php?uid=<?php echo $val['uid']; ?>" title="open in new window" target="_blank"><img src="<?php echo $val['picture']; ?>" style="width: auto; height: auto;max-width: 60px;max-height: 80px"></a>
                                            <a href="member_chatbox_index.php?uid=<?php echo $val['uid']; ?>"target="_blank">
                                            <?php if(!empty($chatmsg)){?>
                                            <img src="public/images/unread_Chat.png" style="width: auto; height: auto;max-width: 20px;max-height: 30px" >
                                            <?php } else { ?>
                                            <img src="public/images/read_Chat.png" style="width: auto; height: auto;max-width: 20px;max-height: 30px" >
                                            <?php }?></a>
                                            <h1 class="xs2"><a href="member_home.php?uid=<?php echo $val['uid']; ?>" class="xst" ><?php echo $val['username']; ?></a></h1>
                                    </th>
                                    <td class="common">
                                        <a href="group_post_detail.php?pid=<?php echo $LatestPost[0]['pid']; ?>" class="xst" style="font-size: medium"><?php if(!empty($LatestPost)){?><?php echo $LatestPost[0]['title']; ?><?php }?></a>
                                    </td>
                                    <td class="by">
                                        <?php if(!empty($LatestPost)){?>
                                        <em><span class="xi1"><?php echo formatTime($LatestPost[0]['addtime']); ?></span></em>
                                        <?php }?>
                                    </td>
                                    <td class="by">
                                        <h2><a href="group_memberlist.php?gid=<?php echo $groupId; ?>&uid=<?php echo $val['uid']; ?>&cat=<?php echo $Cat; ?>&del=1" style="color: rgba(159, 27, 5, 0.94);"><?php if($admin==1){?>Kick out<?php }?></a></h2>
                                    </td>
                                    <td class="by">
                                        <?php if($val['mute']!=1){?>
                                        <h2><a href="group_memberlist.php?gid=<?php echo $groupId; ?>&uid=<?php echo $val['uid']; ?>&cat=<?php echo $Cat; ?>&mut=1"><font color="green"><?php if($admin==1 && $OwnerId != $val['uid']){?>Mute<?php }?></font></a></h2>
                                        <?php } else { ?>
                                        <h2><a href="group_memberlist.php?gid=<?php echo $groupId; ?>&uid=<?php echo $val['uid']; ?>&cat=<?php echo $Cat; ?>&unm=1"><font color="green"><?php if($admin==1 && $OwnerId != $val['uid']){?>Release<?php }?></font></a></h2>
                                        <?php }?>
                                    </td>
                                    <td class="by">
                                        <h2><a href="mailbox_sendgift.php?senderid=<?php echo $val['uid']; ?>">
                                            <img src="public/images/gift.png" style="width: auto; height: auto;max-width: 20px;max-height: 30px">
                                       </a></h2>
                                    </td>
                                </tr>
                                <?php }}?>
                                <?php } else if($Cat==1){ ?>
                                <?php
                                $ageTmp='Unknown';
                                ?>
                                <?php if(is_array($MemberList)){foreach($MemberList AS $key=>$val) { ?>
                                <?php if(age($val['birthday']) != $ageTmp){?>
                                <tr>
                                    <th style="width:80px;text-align: center;"><b><font color="#00008b"><?php if(!empty($val['birthday'])){?><?php echo age($val['birthday']); ?><?php } else { ?>Unknown<?php }?></font></b></th>
                                    <td class="common"></td>
                                    <td class="by"></td>
                                    <td class="by"></td>
                                    <td class="by"></td>
                                    <td class="by"></td>

                                </tr>
                                <tr>
                                    <?php }?>
                                <?php
                                    $chatmsg = dbselect('chat','*','uid='.$val['uid'].' and fid='.$_COOKIE['uid'].' and isread=0')
                                ?>
                                <tr style="width:80px;height:100px">
                                    <?php
                                    $LatestPost = dbSelect('gposts','pid, title,addtime','first=1 and gid='.$groupId.' and authorid='.$val['uid'].' and isdel = 0','pid desc');
                                ?>
                                    <th style="width:80px;height:100px;text-align: center;">
                                        <a href="member_home.php?uid=<?php echo $val['uid']; ?>" title="open in new window" target="_blank"><img src="<?php echo $val['picture']; ?>" style="width: auto; height: auto;max-width: 60px;max-height: 80px"></a>
                                        <a href="member_chatbox_index.php?uid=<?php echo $val['uid']; ?>"target="_blank">
                                            <?php if(!empty($chatmsg)){?>
                                            <img src="public/images/unread_Chat.png" style="width: auto; height: auto;max-width: 20px;max-height: 30px" >
                                            <?php } else { ?>
                                            <img src="public/images/read_Chat.png" style="width: auto; height: auto;max-width: 20px;max-height: 30px" >
                                            <?php }?></a>
                                        <h1 class="xs2"><a href="member_home.php?uid=<?php echo $val['uid']; ?>" class="xst" ><?php echo $val['username']; ?></a></h1>
                                    </th>
                                    <td class="common">
                                        <a href="group_post_detail.php?pid=<?php echo $LatestPost[0]['pid']; ?>" class="xst" style="font-size: medium"><?php if(!empty($LatestPost)){?><?php echo $LatestPost[0]['title']; ?><?php }?></a>
                                    </td>
                                    <td class="by">
                                        <?php if(!empty($LatestPost)){?>
                                        <em><span class="xi1"><?php echo formatTime($LatestPost[0]['addtime']); ?></span></em>
                                        <?php }?>
                                    </td>
                                    <td class="by">
                                        <h2><a href="group_memberlist.php?gid=<?php echo $groupId; ?>&uid=<?php echo $val['uid']; ?>&cat=<?php echo $Cat; ?>&del=1" style="color: rgba(159, 27, 5, 0.94);"><?php if($admin==1){?>Kick out<?php }?></a></h2>
                                    </td>
                                    <td class="by">
                                        <?php if($val['mute']!=1){?>
                                        <h2><a href="group_memberlist.php?gid=<?php echo $groupId; ?>&uid=<?php echo $val['uid']; ?>&cat=<?php echo $Cat; ?>&mut=1"><font color="green"><?php if($admin==1 && $OwnerId != $val['uid']){?>Mute<?php }?></font></a></h2>
                                        <?php } else { ?>
                                        <h2><a href="group_memberlist.php?gid=<?php echo $groupId; ?>&uid=<?php echo $val['uid']; ?>&cat=<?php echo $Cat; ?>&unm=1"><font color="green"><?php if($admin==1 && $OwnerId != $val['uid']){?>Release<?php }?></font></a></h2>
                                        <?php }?>
                                    </td>
                                    <td class="by">
                                        <h2><a href="mailbox_sendgift.php?senderid=<?php echo $val['uid']; ?>">
                                            <img src="public/images/gift.png" style="width: auto; height: auto;max-width: 20px;max-height: 30px">
                                        </a></h2>
                                    </td>
                                <?php
                                $ageTmp = age($val['birthday']);
                                ?>
                                </tr>
                                <?php }}?>
                                <?php } else if($Cat==2){ ?>
                                <?php
                                $proTmp='Unknown';
                                ?>
                                <?php if(is_array($MemberList)){foreach($MemberList AS $key=>$val) { ?>
                                <?php if(strMagic($val['profession']) != $proTmp){?>
                                <tr>
                                    <th style="width:80px;text-align: center;"><b><font color="#00008b"><?php if(!empty($val['profession'])){?> <?php echo strMagic($val['profession']); ?><?php } else { ?>Unknown<?php }?></font></b></th>
                                    <td class="common"></td>
                                    <td class="by"></td>
                                    <td class="by"></td>
                                    <td class="by"></td>
                                    <td class="by"></td>

                                </tr>
                                <tr>
                                    <?php }?>
                                    <?php
                                    $chatmsg = dbselect('chat','*','uid='.$val['uid'].' and fid='.$_COOKIE['uid'].' and isread=0')
                                ?>
                                <tr style="width:80px;height:100px">
                                    <?php
                                    $LatestPost = dbSelect('gposts','pid, title,addtime','first=1 and gid='.$groupId.' and authorid='.$val['uid'].' and isdel = 0','pid desc');
                                ?>
                                    <th style="width:80px;height:100px;text-align: center;">
                                        <a href="member_home.php?uid=<?php echo $val['uid']; ?>" title="open in new window" target="_blank"><img src="<?php echo $val['picture']; ?>" style="width: auto; height: auto;max-width: 60px;max-height: 80px"></a>
                                        <a href="member_chatbox_index.php?uid=<?php echo $val['uid']; ?>"target="_blank">
                                            <?php if(!empty($chatmsg)){?>
                                            <img src="public/images/unread_Chat.png" style="width: auto; height: auto;max-width: 20px;max-height: 30px" >
                                            <?php } else { ?>
                                            <img src="public/images/read_Chat.png" style="width: auto; height: auto;max-width: 20px;max-height: 30px" >
                                            <?php }?></a>
                                        <h1 class="xs2"><a href="member_home.php?uid=<?php echo $val['uid']; ?>" class="xst" ><?php echo $val['username']; ?></a></h1>
                                    </th>
                                    <td class="common">
                                        <a href="group_post_detail.php?pid=<?php echo $LatestPost[0]['pid']; ?>" class="xst" style="font-size: medium"><?php if(!empty($LatestPost)){?><?php echo $LatestPost[0]['title']; ?><?php }?></a>
                                    </td>
                                    <td class="by">
                                        <?php if(!empty($LatestPost)){?>
                                        <em><span class="xi1"><?php echo formatTime($LatestPost[0]['addtime']); ?></span></em>
                                        <?php }?>
                                    </td>
                                    <td class="by">
                                        <h2><a href="group_memberlist.php?gid=<?php echo $groupId; ?>&uid=<?php echo $val['uid']; ?>&cat=<?php echo $Cat; ?>&del=1" style="color: rgba(159, 27, 5, 0.94);"><?php if($admin==1){?>Kick out<?php }?></a></h2>
                                    </td>
                                    <td class="by">
                                        <?php if($val['mute']!=1){?>
                                        <h2><a href="group_memberlist.php?gid=<?php echo $groupId; ?>&uid=<?php echo $val['uid']; ?>&cat=<?php echo $Cat; ?>&mut=1"><font color="green"><?php if($admin==1 && $OwnerId != $val['uid']){?>Mute<?php }?></font></a></h2>
                                        <?php } else { ?>
                                        <h2><a href="group_memberlist.php?gid=<?php echo $groupId; ?>&uid=<?php echo $val['uid']; ?>&cat=<?php echo $Cat; ?>&unm=1"><font color="green"><?php if($admin==1 && $OwnerId != $val['uid']){?>Release<?php }?></font></a></h2>
                                        <?php }?>
                                    </td>
                                    <td class="by">
                                        <h2><a href="mailbox_sendgift.php?senderid=<?php echo $val['uid']; ?>">
                                            <img src="public/images/gift.png" style="width: auto; height: auto;max-width: 20px;max-height: 30px">
                                        </a></h2>
                                    </td>
                                    <?php
                             $proTmp = strMagic($val['profession']);
                                ?>
                                </tr>
                                <?php }}?>
                                <?php } else if($Cat==3){ ?>
                                <?php
                                $regionTmp='Unknown';
                                ?>
                                <?php if(is_array($MemberList)){foreach($MemberList AS $key=>$val) { ?>
                                <?php if(strMagic($val['region']) != $regionTmp){?>
                                <tr>
                                    <th style="width:80px;text-align: center;"><b><font color="#00008b"><?php if(!empty($val['region'])){?> <?php echo strMagic($val['region']); ?><?php } else { ?>Unknown<?php }?></font></b></th>
                                    <td class="common"></td>
                                    <td class="by"></td>
                                    <td class="by"></td>
                                    <td class="by"></td>
                                    <td class="by"></td>

                                </tr>
                                <tr>
                                    <?php }?>
                                    <?php
                                    $chatmsg = dbselect('chat','*','uid='.$val['uid'].' and fid='.$_COOKIE['uid'].' and isread=0')
                                ?>
                                <tr style="width:80px;height:100px">
                                    <?php
                                    $LatestPost = dbSelect('gposts','pid, title,addtime','first=1 and gid='.$groupId.' and authorid='.$val['uid'].' and isdel = 0','pid desc');
                                ?>
                                    <th style="width:80px;height:100px;text-align: center;">
                                        <a href="member_home.php?uid=<?php echo $val['uid']; ?>" title="open in new window" target="_blank"><img src="<?php echo $val['picture']; ?>" style="width: auto; height: auto;max-width: 60px;max-height: 80px"></a>
                                        <a href="member_chatbox_index.php?uid=<?php echo $val['uid']; ?>"target="_blank">
                                            <?php if(!empty($chatmsg)){?>
                                            <img src="public/images/unread_Chat.png" style="width: auto; height: auto;max-width: 20px;max-height: 30px" >
                                            <?php } else { ?>
                                            <img src="public/images/read_Chat.png" style="width: auto; height: auto;max-width: 20px;max-height: 30px" >
                                            <?php }?></a>
                                        <h1 class="xs2"><a href="member_home.php?uid=<?php echo $val['uid']; ?>" class="xst" ><?php echo $val['username']; ?></a></h1>
                                    </th>
                                    <td class="common">
                                        <a href="group_post_detail.php?pid=<?php echo $LatestPost[0]['pid']; ?>" class="xst" style="font-size: medium"><?php if(!empty($LatestPost)){?><?php echo $LatestPost[0]['title']; ?><?php }?></a>
                                    </td>
                                    <td class="by">
                                        <?php if(!empty($LatestPost)){?>
                                        <em><span class="xi1"><?php echo formatTime($LatestPost[0]['addtime']); ?></span></em>
                                        <?php }?>
                                    </td>
                                    <td class="by">
                                        <h2><a href="group_memberlist.php?gid=<?php echo $groupId; ?>&uid=<?php echo $val['uid']; ?>&cat=<?php echo $Cat; ?>&del=1" style="color: rgba(159, 27, 5, 0.94);"><?php if($admin==1){?>Kick out<?php }?></a></h2>
                                    </td>
                                    <td class="by">
                                        <?php if($val['mute']!=1){?>
                                        <h2><a href="group_memberlist.php?gid=<?php echo $groupId; ?>&uid=<?php echo $val['uid']; ?>&cat=<?php echo $Cat; ?>&mut=1"><font color="green"><?php if($admin==1 && $OwnerId != $val['uid']){?>Mute<?php }?></font></a></h2>
                                        <?php } else { ?>
                                        <h2><a href="group_memberlist.php?gid=<?php echo $groupId; ?>&uid=<?php echo $val['uid']; ?>&cat=<?php echo $Cat; ?>&unm=1"><font color="green"><?php if($admin==1 && $OwnerId != $val['uid']){?>Release<?php }?></font></a></h2>
                                        <?php }?>
                                    </td>
                                    <td class="by">
                                        <h2><a href="mailbox_sendgift.php?senderid=<?php echo $val['uid']; ?>">
                                            <img src="public/images/gift.png" style="width: auto; height: auto;max-width: 20px;max-height: 30px">
                                        </a></h2>
                                    </td>
                                    <?php
                             $regionTmp = strMagic($val['region']);
                                ?>
                                </tr>
                                <?php }}?>
                                <?php }?>

                            </table>
                        </form>
                    </div>
                </div>

                <div class="bm bw0 pgs cl">
                    <span  class="pgb y"><a href="index.php">Back</a></span>
                    <a></a></div>
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

