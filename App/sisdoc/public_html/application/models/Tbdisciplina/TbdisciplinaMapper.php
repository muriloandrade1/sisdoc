<?php
class Application_Model_Tbdisciplina_TbdisciplinaMapper
{

protected $_dbTable;

public function setDbTable($dbTable)
{
	if (is_string($dbTable)) {
		$dbTable = new $dbTable();
	}
	if (!$dbTable instanceof Zend_Db_Table_Abstract) {
		throw new Exception('Tabela inválida');
	}
	$this->_dbTable = $dbTable;
	return $this;
}

public function getDbTable()
{
	if (null === $this->_dbTable) {
		$this->setDbTable('Application_Model_DbTable_Tbdisciplina');
	}
	return $this->_dbTable;
}
}
