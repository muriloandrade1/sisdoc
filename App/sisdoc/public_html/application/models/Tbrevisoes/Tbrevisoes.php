<?php

class Application_Model_Tbrevisoes_Tbrevisoes {

    protected $_numero;
    protected $_revisao;
    protected $_numeroguiarem;
    protected $_dataguiarem;
    protected $_tiporem;
    protected $_quantrem;
    protected $_finrem;
    protected $_findev;
    protected $_numeroguiadev;
    protected $_crc32;
    protected $_qtdptts;
    protected $_qtdrope;
    protected $_qtdrcon;
    protected $_qtdcot;
    protected $_qtdptle;
    protected $_qtdpttl;
    protected $_qtdpttp;
    protected $_qtdpttc;
    protected $_qtdgsdd;
    protected $_qtdppa;
    protected $_qtdptc;
    protected $_qtdcpa;

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

    public function setrevisao($ds) {
        $this->_revisao = $ds;
        return $this;
    }

    public function getrevisao() {
        return $this->_revisao;
    }

    public function setnumeroguiarem($ds) {
        $this->_numeroguiarem = $ds;
        return $this;
    }

    public function getnumeroguiarem() {
        return $this->_numeroguiarem;
    }

    public function setdataguiarem($dt) {
        $this->_dataguiarem = $dt;
        return $this;
    }

    public function getdataguiarem() {
        return $this->_dataguiarem;
    }

    public function settiporem($ds) {
        $this->_tiporem = $ds;
        return $this;
    }

    public function gettiporem() {
        return $this->_tiporem;
    }

    public function setquantrem($ds) {
        $this->_quantrem = $ds;
        return $this;
    }

    public function getquantrem() {
        return $this->_quantrem;
    }

    public function setfinrem($ds) {
        $this->_finrem = $ds;
        return $this;
    }

    public function getfinrem() {
        return $this->_finrem;
    }

    public function setfindev($ds) {
        $this->_findev = $ds;
        return $this;
    }

    public function getfindev() {
        return $this->_findev;
    }

    public function setnumeroguiadev($ds) {
        $this->_numeroguiadev = $ds;
        return $this;
    }

    public function getnumeroguiadev() {
        return $this->_numeroguiadev;
    }

    public function setcrc32($ds) {
        $this->_crc32 = $ds;
        return $this;
    }

    public function getcrc32() {
        return $this->_crc32;
    }

    public function setqtdptts($ds) {
        $this->_qtdptts = $ds;
        return $this;
    }

    public function getqtdptts() {
        return $this->_qtdptts;
    }

    public function setqtdrope($ds) {
        $this->_qtdrope = $ds;
        return $this;
    }

    public function getqtdrope() {
        return $this->_qtdrope;
    }

    public function setqtdrcon($ds) {
        $this->_qtdrcon = $ds;
        return $this;
    }

    public function getqtdrcon() {
        return $this->_qtdrcon;
    }

    public function setqtdcot($ds) {
        $this->_qtdcot = $ds;
        return $this;
    }

    public function getqtdcot() {
        return $this->_qtdcot;
    }

    public function setqtdptle($ds) {
        $this->_qtdptle = $ds;
        return $this;
    }

    public function getqtdptle() {
        return $this->_qtdptle;
    }

    public function setqtdpttl($ds) {
        $this->_qtdpttl = $ds;
        return $this;
    }

    public function getqtdpttl() {
        return $this->_qtdpttl;
    }

    public function setqtdpttp($ds) {
        $this->_qtdpttp = $ds;
        return $this;
    }

    public function getqtdpttp() {
        return $this->_qtdpttp;
    }

    public function setqtdpttc($ds) {
        $this->_qtdpttc = $ds;
        return $this;
    }

    public function getqtdpttc() {
        return $this->_qtdpttc;
    }

    public function setqtdgsdd($ds) {
        $this->_qtdgsdd = $ds;
        return $this;
    }

    public function getqtdgsdd() {
        return $this->_qtdgsdd;
    }

    public function setqtdppa($ds) {
        $this->_qtdppa = $ds;
        return $this;
    }

    public function getqtdppa() {
        return $this->_qtdppa;
    }

    public function setqtdptc($ds) {
        $this->_qtdptc = $ds;
        return $this;
    }

    public function getqtdptc() {
        return $this->_qtdptc;
    }

    public function setqtdcpa($ds) {
        $this->_qtdcpa = $ds;
        return $this;
    }

    public function getqtdcpa() {
        return $this->_qtdcpa;
    }

}
