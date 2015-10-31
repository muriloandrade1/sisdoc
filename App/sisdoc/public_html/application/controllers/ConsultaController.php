<?php

class ConsultaController extends Zend_Controller_Action {

    public function init() {
        $this->view->pIndex = 'current';
    }

    public function indexAction() {        
        $this->view->valid = Zend_Auth::getInstance()->hasIdentity();
    	if(!Zend_Auth::getInstance()->hasIdentity())
            $this->_redirect("/");	
    	
        $objConsulta = new Application_Model_Tbdocumentos_TbdocumentosMapper();
    	$this->view->objConsulta = $objConsulta->consultaPrincipal();
    	
        
    }

}
