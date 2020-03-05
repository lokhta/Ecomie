<?php 
	class Connection{
		protected $_db;
		
		public function __construct(){
			try{
				$this->_db = new PDO("mysql:host=localhost;
									dbname=ecomie", 
									"root", 		
									"", 			
									array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC) 
								); 
				
				$this->_db->exec("SET CHARACTER SET utf8"); 
				
				$this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
			} catch(Exception $e) { 
				echo "Échec : " . $e->getMessage(); 
			}
		}
	}