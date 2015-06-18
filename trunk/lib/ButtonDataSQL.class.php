<?php
class ButtonDataSQL extends SQL {
	
	public function addData($id_button, $id_fd,$data){
		$sql = "INSERT buttons_data(id_button,id_fd,data) VALUES (?,?,?)";
		$this->query($sql,$id_button, $id_fd,$data);
	}
	
	public function getDataList($id_button){
		$sql = "SELECT * FROM buttons_data WHERE id_button=?";
		return $this->query($sql,$id_button);
	}
	
}