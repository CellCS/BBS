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
            <a href="./" class="nvhm" title="Home"><?php echo $title; ?></a> <em>&rsaquo;</em><a href="home.php">User Page</a> <em>&rsaquo;</em><a href="home.php">Personal Information</a> <em>&rsaquo;</em>Profile Visibility to Singal Member
        </div>
    </div>
    <div id="ct" class="ct2_a wp cl">
        <div class="mn">
            <div class="bm bw0">
                <ul class="tb cl">
                    <li class="a"><a href="home_infopermission.php">Profile visibility to single member when profiles are set to 'visible to friends / group mates'</a></li>
                </ul>
                <form action="home_infopermission.php" method="post" autocomplete="off">
                    <table cellspacing="0" cellpadding="0" class="tfm" id="profilelist">
                        <tr>
                            <th style="text-align: center;" ><b>Friends</b></th>
                            <td><p>First Name</p><p>visibility</p></td>
                            <td><p>Last Name</p><p>visibility</p></td>
                            <td><p>Gender</p><p>visibility</p></td>
                            <td><p>Birthday</p><p>visibility</p></td>
                            <td><p>Profession</p><p>visibility</p></td>
                            <td><p>Address</p><p>visibility</p></td>
                            <td><p>Region</p><p>visibility</p></td>
                        </tr>
                            <?php if(is_array($FriendList)){foreach($FriendList AS $key=>$val) { ?>
                        <?php
                        $vpermission = dbselect('profilevisiblemember','*','uid='.$_COOKIE['uid'].' and tid='.$val['uid'].'');
                     ?>
                        <tr><input name="vpermission<?php echo $val['uid']; ?>" type="hidden" value="<?php echo empty($vpermission); ?>" />
                        <td style="width:80px;height:100px;text-align: center;" >
                            <a href="member_home.php?uid=<?php echo $val['uid']; ?>"><img src="<?php echo $val['picture']; ?>" style="width: auto; height: auto;max-width: 60px;max-height: 80px" ></a>
                            <h2><p><span class="xi2"><?php echo $val['username']; ?></span></p></h2>
                        </td>
                        <td>
                            <select name="firstnamevisible<?php echo $val['uid']; ?>" id="firstnamevisible<?php echo $val['uid']; ?>" class="ps" >
                                <option value="0">not allowed</option>
                                <option value="1" <?php if(empty($vpermission) || $vpermission[0]['firstname_visible']==1){?>selected="selected"<?php }?>>allowed</option>
                            </select>
                        </td>
                        <td>
                            <select name="lastnamevisible<?php echo $val['uid']; ?>" id="lastnamevisible<?php echo $val['uid']; ?>" class="ps">
                                <option value="0">not allowed</option>
                                <option value="1" <?php if(empty($vpermission) || $vpermission[0]['lastname_visible']==1){?>selected="selected"<?php }?>>allowed</option>
                            </select>
                        </td>
                        <td>
                            <select name="gendervisible<?php echo $val['uid']; ?>" id="gendervisible<?php echo $val['uid']; ?>" class="ps">
                                <option value="0">not allowed</option>
                                <option value="1" <?php if(empty($vpermission) || $vpermission[0]['sex_visible']==1){?>selected="selected"<?php }?>>allowed</option>
                            </select>
                        </td>
                        <td>
                            <select name="birthdayvisible<?php echo $val['uid']; ?>" id="birthdayvisible<?php echo $val['uid']; ?>" class="ps">
                                <option value="0">not allowed</option>
                                <option value="1" <?php if(empty($vpermission) || $vpermission[0]['bday_visible']==1){?>selected="selected"<?php }?>>allowed</option>
                            </select>
                        </td>
                        <td>
                            <select name="professionvisible<?php echo $val['uid']; ?>" id="professionvisible<?php echo $val['uid']; ?>" class="ps">
                                <option value="0">not allowed</option>
                                <option value="1" <?php if(empty($vpermission) || $vpermission[0]['profession_visible']==1){?>selected="selected"<?php }?>>allowed</option>
                            </select>
                        </td>
                        <td>
                            <select name="addressvisible<?php echo $val['uid']; ?>" id="addressvisible<?php echo $val['uid']; ?>" class="ps">
                                <option value="0">not allowed</option>
                                <option value="1" <?php if(empty($vpermission) || $vpermission[0]['address_visible']==1){?>selected="selected"<?php }?>>allowed</option>
                            </select>
                        </td>
                        <td>
                            <select name="regionvisible<?php echo $val['uid']; ?>" id="regionvisible<?php echo $val['uid']; ?>" class="ps">
                                <option value="0">not allowed</option>
                                <option value="1" <?php if(empty($vpermission) || $vpermission[0]['place_visible']==1){?>selected="selected"<?php }?>>allowed</option>
                            </select>
                        </td>

                        </tr>
                        <?php }}?>
                        <tr>
                            <th style="text-align: center;" ><b>Group Mates</b></th>
                            <td><p>First Name</p><p>visibility</p></td>
                            <td><p>Last Name</p><p>visibility</p></td>
                            <td><p>Gender</p><p>visibility</p></td>
                            <td><p>Birthday</p><p>visibility</p></td>
                            <td><p>Profession</p><p>visibility</p></td>
                            <td><p>Address</p><p>visibility</p></td>
                            <td><p>Region</p><p>visibility</p></td>
                        </tr>
                        <tr>
                            <?php if(is_array($GroupMatesList)){foreach($GroupMatesList AS $key=>$val) { ?>
                            <?php
                        $vpermission = dbselect('profilevisiblemember','*','uid='.$_COOKIE['uid'].' and tid='.$val['uid'].'');
                     ?>
                        <tr><input name="vpermission<?php echo $val['uid']; ?>" type="hidden" value="<?php echo empty($vpermission); ?>" />
                            <td style="width:80px;height:100px;text-align: center;" >
                                <a href="member_home.php?uid=<?php echo $val['uid']; ?>"><img src="<?php echo $val['picture']; ?>" style="width: auto; height: auto;max-width: 60px;max-height: 80px" ></a>
                                <h2><p><span class="xi2"><?php echo $val['username']; ?></span></p></h2>
                            </td>
                            <td>
                                <select name="firstnamevisible<?php echo $val['uid']; ?>" id="firstnamevisible<?php echo $val['uid']; ?>" class="ps" >
                                    <option value="0">not allowed</option>
                                    <option value="1" <?php if(empty($vpermission) || $vpermission[0]['firstname_visible']==1){?>selected="selected"<?php }?>>allowed</option>
                                </select>
                            </td>
                            <td>
                                <select name="lastnamevisible<?php echo $val['uid']; ?>" id="lastnamevisible<?php echo $val['uid']; ?>" class="ps">
                                    <option value="0">not allowed</option>
                                    <option value="1" <?php if(empty($vpermission) || $vpermission[0]['lastname_visible']==1){?>selected="selected"<?php }?>>allowed</option>
                                </select>
                            </td>
                            <td>
                                <select name="gendervisible<?php echo $val['uid']; ?>" id="gendervisible<?php echo $val['uid']; ?>" class="ps">
                                    <option value="0">not allowed</option>
                                    <option value="1" <?php if(empty($vpermission) || $vpermission[0]['sex_visible']==1){?>selected="selected"<?php }?>>allowed</option>
                                </select>
                            </td>
                            <td>
                                <select name="birthdayvisible<?php echo $val['uid']; ?>" id="birthdayvisible<?php echo $val['uid']; ?>" class="ps">
                                    <option value="0">not allowed</option>
                                    <option value="1" <?php if(empty($vpermission) || $vpermission[0]['bday_visible']==1){?>selected="selected"<?php }?>>allowed</option>
                                </select>
                            </td>
                            <td>
                                <select name="professionvisible<?php echo $val['uid']; ?>" id="professionvisible<?php echo $val['uid']; ?>" class="ps">
                                    <option value="0">not allowed</option>
                                    <option value="1" <?php if(empty($vpermission) || $vpermission[0]['profession_visible']==1){?>selected="selected"<?php }?>>allowed</option>
                                </select>
                            </td>
                            <td>
                                <select name="addressvisible<?php echo $val['uid']; ?>" id="addressvisible<?php echo $val['uid']; ?>" class="ps">
                                    <option value="0">not allowed</option>
                                    <option value="1" <?php if(empty($vpermission) || $vpermission[0]['address_visible']==1){?>selected="selected"<?php }?>>allowed</option>
                                </select>
                            </td>
                            <td>
                                <select name="regionvisible<?php echo $val['uid']; ?>" id="regionvisible<?php echo $val['uid']; ?>" class="ps">
                                    <option value="0">not allowed</option>
                                    <option value="1" <?php if(empty($vpermission) || $vpermission[0]['place_visible']==1){?>selected="selected"<?php }?>>allowed</option>
                                </select>
                            </td>

                        </tr>
                        <?php }}?>
                        <tr>
                            <th>&nbsp;</th>
                            <td colspan="2">
                                <button type="submit" name="visibilitysubmitbtn" id="visibilitysubmitbtn" value="true" class="pn pnc" /><strong>Save</strong></button>
                            </td>
                        </tr>
                    </table>

                </form>
            </div>
        </div>

        <div class="appl">
            <div class="tbn">
                <h2 class="mt bbda">User Page</h2>
                <ul>
                    <li><a href="home_tx.php">Change Avatar</a></li>
                    <li  class="a"><a href="home.php">Personal Info</a></li>
                    <li><a href="home_friend.php">Friend Requests</a></li>
                    <li><a href="home_postlist.php">Post List</a></li>
                    <li><a href="home_inviteToPOWON.php">Invite new member</a></li>
                    <!--<li><a href="home_qm.php">个人签名</a></li>-->
                    <!--<li><a href="home_pass.php">密码安全</a></li>-->
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

