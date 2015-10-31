<?php

class Application_Model_Tbidentificacaoprojeto_Tbidentificacaoprojeto {

    protected $_codigo1;
    protected $_codigo2;
    protected $_identificacaodoprojeto;

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

    public function setcodigo1($ds) {
        $this->_codigo1 = $ds;
        return $this;
    }

    public function getcodigo1() {
        return $this->_codigo1;
    }

    public function setcodigo2($ds) {
        $this->_codigo2 = $ds;
        return $this;
    }

    public function getcodigo2() {
        return $this->_codigo2;
    }

    public function setidentificacaodoprojeto($ds) {
        $this->_identificacaodoprojeto = $ds;
        return $this;
    }

    public function getidentificacaodoprojeto() {
        return $this->_identificacaodoprojeto;
    }

}
