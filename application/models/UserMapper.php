<?php 
    
    class App_Model_UserMapper{
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
                $this->setDbTable('App_Model_DbTable_User');
            }
            return $this->_dbTable;
        }
        
        public function save(App_Model_User $tbl){
            $data=array(
                    'credibility'=>$tbl->getCredibility(),
            'is_active'=>$tbl->getIsActive(),
            'role_id'=>$tbl->getRoleId(),
            'username'=>$tbl->getUsername(),
            'token'=>$tbl->getToken(),
            'id'=>$tbl->getId(),
            
                    );
            if(null === ($id=$tbl->getId())){
                unset($data['id']);
                $this->getDbTable()->insert($data);
            }else{
                $this->getDbTable()->update($data,array('id = ?'=> $id));
            }
        }
        
        public function delete(App_Model_User $tbl){
            $id=$tbl->getId();
            $this->getDbTable()->delete(array('id = ?'=> $id));
        }
    
        public function find($id,App_Model_User $tbl){
            $result=$this->getDbTable()->find($id);
            if(0==count($result)){
                return;
            }
            $row=$result->current();
            $tbl->setCredibility($row->credibility)
            ->setIsActive($row->is_active)
            ->setRoleId($row->role_id)
            ->setUsername($row->username)
            ->setToken($row->token)
            ->setId($row->id)
            ;
            return $row;
        }
        
        public function fetchAll(){
            $resultSet=$this->getDbTable()->fetchAll();
            $entries = array();
            foreach($resultSet as $row){
                $entry = new App_Model_User();
                $entry->setCredibility($row->credibility)
            ->setIsActive($row->is_active)
            ->setRoleId($row->role_id)
            ->setUsername($row->username)
            ->setToken($row->token)
            ->setId($row->id)
            ;
                $entries[]=$entry;
            }
            return $entries;
        }
    }
        