<?php
class Application_Model_Conteudo_Conteudo
{
    protected $_id_conteudo;
    protected $_ds_titulo;
    protected $_ds_subtitulo;
    protected $_ds_conteudo;
    protected $_id_tipo_conteudo;
    protected $_ds_chamada;

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

    public function setIdConteudo($id)
    {
        $this->_id_conteudo = (int) $id;
        return $this;
    }

    public function getIdConteudo()
    {
        return $this->_id_conteudo;
    }

    public function setDsTitulo($ds)
    {
        $this->_ds_titulo = (string) $ds;
        return $this;
    }

    public function getDsTitulo()
    {
        return $this->_ds_titulo;
    }

    public function setDsSubtitulo($ds)
    {
        $this->_ds_subtitulo = (string) $ds;
        return $this;
    }

    public function getDsSubtitulo()
    {
        return $this->_ds_subtitulo;
    }

    public function setDsConteudo($ds)
    {
        $this->_ds_conteudo = (string) $ds;
        return $this;
    }

    public function getDsConteudo()
    {
        return $this->_ds_conteudo;
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

    public function setDsChamada($ds)
    {
        $this->_ds_chamada = (string) $ds;
        return $this;
    }

    public function getDsChamada()
    {
        return $this->_ds_chamada;
    }
}