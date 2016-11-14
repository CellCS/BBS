CREATE TABLE IF NOT EXISTS `bbs_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(32) NOT NULL,
  `password` char(32) NOT NULL,
  `email` char(30) NOT NULL,
  `udertype` tinyint(2) NOT NULL,
  `regtime` int(12) NOT NULL,
  `lasttime` int(12) NOT NULL,
   `expiretime` int(12) NOT NULL,
  `picture` varchar(255) NOT NULL DEFAULT 'public/images/avatar_blank.gif',
  `firstname` char(32) DEFAULT NULL,
  `lastname` char(32) DEFAULT NULL,
  `sex` tinyint(4) DEFAULT '0',
  `birthday` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `region` varchar(50) DEFAULT NULL,
   `profession` varchar(50) DEFAULT NULL,
   `status` tinyint(1) NOT NULL DEFAULT '0',
   `coins` tinyint(2) NOT NULL DEFAULT '10',
   CHECK (`sex` = 0 or `sex` =1 or `sex` =2),
   CHECK (`undertype` = 0 or `undertype` = 1 ),
   CHECK (`status` =0 or `status` =1 or `status` =2),
   CONSTRAINT chk_user CHECK (uid >0 AND coins>=0),
   PRIMARY KEY (`uid`)
) ENGINE=INNODB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10; dbg6;

CREATE TABLE IF NOT EXISTS `bbs_groups` (
  `gid` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `replycount` int(10) NOT NULL DEFAULT '0',
  `motifcount` int(10) NOT NULL DEFAULT '0',
  `owner` int(11) DEFAULT NULL,
  `grouppic` varchar(200) NOT NULL DEFAULT 'public/images/forum.gif',
  `description` mediumtext,
  `orderby` smallint(6) NOT NULL DEFAULT '0',
  `lastpost` varchar(600) DEFAULT NULL,
  `namestyle` char(10) DEFAULT NULL,
  `ispass` tinyint(2) NOT NULL DEFAULT '1',
  CHECK (`ispass` = 0 or `ispass` = 1 ),
  PRIMARY KEY (`gid`)
) ENGINE=INNODB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10; dbg6;

CREATE TABLE IF NOT EXISTS `bbs_gmembers` (
  `gid` int(10) NOT NULL,
  `uid` int(11) NOT NULL,
  `approved` tinyint(2) NOT NULL DEFAULT '0',
  `admin` tinyint(2) NOT NULL DEFAULT '0',
  `mute` tinyint(2) NOT NULL DEFAULT '0',
  CHECK (`admin` = 0 or `admin` = 1 ),
  CHECK (`approved` = 0 or `approved` = 1 ),
  CHECK (`mute` = 0 or `mute` = 1 ),
  PRIMARY KEY (`gid`,`uid`),
  FOREIGN KEY (`gid`) REFERENCES `bbs_groups`(`gid`) ON DELETE CASCADE,
  FOREIGN KEY (`uid`) REFERENCES `bbs_user`(`uid`) ON DELETE CASCADE
) ENGINE=INNODB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10; dbg6;

CREATE TABLE IF NOT EXISTS `bbs_gposts` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `first` tinyint(1) NOT NULL DEFAULT '0',
  `parentid` int(10) NOT NULL DEFAULT '0',
  `authorid` int(11) NOT NULL,
  `title` varchar(600) NOT NULL,
  `content` mediumtext DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `video` mediumtext DEFAULT NULL,
  `voteoptions` varchar(600) DEFAULT NULL,
  `gid` int(10) NOT NULL,
  `addtime` int(12) NOT NULL,
  `replycount` int(12) NOT NULL DEFAULT '0',
  `hits` int(12) NOT NULL DEFAULT '0',
  `isdel` tinyint(2) NOT NULL DEFAULT '0',
  `isdisplay` tinyint(2) NOT NULL DEFAULT '1',
   CHECK (`isdel` = 0 or `isdel` = 1 ),
   CHECK (`isdisplay` = 0 or `isdisplay` = 1 ),
  PRIMARY KEY (`pid`),
  FOREIGN KEY (`gid`) REFERENCES `bbs_groups`(`gid`) ON DELETE CASCADE
) ENGINE=INNODB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20; dbg6;

CREATE TABLE IF NOT EXISTS `bbs_gpostdelete` (
  `pid` int(10) NOT NULL,
  `deletetime` int(12) NOT NULL,
  PRIMARY KEY (`pid`),
  FOREIGN KEY (`pid`) REFERENCES `bbs_gposts`(`pid`) ON DELETE CASCADE
) ENGINE=INNODB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20; dbg6;

CREATE TABLE IF NOT EXISTS `bbs_mails` (
  `mailid` int(10) NOT NULL AUTO_INCREMENT,
  `senderid` int(11) NOT NULL,
  `receiverid` int(11) NOT NULL,
  `title` varchar(600) NOT NULL,
  `content` mediumtext DEFAULT NULL,
  `sendtime` int(12) NOT NULL,
  `isread` tinyint(2)  DEFAULT '0',
   CHECK (`isread` = 0 or `isread` = 1 ),
   PRIMARY KEY (`mailid`),
   FOREIGN KEY (`senderid`) REFERENCES `bbs_user`(`uid`) ON DELETE CASCADE,
   FOREIGN KEY (`receiverid`) REFERENCES `bbs_user`(`uid`) ON DELETE CASCADE
) ENGINE=INNODB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1; dbg6;

CREATE TABLE IF NOT EXISTS `bbs_uposts` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `first` tinyint(1) NOT NULL DEFAULT '0',
  `parentid` int(10) NOT NULL DEFAULT '0',
  `authorid` int(11) NOT NULL,
  `title` varchar(600) NOT NULL,
  `content` mediumtext DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `video` varchar(200) DEFAULT NULL,
  `addtime` int(12) NOT NULL,
  `replycount` int(12) NOT NULL DEFAULT '0',
  `hits` int(12) NOT NULL DEFAULT '0',
  `isdel` tinyint(2) NOT NULL DEFAULT '0',
  `isdisplay` tinyint(2) NOT NULL DEFAULT '1',
   CHECK (`isdel` = 0 or `isdel` = 1 ),
   CHECK (`isdisplay` = 0 or `isdisplay` = 1 ),
  PRIMARY KEY (`pid`),
  FOREIGN KEY (`authorid`) REFERENCES `bbs_user`(`uid`) ON DELETE CASCADE
) ENGINE=INNODB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20; dbg6;

CREATE TABLE IF NOT EXISTS `bbs_upostdelete` (
  `pid` int(10) NOT NULL,
  `deletetime` int(12) NOT NULL,
  PRIMARY KEY (`pid`),
  FOREIGN KEY (`pid`) REFERENCES `bbs_uposts`(`pid`) ON DELETE CASCADE
) ENGINE=INNODB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20; dbg6;


CREATE TABLE IF NOT EXISTS `bbs_pposts` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `authorid` int(11) NOT NULL,
  `title` varchar(600) NOT NULL,
  `content` mediumtext DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `video` varchar(200) DEFAULT NULL,
  `addtime` int(12) NOT NULL,
  `isdel` tinyint(2) NOT NULL DEFAULT '0',
  `isdisplay` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`pid`),
  FOREIGN KEY (`authorid`) REFERENCES `bbs_user`(`uid`) ON DELETE CASCADE
) ENGINE=INNODB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20; dbg6;

CREATE TABLE IF NOT EXISTS `bbs_friend` (
  `uid` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `approved` tinyint(2) NOT NULL DEFAULT '0',
  `type` tinyint(2) NOT NULL DEFAULT '0',
  `addtime` int(12) NOT NULL,
  CHECK (`approved` = 0 or `approved` = 1 ),
  CHECK (`type` = 0 or `type` = 1 or `type` = 2 ),
  PRIMARY KEY (`uid`,`fid`),
  FOREIGN KEY (`uid`) REFERENCES `bbs_user`(`uid`) ON DELETE CASCADE,
  FOREIGN KEY (`fid`) REFERENCES `bbs_user`(`uid`) ON DELETE CASCADE
) ENGINE=INNODB  DEFAULT CHARSET=utf8; dbg6;

CREATE TABLE IF NOT EXISTS `bbs_chat` (
  `chatid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `msg` text,
  `posttime` int(12) NOT NULL,
  `isread` tinyint(1) NOT NULL DEFAULT '0',
    CHECK (`isread` = 0 or `isread` = 1 ),
   PRIMARY KEY (`chatid`),
  FOREIGN KEY (`uid`) REFERENCES `bbs_user`(`uid`) ON DELETE CASCADE,
  FOREIGN KEY (`fid`) REFERENCES `bbs_user`(`uid`) ON DELETE CASCADE)
  ENGINE=INNODB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10; dbg6;

CREATE TABLE IF NOT EXISTS `bbs_profileVisible` (
  `uid` int(11) NOT NULL,
  `firstname_visible` tinyint(2) DEFAULT '2',
  `lastname_visible` tinyint(2) DEFAULT '2',
  `sex_visible` tinyint(2) DEFAULT '2',
  `bday_visible` tinyint(2) DEFAULT '2',
  `address_visible` tinyint(2) DEFAULT '2',
  `place_visible` tinyint(2) DEFAULT '2',
   `profession_visible` tinyint(2) DEFAULT '2',
  CHECK (`firstname_visible` = 0 or `firstname_visible` = 1 or `firstname_visible` = 2),
  CHECK (`lastname_visible` = 0 or `lastname_visible` = 1 or `lastname_visible` = 2),
  CHECK (`sex_visible` = 0 or `sex_visible` = 1 or `sex_visible` = 2),
  CHECK (`bday_visible` = 0 or `bday_visible` = 1 or `bday_visible` = 2),
  CHECK (`address_visible` = 0 or `address_visible` = 1 or `address_visible` = 2),
  CHECK (`place_visible` = 0 or `place_visible` = 1 or `place_visible` = 2 ),
  CHECK (`profession_visible` = 0 or `profession_visible` = 1  or `profession_visible` = 2),
   PRIMARY KEY (`uid`),
   FOREIGN KEY (`uid`) REFERENCES `bbs_user`(`uid`) ON DELETE CASCADE
) ENGINE=INNODB  DEFAULT CHARSET=utf8; dbg6;

CREATE TABLE IF NOT EXISTS `bbs_profileVisibleMember` (
  `uid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `firstname_visible` tinyint(2) DEFAULT '1',
  `lastname_visible` tinyint(2) DEFAULT '1',
  `sex_visible` tinyint(2) DEFAULT '1',
  `bday_visible` tinyint(2) DEFAULT '1',
  `address_visible` tinyint(2) DEFAULT '1',
  `place_visible` tinyint(2) DEFAULT '1',
  `profession_visible` tinyint(2) DEFAULT '1',
  CHECK (`firstname_visible` = 0 or `firstname_visible` = 1 or `firstname_visible` = 2),
  CHECK (`lastname_visible` = 0 or `lastname_visible` = 1 or `lastname_visible` = 2),
  CHECK (`sex_visible` = 0 or `sex_visible` = 1 or `sex_visible` = 2),
  CHECK (`bday_visible` = 0 or `bday_visible` = 1 or `bday_visible` = 2),
  CHECK (`address_visible` = 0 or `address_visible` = 1 or `address_visible` = 2),
  CHECK (`place_visible` = 0 or `place_visible` = 1 or `place_visible` = 2 ),
  CHECK (`profession_visible` = 0 or `profession_visible` = 1  or `profession_visible` = 2),
   PRIMARY KEY (`uid`,`tid`),
   FOREIGN KEY (`uid`) REFERENCES `bbs_user`(`uid`) ON DELETE CASCADE,
   FOREIGN KEY (`tid`) REFERENCES `bbs_user`(`uid`) ON DELETE CASCADE
) ENGINE=INNODB  DEFAULT CHARSET=utf8; dbg6;

CREATE TABLE IF NOT EXISTS `bbs_gpostsPermission` (
  `pid` int(10) NOT NULL,
  `uid` int(11) NOT NULL,
  `view` tinyint(2) DEFAULT '1',
  `comment` tinyint(2) DEFAULT '1',
  `addlink` tinyint(2) DEFAULT '1',
   CHECK (`view` = 0 or `view` = 1 ),
   CHECK (`comment` = 0 or `comment` = 1 ),
   CHECK (`addlink` = 0 or `addlink` = 1 ),
   PRIMARY KEY (`pid`,`uid`),
   FOREIGN KEY (`uid`) REFERENCES `bbs_user`(`uid`) ON DELETE CASCADE,
   FOREIGN KEY (`pid`) REFERENCES `bbs_gposts`(`pid`) ON DELETE CASCADE
) ENGINE=INNODB  DEFAULT CHARSET=utf8; dbg6;

CREATE TABLE IF NOT EXISTS `bbs_upostsPermission` (
  `pid` int(10) NOT NULL,
  `uid` int(11) NOT NULL,
  `view` tinyint(2) DEFAULT '1',
  `comment` tinyint(2) DEFAULT '1',
  `addlink` tinyint(2) DEFAULT '1',
   CHECK (`view` = 0 or `view` = 1 ),
   CHECK (`comment` = 0 or `comment` = 1 ),
   CHECK (`addlink` = 0 or `addlink` = 1 ),
   PRIMARY KEY (`pid`,`uid`),
   FOREIGN KEY (`uid`) REFERENCES `bbs_user`(`uid`) ON DELETE CASCADE,
   FOREIGN KEY (`pid`) REFERENCES `bbs_uposts`(`pid`) ON DELETE CASCADE
) ENGINE=INNODB  DEFAULT CHARSET=utf8; dbg6;

CREATE TABLE IF NOT EXISTS `bbs_upostsPermissionPublic` (
  `pid` int(10) NOT NULL,
  `view` tinyint(2) DEFAULT '1',
  `comment` tinyint(2) DEFAULT '1',
  `addlink` tinyint(2) DEFAULT '1',
   CHECK (`view` = 0 or `view` = 1 ),
   CHECK (`comment` = 0 or `comment` = 1 ),
   CHECK (`addlink` = 0 or `addlink` = 1 ),
   PRIMARY KEY (`pid`),
   FOREIGN KEY (`pid`) REFERENCES `bbs_uposts`(`pid`) ON DELETE CASCADE
) ENGINE=INNODB  DEFAULT CHARSET=utf8; dbg6;

CREATE TABLE IF NOT EXISTS `bbs_voterecord` (
  `pid` int(10) NOT NULL,
  `uid` int(11) NOT NULL,
  `vote` tinyint(2) DEFAULT '0',
   CHECK (`vote` = 0 or `vote` = 1 ),
   PRIMARY KEY (`pid`,`uid`),
   FOREIGN KEY (`uid`) REFERENCES `bbs_user`(`uid`) ON DELETE CASCADE,
   FOREIGN KEY (`pid`) REFERENCES `bbs_gposts`(`pid`) ON DELETE CASCADE
) ENGINE=INNODB  DEFAULT CHARSET=utf8; dbg6;

CREATE TABLE IF NOT EXISTS `bbs_bill` (
  `billid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `invoice` varchar(16),
  `paydate` int(12),
   `amount` double NULL,
   PRIMARY KEY (`billid`),
   FOREIGN KEY (`uid`) REFERENCES `bbs_user`(`uid`) ON DELETE CASCADE
) ENGINE=INNODB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1; dbg6;
