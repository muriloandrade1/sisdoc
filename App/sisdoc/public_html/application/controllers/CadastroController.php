<?php

class CadastroController extends Zend_Controller_Action
{
    public function operadoraAction()
    {
    	$this->view->valid = Zend_Auth::getInstance()->hasIdentity();
    	if(!Zend_Auth::getInstance()->hasIdentity())
    	{
    		$this->_redirect("/");	
    	}
    	
        $request = $this->getRequest();

        if( $this->getRequest()->getParam('id') ){

        } else if( $request->getPost() ){
            self::cadastrarOperadora( $request->getPost() );
        } else {
            
        }
    }
    
    protected function cadastrarOperadora( $post )
    {
        $operadoraContato = new Application_Model_OperadoraContato_OperadoraContatoMapper();
        $operadora        = new Application_Model_Operadora_OperadoraMapper();
		$objOperadora     = new Application_Model_Operadora_Operadora($post);
        
        $idOperadora      = $operadora->save($objOperadora);
    }

    
    
    public function categoriaplanoAction()
    {
    	$this->view->valid = Zend_Auth::getInstance()->hasIdentity();
    	if(!Zend_Auth::getInstance()->hasIdentity())
    	{
    		$this->_redirect("/");	
    	}
    	
    	//=================================================================
    	//carrega combos da pagina
    	$objOperadora = new Application_Model_Operadora_OperadoraMapper();
    	$this->view->objOperadora = $objOperadora->fetchAll();
    	
    	//=================================================================
    	//verifica o post da pagina, para inclusao dos planos
        $request = $this->getRequest();
        if( $request->getPost() ){
            self::cadastrarCategoria( $request->getPost() );            
        }
        //=================================================================
    }
    
    protected function cadastrarCategoria( $post )
    {
    	$this->view->valid = Zend_Auth::getInstance()->hasIdentity();
    	if(!Zend_Auth::getInstance()->hasIdentity())
    	{
    		$this->_redirect("/");	
    	}
    	
    	$objCategoriaPlano = new Application_Model_CategoriaPlano_CategoriaPlano();
    	$categoriaplano	   = new Application_Model_CategoriaPlano_CategoriaPlanoMapper();
    	
    	//insere dados da tabela tb_categoria_plano e retorna o id
        $objCategoriaPlano->setIdOperadora($post["idOperadora"]);
        $objCategoriaPlano->setNoCategoriaPlano($post["noCategoriaPlano"]);
        $objCategoriaPlano->setdsCategoriaPlano($post["dsCategoriaPlano"]);
        $objCategoriaPlano->setDsRedeCredenciada($post["dsRedeCredenciada"]);
        $idCategoriaPlano = $categoriaplano->save($objCategoriaPlano);
    }

    protected function cadastroplanosAction()
    {
    	$this->view->valid = Zend_Auth::getInstance()->hasIdentity();
    	if(!Zend_Auth::getInstance()->hasIdentity())
    	{
    		$this->_redirect("/");	
    	}
    	
    	//=================================================================
    	//carrega os combos da pagina
    	$tipoPlano = new Application_Model_TipoPlano_TipoPlanoMapper();
        $this->view->objTipoPlano = $tipoPlano->fetchAll();
    	
    	$operadora = new Application_Model_Operadora_OperadoraMapper();
        $this->view->objOperadora = $operadora->fetchAll();
        
        $acomodacao = new Application_Model_Acomodacao_AcomodacaoMapper();
        $this->view->objAcomodacao = $acomodacao->fetchAll();
        
    	//=================================================================
    	//verifica o post da pagina, para inclusao dos planos
        $request = $this->getRequest();

        if( $this->getRequest()->getParam('id') ){

        } else if( $request->getPost() ){
            self::cadastrarPlanoDeSaude( $request->getPost() );
        } else {
            
        }
        
    }
    
    protected function cadastrarPlanoDeSaude( $post )
    {
		$faixaetaria 					= new Application_Model_FaixaEtaria_FaixaEtariaMapper();
		$tipocategoriaplano				= new Application_Model_TipoCategoriaPlano_TipoCategoriaPlanoMapper();
		$tipocategoriaplanofaixaetaria 	= new Application_Model_TipoCategoriaPlanoFaixaEtaria_TipoCategoriaPlanoFaixaEtariaMapper();
		
		$objFaixaEtaria 					= new Application_Model_FaixaEtaria_FaixaEtaria();
		$objTipoCategoriaPlano				= new Application_Model_TipoCategoriaPlano_TipoCategoriaPlano();
		$objTipoCategoriaPlanoFaixaEtaria 	= new Application_Model_TipoCategoriaPlanoFaixaEtaria_TipoCategoriaPlanoFaixaEtaria();
		
    	$cont = $post["cont"];
   	
        //insere os dados da tb_tipo_categoria_plano
    	$objTipoCategoriaPlano->setIdCategoriaPlano($post['idCategoriaPlano']);
    	$objTipoCategoriaPlano->setIdAcomodacao($post["idAcomodacao"]);
    	$objTipoCategoriaPlano->setIdTipoPlano($post["idTipoPlano"]);
    	$idTipoCategoriaPlano = $tipocategoriaplano->save($objTipoCategoriaPlano);

    	for ($i=0; $i <= $cont; $i++) {
			
    		//insere dados da tb_faixa_etaria e retorna o id
	        $objFaixaEtaria->setNoFaixaEtaria($post["noFaixaEtaria".$i]);
	        $objFaixaEtaria->setNuValor($post["nuValor".$i]);
	        $arrData = explode("/", $post["dtVigencia"]);
	        $objFaixaEtaria->setDtVigencia($arrData[2]."-".$arrData[1]."-".$arrData[0]);
	        $idFaixaEtaria = $faixaetaria->save($objFaixaEtaria);
        	        
    		//insere os dados da tb_tipo_categoria_plano_faixa_etaria
    		$objTipoCategoriaPlanoFaixaEtaria->setIdFaixaEtaria($idFaixaEtaria);
	        $objTipoCategoriaPlanoFaixaEtaria->setIdTipoCategoriaPlano($idTipoCategoriaPlano);
	        $idTipoCategoriaPlanoFaixaEtaria = $tipocategoriaplanofaixaetaria->save($objTipoCategoriaPlanoFaixaEtaria);
    		
    	}
    	    	
    }
    
	public function combocategoriaAction()
    {
    	$categoria = new Application_Model_CategoriaPlano_CategoriaPlanoMapper();
    	$request = $this->getRequest();
    	$this->view->objCategoria = $categoria->getCategoriaPlanoPorIdOperadora($this->getRequest()->getParam('id'));

    	$this->getHelper('layout')->disableLayout();
    }
    
}