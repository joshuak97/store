<?php
	include_once('config.php');
	class Model{
		protected $db;
		public function __construct(){
			$this->db = new mysqli('localhost', 'root', '', 'sa_patino');
			if($this->db->connect_errno){
				exit();
			}
			$this->db->set_charset(DB_CHARSET);
		}
	}
?>