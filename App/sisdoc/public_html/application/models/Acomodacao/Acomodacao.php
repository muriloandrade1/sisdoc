<?php
class Application_Model_Acomodacao_Acomodacao
{
    protected $_id_acomodacao;
    protected $_no_acomodacao;
    protected $_ds_acomodacao;

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

    public function setIdAcomodacao($id)
    {
        $this->_id_acomodacao = (int) $id;
        return $this;
    }

    public function getIdAcomodacao()
    {
        return $this->_id_acomodacao;
    }

    public function setNoAcomodacao($no)
    {
        $this->_no_acomodacao = (string) $no;
        return $this;
    }

    public function getNoAcomodacao()
    {
        return $this->_no_acomodacao;
    }

    public function setdsAcomodacao($ds)
    {
        $this->_ds_acomodacao = (string) $ds;
        return $this;
    }

    public function getDsAcomodacao()
    {
        return $this->_ds_acomodacao;
    }
}