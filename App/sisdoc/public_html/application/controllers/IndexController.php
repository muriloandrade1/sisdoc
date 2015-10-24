<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        $this->view->pIndex = 'current';
    }

    public function indexAction()
    {
        $operadora = new Application_Model_Operadora_OperadoraMapper();
        $this->view->objOperadora = $operadora->fetchAll();
        $this->view->valid = Zend_Auth::getInstance()->hasIdentity();
        
    	$request = $this->getRequest();
        if ($request->getPost()){
        	$retorno = self::logar($request->getPost());

        	if(!empty($retorno))
        	{
        		$this->_redirect("/");
        	}
        	else
        	{
        		$this->view->$message = "Usuário e/ou senha inválidos.";
        	}       	
        }
        
    }
        
    public function logar($post)
    {
    	$usuario = new Application_Model_Usuario_Usuario();
        $user = new Application_Model_Usuario_UsuarioMapper();
        	
        $usuario->setDsLogin($post["user"]);
        $usuario->setDsPass($post["pwd"]);
        $result = $user->login($usuario);
    	return $result;
    }
    
    public function logoutAction()
    {
    	$auth = Zend_Auth::getInstance();
    	$auth->clearIdentity();
    	$this->_redirect("/");
    }
}
