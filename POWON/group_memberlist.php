<?php
/**
 * group member list
 */
include './common/common.php';
include 'logincheck.php';

//判断ID是否存在
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

$result = dbSelect('gmembers','uid,approved,admin,mute','uid='.$_COOKIE['uid'].' and gid='.$groupId.'','',1);
$approved = $result[0]['approved'];
$isadmin = isAdmin();
$result = dbSelect('groups','owner','gid='.$groupId.'','',1);
$owner = $_COOKIE['uid']==(int)$result[0]['owner'];
if($isadmin||$owner){
    $admin=1;
}else{
    $admin=0;
}

if((!$result || $approved==0)&&!$admin)
{
    $msg = '<font color=red><b>You are not a member of the group<br>please apply for admission</b></font>';
    $url = $_SERVER['HTTP_REFERER'];
    $style = 'alert_error';
    $toTime = 3000;
    include 'notice.php';
    exit;
}


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

$OwnerId = (int)$Owner;

//number of members
$TZCount = dbFuncSelect('gmembers','count(uid)','gid='.$groupId.' and approved=1');
$zCount = $TZCount['count(uid)'];

$linum = 10;	//每页显示数量

//Read group member info
//$select='u.uid as uid, u.username as username,u.picture as picture,m.admin as admin, m.mute as mute';
//$MemberList = DBduoSelect('user as u','gmembers as m','on u.uid = m.uid and m.approved=1 and status!=1',null,null,$select,'m.gid ='.$groupId.'');

$Cat = $_GET['cat'];
switch ($Cat){
    case 1;
        $select='u.uid as uid, u.username as username, u.picture as picture, u.birthday as birthday, m.mute as mute';
        $MemberList = DBduoSelect('user as u','gmembers as m','on u.uid = m.uid',null,null,$select,'m.gid ='.$groupId.' and m.approved=1 and u.status!=1','u.birthday desc');
        break;
    case 2;
        $select='u.uid as uid, u.username as username, u.picture as picture, u.profession as profession, m.mute as mute';
        $MemberList = DBduoSelect('user as u','gmembers as m','on u.uid = m.uid',null,null,$select,'m.gid ='.$groupId.' and m.approved=1 and u.status!=1','u.profession desc');
        break;
    case 3;
        $select='u.uid as uid, u.username as username, u.picture as picture, u.region as region, m.mute as mute';
        $MemberList = DBduoSelect('user as u','gmembers as m','on u.uid = m.uid',null,null,$select,'m.gid ='.$groupId.' and m.approved=1 and u.status!=1','u.region desc');
        break;
    default:
        $select='u.uid as uid, u.username as username,u.picture as picture, m.mute as mute';
        $MemberList = DBduoSelect('user as u','gmembers as m','on u.uid = m.uid',null,null,$select,'m.gid ='.$groupId.' and m.approved=1 and u.status!=1','u.username desc');
}

if($admin){
    //kick out member
    if(!empty($_GET['del'])){
        $targetId = $_GET['uid'];
        $Target = dbSelect('gmembers','gid,uid,admin','gid='.$groupId.' and uid='.$targetId.'','',1);

        if (!$Target) {
            $msg = '<font color=red><b>target user is not a member of the group</b></font>';
            $url = $_SERVER['HTTP_REFERER'];
            $style = 'alert_error';
            $toTime = 3000;
            include 'notice.php';
            exit;
        }

        $Tuid = $Target[0]['uid'];
        $result = dbDel('gmembers', 'uid='.$Tuid.' and gid='.$groupId.'');
        if ($result){
            $msg = '<font color=red><b>operation succeeded</b></font>';
            $url = $_SERVER['HTTP_REFERER'];
            $style = 'alert_right';
            $toTime = 3000;
            include 'notice.php';
            exit;
        }else{
            $msg = '<font color=red><b>operation failed, please contact the administrator</b></font>';
            $url = $_SERVER['HTTP_REFERER'];
            $style = 'alert_error';
            $toTime = 3000;
            include 'notice.php';
            exit;
        }
    }
    //mute
    if(!empty($_GET['mut'])){
        $targetId = $_GET['uid'];
        $Target = dbSelect('gmembers','gid,uid,admin,mute','gid='.$groupId.' and uid='.$targetId.'','',1);

        if (!$Target) {
            $msg = '<font color=red><b>target user is not a member of the group</b></font>';
            $url = $_SERVER['HTTP_REFERER'];
            $style = 'alert_error';
            $toTime = 3000;
            include 'notice.php';
            exit;
        }

        $Tuid = $Target[0]['uid'];
        $Tmute = $Target[0]['mute'];

        $result = dbUpdate('gmembers', 'mute=1','uid='.$Tuid.' and gid='.$groupId.'');
        if ($result){
            $msg = '<font color=red><b>operation succeeded</b></font>';
            $url = $_SERVER['HTTP_REFERER'];
            $style = 'alert_right';
            $toTime = 3000;
            include 'notice.php';
            exit;
        }else{
            $msg = '<font color=red><b>operation failed, please contact the administrator</b></font>';
            $url = $_SERVER['HTTP_REFERER'];
            $style = 'alert_error';
            $toTime = 3000;
            include 'notice.php';
            exit;
        }
    }

    if(!empty($_GET['unm'])){
        $targetId = $_GET['uid'];
        $Target = dbSelect('gmembers','gid,uid,admin,mute','gid='.$groupId.' and uid='.$targetId.'','',1);

        if (!$Target) {
            $msg = '<font color=red><b>target user is not a member of the group</b></font>';
            $url = $_SERVER['HTTP_REFERER'];
            $style = 'alert_error';
            $toTime = 3000;
            include 'notice.php';
            exit;
        }

        $Tuid = $Target[0]['uid'];
        $Tmute = $Target[0]['mute'];

        $result = dbUpdate('gmembers', 'mute=0','uid='.$Tuid.' and gid='.$groupId.'');
        if ($result){
            $msg = '<font color=red><b>operation succeeded</b></font>';
            $url = $_SERVER['HTTP_REFERER'];
            $style = 'alert_right';
            $toTime = 3000;
            include 'notice.php';
            exit;
        }else{
            $msg = '<font color=red><b>operation failed, please contact the administrator</b></font>';
            $url = $_SERVER['HTTP_REFERER'];
            $style = 'alert_error';
            $toTime = 3000;
            include 'notice.php';
            exit;
        }
    }
}

$title = $OnGname.' - '.WEB_NAME;
$menu = WEB_NAME;
include template("group_memberlist.html");
