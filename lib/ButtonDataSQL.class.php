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
	
	public function getIdFDList($id_btn){
		$sql = "SELECT DISTINCT id_fd " .
				" FROM buttons_data ".
				" JOIN buttons ON buttons_data.id_button=buttons.id_btn ". 
				" WHERE id_btn = ?";
		return $this->queryOneCol($sql,$id_btn);
	}
	
	
}