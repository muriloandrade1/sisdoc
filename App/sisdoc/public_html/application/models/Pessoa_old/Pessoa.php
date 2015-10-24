<?php
class Application_Model_Pessoa_Pessoa
{
    protected $_id_pessoa;
    protected $_no_pessoa;
    protected $_id_tipo_pessoa;

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

    public function setIdPessoa($id)
    {
        $this->_id_pessoa = (int) $id;
        return $this;
    }

    public function getIdPessoa()
    {
        return $this->_id_pessoa;
    }

    public function setNoPessoa($no)
    {
        $this->_no_pessoa = (string) $no;
        return $this;
    }

    public function getNoPessoa()
    {
        return $this->_no_pessoa;
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

}