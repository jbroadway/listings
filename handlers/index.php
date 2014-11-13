<?php

$this->run ('admin/util/minimal-grid');
$page->id = 'listings';
$page->title = Appconf::listings ('Listings', 'title');
$page->add_script ('/apps/listings/css/default.css');

$limit = 20;
$num = isset ($_GET['offset']) ? $_GET['offset'] : 1;
$offset = ($num - 1) * $limit;

$type = isset ($this->params[0]) ? $this->params[0] : false;

$q = listings\Listing::query ()->where ('status', 'approved');
if ($type) {
	$q->where ('type', $type);
	$url = '/listings/' . $type . '?offset=%d';
} else {
	$url = '/listings?offset=%d';
}
$q->order ('name', 'asc');

$items = $q->fetch_orig ($limit, $offset);
$count = $q->count ();

echo $tpl->render (
	'listings/index',
	array (
		'types' => listings\Data::types (),
		'type' => $type,
		'default_thumbnail' => '/apps/listings/css/default.jpg',
		'limit' => $limit,
		'total' => $count,
		'count' => count ($items),
		'items' => $items,
		'url' => $url
	)
);
