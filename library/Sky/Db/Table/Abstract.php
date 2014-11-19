<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Abstract
 *
 * @author Renato David
 */
Abstract class Sky_Db_Table_Abstract extends Zend_Db_Table_Abstract {

    
    public function __toString() {
        return $this->_name;
    }

    /**
     * Returns table information.
     *
     * You can elect to return only a part of this information by supplying its key name,
     * otherwise all information is returned as an array.
     *
     * @param  string $key The specific info part to return OPTIONAL
     * @return mixed
     * @throws Zend_Db_Table_Exception
     */
    public function info($key = null) {
        $this->_setupPrimaryKey();

        $info = array(
            parent::SCHEMA => $this->_schema,
            parent::NAME => $this->_name,
            parent::COLS => $this->_getCols(),
            parent::PRIMARY => (array) $this->_primary,
            parent::METADATA => $this->_metadata,
            parent::ROW_CLASS => $this->getRowClass(),
            parent::ROWSET_CLASS => $this->getRowsetClass(),
            parent::REFERENCE_MAP => $this->_referenceMap,
            parent::DEPENDENT_TABLES => $this->_dependentTables,
            parent::SEQUENCE => $this->_sequence
        );

        if ($key === null) {
            return $info;
        }

        if (!array_key_exists($key, $info)) {
            require_once 'Zend/Db/Table/Exception.php';
            throw new Zend_Db_Table_Exception('There is no table information for the key "' . $key . '"');
        }

        return $info[$key];
    }

    /**
     * Inserts a new row.
     *
     * @param  array  $data  Column-value pairs.
     * @return mixed         The primary key of the row inserted.
     */
    public function insert(array $data) {
        $data = $this->_validColumn($data);
        
        return parent::insert($data);
    }

    /**
     * Updates existing rows.
     *
     * @param  array        $data  Column-value pairs.
     * @param  array|string $where An SQL WHERE clause, or an array of SQL WHERE clauses.
     * @return int          The number of rows updated.
     */
    public function update(array $data, $where) {
        $data = $this->_validColumn($data);
        
        return parent::update($data, $where);
    }

    protected function _validColumn(array $data) {
        $columns = array_combine($this->_cols,$this->_cols);
        $data = array_intersect_key($data,$columns);

        return $data;
    }
}

