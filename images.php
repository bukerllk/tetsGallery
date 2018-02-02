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
		return $API->GET($user_id);
	}
	else
	{
		return $API->GET();
	}
	break;
	case 'POST':
	// Insert Product
	return $API->POST();
	break;
	case 'PUT':
			// Update Product
	$image_id=intval($_GET["user_id"]);
	return $API->PUT();
	break;
	case 'DELETE':
			// Delete Product
	return $API->DELETE();
	break;
	default:
			// Invalid Request Method
	header("HTTP/1.0 405 Method Not Allowed");
	break;
}