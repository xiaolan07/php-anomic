<?php

function initDatabase() {
	$dir = dirname(__FILE__);
	try {
		$db = new PDO('sqlite:' . $dir .'/database.sq3');
		// $db = new PDO('mysql:host=localhost;dbname=Base', 'login', 'mdp');
	} catch (PDOException $e) {
		die('DB error: ' . $e->getMessage());
	}
	return $db;
}

/* Emule le fonctionnement de "magic_quotes_gpc = Off" dans "php.ini".
 *
 * Cf http://fr.php.net/manual/fr/security.magicquotes.disabling.php
 */
function noMagicQuotes()
{
	if (get_magic_quotes_gpc()) {
		$_POST = array_map('stripslashes_deep', $_POST);
		$_GET = array_map('stripslashes_deep', $_GET);
		$_COOKIE = array_map('stripslashes_deep', $_COOKIE);
		$_REQUEST = array_map('stripslashes_deep', $_REQUEST);
	}
}
function stripslashes_deep($value)
{
	$value = is_array($value) ?
		array_map('stripslashes_deep', $value) :
		stripslashes($value);
	return $value;
}
