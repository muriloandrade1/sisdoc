<?php

class ConteudoController extends Zend_Controller_Action
{

    public function init()
    {
        
    }

    public function indexAction()
    {
        $this->_redirect('/conteudo/listar');
    }

    public function listarAction()
    {
    	$this->view->valid = Zend_Auth::getInstance()->hasIdentity();
    	
    	//carrega os combos da pagina
    	$tipoPlano = new Application_Model_TipoPlano_TipoPlanoMapper();
        $this->view->objTipoPlano = $tipoPlano->fetchAll();

        $this->view->idPlano = $this->getRequest()->getParam('id');
    }
    
    public function operadoraAction()
    {
    	$id = $this->getRequest()->getParam('id');

    	$operadora = new Application_Model_Operadora_OperadoraMapper();
    	$this->view->objOperadora = $operadora->getOperadoraPorIdTipoPlano($id);
    	
    	$this->getHelper('layout')->disableLayout();
    }
    
    public function categoriaplanoAction()
    {
    	$id = $this->getRequest()->getParam('id');

    	$tipoPlano = new Application_Model_CategoriaPlano_CategoriaPlanoMapper();
    	$this->view->objTipoPlano = $tipoPlano->getCategoriaPlanoPorIdOperadora2($id);
    	
    	$this->getHelper('layout')->disableLayout();
    }
    
    public function listacategoriaplanoAction()
    {
		$id = $this->getRequest()->getParam('id');
		$op = $this->getRequest()->getParam('op');
		$this->view->op = $op;
		
        $categoriaPlano = new Application_Model_CategoriaPlano_CategoriaPlanoMapper();
        $this->view->objCategoriaPlano = $categoriaPlano->getCategoriaPlanoId($id,$op);    
        
        $this->getHelper('layout')->disableLayout();
    }
    
    public function detalhesplanoAction()
    {
        $request = $this->getRequest();
        $id = $this->getRequest()->getParam('id');
        $op = $this->getRequest()->getParam('op');
        $this->view->id = $id;
        $this->view->op = $op;
 
        $obj = new Application_Model_CategoriaPlano_CategoriaPlanoMapper();
        $this->view->objDescCategoria = $obj->getDescricaoCategoriaPlanoPorId($id);
        $this->view->objAcomodacao = $obj->getDescricaoAcomodacaoPorId($id,$op);

    	$this->getHelper('layout')->disableLayout();
    }
    
    public function acomodacaoAction()
    {
    	$id = $this->getRequest()->getParam('id');
    	$op = $this->getRequest()->getParam('op');
        $this->view->id = $id;
    	$this->view->op = $op;

    	$faixaEtaria = new Application_Model_FaixaEtaria_FaixaEtariaMapper();
        $this->view->objFaixaEtaria = $faixaEtaria->getFaixaEtariaPorTipoPlano($id,$op);
        
    	$this->getHelper('layout')->disableLayout();
    }
    
    public function valorfaixaetariaAction()
    {
    	$id = $this->getRequest()->getParam('id');
    	
    	$valorFaixaEtaria = new Application_Model_FaixaEtaria_FaixaEtariaMapper();
    	$this->view->objValorFaixaEtaria = $valorFaixaEtaria->getValorFaixaEtaria($id);
    	
    	$this->getHelper('layout')->disableLayout();
    }

    public function listapessoacontatoAction()
    {
    	$this->view->valid = Zend_Auth::getInstance()->hasIdentity();
    	if(!Zend_Auth::getInstance()->hasIdentity())
    	{
    		$this->_redirect("/");	
    	}
    	$pessoaContato = new Application_Model_PessoaContato_PessoaContatoMapper();
    	$this->view->arrPessoaContato = $pessoaContato->listaPessoaContato();
    }
    
    public function avisoempresaAction()
    {
    	$this->getHelper('layout')->disableLayout();
    }
}