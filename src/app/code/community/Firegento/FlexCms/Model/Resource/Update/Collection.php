<?php
/**
 * This file is part of a FireGento e.V. module.
 *
 * This FireGento e.V. module is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License version 3 as
 * published by the Free Software Foundation.
 *
 * This script is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * PHP version 5
 *
 * @category  FireGento
 * @package   FireGento_FlexCms
 * @author    FireGento Team <team@firegento.com>
 * @copyright 2014 FireGento Team (http://www.firegento.com)
 * @license   http://opensource.org/licenses/gpl-3.0 GNU General Public License, version 3 (GPLv3)
 */

/**
 * FlexCms Content Renderer
 *
 * @category FireGento
 * @package  FireGento_FlexCms
 * @author   FireGento Team <team@firegento.com>
 */
class Firegento_FlexCms_Model_Resource_Update_Collection extends Varien_Data_Collection
{
    /**
     * @param $field
     * @param $condition
     */
    public function addFieldToFilter($field, $condition){
        $i = 0;

        foreach($this->getItems() as $item){
            if(isset($condition["like"])){
                $conditionValue = $condition["like"];
            }else if(isset($condition["eq"])){
                $conditionValue = $condition["eq"];
            }else{
                return $this;
            }

            $pattern = str_replace("'", "", str_replace('%', '.*', $conditionValue));
            if(!preg_match("/^{$pattern}$/i", $item->getData($field))){
                $this->removeItemByKey($i);
            }

            $i++;
        }

        return $this;
    }
}