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
        <div class="z"></div>
    </div>

    <div class="mn">
    </div>
    <div class="fl bm">
        <!--public start-->
        <div class="bm bmw  cl">
            <div class="bm_h cl">
                <h2><a href="Public.php">Public Information</a></h2>
            </div>
            <div id="public" class="bm_c">
                <table cellspacing="0" cellpadding="0" class="fl_tb">
                </table>
            </div>
        </div>
        <!--public end-->



        <!--group start-->
        <div class="bm bmw  cl">
            <div class="bm_h cl">
                <h2><a href="group.php">Your Groups</a></h2>
            </div>
            <div id="your_groups" class="bm_c">
                <table cellspacing="0" cellpadding="0" class="fl_tb">
                    <?php if(is_array($GrMenu)){foreach($GrMenu AS $key=>$val) { ?>
                    <?php if($key%4==0 and $key!=0){?><tr><?php }?>
                    <td class="fl_icn" >
                        <a href="group_postlist.php?gid=<?php echo $val['gid']; ?>"><img src="<?php echo $val['grouppic']; ?>" alt="<?php echo $val['name']; ?>" /></a>
                    </td>
                    <td>
                        <h2><a href="group_postlist.php?gid=<?php echo $val['gid']; ?>" style="color:<?php echo $val['namestyle']; ?>"><?php echo $val['name']; ?></a></h2>
                        <p class="xg2"><?php echo $val['description']; ?></p>
                        <?php if(!empty($val['owner'])){?>
                        <p>Owner: <span class="xi2"><?php echo getUserName($val['owner']); ?></span></p>
                        <?php }?>
                    </td>
                    <?php if($key%4==0 and $key!=0){?></tr><?php }?>
                    <?php }}?>
                </table>
            </div>
        </div>
        <!--group end-->

        <!--user start-->
        <div class="bm bmw  cl">
            <div class="bm_h cl">
                <h2><a href="member.php">POWON Members</a></h2>
            </div>
            <div id="memberlist" class="bm_c">
                <table cellspacing="0" cellpadding="0" class="fl_tb">
                    <?php if(is_array($UserList)){foreach($UserList AS $key=>$val) { ?>
                    <?php if($key%8==0 and $key!=0){?><tr><?php }?>
                    <td style="width:80px;height:100px;text-align: center;" >
                        <a href="home.php?gid=<?php echo $val['uid']; ?>"><img src="<?php echo $val['picture']; ?>" style="width: auto; height: auto;max-width: 60px;max-height: 80px" ></a>
                        <h2><p><span class="xi2"><?php echo $val['username']; ?></span></p></h2>
                    </td>
                    <?php if($key%8==0 and $key!=0){?></tr><?php }?>
                    <?php }}?>
                </table>
            </div>
        </div>
        <!--user end-->

        <!--group start-->
        <div class="bm bmw  cl">
            <div class="bm_h cl">
                <h2><a href="group.php">All Groups</a></h2>
            </div>
            <div id="all_groups" class="bm_c">
                <table cellspacing="0" cellpadding="0" class="fl_tb">
                    <?php if(is_array($GrMenuAll)){foreach($GrMenuAll AS $key=>$val) { ?>
                    <?php if($key%4==0 and $key!=0){?><tr><?php }?>
                    <td class="fl_icn" >
                        <a href="group_postlist.php?gid=<?php echo $val['gid']; ?>"><img src="<?php echo $val['grouppic']; ?>" alt="<?php echo $val['name']; ?>" /></a>
                    </td>
                    <td>
                        <h2><a href="group_postlist.php?gid=<?php echo $val['gid']; ?>" style="color:<?php echo $val['namestyle']; ?>"><?php echo $val['name']; ?></a></h2>
                        <p class="xg2"><?php echo $val['description']; ?></p>
                        <?php if(!empty($val['owner'])){?>
                        <p>Owner: <span class="xi2"><?php echo getUserName($val['owner']); ?></span></p>
                        <?php }?>
                    </td>
                    <?php if($key%4==0 and $key!=0){?></tr><?php }?>
                    <?php }}?>
                </table>
            </div>
        </div>
        <!--group end-->

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

