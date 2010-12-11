<?php
    /**
    * This is the DbTable class for the Role table.
    */
    class App_Model_DbTable_Role extends App_Model_DbTable_DbTableAbstract
    {
       /** Table name */
        protected $_name    = 'role';
        protected $_dependentTables = array('App_Model_DbTable_User');
    }
        