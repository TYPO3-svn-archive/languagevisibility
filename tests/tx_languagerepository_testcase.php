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
 * Test case for checking the PHPUnit 3.1.9
 *
 * WARNING: Never ever run a unit test like this on a live site!
 *
 *
 * @author	Daniel P�tzinger
 */

require_once (t3lib_extMgm::extPath("languagevisibility") . 'tests/tx_languagevisibility_databaseTestcase.php');

require_once (t3lib_extMgm::extPath("languagevisibility") . 'classes/class.tx_languagevisibility_language.php');

// require_once (t3lib_extMgm::extPath('phpunit').'class.tx_phpunit_test.php');
require_once (PATH_t3lib . 'class.t3lib_tcemain.php');

class tx_languagerepository_testcase extends tx_languagevisibility_databaseTestcase {

	public function test_getLanguages() {
		// Create the Array fixture.
		$fixture = array('uid' => 1 );

		$languageRep = t3lib_div::makeInstance('tx_languagevisibility_languagerepository');
		$languageList = $languageRep->getLanguages();
		$this->assertTrue(is_array($languageList), "no array");

	}

	public function test_getLanguageById() {
		// Create the Array fixture.
		$fixture = array('uid' => 1 );

		$languageRep = t3lib_div::makeInstance('tx_languagevisibility_languagerepository');
		$language = $languageRep->getLanguageById(0);
		$this->assertTrue($language instanceof tx_languagevisibility_language, "no language object");
		$this->assertEquals($language->getUid(), 0, "wrong uid");

		$languageRep = t3lib_div::makeInstance('tx_languagevisibility_languagerepository');
		$language = $languageRep->getLanguageById(1);
		$this->assertTrue($language instanceof tx_languagevisibility_language, "no language object");
		$this->assertEquals($language->getUid(), 1, "wrong uid");
	}

	function setUp() {
		parent::setUp();
		$this->importDataSet(dirname(__FILE__) . '/fixtures/dbDefaultLangs.xml');
	}
}
?>