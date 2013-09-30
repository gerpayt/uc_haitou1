<?php

	include './config.inc.php';
	include './uc_client/client.php';

	$email = "admin@haitou.cc";

	$username = uc_get_username_by_email($email);

	if ($username)
		echo '用户名 '.$username;
	else
		echo '无此用户！';