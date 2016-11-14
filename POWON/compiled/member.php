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
            <a href="./" class="nvhm" title="<?php echo $title; ?>"><?php echo $title; ?></a><em>&raquo;</em><a href="index.php">Home</a><em>&raquo;</em><?php if($Mlist==0){?>All POWON Members<?php } else { ?>My Friends<?php }?>
        </div>
        <div class="z"></div>
    </div>

    <?php if($Cat==0){?>
    <?php if($Mlist==0){?>
    <div class="mn">
    </div>
    <div class="fl bm">
        <div class="bm bmw  cl">
            <div class="bm_h cl">
                <table cellspacing="0" cellpadding="0">
                    <th>
                        <h2><a>All POWON Members</a></h2>
                    </th>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <td><h2>Order by<a href="member.php?mlist=0&cat=0"> default</a></h2></td>
                    <td><span class="pipe">|</span></td>
                    <td><h2><a href="member.php?mlist=0&cat=1"> age</a></h2></td>
                    <td><span class="pipe">|</span></td>
                    <td><h2><a href="member.php?mlist=0&cat=2"> profession</a></h2></td>
                    <td><span class="pipe">|</span></td>
                    <td><h2><a href="member.php?mlist=0&cat=3"> region</a></h2></td>
                </table>
            </div>
            <div id="memberlist" class="bm_c">
                <table cellspacing="0" cellpadding="0" class="fl_tb">
                    <?php if(is_array($UserList)){foreach($UserList AS $key=>$val) { ?>
                    <?php if($key%8==0 and $key!=0){?><tr> </tr><?php }?>
                    <td style="width:80px;height:100px;text-align: center;" >
                        <a href="member_home.php?uid=<?php echo $val['uid']; ?>"><img src="<?php echo $val['picture']; ?>" style="width: auto; height: auto;max-width: 60px;max-height: 80px" ></a>
                        <a href="member_chatbox_index.php?uid=<?php echo $val['uid']; ?>"target="_blank">
                            <?php if(!empty($chatmsg)){?>
                            <img src="public/images/unread_Chat.png" style="width: auto; height: auto;max-width: 20px;max-height: 30px" >
                            <?php } else { ?>
                            <img src="public/images/read_Chat.png" style="width: auto; height: auto;max-width: 20px;max-height: 30px" >
                            <?php }?></a>
                        <h2><p><span class="xi2"><?php echo $val['username']; ?></span></p></h2>
                    </td>
                    <?php }}?>
                    <?php
                    for($i = 1;$i <= $UserListRest; $i++){
                    echo '<td style="width:80px;height:100px;text-align: center;" ></td>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <?php } else if($Mlist==1){ ?>
    <div class="mn">
    </div>
    <div class="fl bm">
        <div class="bm bmw  cl">
            <div class="bm_h cl">
                <table cellspacing="0" cellpadding="0">
                    <th>
                        <h2><a>My Friends</a></h2>
                    </th>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <td><h2>Order by<a href="member.php?mlist=1&cat=0"> default</a></h2></td>
                    <td><span class="pipe">|</span></td>
                    <td><h2><a href="member.php?mlist=1&cat=1"> age</a></h2></td>
                    <td><span class="pipe">|</span></td>
                    <td><h2><a href="member.php?mlist=1&cat=2"> profession</a></h2></td>
                    <td><span class="pipe">|</span></td>
                    <td><h2><a href="member.php?mlist=1&cat=3"> region</a></h2></td>
                    <?php if(!empty($FriendRequest)){?>
                    <td><span class="pipe">|</span></td>
                    <td class="common" style="text-align: right">
                        <a href="home_friend.php" style="color: rgba(159, 27, 5, 0.94);"><b>You have a friend request</b></a>
                    </td>
                    <?php }?>
                </table>
            </div>
            <div id="friendslist" class="bm_c">
                <table cellspacing="0" cellpadding="0" class="fl_tb">
                    <tr>
                        <th><b><font color="#00008b">Normal Friends</font></b></th>
                    </tr>
                    <?php if(is_array($FriendList)){foreach($FriendList AS $key=>$val) { ?>
                    <?php if($key%8==0 and $key!=0){?><tr> </tr><?php }?>
                    <td style="width:80px;height:100px;text-align: center;" >
                        <a href="member_home.php?uid=<?php echo $val['uid']; ?>"><img src="<?php echo $val['picture']; ?>" style="width: auto; height: auto;max-width: 60px;max-height: 80px" ></a>
                        <a href="member_chatbox_index.php?uid=<?php echo $val['uid']; ?>"target="_blank">
                            <?php if(!empty($chatmsg)){?>
                            <img src="public/images/unread_Chat.png" style="width: auto; height: auto;max-width: 20px;max-height: 30px" >
                            <?php } else { ?>
                            <img src="public/images/read_Chat.png" style="width: auto; height: auto;max-width: 20px;max-height: 30px" >
                            <?php }?></a>
                        <h2><p><span class="xi2"><?php echo $val['username']; ?></span></p></h2>
                        <h2><a href="mailbox_sendgift.php?senderid=<?php echo $val['uid']; ?>">
                            <img src="public/images/gift.png" style="width: auto; height: auto;max-width: 20px;max-height: 30px">
                        </a></h2>
                    </td>
                    <?php }}?>
                    <?php if(!empty($FriendList)){?>
                    <?php
                    for($i = 1;$i <= $FriendListRest; $i++){
                    echo '<td style="width:80px;height:100px;text-align: center;" ></td>';
                    }
                    ?>
                    <?php }?>
                    <tr>
                        <th><b><font color="#00008b">My Family</font></b></th>
                    </tr>
                    <?php if(is_array($FamilyList)){foreach($FamilyList AS $key=>$val) { ?>
                    <?php if($key%8==0 and $key!=0){?><tr> </tr><?php }?>
                    <td style="width:80px;height:100px;text-align: center;" >
                        <a href="member_home.php?uid=<?php echo $val['uid']; ?>"><img src="<?php echo $val['picture']; ?>" style="width: auto; height: auto;max-width: 60px;max-height: 80px" ></a>
                        <h2><p><span class="xi2"><?php echo $val['username']; ?></span></p></h2>
                        <h2><a href="mailbox_sendgift.php?senderid=<?php echo $val['uid']; ?>">
                            <img src="public/images/gift.png" style="width: auto; height: auto;max-width: 20px;max-height: 30px">
                        </a></h2>
                    </td>
                    <?php }}?>
                    <?php if(!empty($FamilyList)){?>
                    <?php
                    for($i = 1;$i <= $FamilyListRest; $i++){
                    echo '<td style="width:80px;height:100px;text-align: center;" ></td>';
                    }
                    ?>
                    <?php }?>
                    <tr>
                        <th><b><font color="#00008b">My Colleagues</font></b></th>
                    </tr>
                    <?php if(is_array($ColleagueList)){foreach($ColleagueList AS $key=>$val) { ?>
                    <?php if($key%8==0 and $key!=0){?><tr> </tr><?php }?>
                    <td style="width:80px;height:100px;text-align: center;" >
                        <a href="member_home.php?uid=<?php echo $val['uid']; ?>"><img src="<?php echo $val['picture']; ?>" style="width: auto; height: auto;max-width: 60px;max-height: 80px" ></a>
                        <h2><p><span class="xi2"><?php echo $val['username']; ?></span></p></h2>
                        <h2><a href="mailbox_sendgift.php?senderid=<?php echo $val['uid']; ?>">
                            <img src="public/images/gift.png" style="width: auto; height: auto;max-width: 20px;max-height: 30px">
                        </a></h2>
                    </td>
                    <?php }}?>
                    <?php if(!empty($ColleagueList)){?>
                    <?php
                    for($i = 1;$i <= $ColleagueListRest; $i++){
                    echo '<td style="width:80px;height:100px;text-align: center;" ></td>';
                    }
                    ?>
                    <?php }?>
                </table>
            </div>
        </div>
    </div>
    <?php }?>
    <?php } else if($Cat==1){ ?>
    <div class="mn">
    </div>
    <div class="fl bm">
        <div class="bm bmw  cl">
            <div class="bm_h cl">
                <table cellspacing="0" cellpadding="0">
                    <th>
                        <h2><a><?php if($Mlist==0){?>All POWON Members<?php } else { ?>My Friends<?php }?></a></h2>
                    </th>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <td><h2>Order by<a href="member.php?mlist=<?php if($Mlist==0){?>0<?php } else { ?>1<?php }?>&cat=0"> default</a></h2></td>
                    <td><span class="pipe">|</span></td>
                    <td><h2><a href="member.php?mlist=<?php if($Mlist==0){?>0<?php } else { ?>1<?php }?>&cat=1"> age</a></h2></td>
                    <td><span class="pipe">|</span></td>
                    <td><h2><a href="member.php?mlist=<?php if($Mlist==0){?>0<?php } else { ?>1<?php }?>&cat=2"> profession</a></h2></td>
                    <td><span class="pipe">|</span></td>
                    <td><h2><a href="member.php?mlist=<?php if($Mlist==0){?>0<?php } else { ?>1<?php }?>&cat=3"> region</a></h2></td>
                    <?php if($Mlist==1){?>
                    <?php if(!empty($FriendRequest)){?>
                    <td><span class="pipe">|</span></td>
                    <td class="common" style="text-align: right">
                        <a href="home_friend.php" style="color: rgba(159, 27, 5, 0.94);"><b>You have a friend request</b></a>
                    </td>
                    <?php }?>
                    <?php }?>
                </table>
            </div>
            <div id="memberlist" class="bm_c">
                <table cellspacing="0" cellpadding="0" class="fl_tb">
                    <?php
                    $ageTmp='Unknown';
                    $tdnum = 0;
                                ?>
                    <?php if(is_array($UserList)){foreach($UserList AS $key=>$val) { ?>
                    <?php if(age($val['birthday']) != $ageTmp){?>
                    <tr>
                        <th colspan="8"><b><font color="#00008b"><?php if(!empty($val['birthday'])){?><?php echo age($val['birthday']); ?><?php } else { ?>Unknown<?php }?></font></b></th>
                    </tr>
                    <tr>
                        <?php $tdnum=0 ?>
                    <?php }?>
                        <td style="width:80px;height:100px;text-align: center;" >
                            <a href="member_home.php?uid=<?php echo $val['uid']; ?>"><img src="<?php echo $val['picture']; ?>" style="width: auto; height: auto;max-width: 60px;max-height: 80px" ></a>
                            <h2><p><span class="xi2"><?php echo $val['username']; ?></span></p></h2>
                        </td>
                        <?php
                            $tdnum+=1;
                            $ageTmp = age($val['birthday']);
                                ?>
                        <?php if($tdnum == 8){?>
                    </tr>
                    <tr>
                        <?php $tdnum=0 ?>
                        <?php }?>
                        <?php }}?>
                        <?php if($tdnum != 8){?>
                    </tr>
                    <?php }?>
                </table>
            </div>
        </div>
    </div>
    <?php } else if($Cat==2){ ?>
    <div class="mn">
</div>
    <div class="fl bm">
        <div class="bm bmw  cl">
            <div class="bm_h cl">
                <table cellspacing="0" cellpadding="0">
                    <th>
                        <h2><a><?php if($Mlist==0){?>All POWON Members<?php } else { ?>My Friends<?php }?></a></h2>
                    </th>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <td><h2>Order by<a href="member.php?mlist=<?php if($Mlist==0){?>0<?php } else { ?>1<?php }?>&cat=0"> default</a></h2></td>
                    <td><span class="pipe">|</span></td>
                    <td><h2><a href="member.php?mlist=<?php if($Mlist==0){?>0<?php } else { ?>1<?php }?>&cat=1"> age</a></h2></td>
                    <td><span class="pipe">|</span></td>
                    <td><h2><a href="member.php?mlist=<?php if($Mlist==0){?>0<?php } else { ?>1<?php }?>&cat=2"> profession</a></h2></td>
                    <td><span class="pipe">|</span></td>
                    <td><h2><a href="member.php?mlist=<?php if($Mlist==0){?>0<?php } else { ?>1<?php }?>&cat=3"> region</a></h2></td>
                    <?php if($Mlist==1){?>
                    <?php if(!empty($FriendRequest)){?>
                    <td><span class="pipe">|</span></td>
                    <td class="common" style="text-align: right">
                        <a href="home_friend.php" style="color: rgba(159, 27, 5, 0.94);"><b>You have a friend request</b></a>
                    </td>
                    <?php }?>
                    <?php }?>
                </table>
            </div>
            <div id="memberlist" class="bm_c">
                <table cellspacing="0" cellpadding="0" class="fl_tb">
                    <?php
                    $proTmp='Unknown';
                    $tdnum = 0;
                                ?>
                    <?php if(is_array($UserList)){foreach($UserList AS $key=>$val) { ?>
                    <?php if(strMagic($val['profession']) != $proTmp){?>
                    <tr>
                        <th colspan="8"><b><font color="#00008b"><?php if(!empty($val['profession'])){?> <?php echo strMagic($val['profession']); ?><?php } else { ?>Unknown<?php }?></font></b></th>
                    </tr>
                    <tr>
                        <?php $tdnum=0 ?>
                        <?php }?>
                        <td style="width:80px;height:100px;text-align: center;" >
                            <a href="member_home.php?uid=<?php echo $val['uid']; ?>"><img src="<?php echo $val['picture']; ?>" style="width: auto; height: auto;max-width: 60px;max-height: 80px" ></a>
                            <h2><p><span class="xi2"><?php echo $val['username']; ?></span></p></h2>
                        </td>
                        <?php
                            $tdnum+=1;
                            $proTmp = strMagic($val['profession']);
                                ?>
                        <?php if($tdnum == 8){?>
                    </tr>
                    <tr>
                        <?php $tdnum=0 ?>
                        <?php }?>
                        <?php }}?>
                        <?php if($tdnum != 8){?>
                    </tr>
                    <?php }?>
                </table>
            </div>
        </div>
    </div>
    <?php } else if($Cat==3){ ?>
    <div class="mn">
    </div>
    <div class="fl bm">
        <div class="bm bmw  cl">
            <div class="bm_h cl">
                <table cellspacing="0" cellpadding="0">
                    <th>
                        <h2><a><?php if($Mlist==0){?>All POWON Members<?php } else { ?>My Friends<?php }?></a></h2>
                    </th>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <td><h2>Order by<a href="member.php?mlist=<?php if($Mlist==0){?>0<?php } else { ?>1<?php }?>&cat=0"> default</a></h2></td>
                    <td><span class="pipe">|</span></td>
                    <td><h2><a href="member.php?mlist=<?php if($Mlist==0){?>0<?php } else { ?>1<?php }?>&cat=1"> age</a></h2></td>
                    <td><span class="pipe">|</span></td>
                    <td><h2><a href="member.php?mlist=<?php if($Mlist==0){?>0<?php } else { ?>1<?php }?>&cat=2"> profession</a></h2></td>
                    <td><span class="pipe">|</span></td>
                    <td><h2><a href="member.php?mlist=<?php if($Mlist==0){?>0<?php } else { ?>1<?php }?>&cat=3"> region</a></h2></td>
                    <?php if($Mlist==1){?>
                    <?php if(!empty($FriendRequest)){?>
                    <td><span class="pipe">|</span></td>
                    <td class="common" style="text-align: right">
                        <a href="home_friend.php" style="color: rgba(159, 27, 5, 0.94);"><b>You have a friend request</b></a>
                    </td>
                    <?php }?>
                    <?php }?>
                </table>
            </div>
            <div id="memberlist" class="bm_c">
                <table cellspacing="0" cellpadding="0" class="fl_tb">
                    <?php
                    $proTmp='Unknown';
                    $tdnum = 0;
                                ?>
                    <?php if(is_array($UserList)){foreach($UserList AS $key=>$val) { ?>
                    <?php if(strMagic($val['region']) != $proTmp){?>
                    <tr>
                        <th colspan="8"><b><font color="#00008b"><?php if(!empty($val['region'])){?> <?php echo $val['region']; ?><?php } else { ?>Unknown<?php }?></font></b></th>
                    </tr>
                    <tr>
                        <?php $tdnum=0 ?>
                        <?php }?>
                        <td style="width:80px;height:100px;text-align: center;" >
                            <a href="member_home.php?uid=<?php echo $val['uid']; ?>"><img src="<?php echo $val['picture']; ?>" style="width: auto; height: auto;max-width: 60px;max-height: 80px" ></a>
                            <h2><p><span class="xi2"><?php echo $val['username']; ?></span></p></h2>
                        </td>
                        <?php
                            $tdnum+=1;
                            $proTmp = strMagic($val['region']);
                                ?>
                        <?php if($tdnum == 8){?>
                    </tr>
                    <tr>
                        <?php $tdnum=0 ?>
                        <?php }?>
                        <?php }}?>
                        <?php if($tdnum != 8){?>
                    </tr>
                    <?php }?>
                </table>
            </div>
        </div>
    </div>
    <?php }?>

<!--CONTENT end-->

<!--FOOT start-->
<?php include template("footer.html");?>
<!--FOOT end-->
</body>
</html>

