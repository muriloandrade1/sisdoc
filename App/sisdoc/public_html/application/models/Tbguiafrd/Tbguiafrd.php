<?php

class Application_Model_Tbguiafrd_Tbguiafrd {

    protected $_numeroguiarem;
    protected $_dataguiarem;
    protected $_atencaode;
    protected $_projeto;
    protected $_assinadopor;
    protected $_funcao;
    protected $_obs1;
    protected $_obs2;
    protected $_obs3;

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

    public function setdataguiarem($dt) {
        $this->_dataguiarem = $dt;
        return $this;
    }

    public function getdataguiarem() {
        return $this->_dataguiarem;
    }

    public function setatencaode($ds) {
        $this->_atencaode = $ds;
        return $this;
    }

    public function getatencaode() {
        return $this->_atencaode;
    }

    public function setprojeto($ds) {
        $this->_projeto = $ds;
        return $this;
    }

    public function getprojeto() {
        return $this->_projeto;
    }

    public function setassinadopor($ds) {
        $this->_assinadopor = $ds;
        return $this;
    }

    public function getassinadopor() {
        return $this->_assinadopor;
    }

    public function setfuncao($ds) {
        $this->_funcao = $ds;
        return $this;
    }

    public function getfuncao() {
        return $this->_funcao;
    }

    public function setobs1($ds) {
        $this->_obs1 = $ds;
        return $this;
    }

    public function getobs1() {
        return $this->_obs1;
    }

    public function setobs2($ds) {
        $this->_obs2 = $ds;
        return $this;
    }

    public function getobs2() {
        return $this->_obs2;
    }

    public function setobs3($ds) {
        $this->_obs3 = $ds;
        return $this;
    }

    public function getobs3() {
        return $this->_obs3;
    }

}
