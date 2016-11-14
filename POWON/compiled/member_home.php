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
            <a href="./" class="nvhm" title="<?php echo $title; ?>"><?php echo $title; ?></a><em>&raquo;</em><a href="index.php">Home</a><em>&raquo;</em><a href="member.php">Member</a><em>&raquo;</em><a href="member_home.php?uid=<?php echo $uid; ?>"><?php echo $uname; ?></a>
        </div>
    </div>
    <div class="boardnav">
        <div id="ct" class="wp bm cl" style="margin-left:145px;">
            <div id="sd_bdl" class="bdl" style="width:130px;margin-left:-145px">
                <div class="tbn" id="forumleftside"><h2 class="bdl_h">Menue</h2>
                    <dl class="a" id="lf_member">
                        <dt><a href="javascript:;" title="Member">Member</a></dt>
                        <dd class="bdl_a">
                            <a href="member_home.php?uid=<?php echo $uid; ?>" title="Information">Information</a>
                        </dd>
                        <dd>
                            <a href="member_postlist.php?uid=<?php echo $uid; ?>" title="Post List">Post List</a>
                        </dd>
                    </dl>
                </div>
            </div>

            <div class="mn" style="margin-left:15px;">
                <div class="bm bw0">
                    <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                        <table cellspacing="0" cellpadding="0" class="tfm">
                            <caption>
                                <h2 class="xs2"><?php echo $uname; ?></h2>
                            </caption>
                            <tr>
                                <td>
                                    <img src="<?php echo $upic; ?>" style="border:1px solid #ccc;width:auto;height:auto;max-width: 150px;max-height:200px;" /><br /><br />
                                </td>
                            </tr>

                            <tr>
                                <th>First Name</th>
                                <?php if($firstnamevisible){?>
                                <td>
                                    <?php echo $User[0]['firstname']; ?>
                                </td>
                                <?php }?>
                            </tr>
                            <tr>
                                <th>Last Name</th>
                                <?php if($lastnamevisible){?>
                                <td>
                                    <?php echo $User[0]['lastname']; ?>
                                </td>
                                <?php }?>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <?php if($sexvisible){?>
                                <td>
                                    <?php echo $ugender; ?>
                                </td>
                                <?php }?>
                            </tr>
                            <tr>
                                <th>Date of birth</th>
                                <?php if($bdayvisible){?>
                                <td>
                                    <?php echo $ubirthday; ?>
                                </td>
                                <?php }?>
                            </tr>
                            <tr>
                                <th>Profession</th>
                                <?php if($professionvisible){?>
                                <td>
                                    <?php echo $User[0]['profession']; ?>
                                </td>
                                <?php }?>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <?php if($addressvisible){?>
                                <td>
                                    <?php echo $User[0]['address']; ?>
                                </td>
                                <?php }?>
                            </tr>
                            <tr>
                                <th>Region</th>
                                <?php if($placevisible){?>
                                <td>
                                    <?php echo $uplace; ?>
                                </td>
                                <?php }?>
                            </tr>
                            <tr>
                                <th>Date of Registration</th>
                                <td>
                                    <?php echo $dateofregistraion; ?>
                                </td>
                            </tr>

                            <tr><th><br/></th></tr>
                            <?php if(!empty($Friend) and $friendApp==1){?>
                            <?php } else { ?>
                            <tr>
                                <th>
                                    <h3 class="xs2">Relation Request</h3>
                                </th>
                            </tr>
                            <?php }?>
                            <?php if(!empty($FriendRequest)){?>
                            <tr>
                                <td>
                                    The user has sent you a friend request, go to
                                    <a href="home_friend.php"><font color="blue">here</font></a>
                                    to confirm
                                </td>
                            </tr>
                            <?php } else { ?>
                            <tr id="friendRequest">
                                <?php if(empty($Friend)){?>
                                <th id="friendRequest"><button type="submit" name="friendsubmitbtn" id="friendsubmitbtn" value="true" class="pn pnc" /><strong>Send Request</strong></button></th>
                                <?php }?>
                                <?php if(!empty($Friend) and $friendApp==0){?>
                                <th>
                                    Request has been sent
                                </th>
                                <?php }?>
                                <?php if(!empty($Friend) and $friendApp==1){?>
                                <th id="friendRequest"><button type="submit" name="changesubmitbtn" id="changesubmitbtn" value="true" class="pn pnc" /><strong>Change Relation</strong></button></th>
                                <?php }?>
                                <?php if(empty($Friend)){?>
                                <td id="friendRequest">
                                    <select name="type_apply" id="type_apply" class="ps">
                                        <option value="0" selected="selected">friend</option>
                                        <option value="1" >family</option>
                                        <option value="2" >colleague</option>
                                    </select>
                                </td>
                                <?php }?>
                                <?php if(!empty($Friend) and $friendApp==1){?>
                                <td id="friendRequest">
                                    <select name="type_change" id="type_change" class="ps">
                                        <option value="0" <?php if($friendType==0){?>selected="selected"<?php }?>>friend</option>
                                        <option value="1" <?php if($friendType==1){?>selected="selected"<?php }?>>family</option>
                                        <option value="2" <?php if($friendType==2){?>selected="selected"<?php }?>>colleague</option>
                                    </select>
                                </td>
                                <?php }?>

                            </tr>
                            <tr><th><br/></th></tr>
                            <?php if(!empty($Friend) and $friendApp){?>
                            <tr>
                                <th>
                                    <h3 class="xs2">Cancel Relation</h3>
                                </th>
                            </tr>
                            <tr>
                                <th><button type="submit" name="cancelsubmitbtn" id="cancelsubmitbtn" value="true" style="background-color: #9f1b05; border: none;padding: 7px 16px;text-align: center;font-size:12px;margin: 4px 2px;border-radius: 8px;cursor: pointer;color:white;"><strong>Confirm</strong></button></th>
                            </tr>
                            <?php }?>
                            <?php }?>

                        </table>
                    </form>
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

