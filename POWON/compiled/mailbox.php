<?php include template("header.html");?>
<!--TOP start-->
<?php include template("top.html");?>
<!--TOP end-->



<!--CONTENT start-->
<script src="/POWON/public/js/moment.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div id="wp" class="wp">
    <div id="pt" class="bm cl">
        <div class="z">
            <a href="./" class="nvhm" title="<?php echo $title; ?>"><?php echo $title; ?></a><em>&raquo;</em><a href="index.php">Home</a>
        </div>

    </div>


</div>

<div class="mn">
</div>
<div class="fl bm">
</div>
<form method="post" action="mailbox.php">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-md-2">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        Mail <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Mail</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-9 col-md-10">
                <!-- Split button -->
                <div class="btn-group">
                    <button type="button" class="btn btn-default">
                        <div class="checkbox" style="margin: 0;">
                            <label>
                                <input type="checkbox" onClick="toggle(this)" > ALL
                            </label>
                        </div>
                    </button>
                </div>


                <script language="JavaScript">
                    function toggle(source) {
                        checkboxes = document.getElementsByName('mailcheckbox[]');
                        for(var i=0, n=checkboxes.length;i<n;i++)
                            checkboxes[i].checked = source.checked;
                    }
                </script>


                <button type="button" class="btn btn-default" data-toggle="tooltip" title="Refresh" value="Reload Window" onclick="window.location.reload()">
                       <span class="glyphicon glyphicon-refresh"></span>   </button>
                <button  class="btn btn-default" type="submit" name="deletesubmit" id="deletesubmit" value="deletesubmit" tabindex="5">
                    Delete
                </button>
                <!-- Single button -->
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        More <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Mark all as read</a></li>
                        <li class="divider"></li>
                        <li class="text-center"><small class="text-muted">Select messages to see more actions</small></li>
                    </ul>
                </div>
                <div class="pull-right">
                </div>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-sm-3 col-md-2">
                <a href="mailbox_compose.php" class="btn btn-danger btn-sm btn-block" role="button">COMPOSE</a>
                <hr />
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="mailbox.php"><span class="badge pull-right"><?php echo $unread; ?></span> Inbox </a>
                    </li>
                    <li><a href="mailbox_sentmail.php">Sent Mail</a></li>
                    <li><a href=#"><span class="badge pull-right"></span>Drafts</a></li>
                </ul>
                <a href="mailbox_sendgift.php" class="btn btn-success btn-sm btn-block" role="button">Send Gift</a>
            </div>
            <div class="col-sm-9 col-md-10">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#primary" data-toggle="tab"><span class="glyphicon glyphicon-inbox">
                </span>Primary</a></li>
                    <li><a href="#social" data-toggle="tab"><span class="glyphicon glyphicon-user"></span>
                        Social</a></li>
                    <li><a href="#gift" data-toggle="tab"><span class="glyphicon glyphicon-tags"></span>
                        Gift</a></li>
                    <li><a href="#settings" data-toggle="tab"><span class="glyphicon glyphicon-plus no-margin">
                </span></a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">


                    <div class="tab-pane fade in active" id="primary">
                        <div class="list-group">
                            <!--message content-->
                            <?php if(is_array($primarymail)){foreach($primarymail AS $key=>$val) { ?>
                            <a href="mailbox_emaildetail.php?mailid=<?php echo $val['mailid']; ?>" class="list-group-item">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="mailcheckbox[]" value="<?php echo $val['mailid']; ?>">
                                </label>
                            </div>
                            <?php
                                    $sender = dbselect('user','username','uid='.$val['senderid'].'')
                            ?>
                            <?php if(($val['isread'] == 0)){?>
                            <strong><span class="name" style="min-width: 120px;display: inline-block; color:#ff6600 " >
                                        <?php echo $sender[0]['username']; ?> </span></strong>
                                        <?php } else { ?>
                                <span class="name" style="min-width: 120px;display: inline-block; ">
                                <?php echo $sender[0]['username']; ?> </span>
                                        <?php }?>
                                        <span class=""><?php echo $val['title']; ?></span>
                                        <?php if(($val['content'] == "public/images/treasure-chest.gif")){?>
                            <span class="text-muted" style="font-size: 11px;">
                                <img src="public/images/treasure-chest.gif" alt="treasure chest" style="width:40px;height:40px;">
                            </span>
                                        <?php } else { ?>
                                        <span class="text-muted" style="font-size: 11px;">- <?php echo $val['content']; ?></span>
                                        <?php }?>
                            <span class="badge" ><script>
                                document.write( moment.unix(<?php echo $val['sendtime']; ?>).format("MM/DD"));
                            </script></span> <span class="pull-right"></span></a>
                            <?php }}?>
                        </div>
                    </div>


                    <div class="tab-pane fade in" id="social">
                        <div class="list-group">
                            <div class="list-group">

                                <!--message content-->
                                <?php if(is_array($socialmail)){foreach($socialmail AS $key=>$val) { ?>
                                <a href="#" class="list-group-item">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="mailcheckbox[]" value="<?php echo $val['mailid']; ?>">
                                    </label>
                                </div>
                                <?php
                                    $sender = dbselect('user','username','uid='.$val['senderid'].'')
                            ?>
                                <?php if(($val['isread'] == 0)){?>
                                <strong><span class="name" style="min-width: 120px;display: inline-block;">
                                            <?php echo $sender[0]['username']; ?> </span></strong>
                                            <?php } else { ?>
                                <span class="name" style="min-width: 120px;display: inline-block;">
                                <?php echo $sender[0]['username']; ?> </span>
                                            <?php }?>
                                            <span class=""><?php echo $val['title']; ?></span>
                                            <span class="text-muted" style="font-size: 11px;">- <?php echo $val['content']; ?></span>
                            <span class="badge" ><script>
                                document.write( moment.unix(<?php echo $val['sendtime']; ?>).format("MM/DD"));
                            </script></span> <span class="pull-right"></span></a>
                                <?php }}?>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade in" id="gift">
                        <div class="list-group">
                            <div class="list-group">

                                <!--message content-->
                                <?php if(is_array($giftmail)){foreach($giftmail AS $key=>$val) { ?>
                                <a href="#" class="list-group-item">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="mailcheckbox[]" value="<?php echo $val['mailid']; ?>">
                                        </label>
                                    </div>
                                    <?php
                                    $sender = dbselect('user','username','uid='.$val['senderid'].'')
                                ?>
                                    <?php if(($val['isread'] == 0)){?>
                                    <strong><span class="name" style="min-width: 120px;display: inline-block;">
                                <?php echo $sender[0]['username']; ?> </span></strong>
                                    <?php } else { ?>
                                <span class="name" style="min-width: 120px;display: inline-block;">
                                <?php echo $sender[0]['username']; ?> </span>
                                    <?php }?>
                                    <span class=""><?php echo $val['title']; ?></span>
                                <span class="text-muted" style="font-size: 11px;">
                                    <img src="public/images/treasure-chest.gif" alt="treasure chest" style="width:40px;height:40px;">
                                </span>
                                <span class="badge" ><script>
                                    document.write( moment.unix(<?php echo $val['sendtime']; ?>).format("MM/DD"));
                                </script></span> <span class="pull-right"></span></a>
                                <?php }}?>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade in" id="settings">
                        This table is empty.</div>
                </div>

            </div>
        </div>
    </div>

</form>


<!--CONTENT end-->

<!--FOOT start-->
<?php include template("footer.html");?>
<!--FOOT end-->
</body>
</html>

