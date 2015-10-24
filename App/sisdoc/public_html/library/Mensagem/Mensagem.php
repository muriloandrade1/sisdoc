<?php

/**
 * Classe de Mensagem para transporte de Mensagen
 * Mais usado entre a BO e o Controller
 * Podem ser usados Strings ou Até Objetos como mensagem
 *
 */
class Mensagem_Mensagem
{
	const RESPOSTA_OK       = 'OK';
	const RESPOSTA_NEUTRAL  = 'NEUTRAL';
	const RESPOSTA_FAIL     = 'FAIL';
	const RESPOSTA_FALSE    = 'false';

	protected $tipoMensagem;
	protected $mixedMensagem;
	protected $arrMensagem;

	const MENSAGEM_TIPO_CSS = 'css';
	const MENSAGEM_TIPO_PHP = 'php';

	const CSS_OK        = 'form-msg-success';
	const CSS_FAIL      = 'form-msg-error';
	const CSS_NEUTRO    = 'form-msg-warning';

	/**
	 * Atribui uma mensagem para ser passada para o sistema
	 * Podem ser usados Strings ou Até Objetos como mensagem
	 *
	 * @param string $tipoMensagem
	 * @param mixed $mixedMensagem
	 */
	public function __construct( $tipoMensagem, $mixedMensagem=NULL )
	{
		self::setTipoMensagem( $tipoMensagem );
		self::addMensage( $mixedMensagem );
	}


	public function setTipoMensagem( $value )
	{
		$this->tipoMensagem = $value;
	}

	public function getMensagem()
	{
		return $this->arrMensagem;
	}

	public function getTipoMensagem( $outputType=Mensagem_Mensagem::MENSAGEM_TIPO_PHP )
	{
		if( $outputType == Mensagem_Mensagem::MENSAGEM_TIPO_PHP )
		return $this->tipoMensagem;

		switch ( $this->tipoMensagem )
		{
			case Mensagem_Mensagem::RESPOSTA_OK:
				return Mensagem_Mensagem::CSS_OK;
			case Mensagem_Mensagem::RESPOSTA_FALSE:
			case Mensagem_Mensagem::RESPOSTA_FAIL:
				return Mensagem_Mensagem::CSS_FAIL;
				break;
			case Mensagem::RESPOSTA_NEUTRAL:
			default:
				return Mensagem_Mensagem::CSS_NEUTRO;
				break;
		}
	}

	public function addMensage( $value, $tipoMensagem )
	{
		self::setTipoMensagem( $tipoMensagem );
		$this->arrMensagem[] = $value;
	}

	public function toArray()
	{
		$arrMensagem[ 'tipoMensagem' ] = $this->tipoMensagem;
		$arrMensagem[ 'mixedMensagem' ] = $this->arrMensagem;

		return $arrMensagem;
	}
}