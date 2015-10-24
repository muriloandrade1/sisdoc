<?php

class Application_Model_Contato_ContatoMapper {

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
            $this->setDbTable('Application_Model_DbTable_Contato');
        }
        return $this->_dbTable;
    }

    /**
     * 
     */
    public function save(Application_Model_Contato_Contato $contato)
    {
        $arrReplaceTel = array('(', ')', ' ', '-');
        $data = array(
            'id_contato'  => $contato->getIdContato(),
            'nu_telefone' => str_replace($arrReplaceTel, '', $contato->getNuTelefone()),
            'nu_celular'  => str_replace($arrReplaceTel, '', $contato->getNuCelular()),
            'ds_email'    => $contato->getDsEmail(),
            'ds_website'  => $contato->getDsWebsite()
        );

        // Verifica se já existe um id, se existir, faz uma alteraçao, senao, uma inserçao
        if ( $contato->getIdContato() == 0  ) {
            //Inseri registro
           return( $this->getDbTable()->insert($data) );
        } else {
            //Altera registro
           return( $this->getDbTable()->update( $data, array('id_contato = ?' => $contato->getIdContato() ) ) );
        }
    }

    /**
     * Exclui registro do banco de dados
     *
     * @param mixed $id
     */
    public function delete($id)
    {
       return( $this->getDbTable()->delete(array('id_contato = ?' => $id)) );
    }

    /**
     *Realiza busca de agentes
     *
     * @param mixed $id
     * @param Application_Model_Agente $agente
     * @return Object
     */
    public function find($id, Application_Model_Contato_Contato $contato)
    {

        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $contato->setIdContato($row->id_contato);
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
            $arrContato = new Application_Model_Contato_Contato();
            $arrContato->setIdContato($row->id_contato);
            $arrResult[] = $arrContato;
        }
        return $arrResult;
    }
}