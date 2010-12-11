<?php

/**
 * This is the DbTable class for the User table.
 */
class App_Model_DbTable_User extends Zend_Db_Table_Abstract
{

    /** Table name */
    protected $_name = 'user';

    public function findByEmail($email)
    {
        $select = $this->select();
        $select->where('email = ?', $email);
        return $this->fetchRow($select);
    }
}

