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
            <div class="z"><a href="./" class="nvhm" title="<?php echo $title; ?>"><?php echo $title; ?></a><em>&raquo;</em><a href="index.php">Home</a><em>&raquo;</em><?php echo $Title; ?></div>
        </div>
        <div class="z"></div>
    </div>


    <div id="ct" class="wp cl">
        <?php if($isadmin){?>
        <div id="modmenu" class="xi2 pbm">
            <a href="group_post_detail.php?pid=<?php echo $Id; ?>&del=1">Delete the Post</a>
        </div>
        <?php }?>
        <div id="postlist" class="pl bm">
            <!--楼主 START-->
            <table cellspacing="0" cellpadding="0">
            <tr>
                <td class="pls ptm pbm">

                </td>
                <td class="plc ptm pbn">
                    <div class="y">
                        <?php if($topid){?>
                        <a href="group_post_detail.php?id=<?php echo $topid; ?>" title="Last Theme"><img src="<?php echo $domain_resource; ?>/images/thread-prev.png" alt="Last Theme" class="vm" /></a>
                        <?php }?>
                        <?php if($downid){?>
                        <a href="group_post_detail.php?id=<?php echo $downid; ?>" title="Next Theme"><img src="<?php echo $domain_resource; ?>/images/thread-next.png" alt="Next Theme" class="vm" /></a>
                        <?php }?>
                    </div>
                    <h1 class="ts">
                        <?php echo $Title; ?>
                    </h1>
                </td>
            </tr>
        </table>
            <style>
                .max_pic{max-width:120px;}
            </style>
            <div id="post_<?php echo $Id; ?>">
                <table id="parentid<?php echo $Id; ?>" cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="pls" rowspan="2">
                            <div class="pi">
                                <div class="authi"><a href="#" target="_blank" class="xw1"><?php echo $U_sername; ?></a></div>
                            </div>
                            <!--显示用户信息 START-->
                            <div class="p_pop blk bui" id="userinfo<?php echo $Id; ?>" style="display:none; margin-top: -11px;" onmouseout="showdpic('userinfo','<?php echo $Id; ?>')">
                                <div class="m z">
                                    <div id="userinfo<?php echo $Id; ?>_ma"><img src="<?php echo $P_icture; ?>" class="max_pic" /></div>
                                </div>
                                <div class="i y">
                                    <div>
                                        <strong><?php echo $U_sername; ?></strong>
                                        <em>currently online</em>
                                    </div>
                                    <dl class="cl"><dt>reg time</dt><dd><?php echo $R_egtime; ?></dd><dt></dt><dd></dd><dt>last login</dt><dd><?php echo $L_asttime; ?></dd></dl>
                                    <div class="imicn">
                                        <a href="#" target="_blank" title="view info"><img src="<?php echo $domain_resource; ?>/images/userinfo.gif" alt="view info" /></a>
                                    </div>
                                    <div id="avatarfeed"><span id="threadsortswait"></span></div>
                                </div>
                            </div>
                            <!--显示用户信息 END-->
                            <div>
                                <div class="avatar" onmouseover="showbpic('userinfo','<?php echo $Id; ?>')">
                                    <img src="<?php echo $P_icture; ?>" class="max_pic" />
                                </div>
                                <p><em><?php echo userGroup($U_dertype); ?></em></p>
                            </div>

                        </td>
                        <td class="plc">
                            <div class="pi">
                                <div id="fj" class="y">

                                </div>
                                <strong>
                                </strong>
                                <div class="pti">
                                    <div class="pdbt">
                                    </div>
                                    <div class="authi">
                                        <img class="authicn vm" id="authicon<?php echo $Id; ?>" src="<?php echo $domain_resource; ?>/images/online_admin.gif" />
                                        <em id="authorposton<?php echo $Id; ?>">Posted on<?php echo $Addtime; ?></em>
                                    </div>
                                </div>
                            </div><div class="pct">
                            <style type="text/css">.pcb{margin-right:0}</style>
                            <div class="pcb">
                                <div class="t_fsz">
                                    <table cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td class="t_f" id="postmessage_<?php echo $Id; ?>">
                                                <?php echo $Content; ?>

                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div id="comment_<?php echo $Id; ?>" class="cm">
                                </div>
                                <div id="post_rate_div_<?php echo $Id; ?>"></div>
                            </div></div>

                        </td>
                    </tr>
                    <tr>
                        <td class="plc plm">

                        </td>
                    </tr>
                    <tr>
                        <td class="pls"></td>
                        <td class="plc">
                            <div class="po">
                                <?php if($isadmin){?>
                                <span class="y">
									<label for="manage5">
									<a href="group_post_detail.php?pid=<?php echo $Id; ?>&del=1">delete</a>
									</label>
								</span>
                                <?php }?>
                                <div class="pob cl">
                                    <em>

                                    </em>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="ad">
                        <td class="pls"></td>
                        <td class="plc"></td>
                    </tr>
                </table>
            </div>



    </div>
</div>
<!--LIST end-->

</body>
</html>

