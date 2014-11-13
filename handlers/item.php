<?php

$id = isset ($this->params[0]) ? $this->params[0] : $this->redirect ('/listings');

$item = new listings\Listing ($id);

if ($item->error || $item->status !== 'approved') {
	echo $this->error ();
	return;
}

$this->run ('admin/util/minimal-grid');
$page->id = 'listings';
$page->title = $item->name;
$page->add_script ('/apps/listings/css/default.css');

$data = $item->orig ();
$data->default_thumbnail = '/apps/listings/css/default.jpg';

echo $tpl->render (
	'listings/item',
	$data
);
