<?php

class Application_Model_Acomodacao_AcomodacaoMapper {

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
            $this->setDbTable('Application_Model_DbTable_Acomodacao');
        }
        return $this->_dbTable;
    }

    /**
     * 
     */
    public function save(Application_Model_Acomodacao_Acomodacao $acomodacao)
    {
        $data = array(
            'id_acomodacao' => $acomodacao->getIdAcomodacao(),
        	'no_acomodacao' => $acomodacao->getNoAcomodacao(),
        	'ds_acomodacao' => $acomodacao->getDsAcomodacao()
        );

        //Verifica se já existe o registro no banco de dados
        if ( $acomodacao->getIdAcomodacao() == 0  ) {
            //Inseri registro
           return( $this->getDbTable()->insert($data) );
        } else {
            //Altera registro
           return( $this->getDbTable()->update( $data, array('id_acomodacao = ?' => $acomodacao->getIdAcomodacao() ) ) );
        }
    }

    /**
     * Exclui registro do banco de dados
     *
     * @param mixed $id
     */
    public function delete($id)
    {
       return( $this->getDbTable()->delete(array('id_acomodacao = ?' => $id)) );
    }

    /**
     *Realiza busca de agentes
     *
     * @param mixed $id
     * @param Application_Model_Agente $agente
     * @return Object
     */
    public function find($id, Application_Model_Acomodacao_Acomodacao $acomodacao)
    {

        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $acomodacao->setIdAcomodacao($row->id_acomodacao);
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
            $arrAcomodacao = new Application_Model_Acomodacao_Acomodacao();
            $arrAcomodacao->setIdAcomodacao($row->id_acomodacao);
            $arrAcomodacao->setNoAcomodacao($row->no_acomodacao);
            $arrAcomodacao->setDsAcomodacao($row->ds_acomodacao);
            $arrResult[] = $arrAcomodacao;
        }
        return $arrResult;
    }
}