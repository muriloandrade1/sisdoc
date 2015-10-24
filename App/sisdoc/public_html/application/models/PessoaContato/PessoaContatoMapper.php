<?php

class Application_Model_PessoaContato_PessoaContatoMapper{

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
            $this->setDbTable('Application_Model_DbTable_PessoaContato');
        }
        return $this->_dbTable;
    }

    public function save(Application_Model_PessoaContato_PessoaContato $pessoaContato)
    {
        $data = array(
            'id_pessoa_contato' 	=> $pessoaContato->getIdPessoaContato(),
            'id_categoria_plano'	=> $pessoaContato->getIdCategoriaPlano(),
        	'ds_contato'       	   	=> $pessoaContato->getDsContato(),
            'no_nome'        	   	=> $pessoaContato->getNoNome(),
        	'nr_idade'        	   	=> $pessoaContato->getNuIdade(),
        	'nu_telefone'        	=> $pessoaContato->getNuTelefone(),
        	'nu_celular'        	=> $pessoaContato->getNuCelular(),
        	'ds_email'        	   	=> $pessoaContato->getDsEmail(),
        	'ds_website'        	=> $pessoaContato->getDsWebsite(),
        	'fg_confirmado'        	=> $pessoaContato->getFgConfirmado(),
	        'dt_registro'        	=> $pessoaContato->getDtRegistro(),
	        'dt_contato'        	=> $pessoaContato->getDtContato()
        );
        
        // Verifica se já existe um id, se existir, faz uma alteraçao, senao, uma inserçao
        if ( $pessoaContato->getIdPessoaContato() == 0  ) {
            //Inseri registro
           return( $this->getDbTable()->insert($data) );
        } else {
            //Altera registro
           return( $this->getDbTable()->update( $data, array('id_pessoa_contato = ?' => $pessoaContato->getIdPessoaContato() ) ) );
        }
    }

    public function delete($id)
    {
       return( $this->getDbTable()->delete(array('id_pessoa_contato = ?' => $id)) );
    }

    public function find($id, Application_Model_PessoaContato_PessoaContato $pessoaContato)
    {

        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $pessoaContato->getIdPessoaContato($row->id_pessoa_contato);
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
            $arrPessoaContato = new Application_Model_PessoaContato_PessoaContato();
            $arrPessoaContato->setIdPessoaContato($row->id_pessoa_contato);
			$arrPessoaContato->setIdCategoriaPlano($row->id_categoria_plano);
			$arrPessoaContato->setDsContato($row->ds_contato);
			$arrPessoaContato->setNoNome($row->no_nome);
			$arrPessoaContato->setNuIdade($row->nu_idade);
			$arrPessoaContato->setNuTelefone($row->nu_telefone);
			$arrPessoaContato->setNuCelular($row->nu_celular);
			$arrPessoaContato->setDsEmail($row->ds_email);
			$arrPessoaContato->setDsWebsite($row->ds_website);
			$arrPessoaContato->setFgConfirmado($row->fg_confirmado);
			$arrPessoaContato->setDtRegistro($row->dt_registro);
			$arrPessoaContato->setDtContato($row->dt_contato);
            $arrResult[] = $arrPessoaContato;
        }
        return $arrResult;
    }
    
    public function listaPessoaContato(){
    	$select = $this->getDbTable() 
    			->select()
		    	->from(array('pc' => 'tb_pessoa_contato'))
		    	->where('pc.fg_confirmado = 0 ')
		    	->order('pc.id_pessoa_contato desc');
		    	
		$select->setIntegrityCheck(false);
//echo $select;exit;
    	$arrResult = array();
    	$resultSet = $this->getDbTable()->fetchAll($select);

    	foreach ($resultSet as $row) {
    		$arr = array();
            $arr['NOME'] 		= $row->no_nome;
            $arr['IDADE'] 		= $row->nr_idade;
            $arr['REGISTRO'] 	= !empty($row->dt_registro) ? date("d/m/Y G:i:s", strtotime($row->dt_registro)) : null;
            $arr['CONTATO'] 	= !empty($row->dt_contato) ? date("d/m/Y G:i:s", strtotime($row->dt_contato)) : null;
			$arr['TELEFONE'] 	= $row->nu_telefone; 
            $arr['CELULAR'] 	= $row->nu_celular;
            $arr['EMAIL'] 		= $row->ds_email; 
			$arr['MENSAGEM'] 	= $row->ds_contato; 
            $arrResult[] = $arr;
        }

        return $arrResult;
    }
}
