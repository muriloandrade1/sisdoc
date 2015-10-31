<?php
class Application_Model_Tbrevisoes_Tbrevisoes
{
protected $_numero;
protected $_revisao;
protected $_numeroguiarem;
protected $_dataguiarem;
protected $_tiporem;
protected $_quantrem;
protected $_finrem;
protected $_findev;
protected $_numeroguiadev;
protected $_crc32;
protected $_qtdptts;
protected $_qtdrope;
protected $_qtdrcon;
protected $_qtdcot;
protected $_qtdptle;
protected $_qtdpttl;
protected $_qtdpttp;
protected $_qtdpttc;
protected $_qtdgsdd;
protected $_qtdppa;
protected $_qtdptc;
protected $_qtdcpa;

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
public function setDsrevisao($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsrevisao()
{
	return $this->_ds_revisao;
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
public function setDstiporem($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDstiporem()
{
	return $this->_ds_tiporem;
}
public function setDsquantrem($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsquantrem()
{
	return $this->_ds_quantrem;
}
public function setDsfinrem($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsfinrem()
{
	return $this->_ds_finrem;
}
public function setDsfindev($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsfindev()
{
	return $this->_ds_findev;
}
public function setDsnumeroguiadev($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsnumeroguiadev()
{
	return $this->_ds_numeroguiadev;
}
public function setDscrc32($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDscrc32()
{
	return $this->_ds_crc32;
}
public function setDsqtdptts($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsqtdptts()
{
	return $this->_ds_qtdptts;
}
public function setDsqtdrope($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsqtdrope()
{
	return $this->_ds_qtdrope;
}
public function setDsqtdrcon($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsqtdrcon()
{
	return $this->_ds_qtdrcon;
}
public function setDsqtdcot($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsqtdcot()
{
	return $this->_ds_qtdcot;
}
public function setDsqtdptle($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsqtdptle()
{
	return $this->_ds_qtdptle;
}
public function setDsqtdpttl($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsqtdpttl()
{
	return $this->_ds_qtdpttl;
}
public function setDsqtdpttp($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsqtdpttp()
{
	return $this->_ds_qtdpttp;
}
public function setDsqtdpttc($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsqtdpttc()
{
	return $this->_ds_qtdpttc;
}
public function setDsqtdgsdd($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsqtdgsdd()
{
	return $this->_ds_qtdgsdd;
}
public function setDsqtdppa($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsqtdppa()
{
	return $this->_ds_qtdppa;
}
public function setDsqtdptc($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsqtdptc()
{
	return $this->_ds_qtdptc;
}
public function setDsqtdcpa($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsqtdcpa()
{
	return $this->_ds_qtdcpa;
}
}
