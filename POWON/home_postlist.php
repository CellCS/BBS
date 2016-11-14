<?php
/**
 * group post list
 */
include './common/common.php';
include 'logincheck.php';

if(empty($_COOKIE['uid']))
{
    $msg = '<font color=red><b>You have not logged in</b></font>';
    $url = $_SERVER['HTTP_REFERER'];
    $style = 'alert_error';
    $toTime = 3000;
    include 'notice.php';
    exit;
}

$uid = $_COOKIE['uid'];

//count of personal posts
$TZCount = dbFuncSelect('uposts','count(pid)','first=1 and isdel=0 and authorid='.$uid.'');
$zCount = $TZCount['count(pid)'];

$linum = 10;

//read information of personal post
$ListContent = dbSelect('uposts','pid,title,authorid,addtime,replycount,hits','first=1 and isdel=0 and authorid='.$uid.'','pid desc', setLimit($linum));

//today's posts of the user
$newt = time()-1000;
$start_time = strtotime(date('Y-m-d',time()));
$JRCount = dbFuncSelect('gposts','count(pid)','first=1 and isdel=0 and authorid='.$uid.' and (addtime>='.$start_time.' and addtime<='.time().')');
$JCount = $JRCount['count(pid)'];

if ($_POST['newpostsubmitbtn']){
    header('location:home_addc.php');
}

$title = 'Personal Post List - '.WEB_NAME;
$menu = WEB_NAME;
include template("home_postlist.html");
