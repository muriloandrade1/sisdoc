<?php

class Application_Model_Conteudo_ConteudoMapper {

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
            $this->setDbTable('Application_Model_DbTable_Conteudo');
        }
        return $this->_dbTable;
    }

    /**
     * 
     */
    public function save(Application_Model_Conteudo_Conteudo $conteudo)
    {
        $data = array(
            'id_contato' => $conteudo->getIdConteudo()
        );

        //Verifica se já existe o registro no banco de dados
        if ( $contato->getIdConteudo() == 0  ) {
            //Inseri registro
           return( $this->getDbTable()->insert($data) );
        } else {
            //Altera registro
           return( $this->getDbTable()->update( $data, array('id_conteudo = ?' => $conteudo->getIdConteudo() ) ) );
        }
    }

    public function delete($id)
    {
       return( $this->getDbTable()->delete(array('id_conteudo = ?' => $id)) );
    }

    public function find($id, Application_Model_Conteudo_Conteudo $conteudo)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $conteudo->setIdContato($row->id_conteudo);
    }

    public function fetchAll()
    {
        $select = $this->getDbTable()->select();

        $resultSet = $this->getDbTable()->fetchAll($select);

        $arrResult   = array();
        foreach ($resultSet as $row) {
            $arrConteudo = new Application_Model_Conteudo_Conteudo();
            $arrConteudo->setIdConteudo($row->id_conteudo);
            $arrConteudo->setDsTitulo($row->ds_titulo);
            $arrConteudo->setDsSubtitulo($row->ds_subtitulo);
            $arrConteudo->setDsConteudo($row->ds_conteudo);
            $arrConteudo->setIdTipoConteudo($row->id_tipo_conteudo);
            $arrConteudo->setDsChamada($row->ds_chamada);
            
            $arrResult[] = $arrConteudo;
        }
        return $arrResult;
    }

    public function getConteudoByCodigoConteudo( $id )
    {
        $select = $this->getDbTable()->select();
                  $select->where( 'id_conteudo = ?', $id );

        $resultSet = $this->getDbTable()->fetchAll($select);
        
        $arrResult   = array();
        
        foreach ($resultSet as $row) {
            $arrConteudo = new Application_Model_Conteudo_Conteudo();
            $arrConteudo->setIdConteudo($row->id_conteudo);
            $arrConteudo->setDsTitulo($row->ds_titulo);
            $arrConteudo->setDsSubtitulo($row->ds_subtitulo);
            $arrConteudo->setDsConteudo($row->ds_conteudo);
            $arrConteudo->setIdTipoConteudo($row->id_tipo_conteudo);
            $arrConteudo->setDsChamada($row->ds_chamada);

            $arrResult[] = $arrConteudo;
        }
        return $arrResult;
    }
}