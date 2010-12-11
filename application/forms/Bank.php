<?php
    
    class App_Form_Bank extends Zend_Form
    {
    
        public function init()
        {
            /* Form Elements & Other Definitions Here ... */
            $this->setMethod('post');
            
            
		$this->addElement('text','Id',array(
		    'label'     => 'Id',
		    'required'    => true,
		    ));
		
		$this->addElement('text','BankName',array(
		    'label'     => 'BankName',
		    'required'    => true,
		    ));
		
		$this->addElement('text','Identifier',array(
		    'label'     => 'Identifier',
		    'required'    => true,
		    ));
		
		$this->addElement('text','DailyWithdrawLimit',array(
		    'label'     => 'DailyWithdrawLimit',
		    'required'    => true,
		    ));
		
		$this->addElement('text','OneTimeWithdrawLimit',array(
		    'label'     => 'OneTimeWithdrawLimit',
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
    
        