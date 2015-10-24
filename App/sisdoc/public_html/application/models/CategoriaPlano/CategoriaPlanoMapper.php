<?php

class Application_Model_CategoriaPlano_CategoriaPlanoMapper {

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
            $this->setDbTable('Application_Model_DbTable_CategoriaPlano');
        }
        return $this->_dbTable;
    }

    /**
     * 
     */
    public function save(Application_Model_CategoriaPlano_CategoriaPlano $categoriaPlano)
    {
        $data = array(
            'id_categoria_plano' 	=> $categoriaPlano->getIdCategoriaPlano(),
        	'id_operadora' 			=> $categoriaPlano->getIdOperadora(),
        	'no_categoria_plano' 	=> $categoriaPlano->getNoCategoriaPlano(),
	        'ds_categoria_plano' 	=> $categoriaPlano->getDsCategoriaPlano(),
	        'ds_rede_credenciada'	=> $categoriaPlano->getDsRedeCredenciada()
        );

        //Verifica se já existe o id setado no objeto
        if ( $categoriaPlano->getIdCategoriaPlano() == 0  ) {
            //Inseri registro
           return( $this->getDbTable()->insert($data) );
        } else {
            //Altera registro
           return( $this->getDbTable()->update( $data, array('id_categoria_plano = ?' => $categoriaPlano->getIdCategoriaPlano() ) ) );
        }
    }

    public function delete($id)
    {
       return( $this->getDbTable()->delete(array('id_categoria_plano = ?' => $id)) );
    }

    public function find($id, Application_Model_CategoriaPlano_CategoriaPlano $categoriaPlano)
    {

        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $categoriaPlano->setIdContato($row->id_categoria_plano);
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

        $arrResult = array();
        foreach ($resultSet as $row) {
            $arrCategoriaPlano = new Application_Model_CategoriaPlano_CategoriaPlano();
            $arrCategoriaPlano->setIdContato($row->id_categoria_plano);
            $arrResult[] = $arrCategoriaPlano;
        }
        return $arrResult;
    }
    
    public function getCategoriaPlanoId($id,$op)
    {
	    $select = $this->getDbTable() 
    			->select('cp.no_categoria_plano')
		    	->from(array('cp' => 'tb_categoria_plano'))
		    	->join(array('tcp' => 'tb_tipo_categoria_plano'), 
		    				'tcp.id_categoria_plano = cp.id_categoria_plano')
		    	->where('tcp.id_tipo_plano = ? ',$id)
		    	->where('cp.id_operadora = ? ',$op)
		    	->group(array('cp.no_categoria_plano'));
		    	
		$select->setIntegrityCheck(false);

    	$arrResult = array();
    	$resultSet = $this->getDbTable()->fetchAll($select);
    	
    	foreach ($resultSet as $row) {
            $arrCategoriaPlano = new Application_Model_CategoriaPlano_CategoriaPlano();
            $arrCategoriaPlano->setIdCategoriaPlano($row->id_categoria_plano);
            $arrCategoriaPlano->setNoCategoriaPlano($row->no_categoria_plano);
            $arrCategoriaPlano->setDsCategoriaPlano($row->ds_categoria_plano);
            $arrCategoriaPlano->setDsRedeCredenciada($row->ds_rede_credenciada);
            $arrResult[] = $arrCategoriaPlano;
        }

        return $arrResult;
    }
    
	public function getDescricaoCategoriaPlanoPorId($id)
    {
    	$select = $this->getDbTable()
    			->select()
    			->from('tb_categoria_plano')
    			->where('id_categoria_plano = '.$id);

    	$arrResult = array();
    	$resultSet = $this->getDbTable()->fetchAll($select);
    	
    	foreach ($resultSet as $row) {
            $arrCategoriaPlano = new Application_Model_CategoriaPlano_CategoriaPlano();
            $arrCategoriaPlano->setDsCategoriaPlano($row->ds_categoria_plano);
            $arrCategoriaPlano->setDsRedeCredenciada($row->ds_rede_credenciada);
            $arrResult[] = $arrCategoriaPlano;
        }	
    	
    	return $arrResult;
    }
    
    public function getDescricaoAcomodacaoPorId($id,$op)
    {
		$select = $this->getDbTable() 
    			->select('a.id_acomodacao,a.no_acomodacao')
		    	->from(array('cp' => 'tb_categoria_plano'))
		    	->join(array('tcp' => 'tb_tipo_categoria_plano'), 
		    				'tcp.id_categoria_plano = cp.id_categoria_plano')
		    	->join(array('a' => 'tb_acomodacao'), 
		    				'a.id_acomodacao = tcp.id_acomodacao')
		    	->where('tcp.id_categoria_plano = ? ',$id)
		    	->where('cp.id_operadora = ? ',$op)
		    	->group(array('tcp.id_acomodacao'));
		    	
		$select->setIntegrityCheck(false);

    	$arrResult = array();
    	$resultSet = $this->getDbTable()->fetchAll($select);
    	
    	foreach ($resultSet as $row) {
            $arrAcomodacao = new Application_Model_Acomodacao_Acomodacao();
            $arrAcomodacao->setIdAcomodacao($row->id_acomodacao);
            $arrAcomodacao->setNoAcomodacao($row->no_acomodacao);
            $arrResult[] = $arrAcomodacao;
        }

        return $arrResult;
    }
    
    public function getCategoriaPlanoPorIdOperadora($id)
    {
    	$select = $this->getDbTable()
    			->select()
    			->from('tb_categoria_plano')
    			->where('id_operadora = '.$id)
    			->group(array('no_categoria_plano', 'ds_categoria_plano', 'ds_rede_credenciada'));

    	$arrResult = array();
    	$resultSet = $this->getDbTable()->fetchAll($select);
    	
    	foreach ($resultSet as $row) {
            $arrCategoriaPlano = new Application_Model_CategoriaPlano_CategoriaPlano();
            $arrCategoriaPlano->setIdCategoriaPlano($row->id_categoria_plano);
            $arrCategoriaPlano->setNoCategoriaPlano($row->no_categoria_plano);
            $arrResult[] = $arrCategoriaPlano;
        }	
		    	
    	return $arrResult;
    }
    
	public function getCategoriaPlanoPorIdOperadora2($id)
    {
	    $select = $this->getDbTable() 
    			->select('cp.id_categoria_plano,cp.no_categoria_plano')
		    	->from(array('cp' => 'tb_categoria_plano'))
		    	->join(array('op' => 'tb_operadora'),'op.id_operadora = cp.id_operadora')
		    	->where('op.id_operadora = ? ',$id)
                        ->where('op.fl_ativo = ? ',1)
		    	->group(array('cp.no_categoria_plano'));
		    	
		$select->setIntegrityCheck(false);

    	$arrResult = array();
    	$resultSet = $this->getDbTable()->fetchAll($select);
    	
    	foreach ($resultSet as $row) {
            $arrCategoriaPlano = new Application_Model_CategoriaPlano_CategoriaPlano();
            $arrCategoriaPlano->setIdCategoriaPlano($row->id_categoria_plano);
            $arrCategoriaPlano->setNoCategoriaPlano($row->no_categoria_plano);
            $arrResult[] = $arrCategoriaPlano;
        }

        return $arrResult;
    }
}