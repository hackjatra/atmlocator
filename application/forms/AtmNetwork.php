<?php
    
    class App_Form_AtmNetwork extends Zend_Form
    {
    
        public function init()
        {
            /* Form Elements & Other Definitions Here ... */
            $this->setMethod('post');
		
		$this->addElement('text','Name',array(
		    'label'     => 'Name',
		    'required'    => true,
		    ));
		
		$this->addElement('text','AcceptingCountries',array(
		    'label'     => 'Accepting Countries',
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
    
        