<?php
include 'API.php';

$API= new API;

$request_method=$_SERVER["REQUEST_METHOD"];
switch($request_method)
{
	case 'GET':
			// Retrive Products
	if(!empty($_GET["user_id"]))
	{
		$image_id=intval($_GET["user_id"]);
		echo $API->GET($user_id);
	}
	else
	{
		echo $API->GET();
	}
	break;
	case 'POST':
	// Insert Product
	echo $API->POST();
	break;
	case 'PUT':
			// Update Product
	$image_id=intval($_GET["user_id"]);
	echo $API->PUT();
	break;
	case 'DELETE':
			// Delete Product
	echo $API->DELETE();
	break;
	default:
			// Invalid Request Method
	header("HTTP/1.0 405 Method Not Allowed");
	break;
}