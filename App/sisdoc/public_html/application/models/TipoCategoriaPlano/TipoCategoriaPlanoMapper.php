<?php

class Application_Model_TipoCategoriaPlano_TipoCategoriaPlanoMapper {

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
            $this->setDbTable('Application_Model_DbTable_TipoCategoriaPlano');
        }
        return $this->_dbTable;
    }

    /**
     * 
     */
    public function save(Application_Model_TipoCategoriaPlano_TipoCategoriaPlano $tipoCategoriaPlano)
    {
        $data = array(
            'id_tipo_categoria_plano' 	=> $tipoCategoriaPlano->getIdTipoCategoriaPlano(),
        	'id_categoria_plano' 		=> $tipoCategoriaPlano->getIdCategoriaPlano(),
        	'id_acomodacao' 			=> $tipoCategoriaPlano->getIdAcomodacao(),
	        'id_tipo_plano' 			=> $tipoCategoriaPlano->getIdTipoPlano()
        );
        
        //Verifica se já existe o id setado no objeto
        if ( $tipoCategoriaPlano->getIdTipoCategoriaPlano() == 0  ) {
            //Inseri registro
           return( $this->getDbTable()->insert($data) );
        } else {
            //Altera registro
           return( $this->getDbTable()->update( $data, array('id_tipo_categoria_plano = ?' => $tipoCategoriaPlano->getIdTipoCategoriaPlano() ) ) );
        }
    }

    public function delete($id)
    {
       return( $this->getDbTable()->delete(array('id_tipo_categoria_plano = ?' => $id)) );
    }

    public function find($id, Application_Model_TipoCategoriaPlano_TipoCategoriaPlano $tipoCategoriaPlano)
    {

        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $tipoCategoriaPlano->setTipoCategoriaPlano($row->tipo_categoria_plano);
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
            $arrTipoCategoriaPlano = new Application_Model_TipoCategoriaPlano_TipoCategoriaPlano();
            $arrTipoCategoriaPlano->setIdTipoCategoriaPlano($row->id_tipo_categoria_plano);
            $arrTipoCategoriaPlano->setIdCategoriaPlano($row->id_categoria_plano);
            $arrTipoCategoriaPlano->setIdAcomodacao($row->id_acomodacao);
            $arrTipoCategoriaPlano->setIdTipoPlano($row->id_tipo_plano);
            $arrResult[] = $arrTipoCategoriaPlano;
        }
        return $arrResult;
    }
   
}