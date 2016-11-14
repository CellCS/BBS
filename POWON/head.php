<?php
/**
 * Home
 */
include './common/common.php';

$title = 'Home - ' . WEB_NAME;
$menu = WEB_NAME;
$menu = WEB_NAME;

$publicpost = dbSelect('pposts','*','','pid desc');


if( $_COOKIE['uid'] )
{

    $UserListhead = dbSelect('user','uid,username,picture','status!=1','username asc');
    $UserListRest = 8-count($UserList)%8;
    $UserListRest = ($UserListRest ==8)? 0:$UserListRest;

    $select='u.uid as uid, u.username as username, u.picture as picture';
    $FriendListhead = DBduoSelect('user as u','friend as f','on u.uid = f.fid and f.approved=1',null,null,$select,'f.uid ='.$_COOKIE['uid'].' and u.status!=1','u.username asc');
    $FriendListResthead = 8-count($FriendList)%8;
    $FriendListResthead = ($FriendListRest ==8)? 0:$FriendListRest;

    $FriendRequesthead = dbSelect('friend','uid,approved,type','fid='.$_COOKIE['uid'].' and approved=0','');

    $GrMenuAllhead = dbSelect('groups','gid,name,owner, grouppic',null,'name asc');

    $select='g.gid as gid, g.name as name, g.grouppic as grouppic,g.owner as owner';
    $GrMenuhead = DBduoSelect('groups as g','gmembers as m','on g.gid = m.gid and m.approved=1',null,null,$select,'m.uid ='.$_COOKIE['uid'].'','g.name asc');

}

include template("head.html");