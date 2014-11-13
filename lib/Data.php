<?php

namespace listings;

class Data {
	public static $types = array (
		'app' => 'App',
		'theme' => 'Theme',
		'util' => 'Utility'
	);
	public static function types () {
		return self::$types;
	}
	
	public static function type ($key) {
		return self::$types[$key];
	}
}
