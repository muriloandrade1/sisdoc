<?php

class Application_Model_TipoConteudo_TipoConteudoMapper {

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
            $this->setDbTable('Application_Model_DbTable_TipoConteudo');
        }
        return $this->_dbTable;
    }

    /**
     * 
     */
    public function save(Application_Model_TipoConteudo_TipoConteudo $tipoConteudo)
    {
        $data = array(
            'id_tipo_conteudo' => $ajuda->getIdTipoConteudo()
        );

        //Verifica se já existe o registro no banco de dados
        if ( $tipoConteudo->getIdTipoConteudo() == 0  ) {
            //Inseri registro
           return( $this->getDbTable()->insert($data) );
        } else {
            //Altera registro
           return( $this->getDbTable()->update( $data, array('id_tipo_conteudo = ?' => $tipoConteudo->getIdTipoConteudo() ) ) );
        }
    }

    /**
     * Exclui registro do banco de dados
     *
     * @param mixed $id
     */
    public function delete($id)
    {
       return( $this->getDbTable()->delete(array('id_tipo_conteudo = ?' => $id)) );
    }

    /**
     *Realiza busca de agentes
     *
     * @param mixed $id
     * @param Application_Model_Agente $agente
     * @return Object
     */
    public function find($id, Application_Model_TipoConteudo_TipoConteudo $tipoConteudo)
    {

        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $tipoConteudo->setIdTipoConteudo($row->id_tipo_conteudo);
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
            $arrTipoConteudo = new Application_Model_TipoConteudo_TipoConteudo();
            $arrTipoConteudo->setIdPessoa($row->id_tipo_conteudo);
            $arrResult[] = $arrTipoConteudo;
        }
        return $arrResult;
    }
}