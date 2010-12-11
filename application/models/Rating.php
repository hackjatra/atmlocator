<?php
    
    class App_Model_Rating{
        
        protected $_id;
        protected $_rating_attribute_id;
        protected $_score;
        protected $_user_id;
        protected $_atm_id;
        
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
        
        
            public function setAtmId($data){
                $this->_atm_id=(string)$data;
                return $this;
            }
            
            public function getAtmId(){
                return $this->_atm_id;
            }
            
            public function setUserId($data){
                $this->_user_id=(string)$data;
                return $this;
            }
            
            public function getUserId(){
                return $this->_user_id;
            }
            
            public function setScore($data){
                $this->_score=(string)$data;
                return $this;
            }
            
            public function getScore(){
                return $this->_score;
            }
            
            public function setRatingAttributeId($data){
                $this->_rating_attribute_id=(string)$data;
                return $this;
            }
            
            public function getRatingAttributeId(){
                return $this->_rating_attribute_id;
            }
            
            public function setId($data){
                $this->_id=(string)$data;
                return $this;
            }
            
            public function getId(){
                return $this->_id;
            }
            
        
        public function find($id){
            $mapper=new App_Model_RatingMapper();
            $mapper->find($id,$this);
        }
        
        
        
        public function toArray(){
            $row=array(
               'Id' =>$this->getId(),
            'RatingAttributeId' =>$this->getRatingAttributeId(),
            'Score' =>$this->getScore(),
            'UserId' =>$this->getUserId(),
            'AtmId' =>$this->getAtmId(),
            
            );
            return $row;
        }
        
    }
    
    
        