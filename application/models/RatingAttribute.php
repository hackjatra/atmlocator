<?php
    
    class App_Model_RatingAttribute{
        
        protected $_id;
        protected $_name;
        protected $_description;
        protected $_ulimit;
        
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
        
        
            public function setUlimit($data){
                $this->_ulimit=(string)$data;
                return $this;
            }
            
            public function getUlimit(){
                return $this->_ulimit;
            }
            
            public function setDescription($data){
                $this->_description=(string)$data;
                return $this;
            }
            
            public function getDescription(){
                return $this->_description;
            }
            
            public function setName($data){
                $this->_name=(string)$data;
                return $this;
            }
            
            public function getName(){
                return $this->_name;
            }
            
            public function setId($data){
                $this->_id=(string)$data;
                return $this;
            }
            
            public function getId(){
                return $this->_id;
            }
            
        
        public function find($id){
            $mapper=new App_Model_RatingAttributeMapper();
            $mapper->find($id,$this);
        }
        
        
        
        public function toArray(){
            $row=array(
               'Id' =>$this->getId(),
            'Name' =>$this->getName(),
            'Description' =>$this->getDescription(),
            'Ulimit' =>$this->getUlimit(),
            
            );
            return $row;
        }
        
    }
    
    
        