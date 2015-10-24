<?php

class Application_Model_TipoPlano_TipoPlanoMapper 
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
            $this->setDbTable('Application_Model_DbTable_TipoPlano');
        }
        return $this->_dbTable;
    }

    /**
     * 
     */
    public function save(Application_Model_TipoPlano_TipoPlano $tipoPlano)
    {
        $data = array(
            'id_tipo_plano'	=> $tipoPlano->getIdTipoPlano(),
        	'no_tipo_plano' => $tipoPlano->getNoTipoPlano()
        );

        //Verifica se já existe o id setado no objeto
        if ( $tipoPlano->getIdCategoriaPlano() == 0  ) {
            //Inseri registro
           return( $this->getDbTable()->insert($data) );
        } else {
            //Altera registro
           return( $this->getDbTable()->update( $data, array('id_tipo_plano = ?' => $tipoPlano->getIdTipoPlano() ) ) );
        }
    }

    public function delete($id)
    {
       return( $this->getDbTable()->delete(array('id_tipo_plano = ?' => $id)) );
    }

    public function find($id, Application_Model_TipoPlano_TipoPlano $tipoPlano)
    {

        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $tipoPlano->setIdTipoPlano($row->id_tipo_plano);
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
            $arrTipoPlano = new Application_Model_TipoPlano_TipoPlano();
            $arrTipoPlano->setIdTipoPlano($row->id_tipo_plano);
            $arrTipoPlano->setNoTipoPlano($row->no_tipo_plano);
            $arrResult[] = $arrTipoPlano;
        }
        return $arrResult;
    }
}