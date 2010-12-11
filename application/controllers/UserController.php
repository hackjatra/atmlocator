<?php

class UserController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $this->_helper->redirector('list');
    }

    public function loginAction()
    {
        $provider = $this->getRequest()->getParam('provider');
        if ($provider) {
            // disable layouts and view
            try {
                require_once 'LightOpenID.php';
                $openid = new LightOpenID();
                if (!$openid->mode) {
                    switch ($provider) {
                        case 'google':
                            $openid->identity = 'https://www.google.com/accounts/o8/id';
                            $openid->required = array('namePerson/first', 'namePerson/last', 'contact/email');
                            header('Location: ' . $openid->authUrl());

                        default :
                            $this->_helper->flashMessenger('Provider not found');
                    }
                } elseif ($openid->mode == 'cancel') {
                    // Cancelled
                } else {
                    if ($openid->validate()) {
                        $this->loginSuccessful($openid);
                    } else {
                        // Logged Out
                    }
                }
            } catch (Exception $e) {
                print $e->getMessage();
            }
        }
    }
    
    public function addAction()
    {
        $request = $this->getRequest();
        $form = new App_Form_User();
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $data = new App_Model_User($form->getValues());
                $mapper = new App_Model_UserMapper();
                $mapper->save($data);
                return $this->_helper->redirector('index');
            }
        }
        $this->view->form = $form;
    }

    public function listAction()
    {
        $mapper = new App_Model_UserMapper();
        $this->view->entries = $mapper->fetchAll();
    }

    public function editAction()
    {
        $editId = $this->getRequest()->getParam('id');
        $form = new App_Form_User();
        $tbl = new App_Model_User();
        $mapper = new App_Model_UserMapper();
        $row = $tbl->find($editId);
        $datarow = $tbl->toArray();
        $form->populate($datarow);
        $this->view->form = $form;
        $request = $this->getRequest();
        if ($this->getRequest()->isPost()) {
            $id = $this->_getParam('id', 0);
            if ($form->isValid($request->getPost())) {
                $data = new App_Model_User($form->getValues());
                $mapper = new App_Model_UserMapper();
                $data->setId($id);
                $mapper->save($data);
                return $this->_helper->redirector('index');
            }
        }
    }

    public function deleteAction()
    {
        $id = $this->getRequest()->getParam('id');
        $this->view->title = "Delete User ";
        $this->view->headTitle($this->view->title);

        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
            if ($del == 'Yes') {
                $id = $this->getRequest()->getPost('id');
                $tbl = new App_Model_User();
                $mapper = new App_Model_UserMapper();
                $row = $tbl->find($id);
                $mapper->delete($tbl);
            }
            $this->_helper->redirector('index');
        } else {
            $tbl = new App_Model_User();
            $this->view->id = $id;
        }
    }

    public function loginSuccessful(LightOpenID $openId)
    {
        $attributes = $openId->getAttributes();
        $email = $attributes['contact/email'];

        $userMapper = new App_Model_UserMapper();
        $user = $userMapper->findByEmail($email);

//        var_dump($user->)
    }
}

