<?php

class Application_Model_Tbacesso_TbacessoMapper {

    protected $_dbTable;

    public function setDbTable($dbTable) {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Tabela inválida');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }

    public function getDbTable() {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_Tbacesso');
        }
        return $this->_dbTable;
    }

    public function login(Application_Model_Tbacesso_Tbacesso $usuario) {
        $tbUsuario = new Application_Model_DbTable_Tbacesso();

        $auth = Zend_Auth::getInstance();
        $authAdapter = new Zend_Auth_Adapter_DbTable($tbUsuario->getAdapter(), 'sisdoc.tb_acesso');

        $authAdapter->setIdentityColumn("NOME")
                ->setCredentialColumn("SENHA");

        $authAdapter->setIdentity($usuario->getnome())
                ->setCredential($usuario->getsenha());

        $result = $auth->authenticate($authAdapter);

        if ($result->isValid()) {
            $arrResult = $authAdapter->getResultRowObject();
            $retorno = new Zend_Auth_Result(Zend_Auth_Result::SUCCESS, array());
        } else {
            $retorno = new Zend_Auth_Result(Zend_Auth_Result::FAILURE, array());
        }

        return $retorno;
    }

}
