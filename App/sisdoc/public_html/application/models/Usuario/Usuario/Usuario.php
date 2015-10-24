<?php
class Application_Model_Usuario_Usuario
{
    protected $_id_user;
    protected $_no_user;
    protected $_ds_login;
    protected $_ds_pass;
    protected $_fl_perfil;

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
    
	public function setIdUser($id)
    {
        $this->_id_user = (int) $id;
        return $this;
    }

    public function getIdUser()
    {
        return $this->_id_user;
    }
    
	public function setNoUser($no)
    {
        $this->_no_user = (string) $no;
        return $this;
    }

    public function getNoUser()
    {
        return $this->_no_user;
    }
    
	public function setDsLogin($ds)
    {
        $this->_ds_login = (string) $ds;
        return $this;
    }

    public function getDsLogin()
    {
        return $this->_ds_login;
    }
    
	public function setDsPass($ds)
    {
        $this->_ds_pass = $ds;
        return $this;
    }

    public function getDsPass()
    {
        return $this->_ds_pass;
    }
    
	public function setFlPerfil($id)
    {
        $this->_fl_perfil = (int) $id;
        return $this;
    }

    public function getFlPerfil()
    {
        return $this->_fl_perfil;
    }
}

?>