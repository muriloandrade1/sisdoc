<?php
class Application_Model_Tbdisciplina_Tbdisciplina
{
protected $_codigo1;
protected $_codigo2;
protected $_disciplina;

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
public function setDscodigo1($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDscodigo1()
{
	return $this->_ds_codigo1;
}
public function setDscodigo2($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDscodigo2()
{
	return $this->_ds_codigo2;
}
public function setDsdisciplina($ds)
{
	$this->_ds_acomodacao = (string) $ds;
	return $this;
}

public function getDsdisciplina()
{
	return $this->_ds_disciplina;
}
}
