<?php
class Application_Model_TipoPessoa_TipoPessoa
{
    protected $_id_tipo_pessoa;
    protected $_no_tipo_pessoa;
    protected $_ds_tipo_pessoa;

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

    public function setIdTipoPessoa($id)
    {
        $this->_id_tipo_pessoa = (int) $id;
        return $this;
    }

    public function getIdTipoPessoa()
    {
        return $this->_id_tipo_pessoa;
    }

    public function setNoTipoPessoa($no)
    {
        $this->_no_tipo_pessoa = (string) $no;
        return $this;
    }

    public function getNoTipoPessoa()
    {
        return $this->_no_tipo_pessoa;
    }

    public function setdsTipoPessoa($ds)
    {
        $this->_ds_tipo_pessoa = (string) $ds;
        return $this;
    }

    public function getDsTipoPessoa()
    {
        return $this->_ds_tipo_pessoa;
    }
}