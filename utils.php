<?php

function alert($msg) {
	echo "<script type='text/javascript'>alert('$msg');</script>";
}
	
function verifyFile($files, $name)
{

	// Undefined | Multiple Files | $files Corruption Attack
	// If this request falls under any of them, treat it invalid.
	if (
		!isset($files[$name]['error']) ||
		is_array($files[$name]['error'])
	) {
		throw new RuntimeException('Invalid parameters.');
	}

	// Check $files[$name]['error'] value.
	switch ($files[$name]['error']) {
		case UPLOAD_ERR_OK:
			break;
		case UPLOAD_ERR_NO_FILE:
			throw new RuntimeException('No file sent.');
		case UPLOAD_ERR_INI_SIZE:
		case UPLOAD_ERR_FORM_SIZE:
			throw new RuntimeException('Exceeded filesize limit.');
		default:
			throw new RuntimeException('Unknown errors.');
	}

	// You should also check filesize here.
	if ($files[$name]['size'] > 1000000) {
		throw new RuntimeException('Exceeded filesize limit.');
	}

	// DO NOT TRUST $files[$name]['mime'] VALUE !!
	// Check MIME Type by yourself.
	$finfo = new finfo(FILEINFO_MIME_TYPE);
	if (false === $ext = array_search(
		$finfo->file($files[$name]['tmp_name']),
		array(
			'jpg' => 'image/jpeg',
			'png' => 'image/png',
			'gif' => 'image/gif',
		),
		true
	)) {
		throw new RuntimeException('Invalid file format.');
	}

	return true;
}

?>