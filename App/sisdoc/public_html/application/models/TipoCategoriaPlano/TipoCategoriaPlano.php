<?php
class Application_Model_TipoCategoriaPlano_TipoCategoriaPlano
{
    protected $_id_tipo_categoria_plano;
    protected $_id_categoria_plano;
    protected $_id_acomodacao;
    protected $_id_tipo_plano;

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

    public function setIdTipoCategoriaPlano($id)
    {
        $this->_id_tipo_categoria_plano = (int) $id;
        return $this;
    }

    public function getIdTipoCategoriaPlano()
    {
        return $this->_id_tipo_categoria_plano;
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

    public function setIdAcomodacao($id)
    {
        $this->_id_acomodacao = (int) $id;
        return $this;
    }

    public function getIdAcomodacao()
    {
        return $this->_id_acomodacao;
    }

    public function setIdTipoPlano($ds)
    {
        $this->_id_tipo_plano = (int) $ds;
        return $this;
    }

    public function getIdTipoPlano()
    {
        return $this->_id_tipo_plano;
    }
   
}