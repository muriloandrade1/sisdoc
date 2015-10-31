<?php

class Application_Model_Tbguiadevolucao_Tbguiadevolucao {

    protected $_numeroguiadev;
    protected $_dataguiadev;

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

    public function setnumeroguiadev($ds) {
        $this->_numeroguiadev = $ds;
        return $this;
    }

    public function getnumeroguiadev() {
        return $this->_numeroguiadev;
    }

    public function setdataguiadev($dt) {
        $this->_dataguiadev = $dt;
        return $this;
    }

    public function getdataguiadev() {
        return $this->_dataguiadev;
    }

}
