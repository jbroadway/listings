<?php

namespace listings;

class Data {
	public static $types = array (
		'app' => 'App',
		'theme' => 'Theme',
		'util' => 'Utility'
	);
	
	public static $statuses = array (
		'pending' => 'Pending',
		'approved' => 'Approved',
		'rejected' => 'Rejected'
	);
	
	public static function types () {
		return self::$types;
	}
	
	public static function type ($key) {
		return self::$types[$key];
	}
	
	public static function statuses () {
		return self::$statuses;
	}
	
	public static function status ($key) {
		return self::$statuses[$key];
	}
}
