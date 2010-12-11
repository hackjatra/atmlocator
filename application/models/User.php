<?php
    
    class App_Model_User{
        
        protected $_id;
        protected $_token;
        protected $_username;
        protected $_email;
        protected $_role_id;
        protected $_is_active;
        protected $_credibility;
        
        public function __construct(array $options = null){
            if(is_array($options)){
                $this->setOptions($options);
            }
        }
        
        public function __set($name, $value)
        {
            $method = 'set' . $name;
            if (('mapper' == $name) || !method_exists($this, $method)) {
                throw new Exception('Invalid property');
            }
            $this->$method($value);
        }
     
        public function __get($name)
        {
            $method = 'get' . $name;
            if (('mapper' == $name) || !method_exists($this, $method)) {
                throw new Exception('Invalid property');
            }
            return $this->$method();
        }
        
        public function setOptions(array $options){
            $methods=get_class_methods($this);
            foreach($options as $key => $value){
                $method='set'.ucfirst($key);
                if(in_array($method,$methods)){
                    $this->$method($value);
                }
            }
            return $this;
        }
        
        
            public function setCredibility($data){
                $this->_credibility=(string)$data;
                return $this;
            }
            
            public function getCredibility(){
                return $this->_credibility;
            }
            
            public function setIsActive($data){
                $this->_is_active=(string)$data;
                return $this;
            }
            
            public function getIsActive(){
                return $this->_is_active;
            }
            
            public function setRoleId($data){
                $this->_role_id=(string)$data;
                return $this;
            }
            
            public function getRoleId(){
                return $this->_role_id;
            }
            
            public function setEmail($data){
                $this->_email=(string)$data;
                return $this;
            }
            
            public function getEmail(){
                return $this->_email;
            }
            
            public function setUsername($data){
                $this->_username=(string)$data;
                return $this;
            }
            
            public function getUsername(){
                return $this->_username;
            }
            
            public function setToken($data){
                $this->_token=(string)$data;
                return $this;
            }
            
            public function getToken(){
                return $this->_token;
            }
            
            public function setId($data){
                $this->_id=(string)$data;
                return $this;
            }
            
            public function getId(){
                return $this->_id;
            }
            
        
        public function find($id){
            $mapper=new App_Model_UserMapper();
            $mapper->find($id,$this);
        }
        
        
        
        public function toArray(){
            $row=array(
               'Id' =>$this->getId(),
            'Token' =>$this->getToken(),
            'Username' =>$this->getUsername(),
            'Email' =>$this->getEmail(),
            'RoleId' =>$this->getRoleId(),
            'IsActive' =>$this->getIsActive(),
            'Credibility' =>$this->getCredibility(),
            
            );
            return $row;
        }
        
    }
    
    
        