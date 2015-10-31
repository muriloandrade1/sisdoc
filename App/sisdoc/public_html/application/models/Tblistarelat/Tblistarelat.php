<?php
class Application_Model_Tblistarelat_Tblistarelat
{
protected $_norelat;
protected $_relatorio;

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
public function setNunorelat($nu)
{
	$this->_nu_acomodacao = (int) $nu;
	return $this;
}

public function getNunorelat()
{
	return $this->_nu_norelat;
}
public function setDsrelatorio($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsrelatorio()
{
	return $this->_ds_relatorio;
}
}
