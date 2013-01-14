<?php

	if(t3lib_div::compat_version('4.6')) {
		if(!t3lib_div::compat_version('6.0')) {
			// xclass
			$GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['typo3/index.php'] = t3lib_extMgm::extPath($_EXTKEY) . 'Classes/Xclass/ux_SC_index.php';
		}
		// use new hook
		$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/index.php']['manipulateSystemNews'][] = 'EXT:oneclicklogin/class.tx_oneclicklogin_hooks.php:&tx_oneclicklogin_hooks->manipulateSystemNews';
	} else {
		$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/template.php']['preStartPageHook']['oneclicklogin'] = 'EXT:oneclicklogin/class.tx_oneclicklogin_hooks.php:&tx_oneclicklogin_hooks->addLoginNews';
	}

?>