<?php
	class User{
		/* ATTRIBUTS */
		private $_userId;
		private $_userName;
		private $_userFirstname;
        private $_email;
        private $_phone;
        private $_address;
        private $_cp;
        private $_city;
        private $_pwd;
        private $_avatar;
		
		/* CONSTRUCTEUR */
		public function __construct(){
		}
		
		/* HYDRATATION 
		public function hydrate($arrData){
			foreach($arrData as $key=>$value){
				$strSetterName = "set".ucfirst(str_replace("user_", "", $key));
				if(method_exists($this, $strSetterName)){
					$this->$strSetterName($value);
				}
			}
        }
        */
		
		/* SETTERS */
		public function setUserId($intUserId){
			$this->_id = $intUserId;
		}
		public function setUserName($strUserName){
			$this->_name = trim($strUserName);
		}
		public function setUserFirstname($strUserFirstname){
			$this->_firstname = trim($strUserFirstname);
		}
		public function setEmail($strEmail){
			$this->_email = strtolower(trim($strEmail));
        }
        public function setPhone($strPhone){
            $this->_phone = trim($strPhone, ".");
        }
        public function setAddress($strAddress){
            $this->_address = $strAddress;
        }
        public function setCp($strCp){
            $this->_cp = trim($strCp);
        }
        public function setCity($strCity){
            $this->_city = $strCity;
        }
        public function setPwd($strPwd){
			$this->_pwd = password_hash($strPwd, PASSWORD_DEFAULT);
        }
        public function setAvatar($strAvatar){
            $this->_avatar = $strAvatar);
        }
		
		/* GETTERS */
		public function getUserId(){
			return $this->_id;
		}
		public function getUserName(){
			return strtoupper($this->_name);
		}		
		public function getUserFirstname(){
			return $this->_firstname;
		}
		public function getEmail(){
			return $this->_email;
        }
        public function getPhone(){
			return $this->_phone;
        }
        public function getAddress(){
			return $this->_address;
        }
        public function getCp(){
			return $this->_cp;
        }
        public function getCity(){
			return $this->_city;
		}
		public function getPwd(){
			return $this->_pwd;
		}
		public function getAvatar(){
			return $this->_avatar;
		}
		/*
		public function getFullName(){
			return $this->getFirstname()." ".$this->getName();
        }
        */

	}

