<?php

$this->require_acl ('admin', 'listings');

$page->layout = 'admin';
$page->title = __ ('Listings');

// Calculate the offset
$limit = 20;
$num = isset ($this->params[0]) ? $this->params[0] : 1;
$offset = ($num - 1) * $limit;

// Fetch the items and total items
$items = listings\Listing::query ()->fetch ($limit, $offset);
$total = listings\Listing::query ()->count ();

// Check for error, e.g., if table hasn't been created yet
if ($items === false) {
	$items = array ();
	$total = 0;
	printf (
		'<p class="visible-notice"><strong>%s</strong>: %s</p>',
		__ ('Notice'),
		__ ('It looks like you need to import your database schema for this app.')
	);
}

// Pass our data to the view template
echo $tpl->render (
	'listings/admin',
	array (
		'limit' => $limit,
		'total' => $total,
		'items' => $items,
		'count' => count ($items),
		'url' => '/listings/admin/%d'
	)
);

?>