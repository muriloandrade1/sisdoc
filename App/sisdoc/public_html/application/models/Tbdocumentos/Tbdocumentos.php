<?php

class Application_Model_Tbdocumentos_Tbdocumentos {

    protected $_numero;
    protected $_titulo;
    protected $_obs;
    protected $_dip;
    protected $_dp;
    protected $_av;
    protected $_dfr0;
    protected $_os;
    protected $_docpend;
    protected $_cancelado;

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

    public function setnumero($ds) {
        $this->_numero = $ds;
        return $this;
    }

    public function getnumero() {
        return $this->_numero;
    }

    public function settitulo($ds) {
        $this->_titulo = $ds;
        return $this;
    }

    public function gettitulo() {
        return $this->_titulo;
    }

    public function setobs($ds) {
        $this->_obs = $ds;
        return $this;
    }

    public function getobs() {
        return $this->_obs;
    }

    public function setdip($dt) {
        $this->_dip = $dt;
        return $this;
    }

    public function getdip() {
        return $this->_dip;
    }

    public function setdp($nu) {
        $this->_dp = $nu;
        return $this;
    }

    public function getdp() {
        return $this->_dp;
    }

    public function setav($nu) {
        $this->_av = $nu;
        return $this;
    }

    public function getav() {
        return $this->_av;
    }

    public function setdfr0($dt) {
        $this->_dfr0 = $dt;
        return $this;
    }

    public function getdfr0() {
        return $this->_dfr0;
    }

    public function setos($ds) {
        $this->_os = $ds;
        return $this;
    }

    public function getos() {
        return $this->_os;
    }

    public function setdocpend($nu) {
        $this->_docpend = $nu;
        return $this;
    }

    public function getdocpend() {
        return $this->_docpend;
    }

    public function setcancelado($nu) {
        $this->_cancelado = $nu;
        return $this;
    }

    public function getcancelado() {
        return $this->_cancelado;
    }

}
