<?php

class Application_Form_Wysiwyg extends Zend_Form
{

    public function init()
    {
        $this->setName('wysiwyg');
        
        $ckeditor = new Zend_Form_Element_Textarea('ckeditor');
        $ckeditor->setAttrib('class', 'ckeditor');
        
        $save = new Zend_Form_Element_Submit('save');

        $this->addElements(array($ckeditor, $save));
    }

    
}

