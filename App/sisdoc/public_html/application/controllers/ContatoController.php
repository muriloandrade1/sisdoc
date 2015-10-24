<?php

class ContatoController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        
    }
    
	public function pessoalAction()
    {
        $this->view->msg = "";
        $tipoPlano = new Application_Model_TipoPlano_TipoPlanoMapper();
    	$this->view->objTipoPlano = $tipoPlano->fetchAll();
        $request = $this->getRequest();

        if($request->getParam('msg') == 1)
        {
            $this->view->msg = "O corretor não está disponível no momento. Entre em contato através do formulário abaixo ou dos número ao lado.";
        }

    	//=================================================================
    	//verifica o post da pagina, para inclusao dos planos
        if( $request->getPost() ){
        	self::cadastrarPessoaContato($request->getPost());
	       	$this->_redirect("/");
        }
    }
    
    protected function cadastrarPessoaContato($post)
    {
    	$objPessoaContato = new Application_Model_PessoaContato_PessoaContato();
    	$categoriaContato = new Application_Model_PessoaContato_PessoaContatoMapper();

    	$objPessoaContato->setNoNome($post["noPessoa"]);
    	$objPessoaContato->setNuIdade($post["nrIdade"]);
    	//$objPessoaContato->setIdCategoriaPlano($post["idCategoria"]);
    	$objPessoaContato->setNuTelefone($post["nuTelefone"]);
    	$objPessoaContato->setNuCelular($post["nuCelular"]);
    	$objPessoaContato->setDsEmail($post["dsEmail"]);
    	$objPessoaContato->setDsContato($post["dsContato"]);
    	$objPessoaContato->setFgConfirmado(0);
    	$objPessoaContato->setDtRegistro(date('Y/m/d G:i:s'));
    	$categoriaContato->save($objPessoaContato);
    	
    	self::enviarEmailContato($post["dsEmail"], 
    								  $post["noPessoa"], 
    								  $post["nrIdade"], 
    								  $post["nuTelefone"], 
    								  $post["nuCelular"], 
    								  $post["dsContato"]);
    								  
    	if(!empty($post["dsEmail"])){
    		self::enviarEmail($post["dsEmail"], $post["noPessoa"]);
    	}
  
    }
    
	public function combocategoriaAction()
    {
    	if(!Zend_Auth::getInstance()->hasIdentity())
    	{
    		$this->_redirect("/");	
    	}
    	
    	$categoria = new Application_Model_CategoriaPlano_CategoriaPlanoMapper();
    	$request = $this->getRequest();
    	$this->view->objCategoria = $categoria->getCategoriaPlanoPorIdOperadora($this->getRequest()->getParam('id'));

    	$this->getHelper('layout')->disableLayout();
    }

    public function enviarEmail($email, $nome){
    	$msg = '<p>Obrigado por entrar em contato, retornaremos sua mensagem o mais breve possível.';
		$msg .= '<br><br><br>';
    	$msg .= '<strong>Catilcia Geraldi</strong>';
    	$msg .= '<br><br>';
    	$msg .= '<strong>3223-2925 - Escritório</strong> <br>';
    	$msg .= '<strong>9304-3648 - CLARO</strong> <br>';
		$msg .= '<strong>8626-0601 - OI</strong> <br>';
		$msg .= '<strong>8229-4177 - TIM</strong> <br>';
		$msg .= '<strong>9824-0601 - VIVO</strong> <br>';
		
		$mail = new Zend_Mail('utf-8');
		$mail->setBodyHtml($msg);
		$mail->setFrom('contato@indicosaude.com.br','Indico Saúde');
		$mail->addHeader($name, $value);
		$mail->addTo($email, $nome);
		$mail->setSubject(utf8_decode('INDICO SAÚDE - Contato confirmado'));
		$mail->send();
    }
    
	public function enviarEmailContato($email, $nome, $idade, $telefone, $celular, $mensagem){
		$contato = implode(', ', array(0 => $telefone, 1 => $celular, 2 => $email));
		
		$body = '<p>'.$nome.' fez um novo contato, ele(a) tem '.$idade.' anos e a mensagem deixada foi: ';
		$body .= '<br><br>';
		$body .= '>> <strong>'.$mensagem.'</strong>';
		$body .= '<br><br>';
		$body .= '>> Seus contatos são: '.$contato;
		
		$mail = new Zend_Mail('utf-8');
		$mail->setBodyHtml($body);
		$mail->setFrom('contato@indicosaude.com.br','Indico Saúde');
		$mail->addTo('contato@indicosaude.com.br', 'Indico Saúde');
		$mail->setSubject(utf8_encode('INDICO SAÚDE - Novo contato'));
		$mail->send();
    }
}