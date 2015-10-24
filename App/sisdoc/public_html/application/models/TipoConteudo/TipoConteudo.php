<?php
class Application_Model_TipoConteudo_TipoConteudo
{
    protected $_id_tipo_conteudo;
    protected $_no_tipo_conteudo;
    protected $_ds_tipo_conteudo;

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

    public function setIdTipoConteudo($id)
    {
        $this->_id_tipo_conteudo = (int) $id;
        return $this;
    }

    public function getIdTipoConteudo()
    {
        return $this->_id_tipo_conteudo;
    }

    public function setNoTipoConteudo($no)
    {
        $this->_no_tipo_conteudo = (string) $no;
        return $this;
    }

    public function getNoTipoConteudo()
    {
        return $this->_no_tipo_conteudo;
    }

    public function setdsTipoConteudo($ds)
    {
        $this->_ds_tipo_conteudo = (string) $ds;
        return $this;
    }

    public function getDsTipoConteudo()
    {
        return $this->_ds_tipo_conteudo;
    }
}