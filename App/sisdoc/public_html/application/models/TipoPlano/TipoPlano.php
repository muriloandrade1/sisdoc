<?php
class Application_Model_TipoPlano_TipoPlano
{
    protected $_id_tipo_plano;
    protected $_no_tipo_plano;

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

    public function setIdTipoPlano($id)
    {
        $this->_id_tipo_plano = (int) $id;
        return $this;
    }

    public function getIdTipoPlano()
    {
        return $this->_id_tipo_plano;
    }

    public function setNoTipoPlano($no)
    {
        $this->_no_tipo_plano = (string) $no;
        return $this;
    }

    public function getNoTipoPlano()
    {
        return $this->_no_tipo_plano;
    }

}