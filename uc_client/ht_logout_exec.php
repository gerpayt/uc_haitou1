<?php

	include './config.inc.php';
	include './uc_client/client.php';

	setcookie('haitou_auth', '', -86400);
	echo '注销成功';

