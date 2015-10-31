<?php
class Application_Model_Tbdocumentos_Tbdocumentos
{
protected $_numero;
protected $_titulo;
protected $_obs;
protected $_dip;
protected $_dp;
protected $_av;
protected $_dfr0;
protected $_os;
protected $_docpend;
protected $_cancelado;

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
public function setDsnumero($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsnumero()
{
	return $this->_ds_numero;
}
public function setDstitulo($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDstitulo()
{
	return $this->_ds_titulo;
}
public function setDsobs($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsobs()
{
	return $this->_ds_obs;
}
public function setDtdip($dt)
{
	$this->_dt_acomodacao = (datetime) $dt;
	return $this;
}

public function getDtdip()
{
	return $this->_dt_dip;
}
public function setNudp($nu)
{
	$this->_nu_acomodacao = (int) $nu;
	return $this;
}

public function getNudp()
{
	return $this->_nu_dp;
}
public function setNuav($nu)
{
	$this->_nu_acomodacao = (int) $nu;
	return $this;
}

public function getNuav()
{
	return $this->_nu_av;
}
public function setDtdfr0($dt)
{
	$this->_dt_acomodacao = (datetime) $dt;
	return $this;
}

public function getDtdfr0()
{
	return $this->_dt_dfr0;
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
public function setNudocpend($nu)
{
	$this->_nu_acomodacao = (int) $nu;
	return $this;
}

public function getNudocpend()
{
	return $this->_nu_docpend;
}
public function setNucancelado($nu)
{
	$this->_nu_acomodacao = (int) $nu;
	return $this;
}

public function getNucancelado()
{
	return $this->_nu_cancelado;
}
}
