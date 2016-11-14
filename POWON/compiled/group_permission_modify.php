<?php include template("header.html");?>
<!--TOP start-->
<?php include template("top.html");?>
<!--TOP end-->

<!--HEAD start-->
<?php include template("head.html");?>
<!--HEAD end-->
<link rel="stylesheet" type="text/css" href="<?php echo $domain_resource; ?>/css/post.css" />
<!--LIST start-->
<div id="wp" class="wp">
    <div id="pt" class="bm cl">
        <div class="z"><a href="./" class="nvhm" title="<?php echo $title; ?>"><?php echo $title; ?></a><em>&raquo;</em><a href="index.php">Home</a><em>&raquo;</em><a href="group.php">Group</a><em>&raquo;</em><a href="group_postlist.php?gid=<?php echo $groupId; ?>"><?php echo $OnGname; ?></a><em>&raquo;</em>post permission modify</div>
    </div>
    <form method="post" autocomplete="off" id="postform" action="group_permission_modify.php">
        <div class="bm bmw cl">
            <div class="bm_h cl">
                <th>
                    <a><b>Permissions of <?php echo $ptitle; ?></b></a>
                </th>
            </div>
            <div id="groupmemberlist" class="bm_c">
                <table cellspacing="0" cellpadding="0" class="fl_tb">
                    <?php if(is_array($MemberList)){foreach($MemberList AS $key=>$val) { ?>

                    <?php
                        $postpermission = dbselect('gpostspermission','*','uid='.$val['uid'].' and pid='.$Id.'');
                        $view = 1;
                        $comment = 1;
                        $addlink = 0;
                        if(!empty($postpermission)){
                            $view = $postpermission[0]['view'];
                            $comment = $postpermission[0]['comment'];
                            $addlink = $postpermission[0]['addlink'];
                        }
                        $notview = !$view && !$comment && !$addlink;
                        $viewonly = $view && !$comment && !$addlink;
                        $viewcomment = $view && $comment && !$addlink;
                        $viewcommentadd = $view && $comment && $addlink;
                     ?>

                    <input name="postpermission<?php echo $val['uid']; ?>" type="hidden" value="<?php echo empty($postpermission); ?>" />
                    <?php if($key%3==0 and $key!=0){?><tr> </tr><?php }?>
                    <td style="width:80px;height:100px;text-align: center;" >
                        <a><img src="<?php echo $val['picture']; ?>" style="width: auto; height: auto;max-width: 60px;max-height: 80px" ></a>
                        <h2><p><span class="xi2"><?php echo $val['username']; ?></span></p></h2>
                    </td>
                    <td>
                        <select name="permission<?php echo $val['uid']; ?>" id="permission<?php echo $val['uid']; ?>" class="ps">
                            <option value="0" <?php if($notview){?> selected = "selected"<?php }?>>cannot view</option>
                            <option value="1" <?php if($viewonly){?>selected = "selected"<?php }?>>view only</option>
                            <option value="2" <?php if($viewcomment){?>selected = "selected"<?php }?>>view and comment</option>
                            <option value="3"<?php if($viewcommentadd){?>selected = "selected"<?php }?>>view and add/link to other contents</option>
                        </select>
                    </td>
                    <?php }}?>
                    <?php if($key%3!=0){?>
                    <?php
                    for($i = 1;$i <= $MemberListRest; $i++){
                    echo '<td style="width:80px;height:100px;text-align: center;" ></td>';
                    }
                    ?>
                    <?php }?>
                </table>
            </div>
        </div>
        <div class="mtm mbm pnpost">
            <button type="submit" id="permissionsubmit" class="pn pnc" value="true" name="permissionsubmit">
                <span>Submit</span>
            </button>
            <input name="pid" type="hidden" value="<?php echo $Id; ?>" />
            <input name="gid" type="hidden" value="<?php echo $groupId; ?>" />
        </div>
    </form>

    <script>

        var BROWSER = {};
        var USERAGENT = navigator.userAgent.toLowerCase();
        browserVersion({'ie':'msie','firefox':'','chrome':'','opera':'','safari':'','mozilla':'','webkit':'','maxthon':'','qq':'qqbrowser'});
        if(BROWSER.safari) {
            BROWSER.firefox = true;
        }
        BROWSER.opera = BROWSER.opera ? opera.version() : 0;

        function showLength(obj,checklen,maxlen){

            var v = obj.value, charlen = 0, maxlen = !maxlen ? 200 : maxlen, curlen = maxlen, len = strlen(v);
            for(var i = 0; i < v.length; i++) {
                if(v.charCodeAt(i) < 0 || v.charCodeAt(i) > 255) {
                    curlen -= 2;
                }
            }
            if(curlen >= len) {
                document.getElementById("checklen").innerHTML = curlen - len;
            } else {
                obj.value = mb_cutstr(v, maxlen, true);
            }

        }

        function strlen(str) {
            return (BROWSER.ie && str.indexOf('\n') != -1) ? str.replace(/\r?\n/g, '_').length : str.length;
        }

        function mb_cutstr(str, maxlen, dot) {
            var len = 0;
            var ret = '';
            var dot = !dot ? '...' : '';
            maxlen = maxlen - dot.length;
            for(var i = 0; i < str.length; i++) {
                len += str.charCodeAt(i) < 0 || str.charCodeAt(i) > 255 ? 3 : 1;
                if(len > maxlen) {
                    ret += dot;
                    break;
                }
                ret += str.substr(i, 1);
            }
            return ret;
        }

    </script>

</div>
<!--LIST end-->

<!--FOOT start-->
<?php include template("footer.html");?>
<!--FOOT end-->
</body>
</html>

