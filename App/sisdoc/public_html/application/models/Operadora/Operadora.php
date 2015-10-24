<?php
class Application_Model_Operadora_Operadora
{
    protected $_id_operadora;
    protected $_no_operadora;
    protected $_ds_operadora;
    protected $_fl_ativo;

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

    public function setIdOperadora($id)
    {
        $this->_id_operadora = (int) $id;
        return $this;
    }

    public function getIdOperadora()
    {
        return $this->_id_operadora;
    }

    public function setNoOperadora($no)
    {
        $this->_no_operadora = (string) $no;
        return $this;
    }

    public function getNoOperadora()
    {
        return $this->_no_operadora;
    }

    public function setDsOperadora($ds)
    {
        $this->_ds_operadora = (string) $ds;
        return $this;
    }

    public function getDsOperadora()
    {
        return $this->_ds_operadora;
    }
    
    public function setFlAtivo($fl)
    {
        $this->_fl_ativo = (bool) $fl;
        return $this;
    }

    public function getFlAtivo()
    {
        return $this->_fl_ativo;
    }
}