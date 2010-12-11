<?php
    
    class App_Form_Atm extends Zend_Form
    {
    
        public function init()
        {
            /* Form Elements & Other Definitions Here ... */
            $this->setMethod('post');
		
		$this->addElement('text','BankId',array(
		    'label'     => 'BankId',
		    'required'    => true,
		    ));
		
		$this->addElement('text','AtmNetworkId',array(
		    'label'     => 'AtmNetworkId',
		    'required'    => true,
		    ));
		
		$this->addElement('text','Latitude',array(
		    'label'     => 'Latitude',
		    'required'    => true,
		    ));
		
		$this->addElement('text','Longitude',array(
		    'label'     => 'Longitude',
		    'required'    => true,
		    ));
		
		$this->addElement('text','DescriptiveLocation',array(
		    'label'     => 'DescriptiveLocation',
		    'required'    => true,
		    ));
		
		$this->addElement('text','Languages',array(
		    'label'     => 'Languages',
		    'required'    => true,
		    ));
		
		$this->addElement('text','CardUsage',array(
		    'label'     => 'CardUsage',
		    'required'    => true,
		    ));
		
		$this->addElement('text','Charges',array(
		    'label'     => 'Charges',
		    'required'    => true,
		    ));
		
		$this->addElement('text','OneTimeWithdrawLimit',array(
		    'label'     => 'OneTimeWithdrawLimit',
		    'required'    => true,
		    ));
		
		$this->addElement('text','AdditionalProperty',array(
		    'label'     => 'AdditionalProperty',
		    'required'    => true,
		    ));
		
		$this->addElement('text','Description',array(
		    'label'     => 'Description',
		    'required'    => true,
		    ));
		
		$this->addElement('text','VerificationDescription',array(
		    'label'     => 'VerificationDescription',
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
    
        