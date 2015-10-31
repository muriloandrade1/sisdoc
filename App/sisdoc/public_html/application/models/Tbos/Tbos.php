<?php

class Application_Model_Tbos_Tbos {

    protected $_os;
    protected $_descricao;
    protected $_inicio;
    protected $_termino;
    protected $_anobase;

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

    public function setos($ds) {
        $this->_os = $ds;
        return $this;
    }

    public function getos() {
        return $this->_os;
    }

    public function setdescricao($ds) {
        $this->_descricao = $ds;
        return $this;
    }

    public function getdescricao() {
        return $this->_descricao;
    }

    public function setinicio($dt) {
        $this->_inicio = $dt;
        return $this;
    }

    public function getinicio() {
        return $this->_inicio;
    }

    public function settermino($dt) {
        $this->_termino = $dt;
        return $this;
    }

    public function gettermino() {
        return $this->_termino;
    }

    public function setanobase($nu) {
        $this->_anobase = $nu;
        return $this;
    }

    public function getanobase() {
        return $this->_anobase;
    }

}
