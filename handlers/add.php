<?php

$this->require_acl ('admin', 'listings', 'admin/add');

$page->layout = 'admin';
$page->title = __ ('Add Listing');

$form = new Form ('post', $this);

$form->data = (object) array (
	'added' => gmdate ('Y-m-d H:i:s'),
	'updated' => gmdate ('Y-m-d H:i:s'),
	'user' => User::val ('id'),
	'status' => 'approved'
);

echo $form->handle (function ($form) {
	// Create and save a new listing
	$listing = new listings\Listing (array (
		'name' => $_POST['name'],
		'link' => $_POST['link'],
		'thumbnail' => $_POST['thumbnail'],
		'type' => $_POST['type'],
		'status' => $_POST['status'],
		'description' => $_POST['description'],
		'user' => $_POST['user'],
		'added' => $_POST['added'],
		'updated' => $_POST['updated'],
		'details' => $_POST['details']
	));
	$listing->put ();

	if ($listing->error) {
		// Failed to save
		error_log ('Error adding listing: ' . DB::error ());
		$form->controller->add_notification (__ ('Unable to save listing.'));
		return false;
	}

	// Save a version of the listing
	Versions::add ($listing);

	// Notify the user and redirect on success
	$form->controller->add_notification (__ ('Listing added.'));
	$form->controller->redirect ('/listings/admin');
});

?>