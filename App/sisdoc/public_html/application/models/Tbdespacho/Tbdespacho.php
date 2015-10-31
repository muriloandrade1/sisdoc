<?php

class Application_Model_Tbdespacho_Tbdespacho {

    protected $_numeroguiarem;
    protected $_data;
    protected $_de;
    protected $_para;
    protected $_despacho;

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

    public function setnumeroguiarem($ds) {
        $this->_numeroguiarem = $ds;
        return $this;
    }

    public function getnumeroguiarem() {
        return $this->_numeroguiarem;
    }

    public function setdata($dt) {
        $this->_data = $dt;
        return $this;
    }

    public function getdata() {
        return $this->_data;
    }

    public function setde($ds) {
        $this->_de = $ds;
        return $this;
    }

    public function getde() {
        return $this->_de;
    }

    public function setpara($ds) {
        $this->_para = $ds;
        return $this;
    }

    public function getpara() {
        return $this->_para;
    }

    public function setdespacho($ds) {
        $this->_despacho = $ds;
        return $this;
    }

    public function getdespacho() {
        return $this->_despacho;
    }

}
