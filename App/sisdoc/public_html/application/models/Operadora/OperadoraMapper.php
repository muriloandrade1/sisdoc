<?php

class Application_Model_Operadora_OperadoraMapper {

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
            $this->setDbTable('Application_Model_DbTable_Operadora');
        }
        return $this->_dbTable;
    }
    
    public function save(Application_Model_Operadora_Operadora $operadora)
    {
        $data = array(
            'id_operadora' => $operadora->getIdOperadora(),
            'no_operadora' => $operadora->getNoOperadora(),
            'ds_operadora' => $operadora->getDsOperadora()
        );

        // Verifica se já existe um id, se existir, faz uma alteraçao, senao, uma inserçao
        if ( $operadora->getIdOperadora() == 0  ) {
            //Inseri registro
           return( $this->getDbTable()->insert($data) );
        } else {
            //Altera registro
           return( $this->getDbTable()->update( $data, array('id_operadora = ?' => $operadora->getIdOperadora() ) ) );
        }
    }

    public function delete($id)
    {
       return( $this->getDbTable()->delete(array('id_operadora = ?' => $id)) );
    }

    public function find($id, Application_Model_Operadora_Operadora $operadora)
    {

        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $operadora->setIdOperadora($row->id_operadora);
    }

    public function fetchAll()
    {
        $select = $this->getDbTable()->select()->where('fl_ativo = ? ',1);

        $resultSet = $this->getDbTable()->fetchAll($select);

        $arrResult = array();
        foreach ($resultSet as $row) {
            $arrOperadora = new Application_Model_Operadora_Operadora();
            $arrOperadora->setIdOperadora($row->id_operadora);
            $arrOperadora->setNoOperadora($row->no_operadora);
            $arrOperadora->setDsOperadora($row->ds_operadora);
            $arrResult[] = $arrOperadora;
        }
        return $arrResult;
    }

    public function getNomeOperadora( $id )
    {
        $select = $this->getDbTable()->select();
                  $select->where('id_operadora = ?', $id);
                  
        $result = $this->getDbTable()->fetchAll( $select );
        
        $resultSet = array();
        
        foreach( $result as $row ){
            $resultSet = $row['no_operadora'];
        }
        
        return $resultSet;
    }
    
    public function getOperadoraPorIdTipoPlano($id)
    {
    	$select = $this->getDbTable() 
    			->select('op.id_operadora,op.no_operadora')
		    	->from(array('tp' => 'tb_tipo_plano'))
		    	->join(array('tcp' => 'tb_tipo_categoria_plano'), 
		    				'tcp.id_tipo_plano = tp.id_tipo_plano')
		    	->join(array('cp' => 'tb_categoria_plano'), 
		    				'cp.id_categoria_plano = tcp.id_categoria_plano')
		    	->join(array('op' => 'tb_operadora'), 
		    				'op.id_operadora = cp.id_operadora')
		    	->where('tp.id_tipo_plano = ? ',$id)
                        ->where('op.fl_ativo = ? ',1)
		    	->group(array('op.no_operadora'));
		    	
		$select->setIntegrityCheck(false);

    	$arrResult = array();
    	$resultSet = $this->getDbTable()->fetchAll($select);
    	
    	foreach ($resultSet as $row) {
            $arrOperadora = new Application_Model_Operadora_Operadora();
            $arrOperadora->setIdOperadora($row->id_operadora);
            $arrOperadora->setNoOperadora($row->no_operadora);
            $arrResult[] = $arrOperadora;
        }

        return $arrResult;
    }
}