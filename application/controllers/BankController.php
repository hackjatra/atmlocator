<?php
    
    class BankController extends Zend_Controller_Action
    {
    
    //    public function init()
    //    {
    //        /* Initialize action controller here */
    //    }
    
        public function indexAction()
        {
            $this->_helper->redirector('list');
        }
    
        public function addAction()
        {
            $request = $this->getRequest();
            $form= new App_Form_Bank();
            if($this->getRequest()->isPost()){
                if($form->isValid($request->getPost())){
                    $data = new App_Model_Bank($form->getValues());
                    $mapper = new App_Model_BankMapper();
                    $mapper->save($data);
                    return $this->_helper->redirector('index');
                }
            }
            $this->view->form=$form;
        }
        
    public function listAction(){
        $mapper = new App_Model_BankMapper();
        $this->view->entries= $mapper->fetchAll();
    }    
    
    public function editAction(){
    $editId = $this->getRequest()->getParam('id');
    $form=new App_Form_Bank();
    $tbl=new App_Model_Bank();
    $mapper=new App_Model_BankMapper();
    $row=$tbl->find($editId);
    $datarow=$tbl->toArray();
    $form->populate($datarow);
    $this->view->form=$form;
    $request = $this->getRequest();
    if($this->getRequest()->isPost()){
        $id = $this->_getParam('id', 0);
            if($form->isValid($request->getPost())){
                $data = new App_Model_Bank($form->getValues());
                $mapper = new App_Model_BankMapper();
                $data->setId($id);
                $mapper->save($data);
                return $this->_helper->redirector('index');
            }
        } 
    }
    
    public function deleteAction(){
        $id=$this->getRequest()->getParam('id');
        $this->view->title = "Delete Bank ";
        $this->view->headTitle($this->view->title);
        
        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
            if ($del == 'Yes') { 
                $id = $this->getRequest()->getPost('id');
                $tbl=new App_Model_Bank();
                $mapper=new App_Model_BankMapper();
                $row=$tbl->find($id);
                $mapper->delete($tbl);
            }
            $this->_helper->redirector('index');
        } else {
            $tbl=new App_Model_Bank();
            $this->view->id = $id;
        }
    }        
}   
        