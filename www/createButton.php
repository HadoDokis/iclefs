<?php
require_once(__DIR__."/../init.php");

try{
	$data = file_get_contents('php://input');
	$data = json_decode($data,true);
	if (! $data){
		throw new Exception("Empty data !");
	}
	
	foreach(array('description','email','name','data','urlCallback') as $key){
		if (empty($data[$key])){
			throw new Exception("$key est obligatoire !");
		}
	}
	
	$buttonSQL = new ButtonSQL($sqlQuery);
	$buttonDataSQL = new ButtonDataSQL($sqlQuery);
	
	$id_button = $buttonSQL->createButton($data['name'],$data['description'],$data['email'],$data['urlCallback']);
	
	foreach($data['data'] as $id_fd => $fd_data){
		foreach($fd_data as $id_data){
			$buttonDataSQL->addData($id_button, $id_fd, $id_data);
		}				
	}
} catch(Exception $e){

	$result = array(
			'code'=>'500',
			'response'=>array(),
			'message'=>$e->getMessage()
	);
	header("HTTP/1.1 500 Internal Server Error");
	echo json_encode($result);
	exit;
}

$result = array(
		'code'=>'200',
		'response'=>array('url_btn'=>$url_button."?id_btn=$id_button"),
		'message'=>"Bouton créé avec succès."
);

echo json_encode($result);

