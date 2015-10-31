<?php
class Application_Model_Tbguiafrd_Tbguiafrd
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
	$this->_dt_acomodacao = (datetime) $dt;
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
}
