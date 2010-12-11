<?php
    /**
    * This is the DbTable class for the Bank table.
    */
    class App_Model_DbTable_Bank extends App_Model_DbTable_DbTableAbstract
    {
       /** Table name */
        protected $_name    = 'bank';
        protected $_dependentTables = array('App_Model_DbTable_Atm');
    }
        