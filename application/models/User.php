<?php

	/**
 	* Classe User
 	* \author Julien MARIUZZA
 	* \version 1.0
	* 
	*/

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
		
	/**
     * @fn hydrate($data)
     * @brief Fonction d'hydratation permettant d'asigner des valeurs aux paramètres de la classe en passant par les setters
     * @param $data Tableau associatif contenant les données à hydrater
     */

	public function hydrate($data){
        foreach($data as $key => $value){
            $method = 'set'.str_replace('user','',$key);

            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }
		
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
			return $this->_UserId;
		}
		public function getUserName(){
			return $this->_UserName;
		}		
		public function getUserFirstname(){
			return $this->_UserFirstname;
		}
		public function getEmail(){
			return $this->_UserEmail;
        }
        public function getPhone(){
			return $this->_UserPhone;
        }
        public function getAddress(){
			return $this->_UserAddress;
        }
        public function getCp(){
			return $this->_UserCp;
        }
        public function getCity(){
			return $this->_UserCity;
		}
		public function getPwd(){
			return $this->_UserPwd;
		}
		public function getAvatar(){
			return $this->_UserAvatar;
		}		
	}

