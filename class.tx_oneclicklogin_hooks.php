<?php

class tx_oneclicklogin_hooks {

	/**
	 * @param $params
	 * @param $reference
	 * @return mixed
	 */
	public function addLoginNews(&$params, &$reference) {

		$record = $this->generateRecord();
		if (is_array($record)) {
			$TYPO3_CONF_VARS['BE']['loginNews'][] = $record;
		}

	}

	/**
	 * @param $params
	 * @param $reference
	 */
	public function manipulateSystemNews(&$params, &$reference) {
		$record = $this->generateRecord();
		if (is_array($record)) {
			$params['systemNews'][] = $record;
		}
	}

	protected function generateRecord() {
		$_EXTCONF = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['oneclicklogin']);

		if ($_EXTCONF['use_devIPmask'] && !t3lib_div::cmpIP(t3lib_div::getIndpEnv('REMOTE_ADDR'), $GLOBALS['TYPO3_CONF_VARS']['SYS']['devIPmask'])) {
			return FALSE;
		}

		$tx_oneclicklogin_users = array();

		$time = time();
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
			'*',
			'be_users',
			'	tx_openid_openid <> "" AND
				tx_oneclicklogin_enable = 1 AND
				disable = 0 AND
				deleted = 0 AND
				starttime < ' . $time . ' AND
				(endtime = 0 OR endtime > ' . $time . ')',
			'', 'username ASC');
		while ($beUser = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {
			$name = htmlspecialchars($beUser['realName'] ? $beUser['realName'] : $beUser['username']);
			$tx_oneclicklogin_users[] = '<a href="#" onclick="TYPO3BackendLogin.switchToOpenId();$(\'t3-username\').value=\'' . t3lib_div::quoteJSvalue($beUser['tx_openid_openid']) . '\';$(\'t3-login-form-outer\').parentNode.submit();TYPO3BackendLogin.showLoginProcess();return false;">' . $name . '</a>';
		}

		if (count($tx_oneclicklogin_users)) {
			return array(
				'date' => $_EXTCONF['text_date'],
				'header' => $_EXTCONF['text_header'],
				'content' => join(', ', $tx_oneclicklogin_users),
			);
		} else {
			return FALSE;
		}
	}

}

?>