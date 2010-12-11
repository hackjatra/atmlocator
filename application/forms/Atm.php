<?php
    
    class App_Form_Atm extends Zend_Form
    {
    
        public function init(){
        /* Form Elements & Other Definitions Here ... */
        $this->setMethod('post');
		
        $bankModel = new App_Model_Bank();
		$bankMapper = new App_Model_BankMapper($bankModel);
		$allBanks=$bankMapper->fetchAll();
		$bankName=array();
		foreach($allBanks as $bank){
			array_push($bankName,$bank->bankName." (".$bank->identifier.")");
		}
		
		$this->addElement('select','BankId',array(
		    'label'     => 'Bank',
			'multiOptions' => $bankName,
		    'required'    => true,
		    ));
		
		$this->addElement('text','AtmNetworkId',array(
		    'label'     => 'Atm Network',
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
		    'label'     => 'Descriptive Location',
		    'required'    => true,
		    ));
		
		$this->addElement('text','Languages',array(
		    'label'     => 'Languages',
		    'required'    => true,
		    ));
		
		$this->addElement('text','CardUsage',array(
		    'label'     => 'Card Usage',
		    'required'    => true,
		    ));
		
		$this->addElement('text','Charges',array(
		    'label'     => 'Charges',
		    ));
		
		$this->addElement('text','OneTimeWithdrawLimit',array(
		    'label'     => 'One Time Withdrawl Limit',
		    ));
		
		$this->addElement('text','AdditionalProperty',array(
		    'label'     => 'Additional Property',
		    ));
		
		$this->addElement('text','Description',array(
		    'label'     => 'Description',
		    ));
		
		$this->addElement('text','VerificationDescription',array(
		    'label'     => 'Verification Description',
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
    