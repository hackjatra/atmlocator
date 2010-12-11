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
    	$this->addRole(new Zend_Acl_Role('admin'));
    	$this->addRole(new Zend_Acl_Role('moderator'));
        $this->addRole(new Zend_Acl_Role('user'));

        $this->allow(null,'atm');
        //allow
    	$this->allow('admin', 'role');
    	$this->allow('admin', 'user');
    	$this->allow('admin', 'atm');
    	$this->allow('admin', 'atmNetwork');
    	$this->allow('admin', 'bank');
    	$this->allow('admin', 'rating');
    	$this->allow('admin', 'ratingAttribute');
    	
    	$this->allow(null, 'user','login');
    	
    	//deny
    	$this->deny('admin', 'user','login');
    	$this->deny('moderator', 'user','login');
    	$this->deny('user', 'user','login');
    	
    	$this->deny(null, 'user','logout');
    }
}
