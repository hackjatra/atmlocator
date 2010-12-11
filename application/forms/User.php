<?php
    
    class App_Form_User extends Zend_Form
    {
    
        public function init()
        {
            /* Form Elements & Other Definitions Here ... */
            $this->setMethod('post');
            
            
		$this->addElement('text','Id',array(
		    'label'     => 'Id',
		    'required'    => true,
		    ));
		
		$this->addElement('text','Token',array(
		    'label'     => 'Token',
		    'required'    => true,
		    ));
		
		$this->addElement('text','Username',array(
		    'label'     => 'Username',
		    'required'    => true,
		    ));
		
		$this->addElement('text','Email',array(
		    'label'     => 'Email',
		    'required'    => true,
		    ));
		
		$this->addElement('text','RoleId',array(
		    'label'     => 'RoleId',
		    'required'    => true,
		    ));
		
		$this->addElement('text','IsActive',array(
		    'label'     => 'IsActive',
		    'required'    => true,
		    ));
		
		$this->addElement('text','Credibility',array(
		    'label'     => 'Credibility',
		    'required'    => true,
		    ));
		
            // Add the submit button
            $this->addElement('submit', 'submit', array(
                'ignore'   => true,
                'label'    => 'Submit',
            ));
    
            // And finally add some CSRF protection
            $this->addElement('hash', 'csrf', array(
                'ignore' => true,
            ));
        }
    }
    
        