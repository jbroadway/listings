<?php

$this->require_acl ('admin', 'listings', 'admin/delete');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	$this->redirect ('/listings/admin');
}

$listing = new listings\Listing;
$listing->remove ($_POST['id']);

if ($listing->error) {
	error_log ('Error deleting listing: ' . DB::error ());
	$this->add_notification (__ ('Unable to delete listing.'));
	$this->redirect ('/listings/admin');
}

$this->add_notification (__ ('Listing deleted.'));
$this->redirect ('/listings/admin');

?>