<?php
class Application_Model_Tbdespacho_Tbdespacho
{
protected $_numeroguiarem;
protected $_data;
protected $_de;
protected $_para;
protected $_despacho;

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
public function setDtdata($dt)
{
	$this->_dt_acomodacao = (datetime) $dt;
	return $this;
}

public function getDtdata()
{
	return $this->_dt_data;
}
public function setDsde($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsde()
{
	return $this->_ds_de;
}
public function setDspara($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDspara()
{
	return $this->_ds_para;
}
public function setDsdespacho($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsdespacho()
{
	return $this->_ds_despacho;
}
}
