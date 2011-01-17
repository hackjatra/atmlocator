<?php
    
    class App_Model_Variables{
        
        protected $_id;
        protected $_name;
        protected $_value;
        protected $_description;
        
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
        
        
            public function setDescription($data){
                $this->_description=(string)$data;
                return $this;
            }
            
            public function getDescription(){
                return $this->_description;
            }
            
            public function setValue($data){
                $this->_value=(string)$data;
                return $this;
            }
            
            public function getValue(){
                return $this->_value;
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
            $mapper=new App_Model_VariablesMapper();
            $mapper->find($id,$this);
        }
        
        
        
        public function toArray(){
            $row=array(
               'Id' =>$this->getId(),
            'Name' =>$this->getName(),
            'Value' =>$this->getValue(),
            'Description' =>$this->getDescription(),
            
            );
            return $row;
        }
        
    }
    
    
        