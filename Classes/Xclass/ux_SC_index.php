<?php

class ux_SC_index extends SC_index {

	/**
	 * Adds a hook to manipulate the array of system news
	 * @return array
	 */
	protected function getSystemNews() {
		$systemNews = parent::getSystemNews();
			// to manipulate the array of system news
		if (isset($GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/index.php']['manipulateSystemNews']))	{
			$manipulateSystemNewsHook =& $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/index.php']['manipulateSystemNews'];
			if (is_array($manipulateSystemNewsHook)) {
				$hookParameters = array(
					'systemNews' => &$systemNews,
				);
				foreach ($manipulateSystemNewsHook as $hookFunction)	{
					t3lib_div::callUserFunction($hookFunction, $hookParameters, $this);
				}
			}
		}
		return $systemNews;
	}

}
