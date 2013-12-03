<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $db = Zend_Db_Table::getDefaultAdapter();
        $select = $db->fetchAll('SELECT content FROM sample');
        $ckeditor = new Application_Form_Wysiwyg();
        $this->view->ckeditor = $ckeditor;
        $this->view->select = $select;
        
        if ($this->getRequest()->isPost())
        {
            $formData = $this->getRequest()->getPost();
            
            if ($ckeditor->isValid($formData)) 
            {
                $content = $ckeditor->getValue('ckeditor');
                
                $data = array(
                    'content' => $content
                );
                
                $result = $db->insert('sample', $data);
                        
                $this->_redirect($this->view->url());
            }
        }
    }


}

