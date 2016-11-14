<?php

// 1. Autoload the SDK Package. This will include all the files and classes to your autoloader
require __DIR__  . '/vendor/autoload.php';

define('SITE_URL','http://localhost/Snafo_POWON/POWON');
// 2. Provide your Secret Key. Replace the given one with your app clientId, and Secret
// https://developer.paypal.com/webapps/developer/applications/myapps
$paypal = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AUcxCZB_3P1ouAUqB0jXSKwXTPeL4XxQB88e0bxLwQrYyo-KK1YfwNVKcOr2Xr23Nh_UbyO3qGrnpwMo',     // ClientID
        'EIorESkw7ih7XiJoIlkI8gmcIQ0ir-iu0Ll8Y4iGw6lYQl1psLIyc-3ACG7BMInj1Dsh8-CZAHC7_mwz'      // ClientSecret
    )
);