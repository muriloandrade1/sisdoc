<?php
class Application_Model_OperadoraContato_OperadoraContato
{
    protected $_id_operadora_contato;
    protected $_id_contato;
    protected $_id_operadora;

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

    public function setIdOperadoraContato($id)
    {
        $this->_id_operadora_contato = (int) $id;
        return $this;
    }

    public function getIdOperadoraContato()
    {
        return $this->_id_operadora_contato;
    }

    public function setIdContato($id)
    {
        $this->_id_contato = (int) $id;
        return $this;
    }

    public function getIdContato()
    {
        return $this->_id_contato;
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
}