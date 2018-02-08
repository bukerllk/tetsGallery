<?php
include 'API.php';
$API= new API;



$user_id=1;
		echo $API->GET($user_id);