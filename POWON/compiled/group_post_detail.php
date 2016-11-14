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
            <a href="./" class="nvhm" title="<?php echo $title; ?>"><?php echo $title; ?></a><em>&raquo;</em><a href="index.php">Home</a><em>&raquo;</em><a href="group.php">Group</a><em>&raquo;</em><a href="group_postlist.php?gid=<?php echo $groupId; ?>"><?php echo $smallName; ?></a><em>&raquo;</em><a href="group_post_detail.php?pid=<?php echo $Id; ?>"><?php echo $Title; ?></a>
        </div>
        <div class="z"></div>
    </div>


    <div id="ct" class="wp cl">
        <?php if($GuanLi || $isAuthor){?>
        <div id="modmenu" class="xi2 pbm">
            <a href="group_post_detail.php?pid=<?php echo $Id; ?>&del=1">Delete the Post</a>
            <?php if($GuanLi){?>
            <span class="pipe">|</span>
            <a href="group_permission_modify.php?pid=<?php echo $Id; ?>">Modify the Permission</a>
            <?php }?>
        </div>
        <?php }?>
        <div id="postlist" class="pl bm">
            <!--楼主 START-->
            <?php if($Lpage==1){?>
            <table cellspacing="0" cellpadding="0">
                <tr>
                    <td class="pls ptm pbm">
                        <div class="hm">
                            <span class="xg1">View:</span> <span class="xi1"><?php echo $Hits; ?></span><span class="pipe">|</span><span class="xg1">Reply:</span> <span class="xi1"><?php echo $Replycount; ?></span>
                        </div>
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
                                    <label class="z">To</label>
                                    <input id="louceng" type="text" class="px p_fre z" size="2" title="to reply level" />
                                    <a href="javascript:;" id="fj_btn" class="z" title="to reply level"><img src="<?php echo $domain_resource; ?>/images/fj_btn.png" onclick="golouceng()" alt="跳转到指定楼层" class="vm" /></a>
                                    <script>
                                        function golouceng(){
                                            location.href='group_post_detail.php?pid=<?php echo $Id; ?>#post_'+document.getElementById('louceng').value;
                                        }
                                    </script>
                                </div>
                                <strong>
                                    <a href="group_post_detail.php?pid=<?php echo $Id; ?>" id="postnum4">Post Owner</a>
                                </strong>
                                <div class="pti">
                                    <div class="pdbt">
                                    </div>
                                    <div class="authi">
                                        <img class="authicn vm" id="authicon<?php echo $Id; ?>" src="<?php echo $domain_resource; ?>/images/online_admin.gif" />
                                        <em id="authorposton<?php echo $Id; ?>">Posted on<?php echo $Addtime; ?></em>
                                        <!--<span class="pipe">|</span><a href="#">只看该作者</a>-->
                                    </div>
                                </div>
                            </div><div class="pct">
                            <style type="text/css">.pcb{margin-right:0}</style>
                            <div class="pcb">
                                <?php if($Rate){?>
                                <?php if(!$GuanLi && $_COOKIE['uid']!=$authorid && !$MyOrder){?>
                                <div class="locked">
                                    <a href="detail.php?id=<?php echo $Id; ?>&pay=yes" class="y viewpay" title="购买主题">购买主题</a>
                                    <em class="right">
                                    </em>
                                    本主题需向作者支付 <strong><?php echo $Rate; ?> 金钱 </strong> 才能浏览
                                </div>
                                <?php } else { ?>
                                <div class="locked">
                                    付费主题, 价格: <strong><?php echo $Rate; ?> 金钱 </strong>
                                </div>
                                <div class="t_fsz">
                                    <table cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td class="t_f" id="postmessage_<?php echo $Id; ?>">
                                                <?php echo $Content; ?>
                                                <br/>
                                                <img src="<?php echo $Image; ?>" style="width:auto;height:auto;max-width: 600px;max-height:600px;" />
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <?php }?>
                                <?php } else { ?>
                                <div class="t_fsz">
                                    <table cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td class="t_f" id="postmessage_<?php echo $Id; ?>">
                                                <?php echo $Content; ?>
                                                <br/>
                                                <img src="<?php echo $Image; ?>" style="width:auto;height:auto;max-width: 600px;max-height:600px;" />
                                                <br/>
                                                <?php if(!empty($voteoptions)){?>
                                                <b>The result of the vote is</b><br/>
                                                <?php if(is_array($voteoptions)){foreach($voteoptions AS $vkey=>$vval) { ?>
                                                <?php
                                            $vresult = 0;
                                            if (is_array($voteresult)){
                                                foreach($voteresult as $vrkey=>$vrval){
                                                            if ($vkey == $vrval['vote']){
                                                            $vresult = $vrval['votecount'];
                                                            }
                                                        }
                                                    }
                                                ?>
                                                <?php echo $vval; ?>: <?php echo $vresult; ?> votes
                                                <br/>

                                                <?php }}?>
                                                <?php }?>
                                                <br/>
                                                <?php if(!empty($Video)){?>
                                                <?php echo $Video; ?>
                                                <?php }?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <?php }?>
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
                                <?php if($GuanLi){?>
                                <span class="y">
									<label for="manage5">
									<a href="group_post_detail.php?pid=<?php echo $Id; ?>&del=1">delete</a>
									</label>
								</span>
                                <?php }?>
                                <div class="pob cl">
                                    <em>
                                        <a class="fastre" href="#f_pst">Reply</a>
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
            <?php }?>
            <!--楼主 END-->

            <!--回复列表 START-->
            <?php if(is_array($HTiZi)){foreach($HTiZi AS $hkey=>$hval) { ?>
            <div id="post_<?php echo setFloor($hkey); ?>">
                <table id="parentid<?php echo $hval['id']; ?>" cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="pls" rowspan="2">
                            <div class="pi">
                                <div class="authi"><?php echo $hval['username']; ?></div>
                            </div>
                            <!--显示用户信息 START-->
                            <div class="p_pop blk bui" id="userinfo<?php echo $hval['id']; ?>" style="display:none; margin-top: -11px;" onmouseout="showdpic('userinfo','<?php echo $hval['id']; ?>')">
                                <div class="m z">
                                    <div id="userinfo<?php echo $hval['id']; ?>_ma"><img src="<?php echo $hval['picture']; ?>" class="max_pic" /></div>
                                </div>
                                <div class="i y">
                                    <div>
                                        <strong><?php echo $hval['username']; ?></strong>
                                        <em>online now</em>
                                    </div>
                                    <dl class="cl"><dt>reg time</dt><dd><?php echo formatTime($hval['regtime']); ?></dd><dt></dt><dd></dd><dt>last login</dt><dd><?php echo formatTime($hval['lasttime']); ?></dd></dl>
                                    <div class="imicn">
                                        <a href="#" target="_blank" title="查看详细资料"><img src="<?php echo $domain_resource; ?>/images/userinfo.gif" alt="查看详细资料" /></a>
                                    </div>
                                    <div id="avatarfeed"><span id="threadsortswait"></span></div>
                                </div>
                            </div>
                            <!--显示用户信息 END-->
                            <div>
                                <div class="avatar" onmouseover="showbpic('userinfo','<?php echo $hval['id']; ?>')">
                                    <img src="<?php echo $hval['picture']; ?>" class="max_pic" />
                                </div>
                                <p><em><?php echo userGroup($hval['udertype']); ?></em></p>
                            </div>
                        </td>
                        <td class="plc">
                            <div class="pi">
                                <strong><a><?php echo storey($hkey+($linum*($Lpage-1))); ?></a></strong>
                                <div class="pti">
                                    <div class="pdbt">
                                    </div>
                                    <div class="authi">
                                        <img class="authicn vm" id="authicon<?php echo $hval['id']; ?>" src="<?php echo $domain_resource; ?>/images/online_admin.gif" />
                                        <em id="authorposton<?php echo $hval['id']; ?>">Posted on <span title="<?php echo formatTime($hval['addtime'],false); ?>"><?php echo getFormatTime($hval['addtime']); ?></span></em>
                                        <!--<span class="pipe">|</span><a href="#">只看该作者</a>-->
                                    </div>
                                </div>
                            </div>
                            <div class="pct">
                                <div class="pcb">
                                    <?php if(!$hval['isdisplay']){?>
                                    <div class="locked">提示: <em>the reply has been blocked</em></div>
                                    <?php } else { ?>
                                    <div class="t_fsz">
                                        <table cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td class="t_f" id="postmessage_<?php echo $hval['id']; ?>">
                                                    <?php echo $hval['content']; ?>
                                                    <br/>
                                                    <img src="<?php echo $hval['image']; ?>" style="width:auto;height:auto;max-width: 600px;max-height:600px;" />
                                                    <br/>
                                                    <?php if(!empty($hval['video'])){?>
                                                    <?php echo $hval['video']; ?>
                                                    <?php }?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <?php }?>
                                    <div id="comment_<?php echo $hval['id']; ?>" class="cm">
                                    </div>
                                    <div id="post_rate_div_<?php echo $hval['id']; ?>"></div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="plc plm"></td>
                    </tr>
                    <tr>
                        <td class="pls"></td>
                        <td class="plc">
                            <div class="po">
                                <?php if($GuanLi or $hval[authorid]==$_COOKIE['uid']){?>
                                <span class="y">
									<label for="manage5">
									<a href="group_post_detail.php?pid=<?php echo $Id; ?>&hid=<?php echo $hval['pid']; ?>&delht=1">delete</a>
									</label>
								</span>
                                <?php }?>
                                <div class="pob cl">
                                    <em>
                                        <a class="fastre" href="#f_pst">Reply</a>
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
            <?php }}?>
            <!--回复列表 END-->
        </div>

        <div class="pgs mtm mbm cl">
			<span class="pgb y" id="visitedforumstmp">
			<a href="group_postlist.php?gid=<?php echo $groupId; ?>">Back to List</a></span>
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
        </div>
        <!--Reply START-->
        <?php if($commentPermit && !$mute){?>
        <div id="f_pst" class="pl bm bmw">
            <form method="post" autocomplete="off" id="fastpostform" action="group_post_detail.php" enctype="multipart/form-data">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="pls">
                            <div class="avatar"><img src="<?php if(empty($_COOKIE['picture'])){?><?php echo $domain_resource; ?>/images/avatar_blank.gif<?php } else { ?><?php echo $_COOKIE['picture']; ?><?php }?>" class="max_pic" /></div>
                        </td>
                        <td class="plc">
                            <span id="fastpostreturn"></span>
                            <div class="cl">
                                <div id = 'picupload'>
                                    <h2 class="xs2">Add image</h2>
                                    <input name="pic" type="file" style="height:23px; width:300px;" />
                                    <br/>
                                </div>
                                <div id="fastsmiliesdiv" class="y">
                                    <script type="text/javascript" src="public/ckeditor/ckeditor.js"></script>
                                    <script src="public/ckeditor/sample.js" type="text/javascript"></script>
                                    <textarea name="message" id="editor1" class="ckeditor1"></textarea>
                                    <script type="text/javascript">
                                        //<![CDATA[

                                        // Replace the <textarea id="editor"> with an CKEditor
                                        // instance, using default configurations.
                                        CKEDITOR.replace( 'editor1',
                                                {
                                                    extraPlugins : 'uicolor',
                                                    toolbar :
                                                            [
                                                                [ 'Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink' ],
                                                                [ 'UIColor' ]
                                                            ]
                                                });

                                        //]]>
                                    </script><br />

                                </div>
                                <div class="form-group">
                                    <label for="video">Paste the video enbedd code here</label>
                                    <input type="text" name="video" class="form-control" id="video">
                                </div></br>
                                <div>
                                    <input type="checkbox" name="deletelater" value="false">
                                    Delete in  <input type="number" min="1" name="hourlater"> hour <input type="number" min="1" name="minutelater"> minutes <br>
                                </div>
                                <p class="ptm pnpost">
                                    <button type="submit" name="replysubmit" id="fastpostsubmit" class="pn pnc vm" value="replysubmit" tabindex="5">
                                        <strong>Add Reply</strong></button>
                                </p>
                            </div>
                            <?php if(!empty($voteoptions)){?>
                            <div>
                                <br/>
                                <h1>Vote</h1>
                                <?php if(!empty($votecheck)){?>
                                <b>You have already voted</b>
                                <?php } else { ?>
                                <select name="voteselect" id="voteselect" class="ps">
                                    <?php if(is_array($voteoptions)){foreach($voteoptions AS $vkey=>$vval) { ?>
                                    <option value=<?php echo $vkey; ?> ><?php echo $vval; ?></option>
                                    <?php }}?>
                                </select>
                                <p class="ptm pnpost">
                                    <button type="submit" name="votesubmit" id="votesubmit" class="pn pnc vm" value="true" tabindex="5">
                                        <strong>submit vote</strong></button>
                                </p>
                                <?php }?>
                            </div>
                            <br/>
                            <div>
                                <p><b>add new vote option:</b></p>
                                <p><input type="text" name="newoption" class="px" /></p>
                            </div>
                            <p class="ptm pnpost">
                                <button type="submit" name="optionsubmit" id="optionsubmit" class="pn pnc vm" value="true" tabindex="5">
                                    <strong>submit new option</strong></button>
                            </p>
                            <?php }?>
                            <input name="pid" type="hidden" value="<?php echo $Id; ?>" />
                            <input name="gid" type="hidden" value="<?php echo $groupId; ?>" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <?php }?>
        <!--Reply END-->
    </div>


</div>
<!--LIST end-->
<script>
    function showbpic(obj1,obj2){

        document.getElementById(obj1+obj2).style.display='block';
        //document.getElementById(obj1+obj2+'_ma').innerHtml=document.getElementById('avatar'+obj2).innerHtml;

    }

    function showdpic(obj1,obj2){

        document.getElementById(obj1+obj2).style.display='none';
        //document.getElementById(obj1+obj2+'_ma').innerHtml='';

    }
</script>

<!--FOOT start-->
<?php include template("footer.html");?>
<!--FOOT end-->
<style>
    .paylist{
        z-index:20;
        left:50%;/*ff ie7*/
        top:50%;/*ff ie7*/
        background:#FFFFFF;
        margin-left:-100px!important;/*ff ie7 该值为本身宽的一半 */
        margin-top:-60px!important;/*ff ie7 该值为本身高的一半*/
        margin-top:0px;
        position:fixed!important;/*ff ie7*/
        position:absolute;/*ie6*/
        _top:       expression(eval(document.compatmode &&
					document.compatmode=='css1compat') ?
					documentelement.scrolltop + (document.documentelement.clientheight-this.offsetheight)/2 :/*ie6*/
					document.body.scrolltop + (document.body.clientheight - this.clientheight)/2);/*ie5 ie5.5*/
    }
</style>


</body>
</html>

