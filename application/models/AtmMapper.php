<?php 
    
    class App_Model_AtmMapper{
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
                $this->setDbTable('App_Model_DbTable_Atm');
            }
            return $this->_dbTable;
        }
        
        public function save(App_Model_Atm $tbl){
            $data=array(
                    'verification_description'=>$tbl->getVerificationDescription(),
            'description'=>$tbl->getDescription(),
            'additional_property'=>$tbl->getAdditionalProperty(),
            'one_time_withdraw_limit'=>$tbl->getOneTimeWithdrawLimit(),
            'charges'=>$tbl->getCharges(),
            'card_usage'=>$tbl->getCardUsage(),
            'languages'=>$tbl->getLanguages(),
            'descriptive_location'=>$tbl->getDescriptiveLocation(),
            'longitude'=>$tbl->getLongitude(),
            'latitude'=>$tbl->getLatitude(),
            'atm_network_id'=>$tbl->getAtmNetworkId(),
            'bank_id'=>$tbl->getBankId(),
            'id'=>$tbl->getId(),
            
                    );
            if(null === ($id=$tbl->getId())){
                unset($data['id']);
                $this->getDbTable()->insert($data);
            }else{
                $this->getDbTable()->update($data,array('id = ?'=> $id));
            }
        }
        
        public function delete(App_Model_Atm $tbl){
            $id=$tbl->getId();
            $this->getDbTable()->delete(array('id = ?'=> $id));
        }
    
        public function find($id,App_Model_Atm $tbl){
            $result=$this->getDbTable()->find($id);
            if(0==count($result)){
                return;
            }
            $row=$result->current();
            $tbl->setVerificationDescription($row->verification_description)
            ->setDescription($row->description)
            ->setAdditionalProperty($row->additional_property)
            ->setOneTimeWithdrawLimit($row->one_time_withdraw_limit)
            ->setCharges($row->charges)
            ->setCardUsage($row->card_usage)
            ->setLanguages($row->languages)
            ->setDescriptiveLocation($row->descriptive_location)
            ->setLongitude($row->longitude)
            ->setLatitude($row->latitude)
            ->setAtmNetworkId($row->atm_network_id)
            ->setBankId($row->bank_id)
            ->setId($row->id)
            ;
            return $row;
        }
        
        public function fetchAll(){
            $resultSet=$this->getDbTable()->fetchAll();
            $entries = array();
            foreach($resultSet as $row){
                $entry = new App_Model_Atm();
                $entry->setVerificationDescription($row->verification_description)
            ->setDescription($row->description)
            ->setAdditionalProperty($row->additional_property)
            ->setOneTimeWithdrawLimit($row->one_time_withdraw_limit)
            ->setCharges($row->charges)
            ->setCardUsage($row->card_usage)
            ->setLanguages($row->languages)
            ->setDescriptiveLocation($row->descriptive_location)
            ->setLongitude($row->longitude)
            ->setLatitude($row->latitude)
            ->setAtmNetworkId($row->atm_network_id)
            ->setBankId($row->bank_id)
            ->setId($row->id)
            ;
                $entries[]=$entry;
            }
            return $entries;
        }
    }
        