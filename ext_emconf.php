<?php

########################################################################
# Extension Manager/Repository config file for ext "oneclicklogin".
#
# Auto generated 14-01-2013 22:01
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => '1-Click-Login',
	'description' => 'For enabled users a 1-Click-Login link is shown at the Backend login screen to log in via OpenID. WARNING: The usernames and OpenID-Identifiers of the enabled users are shown at the login page and are visible for everyone.',
	'category' => 'be',
	'shy' => 0,
	'version' => '0.4.1',
	'dependencies' => 'openid',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'beta',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearcacheonload' => 0,
	'lockType' => '',
	'author' => 'Sebastian Michaelsen',
	'author_email' => 'sebastian.gebhard@gmail.com',
	'author_company' => 't3seo.de',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'openid' => '',
			'typo3' => '4.3.0-0.0.0',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:10:{s:32:"class.tx_oneclicklogin_hooks.php";s:4:"e003";s:21:"ext_conf_template.txt";s:4:"6e6e";s:12:"ext_icon.gif";s:4:"d477";s:17:"ext_localconf.php";s:4:"7ffa";s:14:"ext_tables.php";s:4:"1084";s:14:"ext_tables.sql";s:4:"25ae";s:16:"locallang_db.xml";s:4:"ed03";s:30:"Classes/Xclass/ux_SC_index.php";s:4:"ffc3";s:14:"doc/manual.pdf";s:4:"a58a";s:14:"doc/manual.sxw";s:4:"4790";}',
	'suggests' => array(
	),
);

?>