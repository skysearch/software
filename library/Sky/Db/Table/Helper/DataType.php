<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Sky_Db_Table_Helper_DataType {

    protected $_dataType = array();


    public function __construct($dataType) {
        $this->_dataType = $dataType;
    }
    
    public function in($col, $value) {
        $dataType = $this->_dataType;
        
        /**
         * Se não existe o tipo para formatar, retorna o valor
         */
        if (!key_exists($col, $dataType) || is_null($dataType)) {
            return $value;
        }

        $data = array($col => $value);

        switch ($dataType[$col]['type']) {
            case 'datetime':
                if (empty($data[$col])) {
                    $data[$col] = (key_exists('default', $data[$col])) ? $data[$col]['default'] : '0000-00-00 00:00:00';
                    break;
                }
                $date = str_replace(array('/', '.'), '-', $data[$col]);
                $date = new DateTime($date);
                $data[$col] = $date->format('Y-m-d H:i:s');
                break;

            case 'now':
                $date = new DateTime();
                $data[$col] = $date->format('Y-m-d H:i:s');

            case 'crypt':
                $data[$col] = Sky_Text_Transform_Crypt::encrypt($data[$col], true);
                break;

            case 'slug':
                $data[$col] = Sky_Text_Transform_Slug::makeSlugs($data[$col]);
                break;

            case 'array':
                $data[$col] = serialize($data[$col]);
                break;

            case 'int':
            case 'integer':
            case 'float':
            case 'string':
            case 'bool':
                $function = $this->_dataType[$col]['type'];
                $value = $data[$col];
                eval("\$data[\"$col\"] = ($function)\"$value\";");
                break;

            case 'currency':
                $data[$col] = str_replace(',', '.', str_replace('.', '', $data[$col]));
                break;

            default:
                $function = $this->_dataType[$col]['type'];
                $value = $data[$col];
                $value = str_replace('$', '\$', $value);
                eval("\$data[\"$col\"] = $function(\"$value\");");
                break;
        }

        return $data[$col];
    }

    public function out($col, $data) {
        $dataType = $this->_dataType;
        
        if (!key_exists($col, $dataType) || !is_array($dataType))
            return $data[$col];

        switch ($dataType[$col]['type']) {
            case 'datetime':
                if ((int) $data[$col] > 0) {
                    $data[$col] = new DateTime($data[$col]);
                    break;
                }
                $data[$col] = null;
                break;

            case 'now':
                $data[$col] = new DateTime();
                break;

            case 'crypt':
                $data[$col] = Sky_Text_Transform_Crypt::decrypt($data[$col], true);
                break;

            case 'slug':
                $data[$col] = Sky_Text_Transform_Slug::makeSlugs($data[$col]);
                break;

            case 'int':
            case 'float':
            case 'string':
            case 'bool':
                $function = $dataType[$col]['type'];
                $value = $data[$col];
                eval("\$data[\"$col\"] = ($function)\"$value\";");
                break;

            case 'currency':
                $data[$col] = number_format($data[$col], 2, ',', '.');
                break;

            case 'switch':
                if ($dataType[$col]['cases']['type'] == 'bool') {
                    $args = $dataType[$col]['cases']['args'];
                    return ((bool) $data[$col]) ? $args[0] : $args[1];
                }

                if (!key_exists($data[$col], $dataType[$col]['cases']))
                    return null;

                $data[$col] = $args[$data[$col]];
                break;

            default:
                $function = $dataType[$col]['type'];
                $value = $data[$col];
                eval("\$data[\"$col\"] = $function(\"$value\");");
                break;
        }

        return $data[$col];
    }

}
