<?php

class Application_Model_Tbguiaremessa_Tbguiaremessa {

    protected $_numeroguiarem;
    protected $_dataguiarem;
    protected $_atencaode;
    protected $_projeto;
    protected $_assinadopor;
    protected $_funcao;
    protected $_obs1;
    protected $_obs2;
    protected $_obs3;
    protected $_assunto;
    protected $_campo1;
    protected $_campo2;
    protected $_campo3;
    protected $_campo4;
    protected $_campo5;
    protected $_campo6;
    protected $_campo7;
    protected $_campo8;
    protected $_campo9;
    protected $_campo10;
    protected $_campo11;
    protected $_campo12;
    protected $_assinatura1;
    protected $_assinatura2;
    protected $_assinatura3;

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

    public function setassunto($ds) {
        $this->_assunto = $ds;
        return $this;
    }

    public function getassunto() {
        return $this->_assunto;
    }

    public function setcampo1($ds) {
        $this->_campo1 = $ds;
        return $this;
    }

    public function getcampo1() {
        return $this->_campo1;
    }

    public function setcampo2($ds) {
        $this->_campo2 = $ds;
        return $this;
    }

    public function getcampo2() {
        return $this->_campo2;
    }

    public function setcampo3($ds) {
        $this->_campo3 = $ds;
        return $this;
    }

    public function getcampo3() {
        return $this->_campo3;
    }

    public function setcampo4($ds) {
        $this->_campo4 = $ds;
        return $this;
    }

    public function getcampo4() {
        return $this->_campo4;
    }

    public function setcampo5($ds) {
        $this->_campo5 = $ds;
        return $this;
    }

    public function getcampo5() {
        return $this->_campo5;
    }

    public function setcampo6($ds) {
        $this->_campo6 = $ds;
        return $this;
    }

    public function getcampo6() {
        return $this->_campo6;
    }

    public function setcampo7($ds) {
        $this->_campo7 = $ds;
        return $this;
    }

    public function getcampo7() {
        return $this->_campo7;
    }

    public function setcampo8($ds) {
        $this->_campo8 = $ds;
        return $this;
    }

    public function getcampo8() {
        return $this->_campo8;
    }

    public function setcampo9($ds) {
        $this->_campo9 = $ds;
        return $this;
    }

    public function getcampo9() {
        return $this->_campo9;
    }

    public function setcampo10($ds) {
        $this->_campo10 = $ds;
        return $this;
    }

    public function getcampo10() {
        return $this->_campo10;
    }

    public function setcampo11($ds) {
        $this->_campo11 = $ds;
        return $this;
    }

    public function getcampo11() {
        return $this->_campo11;
    }

    public function setcampo12($ds) {
        $this->_campo12 = $ds;
        return $this;
    }

    public function getcampo12() {
        return $this->_campo12;
    }

    public function setassinatura1($ds) {
        $this->_assinatura1 = $ds;
        return $this;
    }

    public function getassinatura1() {
        return $this->_assinatura1;
    }

    public function setassinatura2($ds) {
        $this->_assinatura2 = $ds;
        return $this;
    }

    public function getassinatura2() {
        return $this->_assinatura2;
    }

    public function setassinatura3($ds) {
        $this->_assinatura3 = $ds;
        return $this;
    }

    public function getassinatura3() {
        return $this->_assinatura3;
    }

}
