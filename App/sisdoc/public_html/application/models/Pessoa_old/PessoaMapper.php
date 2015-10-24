<?php

class Application_Model_Pessoa_PessoaMapper {

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
            $this->setDbTable('Application_Model_DbTable_Pessoa');
        }
        return $this->_dbTable;
    }

    /**
     * 
     */
    public function save(Application_Model_Pessoa_Pessoa $pessoa)
    {
        $data = array(
            'id_pessoa' 	 => $pessoa->getIdPessoa(),
        	'no_pessoa' 	 => $pessoa->getNoPessoa(),
        	'id_tipo_pessoa' => $pessoa->getIdTipoPessoa()
        );

        //Verifica se já existe o registro no banco de dados
        if ( $pessoa->getIdPessoa() == 0  ) {
            //Inseri registro
           return( $this->getDbTable()->insert($data) );
        } else {
            //Altera registro
           return( $this->getDbTable()->update( $data, array('id_pessoa = ?' => $pessoa->getIdPessoa() ) ) );
        }
    }

    /**
     * Exclui registro do banco de dados
     *
     * @param mixed $id
     */
    public function delete($id)
    {
       return( $this->getDbTable()->delete(array('id_pessoa = ?' => $id)) );
    }

    /**
     *Realiza busca de agentes
     *
     * @param mixed $id
     * @param Application_Model_Agente $agente
     * @return Object
     */
    public function find($id, Application_Model_Pessoa_Pessoa $pessoa)
    {

        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $pessoa->setCoSeqPessoa($row->id_pessoa);
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
            $arrPessoa = new Application_Model_Pessoa_Pessoa();
            $arrPessoa->setIdPessoa($row->id_pessoa);
            $arrResult[] = $arrPessoa;
        }
        return $arrResult;
    }

    public function getDadosCorretor()
    {
        $select = $this->getDbTable()->select();
                  $select->setIntegrityCheck(false);
                  $select->from(array( 'p' => 'tb_pessoa' ) );
                  $select->join(array( 'pc' => 'tb_pessoa_contato'), 'p.id_pessoa = pc.id_pessoa', array());
                  $select->join(array( 'c' => 'tb_contato'), 'c.id_contato = pc.id_contato');
                  $select->where('p.id_tipo_pessoa = ?', '1');
                  
        $result = $this->getDbTable()->fetchAll($select);
        $arr    = array();
        
        foreach( $result as $row ){
            $arr['id_pessoa']   = $row['id_pessoa'];
            $arr['no_pessoa']   = $row['no_pessoa'];
            $arr['id_contato']  = $row['id_contato'];
            $arr['nu_telefone'] = $row['nu_telefone'];
            $arr['nu_celular']  = $row['nu_celular'];
            $arr['ds_email']    = $row['ds_email'];
            $arr['ds_website']  = $row['ds_website'];
        }
        
        return $arr;
    }
}