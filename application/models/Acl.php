<?php
class App_Model_Acl extends Zend_Acl{
    public function __construct(){
    	//add resources here

    	$this->add(new Zend_Acl_Resource('error'));
    	$this->add(new Zend_Acl_Resource('user'));
    	$this->add(new Zend_Acl_Resource('role'));
    	$this->add(new Zend_Acl_Resource('atm'));
    	$this->add(new Zend_Acl_Resource('atmNetwork'));
        $this->add(new Zend_Acl_Resource('bank'));
    	$this->add(new Zend_Acl_Resource('ratingAttribute'));
    	$this->add(new Zend_Acl_Resource('rating'));

    	
    	//add role here
    	$this->addRole(new Zend_Acl_Role('user'));
        $this->addRole(new Zend_Acl_Role('admin'),'user');        
    }
}
