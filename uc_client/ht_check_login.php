<?php

include './config.inc.php';
include './uc_client/client.php';


if(!empty($_COOKIE['haitou_auth']))
	list($uid, $username, $realname, $email) = explode("\t", uc_authcode($_COOKIE['haitou_auth'], 'DECODE'));
else
	$uid = $username = '';


if(!$username)
	echo '用户未登录';
else
	echo $username;
