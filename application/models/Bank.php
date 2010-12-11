<?php
    
    class App_Model_Bank{
        
        protected $_id;
        protected $_bank_name;
        protected $_identifier;
        protected $_daily_withdraw_limit;
        protected $_one_time_withdraw_limit;
        
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
        
        
            public function setOneTimeWithdrawLimit($data){
                $this->_one_time_withdraw_limit=(string)$data;
                return $this;
            }
            
            public function getOneTimeWithdrawLimit(){
                return $this->_one_time_withdraw_limit;
            }
            
            public function setDailyWithdrawLimit($data){
                $this->_daily_withdraw_limit=(string)$data;
                return $this;
            }
            
            public function getDailyWithdrawLimit(){
                return $this->_daily_withdraw_limit;
            }
            
            public function setIdentifier($data){
                $this->_identifier=(string)$data;
                return $this;
            }
            
            public function getIdentifier(){
                return $this->_identifier;
            }
            
            public function setBankName($data){
                $this->_bank_name=(string)$data;
                return $this;
            }
            
            public function getBankName(){
                return $this->_bank_name;
            }
            
            public function setId($data){
                $this->_id=(string)$data;
                return $this;
            }
            
            public function getId(){
                return $this->_id;
            }
            
        
        public function find($id){
            $mapper=new App_Model_BankMapper();
            $mapper->find($id,$this);
        }
        
        
        
        public function toArray(){
            $row=array(
               'Id' =>$this->getId(),
            'BankName' =>$this->getBankName(),
            'Identifier' =>$this->getIdentifier(),
            'DailyWithdrawLimit' =>$this->getDailyWithdrawLimit(),
            'OneTimeWithdrawLimit' =>$this->getOneTimeWithdrawLimit(),
            
            );
            return $row;
        }
        
    }
    
    
        