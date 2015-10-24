<?php

class Application_Model_OperadoraContato_OperadoraContatoMapper{

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
            $this->setDbTable('Application_Model_DbTable_OperadoraContato');
        }
        return $this->_dbTable;
    }

    public function save(Application_Model_OperadoraContato_OperadoraContato $operadoraContato)
    {
        $data = array(
            'id_operadora_contato' => $operadoraContato->getIdOperadoraContato(),
            'id_contato'           => $operadoraContato->getIdContato(),
            'id_operadora'         => $operadoraContato->getIdOperadora()
        );
        
        // Verifica se já existe um id, se existir, faz uma alteraçao, senao, uma inserçao
        if ( $operadoraContato->getIdOperadoraContato() == 0  ) {
            //Inseri registro
           return( $this->getDbTable()->insert($data) );
        } else {
            //Altera registro
           return( $this->getDbTable()->update( $data, array('id_operadora_contato = ?' => $OperadoraContato->getIdOperadoraContato() ) ) );
        }
    }

    public function delete($id)
    {
       return( $this->getDbTable()->delete(array('id_operadora_contato = ?' => $id)) );
    }

    public function find($id, Application_Model_OperadoraContato_OperadoraContato $OperadoraContato)
    {

        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $OperadoraContato->getIdOperadoraContato($row->id_operadora_contato);
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
            $arrOperadoraContato = new Application_Model_OperadoraContato_OperadoraContato();
            $arrOperadoraContato->setIdOperadoraContato($row->id_operadora_contato);
            $arrOperadoraContato->setIdOperadora($row->id_operadora);
            $arrOperadoraContato->setIdConteudo($row->id_contato);
            $arrResult[] = $arrOperadoraContato;
        }
        return $arrResult;
    }
}