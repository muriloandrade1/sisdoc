<?php

class Application_Model_Tblistarelat_Tblistarelat {

    protected $_norelat;
    protected $_relatorio;

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

    public function setnorelat($nu) {
        $this->_norelat = $nu;
        return $this;
    }

    public function getnorelat() {
        return $this->_norelat;
    }

    public function setrelatorio($ds) {
        $this->_relatorio = $ds;
        return $this;
    }

    public function getrelatorio() {
        return $this->_relatorio;
    }

}
