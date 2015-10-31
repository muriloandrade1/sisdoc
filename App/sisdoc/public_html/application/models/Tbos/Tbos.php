<?php
class Application_Model_Tbos_Tbos
{
protected $_os;
protected $_descricao;
protected $_inicio;
protected $_termino;
protected $_anobase;

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
public function setDsos($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsos()
{
	return $this->_ds_os;
}
public function setDsdescricao($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsdescricao()
{
	return $this->_ds_descricao;
}
public function setDtinicio($dt)
{
	$this->_dt_acomodacao = (datetime) $dt;
	return $this;
}

public function getDtinicio()
{
	return $this->_dt_inicio;
}
public function setDttermino($dt)
{
	$this->_dt_acomodacao = (datetime) $dt;
	return $this;
}

public function getDttermino()
{
	return $this->_dt_termino;
}
public function setNuanobase($nu)
{
	$this->_nu_acomodacao = (int) $nu;
	return $this;
}

public function getNuanobase()
{
	return $this->_nu_anobase;
}
}
