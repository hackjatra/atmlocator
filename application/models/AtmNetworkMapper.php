<?php 
    
    class App_Model_AtmNetworkMapper{
        protected $_dbTable;
        
        public function setDbTable($dbTable){
            if(is_string($dbTable)){
                $dbTable=new $dbTable();
            }
            if (!$dbTable instanceof Zend_Db_Table_Abstract) {
                throw new Exception('Invalid table data gateway provided');
            }
            $this->_dbTable = $dbTable;
            return $this;
        }
    
        public function getDbTable(){
            if (null === $this->_dbTable) {
                $this->setDbTable('App_Model_DbTable_AtmNetwork');
            }
            return $this->_dbTable;
        }
        
        public function save(App_Model_AtmNetwork $tbl){
            $data=array(
                    'accepting_countries'=>$tbl->getAcceptingCountries(),
            'name'=>$tbl->getName(),
            'id'=>$tbl->getId(),
            
                    );
            if(null === ($id=$tbl->getId())){
                unset($data['id']);
                $this->getDbTable()->insert($data);
            }else{
                $this->getDbTable()->update($data,array('id = ?'=> $id));
            }
        }
        
        public function delete(App_Model_AtmNetwork $tbl){
            $id=$tbl->getId();
            $this->getDbTable()->delete(array('id = ?'=> $id));
        }
    
        public function find($id,App_Model_AtmNetwork $tbl){
            $result=$this->getDbTable()->find($id);
            if(0==count($result)){
                return;
            }
            $row=$result->current();
            $tbl->setAcceptingCountries($row->accepting_countries)
            ->setName($row->name)
            ->setId($row->id)
            ;
            return $row;
        }
        
        public function fetchAll(){
            $resultSet=$this->getDbTable()->fetchAll();
            $entries = array();
            foreach($resultSet as $row){
                $entry = new App_Model_AtmNetwork();
                $entry->setAcceptingCountries($row->accepting_countries)
            ->setName($row->name)
            ->setId($row->id)
            ;
                $entries[]=$entry;
            }
            return $entries;
        }
    }
        