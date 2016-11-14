<?php
/**
 * Poat detail
 */

include './common/common.php';

//determin whether the post exists
if(empty($_REQUEST['pid']) || !is_numeric($_REQUEST['pid']))
{
    $msg = '<font color=red><b>Illegal operation is not allowed</b></font>';
    $url = $_SERVER['HTTP_REFERER'];
    $style = 'alert_error';
    $toTime = 3000;
    include 'notice.php';
}
$Id=$_REQUEST['pid'];

$isadmin = isAdmin();

//read post information
$TiZi = dbSelect('pposts','*','pid='.$Id.' and isdel=0','',1);
$authorid = $TiZi[0]['authorid'];		//作者ID
$Title = $TiZi[0]['title'];		//标题
$Content = $TiZi[0]['content'];		//内容
$Image = $TiZi[0]['image'];
$Video = $TiZi[0]['video'];
$Addtime = getFormatTime($TiZi[0]['addtime']);		//发布时间

//read last on
$top = dbSelect('pposts','id','pid>'.$Id.' and isdel=0','id desc',1);
if($top)
{
    $topid=$top[0]['pid'];
}else{
    $topid=false;
}
//read next one
$top = dbSelect('pposts','id','pid<'.$Id.' and isdel=0','id desc',1);
if($down){
    $downid = $down[0]['pid'];
}else{
    $downid = false;
}


//read members' information
$User = dbSelect('user','username,email,udertype,regtime,lasttime,picture','uid='.$authorid.'','',1);
if($User)
{
    $U_sername = $User[0]['username'];
    $E_mail = $User[0]['email'];
    $U_dertype = $User[0]['udertype'];
    $R_egtime = formatTime($User[0]['regtime'],false);
    $L_asttime = formatTime($User[0]['lasttime'],false);
    $P_icture = $User[0]['picture'];
}

$linum = 10;


//deletem, put in the cycle bin
if(!empty($_GET['del'])&&$isadmin){

    $result = dbUpdate('gposts', "isdel=1", 'pid='.$Id.'');
    $result = dbUpdate('gposts', "isdel=1", 'parentid = '.$Id.'');
    header('admin_postlist.php');

}


include template("admin_post_detail.html");
