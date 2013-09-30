<?php

	include './config.inc.php';
	include './uc_client/client.php';

	//isuid 登陆方式
	//	0 username
	//	1 uid
	//	2 email
	$isuid = 2;
	//通过接口判断登录帐号的正确性，返回值为数组
	list($uid, $username, $realname, $password, $email, $schoolname) = uc_user_login($_POST['username'], $_POST['password'], $isuid);

	setcookie('haitou_auth', '', -86400);
	if($uid > 0) {
		//用户登陆成功，设置 Cookie，加密直接用 uc_authcode 函数，用户使用自己的函数
		setcookie('haitou_auth', uc_authcode($uid."\t".$username."\t".$realname."\t".$email, 'ENCODE'));
		echo '登录成功';
		echo "$uid, $username, $realname, $password, $email, $schoolname";
		exit;
	} elseif($uid == -1) {
		echo '用户不存在';
	} elseif($uid == -2) {
		echo '密码错';
	} else {
		echo '未定义';
	}
