<?php
/**
 * Registeration
 */
include './common/common.php';
include 'logincheck.php';
$title = 'Create Group - ' . WEB_NAME;


//check whether the registration has been submitted
if (!empty($_POST['regsubmit']))
{
    $gname = trim($_POST['groupname']);
    $description = trim($_POST['groupdescription']);

    //error handle
    $url = $_SERVER['HTTP_REFERER'];
    $style = 'alert_error';
    $toTime = 3000;

    $alterNotice = false;
    //check the length of the username
    if(stringLen($gname,3,60))
    {
        $alterNotice = true;
        $msgArr[] = '<font color=red><b>Wrong length of username：consist of 3 to 12 characters</b></font>';
    }

    //check whether there exists a same username
    $exists = dbSelect('groups','gid', 'name="'.$gname.'"','uid desc',1);
    if($exists)
    {
        $alterNotice = true;
        $msgArr[] = '<font color=red><b>group name has been used</b></font>';
    }

    if($alterNotice)
    {
        $msg = join('<br />', $msgArr);
        include 'notice.php';
        exit;
    }

    //create the user
    $uid = $_COOKIE['uid'];
    $n = 'name, owner,description';
    $v = '"'.$gname.'", "'.$uid.'","'.$description.'"';
    $result = dbInsert('groups', $n, $v);

    if(!$result)
    {
        $msg = '<font color=red><b>Failed to create the group, pleas contact the administrator</b></font>';
        include 'notice.php';
    }else{
        //automatic login after registration
        $result = dbSelect('groups','gid', 'name="'.$gname.'"', 'gid desc', 1);
        $gid = $result[0]['gid'];
        echo $gid;
        $n = 'gid, uid,approved,admin';
        $v = ''.$gid.','.$uid.',1,1';
        $insertGM = dbInsert('gmembers', $n, $v);

        $msg = '<font color=green><b>Thanks for your registration, now you will login as a member</b></font>';
        $url = 'group_postlist.php?gid='.$gid.'';
        $style = 'alert_right';
        include 'notice.php';

    }

}else{
    include template("group_reg.html");
}

?>
