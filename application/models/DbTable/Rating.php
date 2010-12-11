<?php
    /**
    * This is the DbTable class for the Rating table.
    */
    class App_Model_DbTable_Rating extends App_Model_DbTable_DbTableAbstract
    {
       /** Table name */
        protected $_name    = 'rating';
        
        protected $_referenceMap = array (
							'user' => array (
									'columns' => 'user_id', 
									'refTableClass' => 'App_Model_DbTable_User', 
									'refColumns' => 'id' ),
        					'rating_attribute' => array (
									'columns' => 'rating_attribute_id', 
									'refTableClass' => 'App_Model_DbTable_RatingAttribute', 
									'refColumns' => 'id' ),
        					'atm' => array (
									'columns' => 'atm_id', 
									'refTableClass' => 'App_Model_DbTable_Atm', 
									'refColumns' => 'id' ) 
								);
    }
        