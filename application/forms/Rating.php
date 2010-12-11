<?php
    
    class App_Form_Rating extends Zend_Form
    {
    
        public function init()
        {
            /* Form Elements & Other Definitions Here ... */
            $this->setMethod('post');
            
            
		$this->addElement('text','Id',array(
		    'label'     => 'Id',
		    'required'    => true,
		    ));
		
		$this->addElement('text','RatingAttributeId',array(
		    'label'     => 'RatingAttributeId',
		    'required'    => true,
		    ));
		
		$this->addElement('text','Score',array(
		    'label'     => 'Score',
		    'required'    => true,
		    ));
		
		$this->addElement('text','UserId',array(
		    'label'     => 'UserId',
		    'required'    => true,
		    ));
		
		$this->addElement('text','AtmId',array(
		    'label'     => 'AtmId',
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
    
        