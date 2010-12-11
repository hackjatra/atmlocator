<?php
    
    class App_Form_Variables extends Zend_Form
    {
    
        public function init()
        {
            /* Form Elements & Other Definitions Here ... */
            $this->setMethod('post');
            
            
		$this->addElement('text','Id',array(
		    'label'     => 'Id',
		    'required'    => true,
		    ));
		
		$this->addElement('text','Name',array(
		    'label'     => 'Name',
		    'required'    => true,
		    ));
		
		$this->addElement('text','Value',array(
		    'label'     => 'Value',
		    'required'    => true,
		    ));
		
		$this->addElement('text','Description',array(
		    'label'     => 'Description',
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
    
        