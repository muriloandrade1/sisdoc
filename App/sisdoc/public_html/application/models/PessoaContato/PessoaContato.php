<?php
class Application_Model_PessoaContato_PessoaContato
{
    protected $_id_pessoa_contato;
    protected $_id_categoria_plano;
    protected $_ds_contato;
    protected $_no_nome;
    protected $_nu_idade;    
    protected $_nu_telefone;
    protected $_nu_celular;
    protected $_ds_email;
    protected $_ds_website;
    protected $_fg_confirmado;
    protected $_dt_registro;
    protected $_dt_contato;

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

    public function setIdPessoaContato($id)
    {
        $this->_id_pessoa_contato = (int) $id;
        return $this;
    }

    public function getIdPessoaContato()
    {
        return $this->_id_pessoa_contato;
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
    
	public function setDsContato($id)
    {
        $this->_ds_contato = $id;
        return $this;
    }

    public function getDsContato()
    {
        return $this->_ds_contato;
    }
    
	public function setNoNome($id)
    {
        $this->_no_nome = $id;
        return $this;
    }

    public function getNoNome()
    {
        return $this->_no_nome;
    }
    
	public function setNuIdade($id)
    {
        $this->_nu_idade = $id;
        return $this;
    }

    public function getNuIdade()
    {
        return $this->_nu_idade;
    }
    
	public function setNuTelefone($id)
    {
        $this->_nu_telefone = $id;
        return $this;
    }

    public function getNuTelefone()
    {
        return $this->_nu_telefone;
    }
    
	public function setNuCelular($id)
    {
        $this->_nu_celular = $id;
        return $this;
    }

    public function getNuCelular()
    {
        return $this->_nu_celular;
    }
    
	public function setDsEmail($id)
    {
        $this->_ds_email = $id;
        return $this;
    }

    public function getDsEmail()
    {
        return $this->_ds_email;
    }
    
	public function setDsWebsite($id)
    {
        $this->_ds_website = $id;
        return $this;
    }

    public function getDsWebsite()
    {
        return $this->_ds_website;
    }
    
	public function setFgConfirmado($id)
    {
        $this->_fg_confirmado = (int) $id;
        return $this;
    }

    public function getFgConfirmado()
    {
        return $this->_fg_confirmado;
    }

	public function setDtRegistro($data)
    {
        $this->_dt_registro = $data;
        return $this;
    }

    public function getDtRegistro()
    {
        return $this->_dt_registro;
    }
    
	public function setDtContato($data)
    {
        $this->_dt_contato = $data;
        return $this;
    }

    public function getDtContato()
    {
        return $this->_dt_contato;
    }

}