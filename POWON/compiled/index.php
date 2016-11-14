<?php include template("header.html");?>
<!--TOP start-->
<?php include template("top.html");?>
<!--TOP end-->

<!--HEAD start-->
<?php include template("head.html");?>
<!--HEAD end-->

<!--CONTENT start-->


<div id="wp" class="wp">
    <div id="pt" class="bm cl">
        <div class="z">
            <a href="./" class="nvhm" title="<?php echo $title; ?>"><?php echo $title; ?></a><em>&raquo;</em><a href="index.php">Home</a>
        </div>
        <?php if($_COOKIE['uid']  && $_COOKIE['username']){?>
        <div class="z">
            <?php
                        $user  = dbSelect('user','*','uid='.$_COOKIE['uid'].'');
             ?>
            <script>
                var  nextmonth= moment().add(30, 'day').unix();
                var expiretime = <?php echo $user[0]['expiretime']; ?>;
                if( expiretime < nextmonth){
                    var dayleft = Math.round((expiretime-moment().unix())/60/60/24);
                    document.write(String("Your membership will be expired in "+dayleft+" days ").fontcolor("red"))
                }
            </script>
        </div>
        <?php }?>

    </div>

    <div class="mn">
    </div>
    <div class="fl bm">
        <!--public start-->
        <div class="bm bmw  cl">
            <div class="bm_h cl">
                <h2><a>Public Information</a></h2>
            </div>
            <div id="public" class="bm_c">
                <table cellspacing="0" cellpadding="0" class="fl_tb">
                </table>
            </div>
        </div>
        <div id="publicpostlist" class="tl bm bmw">
            <div class="bm_c">
                <form method="post" autocomplete="off" name="moderate" id="moderate" action="">
                    <table summary="ppostlist" id="ppostlist" cellspacing="0" cellpadding="0">
                        <?php if(is_array($publicpost)){foreach($publicpost AS $key=>$val) { ?>
                        <tr>
                        <td class="icn">
                            <a href="admin_post_detail.php?pid=<?php echo $val['pid']; ?>" title="public post"><img src="<?php echo $domain_resource; ?>/images/folder_<?php if($val['addtime']>$newt){?>new<?php } else { ?>common<?php }?>.gif" /></a>
                        </td>
                        <th class="<?php if($val['addtime']>$newt){?>new<?php } else { ?>common<?php }?>">
                            <a href="admin_post_detail.php?pid=<?php echo $val['pid']; ?>" class="xst"><?php echo $val['title']; ?></a>
                            <p>
                                <?php echo stringSubstr($val['content'],0,1000); ?>
                            </p>
                        </th>
                        <td class="by" style="text-align: center">
                            <cite><font color="#00008b"><?php echo getUserName($val['authorid']); ?></font></cite>
                            <em><span class="xi1"><?php echo formatTime($val['addtime']); ?></span></em>
                        </td>
                    </tr>

                        <?php }}?>
                    </table>
                </form>
            </div>
        </div>
        <!--public end-->


        <?php if($_COOKIE['uid']  && $_COOKIE['username']){?>

        <!--&lt;!&ndash;friend start&ndash;&gt;-->
        <!--<div class="bm bmw cl">-->
            <!--<div class="bm_h cl">-->
                <!--<th>-->
                    <!--<a href="member.php?mlist=1&cat=0"><b>My Friends</b></a>-->
                <!--</th>-->
                <!--&lt;!&ndash;{if !empty($FriendRequest)}&ndash;&gt;-->
                <!--<td><span class="pipe">|</span></td>-->
                <!--<td class="common" style="text-align: right">-->
                    <!--<a href="home_friend.php" style="color: rgba(159, 27, 5, 0.94);"><b>You have a friend request</b></a>-->
                <!--</td>-->
                <!--&lt;!&ndash;{/if}&ndash;&gt;-->
            <!--</div>-->
            <!--<div id="friendlist" class="bm_c">-->
                <!--<table cellspacing="0" cellpadding="0" class="fl_tb">-->
                    <!--&lt;!&ndash;{loop $FriendList $key $val}&ndash;&gt;-->
                    <!--&lt;!&ndash;{if $key%8==0 and $key!=0}&ndash;&gt;<tr> </tr>&lt;!&ndash;{/if}&ndash;&gt;-->
                    <!--<?php-->
                        <!--$msg = dbselect('chat','*','uid='.$val['uid'].' and fid='.$_COOKIE['uid'].' and isread=0')-->
                    <!--?>-->
                    <!--<td style="width:80px;height:100px;text-align: center;" >-->
                        <!--<a href="member_home.php?uid=<?php echo $val['uid']; ?>"><img src="<?php echo $val['picture']; ?>" style="width: auto; height: auto;max-width: 60px;max-height: 80px" ></a>-->
                        <!--<a href="member_chatbox_index.php?uid=<?php echo $val['uid']; ?>"target="_blank">-->
                            <!--&lt;!&ndash;{if !empty($msg)}&ndash;&gt;-->
                            <!--<img src="public/images/unread_Chat.png" style="width: auto; height: auto;max-width: 20px;max-height: 30px" >-->
                            <!--&lt;!&ndash;{else}&ndash;&gt;-->
                            <!--<img src="public/images/read_Chat.png" style="width: auto; height: auto;max-width: 20px;max-height: 30px" >-->
                            <!--&lt;!&ndash;{/if}&ndash;&gt;</a>-->
                        <!--<h2><p><span class="xi2"><?php echo $val['username']; ?></span></p></h2>-->
                    <!--</td>-->
                    <!--&lt;!&ndash;{/loop}&ndash;&gt;-->
                    <!--&lt;!&ndash;{if $FriendListRest!=0 and !empty($FriendList)}&ndash;&gt;-->
                    <!--<?php-->
                    <!--for($i = 1;$i <= $FriendListRest; $i++){-->
                    <!--echo '<td style="width:80px;height:100px;text-align: center;" ></td>';-->
                    <!--}-->
                    <!--?>-->
                    <!--&lt;!&ndash;{/if}&ndash;&gt;-->
                <!--</table>-->
            <!--</div>-->
        <!--</div>-->
        <!--&lt;!&ndash;friend end&ndash;&gt;-->

        <!--group start-->
        <!--<div class="bm bmw  cl">-->
            <!--<div class="bm_h cl">-->
                <!--<b><a href="group.php?glist=1&cat=0">My Groups</a></b>-->
                <!--<td><span class="pipe">|</span></td>-->
                <!--<td class="common" style="text-align: right">-->
                    <!--<b><a href="group_reg.php" style="color: rgba(159, 27, 5, 0.94);">Create Group</a></b>-->
                <!--</td>-->
            <!--</div>-->
            <!--<div id="your_groups" class="bm_c">-->
                <!--<table cellspacing="0" cellpadding="0" class="fl_tb">-->
                    <!--&lt;!&ndash;{loop $GrMenu $key $val}&ndash;&gt;-->
                    <!--&lt;!&ndash;{if $key%4==0 and $key!=0}&ndash;&gt;<tr> </tr>&lt;!&ndash;{/if}&ndash;&gt;-->
                    <!--<td style="width:60px;height:80px;text-align: center;" >-->
                        <!--<a href="group_postlist.php?gid=<?php echo $val['gid']; ?>"><img src="<?php echo $val['grouppic']; ?>" style="width: auto; height: auto;max-width: 60px;max-height: 80px" alt="<?php echo $val['name']; ?>" /></a>-->
                    <!--</td>-->
                    <!--<td>-->
                        <!--<h2><a href="group_postlist.php?gid=<?php echo $val['gid']; ?>" style="color:<?php echo $val['namestyle']; ?>"><?php echo $val['name']; ?></a></h2>-->
                        <!--<p class="xg2"><?php echo $val['description']; ?></p>-->
                        <!--&lt;!&ndash;{if !empty($val['owner'])}&ndash;&gt;-->
                        <!--<p>Owner: <span class="xi2"><?php echo getUserName($val['owner']); ?></span></p>-->
                        <!--&lt;!&ndash;{/if}&ndash;&gt;-->
                    <!--</td>-->
                    <!--&lt;!&ndash;{/loop}&ndash;&gt;-->
                <!--</table>-->
            <!--</div>-->
        <!--</div>-->
        <!--group end-->

        <!--friend Posts start-->
        <div class="boardnav">
            <div id="ctf" class="wp cl">
                <div class="bm bmw cl">
                    <div class="bm_h cl">
                            <table cellspacing="0" cellpadding="0">
                                <tr>
                                    <th colspan="2">
                                        <a href="member.php?mlist=1&cat=0"><b>My Friends Latest Posts</b></a>
                                    </th>
                                </tr>
                            </table>
                    </div>
                    <div id="threadlist" class="tl bm bmw">
                        <p class="bm_c">
                            <table summary="forum_2" id="forum_2" cellspacing="0" cellpadding="0">
                                <?php if(is_array($FriendList)){foreach($FriendList AS $key=>$val) { ?>
                                <?php
                                $select='g.pid as pid, g.title as title, g.authorid as authorid,g.addtime as addtime,g.image as image, g.replycount as replycount, g.hits as hits, g.content as content';
                                $LatestPost = DBduoSelect('uposts as g','upostspermission as p','on g.pid=p.pid',null,null,$select,'g.first=1 and g.isdel=0 and p.uid='.$_COOKIE['uid'].' and authorid='.$val['uid'].' and p.view=1','g.pid desc');
                                //$LatestPost = dbSelect('uposts','pid,title,addtime,image,content','first=1 and authorid='.$val['uid'].' and isdel = 0','pid desc',1);
                            ?>
                                <?php if(!empty($LatestPost)){?>
                                <tr>

                                    <cite><font color="#00008b"><?php echo getUserName($LatestPost[0]['authorid']); ?> </font><em><span class="xi1"><?php echo getFormatTime($LatestPost[0]['addtime']); ?></span></em> </cite>

                                    <p><a href="member_post_detail.php?pid=<?php echo $LatestPost[0]['pid']; ?>" class="xst" style="font-size: medium">
                                        <?php if(!empty($LatestPost)){?> <h1><?php echo $LatestPost[0]['title']; ?></h1> <?php }?></a></p>
                                        <p>
                                            <?php echo stringSubstr($LatestPost[0]['content'],0,1000); ?>
                                        </p>
                                    </p>
                                    <a title="member_post_detail.php?pid=<?php echo $LatestPost[0]['pid']; ?>"><img src="<?php echo $LatestPost[0]['image']; ?>" style="width: auto; height: auto;max-width: 160px;max-height: 200px"></a>
                                    <?php echo $LatestPost[0]['video']; ?>


                                    <!--<p  style="text-align: right">-->
                                        <!--<cite><?php echo getUserName($LatestPost[0]['authorid']); ?> </cite>-->
                                        <!--<em><span class="xi1"><?php echo getFormatTime($LatestPost[0]['addtime']); ?></span></em>-->
                                    <!--</p>-->

                                <br/>
                                <br/>

                                </tr>



                                </hr>

                                <?php }?>
                                <?php }}?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--friend Posts end-->

        <!--Group Posts start-->
        <div class="boardnav">
            <div id="ctg" class="wp cl">
                <div class="bm bmw cl">
                    <div class="bm_h cl">
                        <table cellspacing="0" cellpadding="0">
                            <tr>
                                <th colspan="2">
                                    <a href="group.php?glist=1&cat=0"><b>My Groups Latest Posts</b></a>
                                </th>
                            </tr>
                        </table>
                    </div>
                    <div id="gthreadlist" class="tl bm bmw">

                        <div class="bm_c">
                            <table summary="forum_2" id="forum_3" cellspacing="0" cellpadding="0">
                                <?php if(is_array($GrMenu)){foreach($GrMenu AS $key=>$val) { ?>
                                <?php
                                $select='g.pid as pid, g.title as title, g.authorid as authorid,g.addtime as addtime,g.image as image, g.replycount as replycount, g.hits as hits, g.content as content';
                                $LatestPost = DBduoSelect('gposts as g','gpostspermission as p','on g.pid=p.pid',null,null,$select,'g.first=1 and g.isdel=0 and p.uid='.$_COOKIE['uid'].' and gid='.$val['gid'].' and p.view=1','g.pid desc');
                                //$LatestPost = dbSelect('gposts','pid, title,addtime,image,authorid','first=1 and gid='.$val['gid'].' and isdel = 0','pid desc',1);
                                ?>
                                <?php if(!empty($LatestPost)){?>
                                <tr>

                                    <center><b><a href="group_postlist.php?gid=<?php echo $val['gid']; ?>" style="color:<?php echo $val['namestyle']; ?>" ><?php echo $val['name']; ?> Group</a></b> </center>


                                    <cite><font color="#00008b"><?php echo getUserName($LatestPost[0]['authorid']); ?> </font><em><span class="xi1"><?php echo getFormatTime($LatestPost[0]['addtime']); ?></span></em> </cite>

                                    <p>
                                        <a href="group_post_detail.php?pid=<?php echo $LatestPost[0]['pid']; ?>" class="xst" style="font-size: medium">
                                            <?php if(!empty($LatestPost)){?> <h1> <?php echo $LatestPost[0]['title']; ?> </h1><?php }?></a>
                                        <p>
                                           <?php echo stringSubstr($LatestPost[0]['content'],0,1000); ?>
                                        </p>
                                    </p>
                                    <?php if(!empty($LatestPost[0]['image'])){?>
                                        <a title="group_post_detail.php?pid=<?php echo $LatestPost[0]['pid']; ?>"><img src="<?php echo $LatestPost[0]['image']; ?>" style="width: auto; height: auto;max-width: 160px;max-height: 200px"></a>
                                    <?php }?>
                                    <?php if(!empty($LatestPost[0]['video'])){?>
                                    <?php echo $LatestPost[0]['video']; ?>
                                    <?php }?>
                                </tr>
                                </hr>
                                <br/>
                                <br/>
                                <?php }?>



                                <?php }}?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--friend Posts end-->


        <!--user start-->
        <!--<div class="bm bmw  cl">-->
            <!--<div class="bm_h cl">-->
                <!--<h2><a href="member.php?mlist=0&cat=0">All POWON Members</a></h2>-->
            <!--</div>-->
            <!--<div id="memberlist" class="bm_c">-->
                <!--<table cellspacing="0" cellpadding="0" class="fl_tb">-->
                    <!--&lt;!&ndash;{loop $UserList $key $val}&ndash;&gt;-->
                    <!--&lt;!&ndash;{if $key%8==0 and $key!=0}&ndash;&gt;<tr> </tr>&lt;!&ndash;{/if}&ndash;&gt;-->
                    <!--<?php-->
                        <!--$msg = dbselect('chat','*','uid='.$val['uid'].' and fid='.$_COOKIE['uid'].' and isread=0')-->
                    <!--?>-->
                    <!--<td style="width:80px;height:100px;text-align: center;" >-->
                        <!--<a href="member_home.php?uid=<?php echo $val['uid']; ?>"><img src="<?php echo $val['picture']; ?>" style="width: auto; height: auto;max-width: 60px;max-height: 80px" ></a>-->
                        <!--<a href="member_chatbox_index.php?uid=<?php echo $val['uid']; ?>"target="_blank">-->
                            <!--&lt;!&ndash;{if !empty($msg)}&ndash;&gt;-->
                            <!--<img src="public/images/unread_Chat.png" style="width: auto; height: auto;max-width: 20px;max-height: 30px" >-->
                            <!--&lt;!&ndash;{else}&ndash;&gt;-->
                            <!--<img src="public/images/read_Chat.png" style="width: auto; height: auto;max-width: 20px;max-height: 30px" >-->
                            <!--&lt;!&ndash;{/if}&ndash;&gt;</a>-->
                        <!--<h2><p><span class="xi2"><?php echo $val['username']; ?></span></p></h2>-->
                    <!--</td>-->
                    <!--&lt;!&ndash;{/loop}&ndash;&gt;-->

                    <!--<?php-->
                    <!--for($i = 1;$i <= $UserListRest; $i++){-->
                    <!--echo '<td style="width:80px;height:100px;text-align: center;" ></td>';-->
                        <!--}-->
                    <!--?>-->
                <!--</table>-->
            <!--</div>-->
        <!--</div>-->
        <!--user end-->

        <!--group start-->
        <!--<div class="bm bmw  cl">-->
            <!--<div class="bm_h cl">-->
                <!--<b><a href="group.php?glist=0&cat=0">All Groups</a></b>-->
                <!--<td><span class="pipe">|</span></td>-->
                <!--<td class="common" style="text-align: right">-->
                    <!--<b><a href="group_reg.php" style="color: rgba(159, 27, 5, 0.94);">Create Group</a></b>-->
                <!--</td>-->
            <!--</div>-->
            <!--<div id="all_groups" class="bm_c">-->
                <!--<table cellspacing="0" cellpadding="0" class="fl_tb">-->
                    <!--&lt;!&ndash;{loop $GrMenuAll $key $val}&ndash;&gt;-->
                    <!--&lt;!&ndash;{if $key%4==0 and $key!=0}&ndash;&gt;<tr> </tr>&lt;!&ndash;{/if}&ndash;&gt;-->
                    <!--<td style="width:60px;height:80px;text-align: center;" >-->
                        <!--<a href="group_info.php?gid=<?php echo $val['gid']; ?>"><img src="<?php echo $val['grouppic']; ?>" style="width: auto; height: auto;max-width: 60px;max-height: 80px" alt="<?php echo $val['name']; ?>" /></a>-->
                    <!--</td>-->
                    <!--<td>-->
                        <!--<h2><a href="group_info.php?gid=<?php echo $val['gid']; ?>" style="color:<?php echo $val['namestyle']; ?>"><?php echo $val['name']; ?></a></h2>-->
                        <!--<p class="xg2"><?php echo $val['description']; ?></p>-->
                        <!--&lt;!&ndash;{if !empty($val['owner'])}&ndash;&gt;-->
                        <!--<p>Owner: <span class="xi2"><?php echo getUserName($val['owner']); ?></span></p>-->
                        <!--&lt;!&ndash;{/if}&ndash;&gt;-->
                    <!--</td>-->
                    <!--&lt;!&ndash;{/loop}&ndash;&gt;-->
                <!--</table>-->
            <!--</div>-->
        <!--</div>-->
        <!--group end-->
        <?php }?>

    </div>


</div>
</div>
</div>
<!--CONTENT end-->

<!--FOOT start-->
<?php include template("footer.html");?>
<!--FOOT end-->
</body>
</html>

