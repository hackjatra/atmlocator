<?php
    /**
    * This is the DbTable class for the Rating table.
    */
    class App_Model_DbTable_Rating extends Zend_Db_Table_Abstract
    {
       /** Table name */
        protected $_name    = 'rating';
        protected $_dependentTables = array('App_Model_DbTable_Rating');
        
        protected $_referenceMap = array (
							'atm_network' => array (
									'columns' => 'atm_network_id', 
									'refTableClass' => 'App_Model_DbTable_AtmNetwork', 
									'refColumns' => 'id' ) 
								);
    }
        