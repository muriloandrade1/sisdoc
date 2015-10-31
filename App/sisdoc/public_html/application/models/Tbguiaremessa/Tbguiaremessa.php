<?php
class Application_Model_Tbguiaremessa_Tbguiaremessa
{
protected $_numeroguiarem;
protected $_dataguiarem;
protected $_atencaode;
protected $_projeto;
protected $_assinadopor;
protected $_funcao;
protected $_obs1;
protected $_obs2;
protected $_obs3;
protected $_assunto;
protected $_campo1;
protected $_campo2;
protected $_campo3;
protected $_campo4;
protected $_campo5;
protected $_campo6;
protected $_campo7;
protected $_campo8;
protected $_campo9;
protected $_campo10;
protected $_campo11;
protected $_campo12;
protected $_assinatura1;
protected $_assinatura2;
protected $_assinatura3;

public function __construct(array $options = null)
{
	if (is_array($options)) {
		$this->setOptions($options);
	}
}

public function __set($name, $value)
{
	$method = 'set' . $name;
	if (('mapper' == $name) || !method_exists($this, $method)) {
		throw new Exception('Propriedade inválida para arquivo');
	}
	$this->$method($value);
}

public function __get($name)
{
	$method = 'get' . $name;
	if (('mapper' == $name) || !method_exists($this, $method)) {
		throw new Exception('Propriedade inválida para arquivo');
	}
	return $this->$method();
}

public function setOptions(array $options)
{
	$methods = get_class_methods($this);
	foreach ($options as $key => $value) {
		$method = 'set' . ucfirst($key);
		if (in_array($method, $methods)) {
			$this->$method($value);
		}
	}
	return $this;
}
public function setDsnumeroguiarem($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsnumeroguiarem()
{
	return $this->_ds_numeroguiarem;
}
public function setDtdataguiarem($dt)
{
	$this->_dt_acomodacao = $dt;
	return $this;
}

public function getDtdataguiarem()
{
	return $this->_dt_dataguiarem;
}
public function setDsatencaode($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsatencaode()
{
	return $this->_ds_atencaode;
}
public function setDsprojeto($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsprojeto()
{
	return $this->_ds_projeto;
}
public function setDsassinadopor($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsassinadopor()
{
	return $this->_ds_assinadopor;
}
public function setDsfuncao($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsfuncao()
{
	return $this->_ds_funcao;
}
public function setDsobs1($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsobs1()
{
	return $this->_ds_obs1;
}
public function setDsobs2($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsobs2()
{
	return $this->_ds_obs2;
}
public function setDsobs3($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsobs3()
{
	return $this->_ds_obs3;
}
public function setDsassunto($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsassunto()
{
	return $this->_ds_assunto;
}
public function setDscampo1($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDscampo1()
{
	return $this->_ds_campo1;
}
public function setDscampo2($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDscampo2()
{
	return $this->_ds_campo2;
}
public function setDscampo3($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDscampo3()
{
	return $this->_ds_campo3;
}
public function setDscampo4($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDscampo4()
{
	return $this->_ds_campo4;
}
public function setDscampo5($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDscampo5()
{
	return $this->_ds_campo5;
}
public function setDscampo6($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDscampo6()
{
	return $this->_ds_campo6;
}
public function setDscampo7($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDscampo7()
{
	return $this->_ds_campo7;
}
public function setDscampo8($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDscampo8()
{
	return $this->_ds_campo8;
}
public function setDscampo9($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDscampo9()
{
	return $this->_ds_campo9;
}
public function setDscampo10($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDscampo10()
{
	return $this->_ds_campo10;
}
public function setDscampo11($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDscampo11()
{
	return $this->_ds_campo11;
}
public function setDscampo12($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDscampo12()
{
	return $this->_ds_campo12;
}
public function setDsassinatura1($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsassinatura1()
{
	return $this->_ds_assinatura1;
}
public function setDsassinatura2($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsassinatura2()
{
	return $this->_ds_assinatura2;
}
public function setDsassinatura3($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsassinatura3()
{
	return $this->_ds_assinatura3;
}
}
