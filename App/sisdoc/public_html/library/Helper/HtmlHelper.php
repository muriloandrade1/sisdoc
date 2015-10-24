<?php

	class Helper_HtmlHelper
	{

		private static $cycle = array();
		private static $cyclePosition = 0;

		/**
		 * A cada vez que a funcao eh chamada, eh retornado o proximo valor
		 *
		 * Pode ser passado quantos parametros quanto necessario
		 *
		 * @param mixed $value1
		 */
		public static function cycle( $value1 , $value2 )
		{
			$arrArgs = func_get_args();
			if( $arrArgs !== self::$cycle )
			{
				self::$cycle = $arrArgs ;
				self::$cyclePosition = 0 ;
			}

			if( self::$cyclePosition > ( count( self::$cycle ) - 1 ) )
			{
				self::$cyclePosition = 0;
			}

			$retorno = self::$cycle[ self::$cyclePosition ];
			self::$cyclePosition++;
			return ( $retorno );
		}

		/**
		 * Verifica se o valor1 e nulo. Se for, escreve valor 2
		 *
		 * @param string $value
		 * Texto para ser verificado. Caso esse seja nulo, retorna o value2,
		 * senao retorna essa valor
		 *
		 * @param string $value2
		 *
		 * @return string
		 */
		public static function ifNull( $value , $value2 )
		{
			if( is_null( $value ) )
			{
				return ( $value2 );
			}

			return ( $value );
		}
	}
?>