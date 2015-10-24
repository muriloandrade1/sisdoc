<?php

class Application_Model_TipoPessoa_TipoPessoaMapper {

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
            $this->setDbTable('Application_Model_DbTable_TipoPessoa');
        }
        return $this->_dbTable;
    }

    /**
     * 
     */
    public function save(Application_Model_TipoPessoa_TipoPessoa $tipoPessoa)
    {
        $data = array(
            'id_tipo_pessoa' => $tipoPessoa->getIdTipoPessoa(),
        	'no_tipo_pessoa' => $tipoPessoa->getNoTipoPessoa(),
        	'ds_tipo_pessoa' => $tipoPessoa->getDsTipoPessoa()
        );

        //Verifica se já existe o registro no banco de dados
        if ( $tipoPessoa->getIdTipoPessoa() == 0  ) {
            //Inseri registro
           return( $this->getDbTable()->insert($data) );
        } else {
            //Altera registro
           return( $this->getDbTable()->update( $data, array('id_tipo_pessoa = ?' => $tipoPessoa->getIdTipoPessoa() ) ) );
        }
    }

    /**
     * Exclui registro do banco de dados
     *
     * @param mixed $id
     */
    public function delete($id)
    {
       return( $this->getDbTable()->delete(array('id_tipo_pessoa = ?' => $id)) );
    }

    /**
     *Realiza busca de agentes
     *
     * @param mixed $id
     * @param Application_Model_Agente $agente
     * @return Object
     */
    public function find($id, Application_Model_TipoPessoa_TipoPessoa $tipoPessoa)
    {

        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $tipoPessoa->setIdTipoPessoa($row->id_tipo_pessoa);
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
            $arrTipoPessoa = new Application_Model_TipoPessoa_TipoPessoa();
            $arrTipoPessoa->setIdTipoPessoa($row->id_tipo_pessoa);
            $arrTipoPessoa->setNoTipoPessoa($row->no_tipo_pessoa);
            $arrTipoPessoa->setDsTipoPessoa($row->ds_tipo_pessoa);
            $arrResult[] = $arrTipoPessoa;
        }
        return $arrResult;
    }
}