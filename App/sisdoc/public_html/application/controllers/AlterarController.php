<?php

class AlterarController extends Zend_Controller_Action
{
	public function alterarplanosAction()
    {
    	$this->view->valid = Zend_Auth::getInstance()->hasIdentity();
    	if(!Zend_Auth::getInstance()->hasIdentity())
    	{
    		$this->_redirect("/");	
    	}
    	
        $operadora = new Application_Model_Operadora_OperadoraMapper();
    	$this->view->objOperadora = $operadora->fetchAll();
    	
    	//=================================================================
    	//verifica o post da pagina, para inclusao dos planos
        $request = $this->getRequest();
        if( $request->getPost() ){
        	self::alterarPlanos($request->getPost());
	       	$this->_redirect("/alterar/alterarplanos");
        }
    }
    
	public function categoriaplanoAction()
    {
    	if(!Zend_Auth::getInstance()->hasIdentity())
    	{
    		$this->_redirect("/");	
    	}
    	
    	$id = $this->getRequest()->getParam('id');
    	$this->view->op = $id;

    	$tipoPlano = new Application_Model_CategoriaPlano_CategoriaPlanoMapper();
    	$this->view->objCategoriaPlano = $tipoPlano->getCategoriaPlanoPorIdOperadora2($id);
    	
    	$this->getHelper('layout')->disableLayout();
    }
          
    public function detalhesplanoAction()
    {
    	if(!Zend_Auth::getInstance()->hasIdentity())
    	{
    		$this->_redirect("/");	
    	}
    	
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
    	if(!Zend_Auth::getInstance()->hasIdentity())
    	{
    		$this->_redirect("/");	
    	}
    	
    	$id = $this->getRequest()->getParam('id');
    	$op = $this->getRequest()->getParam('op');
        $this->view->id = $id;
    	$this->view->op = $op;

    	$faixaEtaria = new Application_Model_FaixaEtaria_FaixaEtariaMapper();
        $this->view->objFaixaEtaria = $faixaEtaria->getFaixaEtariaPorTipoPlano($id,$op);
        
    	$this->getHelper('layout')->disableLayout();
    }
    
    public function alterarPlanos($post)
    {
    	$faixaEtaria = new Application_Model_FaixaEtaria_FaixaEtariaMapper();
    	$arrFaixaEtaria = new Application_Model_FaixaEtaria_FaixaEtaria();
    	$categoria = new Application_Model_CategoriaPlano_CategoriaPlanoMapper();
    	$arrCategoria = new Application_Model_CategoriaPlano_CategoriaPlano();
    	
    	$arrCategoria->setIdCategoriaPlano($post["idCategoria"]);
    	$arrCategoria->setIdOperadora($post["idOperadora"]);
    	$arrCategoria->setNoCategoriaPlano($post["noCategoria"]);
    	$arrCategoria->setDsRedeCredenciada($post["dsRedeCredenciada"]);
    	$arrCategoria->setDsCategoriaPlano($post["dsCategoriaPlano"]);
    	$categoria->save($arrCategoria);
    	
    	for ($i=0; $i < $post["cont"]; $i++){
			$arrFaixaEtaria->setIdFaixaEtaria($post["idFaixaEtaria".$i]);
			$arrFaixaEtaria->setNoFaixaEtaria($post["noFaixaEtaria".$i]);
			$arrFaixaEtaria->setNuValor($post["nuValor".$i]);
			$arrData = explode("/", $post["dtVigencia"]);
	        $arrFaixaEtaria->setDtVigencia($arrData[2]."-".$arrData[1]."-".$arrData[0]);
    		$faixaEtaria->save($arrFaixaEtaria);
    	}
    	
    	
    }
}