<?php
class Application_Model_CategoriaPlano_CategoriaPlano
{
    protected $_id_categoria_plano;
    protected $_id_operadora;
    protected $_no_categoria_plano;
    protected $_ds_categoria_plano;
    protected $_ds_rede_credenciada;

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

    public function setIdCategoriaPlano($id)
    {
        $this->_id_categoria_plano = (int) $id;
        return $this;
    }

    public function getIdCategoriaPlano()
    {
        return $this->_id_categoria_plano;
    }

    public function setNoCategoriaPlano($no)
    {
        $this->_no_categoria_plano = (string) $no;
        return $this;
    }

    public function getNoCategoriaPlano()
    {
        return $this->_no_categoria_plano;
    }

    public function setDsCategoriaPlano($ds)
    {
        $this->_ds_categoria_plano = (string) $ds;
        return $this;
    }

    public function getDsCategoriaPlano()
    {
        return $this->_ds_categoria_plano;
    }

    public function setNuValor($nu)
    {
        $this->_nu_valor = (string) $nu;
        return $this;
    }

    public function getNuValor()
    {
        return $this->_nu_valor;
    }

    public function setDsRedeCredenciada($ds)
    {
        $this->_ds_rede_credenciada = (string) $ds;
        return $this;
    }

    public function getDsRedeCredenciada()
    {
        return $this->_ds_rede_credenciada;
    }

    public function setIdOperadora($id)
    {
        $this->_id_operadora = (int) $id;
        return $this;
    }

    public function getIdOperadora()
    {
        return $this->_id_operadora;
    }
    
}