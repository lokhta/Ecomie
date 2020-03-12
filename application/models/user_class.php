<?php
	class User extends CI_Mode{

		/* ATTRIBUTS */
		private $_userId;
		private $_userName;
		private $_userFirstname;
        private $_userEmail;
        private $_userPhone;
        private $_userAddress;
        private $_userCp;
        private $_userCity;
        private $_userPwd;
        private $_userAvatar;
		
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
			$this->_userId = $intUserId;
		}
		public function setUserName($strUserName){
			$this->_userName = $strUserName;
		}
		public function setUserFirstname($strUserFirstname){
			$this->_userFirstname = $strUserFirstname;
		}
		public function setEmail($strUserEmail){
			$this->_userEmail = $strUserEmail;
        }
        public function setPhone($strPhone){
            $this->_userPhone = $strUserPhone;
        }
        public function setAddress($strAddress){
            $this->_userAddress = $strUserAddress;
        }
        public function setCp($strCp){
            $this->_userCp = $strUserCp;
        }
        public function setCity($strCity){
            $this->_userCity = $strUserCity;
        }
        public function setPwd($strUserPwd){
			$this->_userPwd = $strUserPwd;
        }
        public function setAvatar($strUserAvatar){
            $this->_userAvatar = $strUserAvatar);
        }
		
		/* GETTERS */
		public function getUserId(){
			return $this->_userId;
		}
		public function getUserName(){
			return $this->_userName;
		}		
		public function getUserFirstname(){
			return $this->_userFirstname;
		}
		public function getEmail(){
			return $this->_userEmail;
        }
        public function getPhone(){
			return $this->_userPhone;
        }
        public function getAddress(){
			return $this->_userAddress;
        }
        public function getCp(){
			return $this->_userCp;
        }
        public function getCity(){
			return $this->_userCity;
		}
		public function getPwd(){
			return $this->_userPwd;
		}
		public function getAvatar(){
			return $this->_userAvatar;
		}
		/*
		public function getFullName(){
			return $this->getFirstname()." ".$this->getName();
        }
        */

	}

