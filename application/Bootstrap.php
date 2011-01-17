<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{     
	protected $_acl = null;
    protected $_auth = null;
    
    /**
     * Automatically load the modules
     * 
     * Configures classes with 'App_' to autoload
     */
    protected function _initModuleAutoLoad()
    {
    	  $moduleLoader = new Zend_Application_Module_Autoloader(array(
    	      "namespace" => "App",
    	      "basePath" => APPLICATION_PATH));
    }
    
    protected function _initAuthAndAcl()
    {	  
    	  $this->_acl = new App_Model_Acl();
    	  $this->_auth = Zend_Auth::getInstance();
    	  
    	  $frontController = Zend_Controller_Front::getInstance();
    	  $frontController->registerPlugin(new App_Plugin_AccessCheck($this->_acl, $this->_auth));
    }
    
    protected function _initViewHelper()
    {
    	  $this->bootstrap("layout");
    	  $layout = $this->getResource("layout");
    	  $view = $layout->getView();
    	  
    	  $view->doctype("HTML4_STRICT");
    	  $view->headTitle()->setSeparator(" - ");
    	  $options= $this->getOptions();
    	  $appName="ATM Locator";
    	  
    	  $view->headTitle($appName);
    	  
    	  // Initialize Zendx jquery viewHelper
    	  $viewRenderer=new Zend_Controller_Action_Helper_ViewRenderer();
    	  $view->addHelperPath("ZendX/JQuery/View/Helper", "ZendX_JQuery_View_Helper");

                        
    	  $viewRenderer->setView($view);
    	  Zend_Controller_Action_HelperBroker::addHelper($viewRenderer);
    	  
//    	  $navContainerConfig = new Zend_Config_Xml(APPLICATION_PATH . '/configs/navigation.xml', 'nav');
//    	  $navContainer = new Zend_Navigation($navContainerConfig);
//
          $role = null;
      	  if (null !== $this->_auth->getStorage()->read()) {
                $role = $this->_auth->getStorage()->read()->role_id;
          }
                    
    	  //$view->navigation($navContainer)->setAcl($this->_acl)->setRole('admin');
    	  
    }
    
    protected function _initRegisterNamespace()
    {
        $autoloader = Zend_Loader_Autoloader::getInstance();
        $autoloader->registerNamespace('Hackjatra_');
    }
}

