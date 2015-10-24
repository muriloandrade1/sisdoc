<?php
class Application_Model_TipoCategoriaPlanoFaixaEtaria_TipoCategoriaPlanoFaixaEtaria
{
    protected $_id_tipo_categoria_plano_faixa_etaria;
    protected $_id_tipo_categoria_plano;
    protected $_id_faixa_etaria;

    public function __construct(array $options = null)
    {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }

    public function __set($name, $value)
    {
        $method = 'set' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Propriedade inválida para arquivo');
        }
        $this->$method($value);
    }

    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Propriedade inválida para arquivo');
        }
        return $this->$method();
    }

    public function setOptions(array $options)
    {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }

    public function setIdTipoCategoriaPlanoFaixaEtaria($id)
    {
        $this->_id_tipo_categoria_plano_faixa_etaria = (int) $id;
        return $this;
    }

    public function getIdTipoCategoriaPlanoFaixaEtaria()
    {
        return $this->_id_tipo_categoria_plano_faixa_etaria;
    }

    public function setIdTipoCategoriaPlano($id)
    {
        $this->_id_tipo_categoria_plano = (int) $id;
        return $this;
    }

    public function getIdTipoCategoriaPlano()
    {
        return $this->_id_tipo_categoria_plano;
    }

    public function setIdFaixaEtaria($id)
    {
        $this->_id_faixa_etaria = (int) $id;
        return $this;
    }

    public function getIdFaixaEtaria()
    {
        return $this->_id_faixa_etaria;
    }
}