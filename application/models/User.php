<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	/**
 	* Classe User
 	* \author Julien MARIUZZA
 	* \version 1.0
	* 
	*/

	class User extends CI_Model{

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
		private $_userAvatar="user-solid.svg";
		private $_userRole=3;
		
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
		public function setId($intUserId){
			$this->_userId = $intUserId;
		}
		public function setName($strUserName){
			$this->_userName = $strUserName;
		}
		public function setFirstname($strUserFirstname){
			$this->_userFirstname = $strUserFirstname;
		}
		public function setEmail($strUserEmail){
			$this->_userEmail = $strUserEmail;
        }
        public function setPhone($strUserPhone){
            $this->_userPhone = $strUserPhone;
        }
        public function setAddress($strUserAddress){
            $this->_userAddress = $strUserAddress;
        }
        public function setCp($strUserCp){
            $this->_userCp = $strUserCp;
        }
        public function setCity($strUserCity){
            $this->_userCity = $strUserCity;
        }
        public function setPwd($strUserPwd){
			$this->_userPwd = $strUserPwd;
        }
        public function setAvatar($strUserAvatar){
            $this->_userAvatar = $strUserAvatar;
		}
		public function setRole($strUserRole){
            $this->_userRole = $strUserRole;
        }
		
		/* GETTERS */
		public function getId(){
			return $this->_userId;
		}
		public function getName(){
			return $this->_userName;
		}		
		public function getFirstname(){
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
		public function getRole(){
			return $this->_userRole;
		}	

		public function getData(){
			$userData = get_object_vars($this);
	
			$data = array();
			foreach($userData as $key => $value){
				$data[substr($key, 1)] = $value;
			}
			$data = array_filter($data);
		   return $data;
		}	
	}
