<?php 




require_once("./vendor/autoload.php");
require_once ('./database.php');

$db_conn= new database();

if(array_key_exists('url', $_GET)){
	$url = $_GET['url'];
	$parents=explode('/',$url);
	if(!file_exists($parents[0].'.php')){
		echo "sorry, wrong router";
		exit();
	}
	require_once($parents[0].'.php');
	$controller = new $parents[0]($db_conn);

	if(array_key_exists(1, $parents)){
		$method =$parents[1]."Method";
	}else{
		$method="defaultMethod";
	}

	if(array_key_exists(2, $parents)){
		$controller->$method($parents[2]);
	}else{
		$controller->$method();
	}


	exit();




}




 ?>