<?php
    
    class App_Model_Countries{
        
        protected $_id;
        protected $_country_code;
        protected $_country_name;
        
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

        public function setCountryName($data){
            $this->_country_name=(string)$data;
            return $this;
        }

        public function getCountryName(){
            return $this->_country_name;
        }
        
        public function setCountryCode($data){
            $this->_country_code=(string)$data;
            return $this;
        }

        public function getCountryCode(){
            return $this->_country_code;

        }

            public function setId($data){
                $this->_id=(string)$data;
                return $this;
            }
            
            public function getId(){
                return $this->_id;
            }
            
        
        public function find($id){
            $mapper=new App_Model_CountriesMapper();
            $mapper->find($id,$this);
        }
        
        
        
        public function toArray(){
            $row=array(
               'Id' =>$this->getId(),
            'CountryCode' =>$this->getCountryCode(),
            'CountryName' =>$this->getCounryName(),
            
            );
            return $row;
        }
        
    }
    
    
        