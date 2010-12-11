<?php
    /**
    * This is the DbTable class for the Atm table.
    */
    class App_Model_DbTable_Atm extends Zend_Db_Table_Abstract
    {
       /** Table name */
        protected $_name    = 'atm';
        
        protected $_dependentTables = array('App_Model_DbTable_Rating');
        
        protected $_referenceMap = array (
							'atm_network' => array (
									'columns' => 'atm_network_id', 
									'refTableClass' => 'App_Model_DbTable_AtmNetwork', 
									'refColumns' => 'id' ),
        					'bank' => array (
									'columns' => 'bank_id', 
									'refTableClass' => 'App_Model_DbTable_Bank', 
									'refColumns' => 'id' ) 
								);
    }
        