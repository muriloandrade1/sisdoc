<?php
class Application_Model_Contato_Contato
{
    protected $_id_contato;
    protected $_nu_telefone;
    protected $_nu_celular;
    protected $_ds_email;
    protected $_ds_website;

    public function __construct($options = array())
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

    public function setIdContato($id)
    {
        $this->_id_contato = (int) $id;
        return $this;
    }

    public function getIdContato()
    {
        return $this->_id_contato;
    }

    public function setNuTelefone($nu)
    {
        $this->_nu_telefone = (string) $nu;
        return $this;
    }

    public function getNuTelefone()
    {
        return $this->_nu_telefone;
    }

    public function setNuCelular($nu)
    {
        $this->_nu_celular = (string) $nu;
        return $this;
    }

    public function getNuCelular()
    {
        return $this->_nu_celular;
    }

    public function setDsEmail($ds)
    {
        $this->_ds_email = (string) $ds;
        return $this;
    }

    public function getDsEmail()
    {
        return $this->_ds_email;
    }

    public function setDsWebsite($ds)
    {
        $this->_ds_website = (string) $ds;
        return $this;
    }

    public function getDsWebsite()
    {
        return $this->_ds_website;
    }
}