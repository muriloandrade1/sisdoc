<?php

class IndexController extends Zend_Controller_Action {

    public function init() {
        $this->view->pIndex = 'current';
    }

    public function indexAction() {
         
        $request = $this->getRequest();

        if ($request->getPost()) {            
            $retorno = self::logar($request->getPost());

            if ($retorno->getCode()) {
                //$this->_redirect("/");
                echo "passou";
            } else {
                echo "<b style='color: red;'>Usuário e/ou senha inválidos</b>";
                //$this->view->$message = "Usuário e/ou senha inválidos.";
            }
        }
    }

    public function logar($post) {
        $usuario = new Application_Model_Tbacesso_Tbacesso();
        $user = new Application_Model_Tbacesso_TbacessoMapper();

        $usuario->setnome ($post["user"]);
        $usuario->setsenha($post["pswd"]);
        
        return $user->login($usuario);
    }

    public function logoutAction() {
        $auth = Zend_Auth::getInstance();
        $auth->clearIdentity();
        $this->_redirect("/");
    }

}
