<?php

class Application_Model_Tbacesso_Tbacesso {

    protected $_nome;
    protected $_senha;

    public function __construct(array $options = null) {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }

    public function __set($name, $value) {
        $method = 'set' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Propriedade inválida para arquivo');
        }
        $this->$method($value);
    }

    public function __get($name) {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Propriedade inválida para arquivo');
        }
        return $this->$method();
    }

    public function setOptions(array $options) {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }

    public function setnome($ds) {
        $this->_nome = $ds;
        return $this;
    }

    public function getnome() {
        return $this->_nome;
    }

    public function setsenha($ds) {
        $this->_senha = $ds;
        return $this;
    }

    public function getsenha() {
        return $this->_senha;
    }

}
