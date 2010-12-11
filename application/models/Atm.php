<?php
    
    class App_Model_Atm{
        
        protected $_id;
        protected $_bank_id;
        protected $_atm_network_id;
        protected $_latitude;
        protected $_longitude;
        protected $_descriptive_location;
        protected $_languages;
        protected $_card_usage;
        protected $_charges;
        protected $_one_time_withdraw_limit;
        protected $_additional_property;
        protected $_description;
        protected $_verification_description;
        
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
        
        
            public function setVerificationDescription($data){
                $this->_verification_description=(string)$data;
                return $this;
            }
            
            public function getVerificationDescription(){
                return $this->_verification_description;
            }
            
            public function setDescription($data){
                $this->_description=(string)$data;
                return $this;
            }
            
            public function getDescription(){
                return $this->_description;
            }
            
            public function setAdditionalProperty($data){
                $this->_additional_property=(string)$data;
                return $this;
            }
            
            public function getAdditionalProperty(){
                return $this->_additional_property;
            }
            
            public function setOneTimeWithdrawLimit($data){
                $this->_one_time_withdraw_limit=(string)$data;
                return $this;
            }
            
            public function getOneTimeWithdrawLimit(){
                return $this->_one_time_withdraw_limit;
            }
            
            public function setCharges($data){
                $this->_charges=(string)$data;
                return $this;
            }
            
            public function getCharges(){
                return $this->_charges;
            }
            
            public function setCardUsage($data){
                $this->_card_usage=(string)$data;
                return $this;
            }
            
            public function getCardUsage(){
                return $this->_card_usage;
            }
            
            public function setLanguages($data){
                $this->_languages=(string)$data;
                return $this;
            }
            
            public function getLanguages(){
                return $this->_languages;
            }
            
            public function setDescriptiveLocation($data){
                $this->_descriptive_location=(string)$data;
                return $this;
            }
            
            public function getDescriptiveLocation(){
                return $this->_descriptive_location;
            }
            
            public function setLongitude($data){
                $this->_longitude=(string)$data;
                return $this;
            }
            
            public function getLongitude(){
                return $this->_longitude;
            }
            
            public function setLatitude($data){
                $this->_latitude=(string)$data;
                return $this;
            }
            
            public function getLatitude(){
                return $this->_latitude;
            }
            
            public function setAtmNetworkId($data){
                $this->_atm_network_id=(string)$data;
                return $this;
            }
            
            public function getAtmNetworkId(){
                return $this->_atm_network_id;
            }
            
            public function setBankId($data){
                $this->_bank_id=(string)$data;
                return $this;
            }
            
            public function getBankId(){
                return $this->_bank_id;
            }
            
            public function setId($data){
                $this->_id=(string)$data;
                return $this;
            }
            
            public function getId(){
                return $this->_id;
            }
            
        
        public function find($id){
            $mapper=new App_Model_AtmMapper();
            $mapper->find($id,$this);
        }
        
        
        
        public function toArray(){
            $row=array(
               'Id' =>$this->getId(),
            'BankId' =>$this->getBankId(),
            'AtmNetworkId' =>$this->getAtmNetworkId(),
            'Latitude' =>$this->getLatitude(),
            'Longitude' =>$this->getLongitude(),
            'DescriptiveLocation' =>$this->getDescriptiveLocation(),
            'Languages' =>$this->getLanguages(),
            'CardUsage' =>$this->getCardUsage(),
            'Charges' =>$this->getCharges(),
            'OneTimeWithdrawLimit' =>$this->getOneTimeWithdrawLimit(),
            'AdditionalProperty' =>$this->getAdditionalProperty(),
            'Description' =>$this->getDescription(),
            'VerificationDescription' =>$this->getVerificationDescription(),
            
            );
            return $row;
        }
        
    }
    
    
        