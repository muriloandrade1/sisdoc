<?php
class Application_Model_FaixaEtaria_FaixaEtaria
{
    protected $_id_faixa_etaria;
    protected $_no_faixa_etaria;
    protected $_nu_valor;
    protected $_dt_vigencia;

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

    public function setIdFaixaEtaria($id)
    {
        $this->_id_faixa_etaria = (int) $id;
        return $this;
    }

    public function getIdFaixaEtaria()
    {
        return $this->_id_faixa_etaria;
    }

    public function setNoFaixaEtaria($no)
    {
        $this->_no_faixa_etaria = (string) $no;
        return $this;
    }

    public function getNoFaixaEtaria()
    {
        return $this->_no_faixa_etaria;
    }
    
	public function setNuValor($nu)
    {
        $this->_nu_valor = (string) $nu;
        return $this;
    }

    public function getNuValor()
    {
        return $this->_nu_valor;
    }
    
	public function setDtVigencia($dt)
    {
        $this->_dt_vigencia = (string) $dt;
        return $this;
    }

    public function getDtVigencia()
    {
        return $this->_dt_vigencia;
    }
}