<?php

class ButtonSQL extends SQL {
	
	public function createButton($name,$description, $email,$url_callback){
		$sql = "INSERT INTO buttons(url_callback, description,email,name) VALUES (?,?,?,?)";
		$this->query($sql,$url_callback,$description,$email,$name);
		return $this->lastInsertId();
	}
	
	public function getInfo($id_button){
		$sql = "SELECT * FROM buttons WHERE id_btn=?";
		return $this->queryOne($sql,$id_button);		
	}
	
}