<?php

class Application_Model_TipoCategoriaPlanoFaixaEtaria_TipoCategoriaPlanoFaixaEtariaMapper {

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
            $this->setDbTable('Application_Model_DbTable_TipoCategoriaPlanoFaixaEtaria');
        }
        return $this->_dbTable;
    }

    /**
     * 
     */
    public function save(Application_Model_TipoCategoriaPlanoFaixaEtaria_TipoCategoriaPlanoFaixaEtaria $tipoCategoriaPlanoFaixaEtaria)
    {
        $data = array(
            'id_tipo_categoria_plano_faixa_etaria' 	=> $tipoCategoriaPlanoFaixaEtaria->getIdTipoCategoriaPlanoFaixaEtaria(),
        	'id_tipo_categoria_plano' 				=> $tipoCategoriaPlanoFaixaEtaria->getIdTipoCategoriaPlano(),
        	'id_faixa_etaria'				 		=> $tipoCategoriaPlanoFaixaEtaria->getIdFaixaEtaria()
        );

        //Verifica se já existe o id setado no objeto
        if ( $tipoCategoriaPlanoFaixaEtaria->getIdTipoCategoriaPlanoFaixaEtaria() == 0  ) {
            //Insere registro
           return( $this->getDbTable()->insert($data) );
        } else {
            //Altera registro
           return( $this->getDbTable()->update( $data, array('id_tipo_categoria_plano_faixa_etaria = ?' => $tipoCategoriaPlanoFaixaEtaria->getIdTipoCategoriaPlanoFaixaEtaria() ) ) );
        }
    }

    public function delete($id)
    {
       return( $this->getDbTable()->delete(array('id_tipo_categoria_plano_faixa_etaria = ?' => $id)) );
    }

    public function find($id, Application_Model_TipoCategoriaPlanoFaixaEtaria_TipoCategoriaPlanoFaixaEtaria $tipoCategoriaPlanoFaixaEtaria)
    {

        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $tipoCategoriaPlanoFaixaEtaria->setIdTipoCategoriaPlanoFaixaEtaria($row->id_tipo_categoria_plano_faixa_etaria);
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
            $arrTipoCategoriaPlanoFaixaEtaria = new Application_Model_TipoCategoriaPlanoFaixaEtaria_TipoCategoriaPlanoFaixaEtaria();
            $arrTipoCategoriaPlanoFaixaEtaria->setIdTipoCategoriaPlanoFaixaEtaria($row->id_tipo_categoria_plano_faixa_Etaria);
            $arrTipoCategoriaPlanoFaixaEtaria->setIdTipoCategoriaPlano($row->id_tipo_categoria_plano);
            $arrTipoCategoriaPlanoFaixaEtaria->setIdFaixaEtaria($row->id_faixa_etaria);
            $arrResult[] = $arrTipoCategoriaPlanoFaixaEtaria;
        }
        return $arrResult;
    }
}