<?php
/**
 * -------------------------------------------------------------------------------------------------+
 * 配置                                                                                              |
 * 一 基础配置(时区|魔术转译)                                                                           |                   |
 * 二 静态资源                                                                                        |
 * 三 website                                                                                        |
 * 四 模版引擎                                                                                        |
 * 五 奖励                                                                                           |
 * -------------------------------------------------------------------------------------------------+
 */


    define('TIMEZONE', 'Asia/shanghai');                    //timezone
    define('GPC', get_magic_quotes_gpc() ? 0 : 1);


    define('DOMAIN_RESOURCE', 'public'); //root of resources


    define('WEB_NAME', 'POWON');                        //website name in header
    define('WEB_BTM', 'Group 6');                             //website name in footer
    define('WEB_URL', 'https://confsys.encs.concordia.ca/CrsMgr/');             //website url
    define('WEB_ICP', 'Concordia COMP5531');                    //infomation
    define('WEB_ISCLOSE', false);
    define('WEB_REG', true);


    define('TPL_SKIN', 'theme/default');                    //root of html files
    define('TPL_CACHE', 'compiled');                        //root of compiled files
    

    define('REWARD_LOGIN', 2);
    define('REWARD_REG', 50);
    define('REWARD_T', 2);
    define('REWARD_H', 1);                                   
