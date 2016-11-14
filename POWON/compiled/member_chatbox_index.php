<!--<html lang="en">-->
<!--<head>-->
    <!--<title>Chat box</title>-->
    <!--<link  rel="stylesheet" type="text/css" href="/POWON/public/css/chatbox.css" />-->
    <!--<script src="http://code.jquery.com/jquery-1.9.0.js"></script>-->
    <!--<script>-->
        <!--function submitChat(){-->
            <!--if(form1.msg.value == ''){-->
                <!--alert('message fields are mandatory!');-->
                <!--return;-->
            <!--}-->
            <!--var uid = uidtemp;-->
            <!--var msg = form1.msg.value;-->
            <!--alert(msg);-->
            <!--var xmlhttp = new XMLHttpRequest();-->

            <!--xmlhttp.onreadystatechange =  function() {-->
                <!--if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {-->
                    <!--document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;-->
                <!--}-->
            <!--}-->
            <!--xmlhttp.open('GET','member_chatbox.php?abc='+msg+'&& uid='+uid ,true);-->
            <!--xmlhttp.send();-->
        <!--}-->

<!--//        $(document).ready(function(e){-->
<!--//            $.ajaxSetup({cache:false });-->
<!--//            setInterval(function(){$('#chatlogs').load('member_chatbox.php');},2000)-->
<!--//-->
<!--//        })-->
    <!--</script>-->

<!--</head>-->


<!--<body>-->
<!--&lt;!&ndash;<script>&ndash;&gt;-->
    <!--&lt;!&ndash;var url = location.href;&ndash;&gt;-->
    <!--&lt;!&ndash;var uidtemp = url.substring(url.lastIndexOf('=') + 1);&ndash;&gt;-->
<!--&lt;!&ndash;</script>&ndash;&gt;-->

<!--<form name="form1">-->
    <!--Your message: <br/>-->
    <!--<textarea name="msg" style="width:200px; height: 70px"></textarea> <br/>-->
    <!--<a href="#" onclick="submitChat()"> Send</a><br/> <br/>-->

    <!--<div id="chatlogs">-->
        <!--Loading chatdalog, please wait.-->
        <!---->
    <!--</div>-->

<!--</form>-->
<!--</body>-->
<!--</html>-->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link  rel="stylesheet" type="text/css" href="/POWON/public/css/chatbox.css" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="/POWON/public/js/moment.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js" type="text/javascript"></script>
</head>
<body>



<!--<script>-->
    <!--var time = new Date().getTime();-->
    <!--$(document.body).bind("mousemove keypress", function(e) {-->
        <!--time = new Date().getTime();-->
    <!--});-->

    <!--function refresh() {-->
        <!--if(new Date().getTime() - time >= 60000)-->
            <!--window.location.reload(true);-->
        <!--else-->
            <!--setTimeout(refresh, 10000);-->
    <!--}-->

    <!--setTimeout(refresh, 10000);-->
<!--</script>-->

<meta http-equiv="refresh" content="8" >

<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading" id="accordion">
                    <span class="glyphicon glyphicon-comment"></span> Chat
                    <div class="btn-group pull-right">
                        <a type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                    </div>
                </div>

                <div class="panel-footer">
                    <form action="member_chatbox.php?uid=<?php echo $receiver['uid']; ?>" method="post" autocomplete="off">
                        <div class="input-group">
                            <input id="btn-input" type="text" name="msg" class="form-control input-sm" placeholder="Type your message here..." />
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="msgsubmitbtn" name="msgsubmitbtn" type="submit"  value="true" onclick="scrollWin()" >
                                Send</button>
                        </span>
                        </div>
                    </form>
                </div>

                <div class="panel-body">
                    <ul class="chat">
                        <?php if(is_array($history)){foreach($history AS $key=>$val) { ?>
                        <?php if(($val['uid']==$receiver['uid'])){?>
                        <li class="left clearfix" >
                        <img src="<?php echo $receiver['picture']; ?>" alt="User Avatar" class="img-circle" style="width: auto; height: auto;max-width: 60px;max-height: 80px"/>
                    </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font"><?php echo $receiver['username']; ?></strong> <small class="pull-right text-muted">
                                    <span class="glyphicon glyphicon-time" ></span>
                                    <script>
                                        document.write(moment.unix(<?php echo $val['posttime']; ?>).fromNow())
                                    </script></small>
                                </div>
                                <p>
                                    <?php echo $val['msg']; ?>
                                </p>
                            </div>
                        </li>
                        <hr>
                        <?php }?>
                        <?php if(($val['uid']==$sender['uid'])){?>
                        <li class="right clearfix"><span class="chat-img pull-right">
                        <img src="<?php echo $receiver['picture']; ?>" alt="User Avatar" class="img-circle" style="width: auto; height: auto;max-width: 60px;max-height: 80px"/>
                    </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>
                                        <script>
                                            document.write(moment.unix(<?php echo $val['posttime']; ?>).fromNow())
                                        </script></small>
                                    <strong class="pull-right primary-font"><?php echo $sender['username']; ?></strong>
                                </div>
                                <p>
                                    <?php echo $val['msg']; ?>
                                </p>
                            </div>
                        </li>
                        <hr>
                        <?php }?>
                        <?php }}?>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>

