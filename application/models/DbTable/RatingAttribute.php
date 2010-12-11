<?php
    /**
    * This is the DbTable class for the RatingAttribute table.
    */
    class App_Model_DbTable_RatingAttribute extends App_Model_DbTable_DbTableAbstract
    {
       /** Table name */
        protected $_name    = 'rating_attribute';
        protected $_dependentTables = array('App_Model_DbTable_Rating');
        
    }
        