<?php
class App_Plugin_AccessCheck extends Zend_Controller_Plugin_Abstract
{
    private $_acl = null;
    private $_auth = null;
    
    public function __construct(Zend_Acl $acl, Zend_Auth $auth)
    {
        $this->_acl = $acl;
        $this->_auth = $auth;
    }

    public function getAcl()
    {
        return $this->_acl;
    }

    public function getAuth()
    {
        return $this->_auth;
    }
    
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        $resource = $request->getControllerName();
        $action = $request->getActionName();
        
        $identity = $this->_auth->getStorage()->read();
        $role = ($identity)?$identity->role_id:null;
        
        //get RoleName from role id
        $roletbl = new App_Model_Role();
        $rolesmapper = new App_Model_RoleMapper($roletbl);
        $row = $rolesmapper->find($role,$roletbl);
        $role = $roletbl->getRole();

        if (!$this->_acl->isAllowed($role, $resource, $action)) {
            $request->setControllerName('user')
                    ->setActionName('login');
        }
    }
}
