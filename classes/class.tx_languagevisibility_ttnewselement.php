<?php
/***************************************************************
 * Copyright notice
 *
 * (c) 2007 AOE media (dev@aoemedia.de)
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
/**
 *
 * @author	Daniel Poetzinger <poetzinger@aoemedia.de>
 * @coauthor Tolleiv Nietsch <nietsch@aoemedia.de>
 * @coauthor Timo Schmidt <schmidt@aoemedia.de>
 */
require_once (t3lib_extMgm::extPath("languagevisibility") . 'classes/class.tx_languagevisibility_recordelement.php');

class tx_languagevisibility_ttnewselement extends tx_languagevisibility_recordelement {

	/**
	 * Overwritten method to initialized
	 * (non-PHPdoc)
	 * @see classes/tx_languagevisibility_element#initialisations()
	 */
	protected function initialisations() {
	}

	/**
	 * returns which field in the language should be used to read the default visibility
	 *
	 * @param void
	 * @return string (blank=default / page=page)
	 **/
	function getFieldToUseForDefaultVisibility() {
		return 'tt_news';
	}

	/**
	 * Returns a formal description for this element type.
	 *
	 * (non-PHPdoc)
	 * @see classes/tx_languagevisibility_recordelement#getElementDescription()
	 */
	public function getElementDescription() {
		return 'tt-news Record';
	}

	/**
	 * Returns the fallback order for news elements.
	 *
	 * (non-PHPdoc)
	 * @see classes/tx_languagevisibility_recordelement#getFallbackOrder($language)
	 */
	function getFallbackOrder(tx_languagevisibility_language $language) {
		return $language->getFallbackOrderTTNewsElement($this);
	}
}
?>