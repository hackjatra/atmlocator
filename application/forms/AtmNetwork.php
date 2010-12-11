<?php
    
    class App_Form_AtmNetwork extends Zend_Form
    {
    
        public function init()
        {
            /* Form Elements & Other Definitions Here ... */
            $this->setMethod('post');

            $countriesModel=new App_Model_Countries();
            $countriesMapper=new App_Model_CountriesMapper();
            $allCountries=$countriesMapper->fetchAll();
            $countryNames=array();
            foreach($allCountries as $country){
                $countryNames[$country->id]=$country->countryName;
            }
		
		$this->addElement('text','Name',array(
		    'label'     => 'Name',
		    'required'    => true,
		    ));
		
		$this->addElement('multiselect','AcceptingCountries',array(
		    'label'     => 'Accepting Countries',
                    'multiOptions'=> $countryNames,
                    'size'=>10,
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
    
        