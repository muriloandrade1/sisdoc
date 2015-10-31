<?php

class Application_Model_Tbdocumentos_TbdocumentosMapper {

    protected $_dbTable;

    public function setDbTable($dbTable) {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Tabela inválida');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }

    public function getDbTable() {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_Tbdocumentos');
        }
        return $this->_dbTable;
    }

    public function consultaPrincipal() {
        $select = $this->getDbTable()
                ->select('td.numero, td.titulo')
                ->limit(20, 0);

        $select->setIntegrityCheck(false);

        $arrResult = array();
        $resultSet = $this->getDbTable()->fetchAll($select);

        foreach ($resultSet as $row) {
            $arr = new Application_Model_Tbdocumentos_Tbdocumentos();
            $arr->setnumero($row->Numero);
            $arr->settitulo($row->Titulo);
            $arrResult[] = $arr;
        }

        return $arrResult;
    }

}
