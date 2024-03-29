<?php
/***************************************************************
 * Copyright notice
 *
 * (c) 2010 Tolleiv
 * All rights reserved
 *
 * This script is part of the TYPO3 project. The TYPO3 project is
 * free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 *
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

if (!interface_exists('tslib_menu_filterMenuPagesHook') && version_compare(TYPO3_version, '4.4', '>')) {
	// @todo this should be loaded with the Core's autoloader but obviously that doesn't happen in 4.4.0
	require_once PATH_tslib . 'interfaces/interface.tslib_menu_filterMenuPagesHook.php';
}


if (!(version_compare(TYPO3_version, '4.5.2', '>') XOR (version_compare(TYPO3_version, '4.5', '<') && version_compare(TYPO3_version, '4.4.6', '>')))) {
	/**
	 *
	 * @author	 Tolleiv
	 * @package	 TYPO3
	 * @version $Id:$
	 */
	class tx_languagevisibility_hooks_tslib_menu implements tslib_menu_filterMenuPagesHook
	{

		/**
		 * Checks if a page is OK to include in the final menu item array.
		 *
		 * @param	array		Array of menu items
		 * @param	array		Array of page uids which are to be excluded
		 * @param	boolean		If set, then the page is a spacer.
		 * @param	tslib_menu	The menu object
		 * @return	boolean		Returns TRUE if the page can be safely included.
		 */
		public function tslib_menu_filterMenuPagesHook(array &$data, array $banUidArray, $spacer, tslib_tmenu $obj)
		{
			if ($data['_NOTVISIBLE']) {
				return false;
			} else {
				return true;
			}
		}
	}
} else {
	/**
	 *
	 * @author	 Tolleiv
	 * @package	 TYPO3
	 * @version $Id:$
	 */
	class tx_languagevisibility_hooks_tslib_menu implements tslib_menu_filterMenuPagesHook
	{

		/**
		 * Checks if a page is OK to include in the final menu item array.
		 *
		 * @param	array		Array of menu items
		 * @param	array		Array of page uids which are to be excluded
		 * @param	boolean		If set, then the page is a spacer.
		 * @param	tslib_menu	The menu object
		 * @return	boolean		Returns TRUE if the page can be safely included.
		 */
		public function tslib_menu_filterMenuPagesHook(array &$data, array $banUidArray, $spacer, tslib_menu $obj)
		{
			if ($data['_NOTVISIBLE']) {
				return false;
			} else {
				return true;
			}
		}

		/**
		 * Checks if a page is OK to include in the final menu item array.
		 *
		 * @param	array		Array of menu items
		 * @param	array		Array of page uids which are to be excluded
		 * @param	boolean		If set, then the page is a spacer.
		 * @param	tslib_menu	The menu object
		 * @return	boolean		Returns TRUE if the page can be safely included.
		 */
		public function processFilter(array &$data, array $banUidArray, $spacer, tslib_menu $obj)
		{
			return $this->tslib_menu_filterMenuPagesHook($data, $banUidArray, $spacer, $obj);
		}
	}
}