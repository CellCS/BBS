<?php
/**
 * group post list
 */
include './common/common.php';
include 'logincheck.php';


//check if the group exists
if(empty($_GET['gid']) || !is_numeric($_GET['gid']))
{
    $msg = '<font color=red><b>Illegal operation is not allowed</b></font>';
    $url = $_SERVER['HTTP_REFERER'];
    $style = 'alert_error';
    $toTime = 3000;
    include 'notice.php';
    exit;
}else{
    $groupId = $_GET['gid'];
}
$result = dbSelect('gmembers','uid,approved,mute','uid='.$_COOKIE['uid'].' and gid='.$groupId.'','',1);
$approved = $result[0]['approved'];
$mute = $result[0]['mute'];
$isadmin = isAdmin();

if(!$isadmin){
    if(!$result || $approved==0)
    {
        $msg = '<font color=red><b>You are not a member of the group<br>please apply for admission</b></font>';
        $url = $_SERVER['HTTP_REFERER'];
        $style = 'alert_error';
        $toTime = 3000;
        include 'notice.php';
        exit;
    }
}


$result = dbSelect('gmembers','uid,approved,admin','uid='.$_COOKIE['uid'].' and gid='.$groupId.'','',1);
$admin = $result[0]['admin'];

$OnMenu = dbSelect('groups','gid,name,owner','gid='.$groupId.' and ispass=1','orderby desc,gid desc');
if(!$OnMenu)
{
    $msg = '<font color=red><b>cannot find the group</b></font>';
    $url = $_SERVER['HTTP_REFERER'];
    $style = 'alert_error';
    $toTime = 3000;
    include 'notice.php';
}else{
    $OnGid = $OnMenu[0]['gid'];
    $OnGname = $OnMenu[0]['name'];
    $Owner = $OnMenu[0]['owner'];
}

if ($_POST['newpostsubmitbtn']){
    if ($mute && !$isadmin){
        $msg = '<font color=red><b>you are not allowed to add new content</b></font>';
        $url = $_SERVER['HTTP_REFERER'];
        $style = 'alert_error';
        $toTime = 3000;
        include 'notice.php';
    }
    header('location:group_addc.php?gid='.$groupId.'&VNum='.$_POST['vote']);
}


//posts count of this group
$TZCount = dbFuncSelect('gposts','count(pid)','first=1 and isdel=0 and gid='.$groupId.'');
$zCount = $TZCount['count(pid)'];


$linum = 10;


$select='g.pid as pid, g.title as title, g.authorid as authorid,g.addtime as addtime,g.image as image, g.replycount as replycount, g.hits as hits';
$ListContent = DBduoSelect('gposts as g','gpostspermission as p','on g.pid=p.pid',null,null,$select,'g.first=1 and g.isdel=0 and p.uid='.$_COOKIE['uid'].' and g.gid='.$groupId.' and p.view=1','g.pid desc');

if($isadmin){
    $ListContent = dbSelect('gposts','pid,title,authorid,addtime,replycount,hits','first=1 and isdel=0 and gid='.$groupId.'','pid desc');
}


//todays's post count in this group
$newt = time()-1000;
$start_time = strtotime(date('Y-m-d',time()));
$JRCount = dbFuncSelect('gposts','count(pid)','first=1 and isdel=0 and gid='.$groupId.' and (addtime>='.$start_time.' and addtime<='.time().')');
$JCount = $JRCount['count(pid)'];

$title = $OnGname.' - '.WEB_NAME;
$menu = WEB_NAME;
include template("group_postlist.html");
