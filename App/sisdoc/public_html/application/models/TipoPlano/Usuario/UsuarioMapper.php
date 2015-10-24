<?php

class Application_Model_Usuario_UsuarioMapper 
{

    protected $_dbTable;

    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Tabela inválida');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }

    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_Usuario');
        }
        return $this->_dbTable;
    }

    /**
     * 
     */
    public function save(Application_Model_Usuario_Usuario $usuario)
    {
        $data = array(
            'id_user'	=> $usuario->getIdUser(),
        	'no_user'   => $usuario->getNoUser(),
        	'ds_login'	=> $usuario->getDsLogin(),
        	'ds_pass'	=> $usuario->getDsPass(),
        	'fl_perfil'	=> $usuario->getFlPerfil()
        );

        //Verifica se já existe o id setado no objeto
        if ( $usuario->getIdUser() == 0  ) {
            //Inseri registro
           return( $this->getDbTable()->insert($data) );
        } else {
            //Altera registro
           return( $this->getDbTable()->update( $data, array('id_user = ?' => $usuario->getIdUser() ) ) );
        }
    }

    public function delete($id)
    {
       return( $this->getDbTable()->delete(array('id_user = ?' => $id)) );
    }

    public function find($id, Application_Model_Usuario_Usuario $usuario)
    {

        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $usuario->setIdUser($row->id_user);
    }

    /**
     * Busca todos os agentes cadastrados
     *
     * @return array
     */
    public function fetchAll()
    {
        $select = $this->getDbTable()->select();

        $resultSet = $this->getDbTable()->fetchAll($select);

        $arrResult   = array();
        foreach ($resultSet as $row) {
            $arrUsuario = new Application_Model_Usuario_Usuario();
            $arrUsuario->setIdUser($row->id_user);
            $arrUsuario->setNoUser($row->no_user);
            $arrUsuario->setDsLogin($row->ds_login);
            $arrUsuario->setDsPass($row->ds_pass);
            $arrUsuario->setFlPerfil($row->fl_perfil);
            $arrResult[] = $arrUsuario;
        }
        return $arrResult;
    }
    
    public function login(Application_Model_Usuario_Usuario $usuario)
    {
    	$select = $this->getDbTable() 
    			->select()
		    	->from(array('us' => 'tb_usuario'))
		    	->where('us.ds_login = ? ', $usuario->getDsLogin())
		    	->where('us.ds_pass = ? ', $usuario->getDsPass());
		    	
		$select->setIntegrityCheck(false);
//echo $select;exit;

    	$resultSet = $this->getDbTable()->fetchAll($select);
		
		$arrResult   = array();
        foreach ($resultSet as $row) {
        	$arrUsuario = new Application_Model_Usuario_Usuario();
        	$arrUsuario->setIdUser($row->id_user);
            $arrUsuario->setNoUser($row->no_user);
            $arrUsuario->setFlPerfil($row->fl_perfil);
            $arrResult[] = $arrUsuario;
        }

//echo'<pre>';print_r($arrResult);exit;        
		if(!empty($arrResult))
		{
			$result = new Zend_Auth_Result(Zend_Auth_Result::SUCCESS, array($arrResult));
		}
		else 
		{
			$result = new Zend_Auth_Result(Zend_Auth_Result::FAILURE, array());
		}
		
		return $result;
    }
}