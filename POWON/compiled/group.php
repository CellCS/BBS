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
            <a href="./" class="nvhm" title="<?php echo $title; ?>"><?php echo $title; ?></a><em>&raquo;</em><a href="index.php">Home</a><em>&raquo;</em><?php if($Glist==0){?>All Groups<?php } else { ?>My Groups<?php }?>
        </div>
        <div class="z"></div>
    </div>

        <div class="mn">
            </div>
            <div class="fl bm">
                <!--group start-->
                <div class="bm bmw  cl">
                    <div class="bm_h cl">
                        <table cellspacing="0" cellpadding="0">
                            <th>
                                <?php if($Glist==0){?>
                                <h2><a>All Groups</a></h2>
                                <?php } else { ?>
                                <h2><a>My Groups</a></h2>
                                <?php }?>
                            </th>

                            <td><span class="pipe">|</span></td>
                            <?php if($Cat==0){?>
                            <td float="right">
                                <h2><a href="group.php?glist=<?php if($Glist==0){?>0<?php } else { ?>1<?php }?>&cat=1">Order by interest</a></h2>
                            </td>
                            <?php } else { ?>
                            <td float="right">
                                <h2><a href="group.php?glist=<?php if($Glist==0){?>0<?php } else { ?>1<?php }?>&cat=0">Order by default</a></h2>
                            </td>
                            <?php }?>
                            <td><span class="pipe">|</span></td>
                            <td class="common" style="text-align: right">
                                <h3><a href="group_reg.php" style="color: rgba(159, 27, 5, 0.94);">Create Group</a></h3>
                            </td>

                        </table>
                    </div>
                    <div id="category_1" class="bm_c">
                        <table cellspacing="0" cellpadding="0" class="fl_tb">
                            <?php if($Cat==0){?>
                            <?php if(is_array($GrMenu)){foreach($GrMenu AS $key=>$val) { ?>
                            <?php if($key%4==0 and $key!=0){?><tr> </tr><?php }?>
                            <td style="width:60px;height:80px;text-align: center;" >
                                <a href="group_info.php?gid=<?php echo $val['gid']; ?>"><img src="<?php echo $val['grouppic']; ?>" style="width: auto; height: auto;max-width: 60px;max-height: 80px" alt="<?php echo $val['name']; ?>" /></a>
                            </td>
                            <td>
                                <h2><a href="group_info.php?gid=<?php echo $val['gid']; ?>" style="color:<?php echo $val['namestyle']; ?>"><?php echo $val['name']; ?></a></h2>
                                <p class="xg2"><?php echo $val['description']; ?></p>
                                <p>Owner: <span class="xi2"><?php echo getUserName($val['owner']); ?></span></p>
                            </td>
                            <?php }}?>
                            <?php } else { ?>
                            <?php
                            $descriptionTmp=null;
                            $tdnum = 0;
                                ?>
                            <?php if(is_array($GrMenu)){foreach($GrMenu AS $key=>$val) { ?>
                            <?php if(strMagic($val['description']) != $descriptionTmp){?>
                            <tr>
                            <th colspan="8"><b><font color="#00008b"><?php if(!empty($val['description'])){?><?php echo strMagic($val['description']); ?><?php } else { ?>Unknown<?php }?></font></b></th>
                            </tr>
                            <tr>
                                <?php $tdnum=0 ?>
                            <?php }?>
                            <td style="width:60px;height:80px;text-align: center;">
                                <a href="group_info.php?gid=<?php echo $val['gid']; ?>"><img src="<?php echo $val['grouppic']; ?>" style="width: auto; height: auto;max-width: 60px;max-height: 80px" alt="<?php echo $val['name']; ?>" /></a>
                            </td>
                            <td>
                                 <h2><a href="group_info.php?gid=<?php echo $val['gid']; ?>" style="color:<?php echo $val['namestyle']; ?>"><?php echo $val['name']; ?></a></h2>
                                <p class="xg2"><?php echo $val['description']; ?></p>
                                <p>Owner: <span class="xi2"><?php echo getUserName($val['owner']); ?></span></p>
                             </td>
                             <?php
                            $tdnum+=2;
                            $descriptionTmp = strMagic($val['description']);
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
                            <?php }?>
                        </table>
                    </div>
                </div>
                <!--group end-->
            </div>


        </div>
</div>
<!--CONTENT end-->

<!--FOOT start-->
<?php include template("footer.html");?>
<!--FOOT end-->
</body>
</html>

