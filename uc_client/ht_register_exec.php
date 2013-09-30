<?php

	include './config.inc.php';
	include './uc_client/client.php';

	$uid = uc_user_register($_POST['username'], $_POST['realname'], $_POST['password'], $_POST['email'], $_POST['schoolname']);
	if($uid <= 0) {
		if($uid == -1) {
			echo '用户名不合法';
		} elseif($uid == -2) {
			echo '包含要允许注册的词语';
		} elseif($uid == -3) {
			echo '用户名已经存在';
		} elseif($uid == -4) {
			echo 'Email 格式有误';
		} elseif($uid == -5) {
			echo 'Email 不允许注册';
		} elseif($uid == -6) {
			echo '该 Email 已经被注册';
		} else {
			echo '未定义';
		}
	} else {
		//注册成功，设置 Cookie，加密直接用 uc_authcode 函数，用户使用自己的函数
		setcookie('haitou_auth', uc_authcode($uid."\t".$username."\t".$realname."\t".$email, 'ENCODE'));
		echo '注册成功';
	}
