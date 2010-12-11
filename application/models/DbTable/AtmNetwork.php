<?php
    /**
    * This is the DbTable class for the AtmNetwork table.
    */
    class App_Model_DbTable_AtmNetwork extends App_Model_DbTable_DbTableAbstract
    {
       /** Table name */
        protected $_name    = 'atm_network';
        protected $_dependentTables = array('App_Model_DbTable_Atm');
    }
        