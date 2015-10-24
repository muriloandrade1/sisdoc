<?php

class Application_Model_FaixaEtaria_FaixaEtariaMapper {

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
            $this->setDbTable('Application_Model_DbTable_FaixaEtaria');
        }
        return $this->_dbTable;
    }

    /**
     * 
     */
    public function save(Application_Model_FaixaEtaria_FaixaEtaria $faixaEtaria)
    {
        $data = array(
            'id_faixa_etaria' => $faixaEtaria->getIdFaixaEtaria(),
        	'no_faixa_etaria' => $faixaEtaria->getNoFaixaEtaria(),
        	'nu_valor' 		  => $faixaEtaria->getNuValor(),
        	'dt_vigencia'	  => $faixaEtaria->getDtVigencia()
        );

        //Verifica se já existe o registro no banco de dados
        if ( $faixaEtaria->getIdFaixaEtaria() == 0  ) {
            //Inseri registro
           return( $this->getDbTable()->insert($data) );
        } else {
            //Altera registro
           return( $this->getDbTable()->update( $data, array('id_faixa_etaria = ?' => $faixaEtaria->getIdFaixaEtaria() ) ) );
        }
    }

    /**
     * Exclui registro do banco de dados
     *
     * @param mixed $id
     */
    public function delete($id)
    {
       return( $this->getDbTable()->delete(array('id_faixa_etaria = ?' => $id)) );
    }

    /**
     *Realiza busca de agentes
     *
     * @param mixed $id
     * @param Application_Model_Agente $agente
     * @return Object
     */
    public function find($id, Application_Model_FaixaEtaria_FaixaEtaria $faixaEtaria)
    {

        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $faixaEtaria->setIdFaixaEtaria($row->id_faixa_etaria);
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
            $arrFaixaEtaria = new Application_Model_FaixaEtaria_FaixaEtaria();
            $arrFaixaEtaria->setIdFaixaEtaria($row->id_faixa_etaria);
            $arrFaixaEtaria->setNoFaixaEtaria($row->no_faixa_etaria);
            $arrFaixaEtaria->setNuValor($row->nu_valor);
            $arrFaixaEtaria->setDtVigencia($row->dt_vigencia);
            $arrResult[] = $arrFaixaEtaria;
        }
        return $arrResult;
    }
    
    public function getFaixaEtariaPorTipoPlano($id,$op)
    {
        $select = $this->getDbTable() 
    			->select()
    			->from(array('cp' => 'tb_categoria_plano'), array())
		    	->join(array('tcp' => 'tb_tipo_categoria_plano'), 
		    				'tcp.id_categoria_plano = cp.id_categoria_plano',array())
		    	->join(array('tcpfe' => 'tb_tipo_categoria_plano_faixa_etaria'), 
		    				'tcpfe.id_tipo_categoria_plano = tcp.id_tipo_categoria_plano',array())
		    	->join(array('fe' => 'tb_faixa_etaria'), 
		    				'fe.id_faixa_etaria = tcpfe.id_faixa_etaria',array('fe.id_faixa_etaria', 'fe.no_faixa_etaria', 'fe.nu_valor', 'fe.dt_vigencia'))
		    	->where('cp.id_categoria_plano = ? ',$id)
		    	->where('tcp.id_acomodacao = ? ',$op);
//echo $select;exit;
		$select->setIntegrityCheck(false);

    	$arrResult = array();
    	$resultSet = $this->getDbTable()->fetchAll($select); 
    	
    	foreach ($resultSet as $row) {
            $arrFaixaEtaria = new Application_Model_FaixaEtaria_FaixaEtaria();
            $arrFaixaEtaria->setIdFaixaEtaria($row->id_faixa_etaria);
            $arrFaixaEtaria->setNoFaixaEtaria($row->no_faixa_etaria);
            $arrFaixaEtaria->setNuValor($row->nu_valor);
            $arrFaixaEtaria->setDtVigencia($row->dt_vigencia);
            $arrResult[] = $arrFaixaEtaria;
        }	
		    	
    	return $arrResult;
    }
    
	public function getValorFaixaEtaria($id)
    {
    	$select = $this->getDbTable()
    			->select()
    			->from('tb_faixa_etaria')
    			->where('id_faixa_etaria = '.$id);

    	$arrResult = array();
    	$resultSet = $this->getDbTable()->fetchAll($select);
    	
    	foreach ($resultSet as $row) {
            $arrCategoriaPlano = new Application_Model_FaixaEtaria_FaixaEtaria();
            $arrCategoriaPlano->setNuValor($row->nu_valor);
            $arrResult[] = $arrCategoriaPlano;
        }	
    	
    	return $arrResult;
    }
    
}