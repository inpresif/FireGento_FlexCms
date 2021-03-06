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
 * @copyright 2015 FireGento Team (http://www.firegento.com)
 * @license   http://opensource.org/licenses/gpl-3.0 GNU General Public License, version 3 (GPLv3)
 */

/**
 * FlexCms Content Renderer
 *
 * @category FireGento
 * @package  FireGento_FlexCms
 * @author   FireGento Team <team@firegento.com>
 */
class Firegento_FlexCms_Block_Adminhtml_Catalog_Form_Renderer_Fieldset extends Mage_Adminhtml_Block_Widget_Form_Renderer_Fieldset
{
    /**
     * Initialize block template
     */
    protected function _construct()
    {
        $category = Mage::registry('current_category');
        if (!$category) {
            return parent::_construct();
        }

        /** @var $changesObject Firegento_FlexCms_Model_Category_Changes */
        $changesObject = Mage::getModel('firegento_flexcms/category_changes')->loadByCategory($category);

        if (!$changesObject->getId()) {
            return parent::_construct();
        }
        
        $this->setTemplate('firegento/flexcms/fieldset.phtml');
    }
}