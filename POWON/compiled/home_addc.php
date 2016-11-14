<?php include template("header.html");?>
<!--TOP start-->
<?php include template("top.html");?>
<!--TOP end-->

<!--HEAD start-->
<?php include template("head.html");?>
<!--HEAD end-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
      crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="<?php echo $domain_resource; ?>/css/post.css" />
<!--LIST start-->
<div id="wp" class="wp">
    <div id="pt" class="bm cl">
        <div class="z"><a href="./" class="nvhm" title="<?php echo $title; ?>"><?php echo $title; ?></a><em>&raquo;</em><a href="index.php">Home</a><em>&raquo;</em><a href="home.php">User Page</a><em>&raquo;</em><a href="home_postlist.php">Post List</a><em>&raquo;</em>Add Post</div>
    </div>
    <form method="post" autocomplete="off" id="postform" action="home_addc.php" enctype="multipart/form-data">
        <div id="ct" class="ct2_a ct2_a_r wp cl">
            <div class="mn">
                <div class="bm bw0 cl" id="editorbox">
                    <ul class="tb cl mbw">
                        <li class="a"><a href="javascript:;">Add Post</a></li>
                    </ul>

                    <div id="postbox">
                        <div class="pbt cl">
                            <div class="z">
                                <span><input type="text" name="subject" id="subject" class="px" onkeyup="showLength(this,'checklen',80);" style="width: 25em" tabindex="1" /></span>
                                <span id="subjectchk">Your can still enter another <strong id="checklen">80</strong> Characters </span>
                            </div>
                        </div>

                        <div id = 'picupload'>
                            <h2 class="xs2">Add image</h2>
                            <input name="pic" type="file" style="height:23px; width:300px;" />
                            <br/>
                        </div>

                        <div id="e_body_loading">
                            <script type="text/javascript" src="public/ckeditor/ckeditor.js"></script>
                            <script src="public/ckeditor/sample.js" type="text/javascript"></script>
                            <textarea  class="ckeditor"  name="content"  id="editor1"></textarea>
                        </div>



                        <input type="hidden" id="gid" name="gid" value="<?php echo $groupId; ?>" />
                        <div class="form-group">
                            <label for="video">Paste the video enbedd code here</label>
                            <input type="text" name="video" class="form-control" id="video">
                        </div>
                        <div>
                            <input type="checkbox" name="deletelater" value="false">
                            Delete in  <input type="number" min="1" name="hourlater"> hour <input type="number" min="1" name="minutelater"> minutes <br>
                        </div>
                        <div class="mtm mbm pnpost">
                            <button type="submit" id="topicsubmit" class="pn pnc" value="true" name="topicsubmit">
                                <span>Add Post</span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="bm bmw cl">
            <div class="bm_h cl">
                <th>
                    <a><b>Permissions to publics</b></a>
                </th>
                <td> &nbsp; &nbsp;</td>
                <td>
                    <select name="permissionpublic" id="permissionpublic" class="ps">
                        <option value="0" >cannot view</option>
                        <option value="1" selected="selected">view only</option>
                        <option value="2">view and comment</option>
                        <option value="3">view and add/link to other contents</option>
                    </select>
                </td>
            </div>
        </div>

        <div class="bm bmw cl">
            <div class="bm_h cl">
                <th>
                    <a><b>Permissions to friends</b></a>
                </th>
            </div>
            <div id="friendlist" class="bm_c">
                <table cellspacing="0" cellpadding="0" class="fl_tb">
                    <?php if(is_array($FriendList)){foreach($FriendList AS $key=>$val) { ?>
                    <?php if($key%3==0 and $key!=0){?><tr> </tr><?php }?>
                    <td style="width:80px;height:100px;text-align: center;" >
                        <a><img src="<?php echo $val['picture']; ?>" style="width: auto; height: auto;max-width: 60px;max-height: 80px" ></a>
                        <h2><p><span class="xi2"><?php echo $val['username']; ?></span></p></h2>
                    </td>
                    <td>
                        <select name="permission<?php echo $val['uid']; ?>" id="permission<?php echo $val['uid']; ?>" class="ps">
                            <option value="0" >cannot view</option>
                            <option value="1" >view only</option>
                            <option value="2" selected="selected">view and comment</option>
                            <option value="3">view and add/link to other contents</option>
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
        <div class="bm bmw cl">
            <div class="bm_h cl">
                <th>
                    <a><b>Permissions to Group Mates</b></a>
                </th>
            </div>
            <div id="groupmatelist" class="bm_c">
                <table cellspacing="0" cellpadding="0" class="fl_tb">
                    <?php if(is_array($GroupMatesList)){foreach($GroupMatesList AS $key=>$val) { ?>
                    <?php if($key%3==0 and $key!=0){?><tr> </tr><?php }?>
                    <td style="width:80px;height:100px;text-align: center;" >
                        <a><img src="<?php echo $val['picture']; ?>" style="width: auto; height: auto;max-width: 60px;max-height: 80px" ></a>
                        <h2><p><span class="xi2"><?php echo $val['username']; ?></span></p></h2>
                    </td>
                    <td>
                        <select name="permission<?php echo $val['uid']; ?>" id="permission<?php echo $val['uid']; ?>" class="ps">
                            <option value="0" >cannot view</option>
                            <option value="1" >view only</option>
                            <option value="2" selected="selected">view and comment</option>
                            <option value="3">view and add/link to other contents</option>
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

