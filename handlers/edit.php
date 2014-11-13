<?php

$this->require_acl ('admin', 'listings', 'admin/edit');

$page->layout = 'admin';
$page->title = __ ('Edit Listing');

$form = new Form ('post', $this);

$form->data = new listings\Listing ($_GET['id']);

echo $form->handle (function ($form) {
	// Update the listing
	$listing = $form->data;
	$listing->name = $_POST['name'];
	$listing->link = $_POST['link'];
	$listing->thumbnail = $_POST['thumbnail'];
	$listing->type = $_POST['type'];
	$listing->status = $_POST['status'];
	$listing->description = $_POST['description'];
	$listing->user = $_POST['user'];
	$listing->added = $_POST['added'];
	$listing->updated = $_POST['updated'];
	$listing->details = $_POST['details'];
	$listing->put ();

	if ($listing->error) {
		// Failed to save
		error_log ('Error updating listing: ' . DB::error ());
		$form->controller->add_notification (__ ('Unable to save listing.'));
		return false;
	}

	// Save a version of the listing
	Versions::add ($listing);

	// Notify the user and redirect on success
	$form->controller->add_notification (__ ('Listing saved.'));
	$form->controller->redirect ('/listings/admin');
});

?>