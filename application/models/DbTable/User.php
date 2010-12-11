<?php

/**
 * This is the DbTable class for the User table.
 */
class App_Model_DbTable_User extends App_Model_DbTable_DbTableAbstract
{

    /** Table name */
    protected $_name = 'user';
    protected $_dependentTables = array('App_Model_DbTable_Rating');
    
     protected $_referenceMap = array (
							'role' => array (
									'columns' => 'role_id', 
									'refTableClass' => 'App_Model_DbTable_Role', 
									'refColumns' => 'id' ) 
								);

    public function findByEmail($email)
    {
        return $this->fetchRow('email = ?', $email);
    }
}

