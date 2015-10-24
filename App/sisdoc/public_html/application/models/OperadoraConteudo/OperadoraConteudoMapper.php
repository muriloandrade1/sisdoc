<?php

class Application_Model_OperadoraConteudo_OperadoraConteudoMapper{

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
            $this->setDbTable('Application_Model_DbTable_OperadoraConteudo');
        }
        return $this->_dbTable;
    }

    public function save(Application_Model_OperadoraConteudo_OperadoraConteudo $operadoraConteudo)
    {
        $data = array(
            'id_operadora_conteudo' => $operadoraConteudo->getIdOperadoraConteudo()
        );

        //Verifica se já existe o registro no banco de dados
        if ( $tipoConteudo->getIdTipoConteudo() == 0  ) {
            //Inseri registro
           return( $this->getDbTable()->insert($data) );
        } else {
            //Altera registro
           return( $this->getDbTable()->update( $data, array('id_operadora_conteudo = ?' => $operadoraConteudo->getIdOperadoraConteudo() ) ) );
        }
    }

    public function delete($id)
    {
       return( $this->getDbTable()->delete(array('id_operadora_conteudo = ?' => $id)) );
    }

    public function find($id, Application_Model_OperadoraConteudo_OperadoraConteudo $operadoraConteudo)
    {

        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $operadoraConteudo->getIdOperadoraConteudo($row->id_operadora_conteudo);
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
            $arrOperadoraConteudo = new Application_Model_OperadoraConteudo_OperadoraConteudo();
            $arrOperadoraConteudo->setIdOperadoraConteudo($row->id_operadora_conteudo);
            $arrOperadoraConteudo->setIdOperadora($row->id_operadora);
            $arrOperadoraConteudo->setIdConteudo($row->id_conteudo);
            $arrResult[] = $arrOperadoraConteudo;
        }
        return $arrResult;
    }
}