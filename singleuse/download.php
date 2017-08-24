<?php
/**
 *	This file does the actual downloading
 *	It will take in a query string and return either the file,
 *	or failure
 *
 *	Expects: download.php?key1234567890
 */

	include("/var/www/html/singleuse/variables.php");

	// The input string
	$key = trim($_GET['key']);
	$i = trim($_GET['i']);

	/*
	 *	Retrive the keys
	 */
	$keys = file('/var/www/html/singleuse/keys/keys');
	$match = false;

	/*
	 *	Loop through the keys to find a match
	 *	When the match is found, remove it
	 */
	foreach($keys as &$one) {
		if(rtrim($one)==$key) {
			$match = true;
			$one = '';
		}
	}

	/*
	 *	Puts the remaining keys back into the file
	 */
	file_put_contents('/var/www/html/singleuse/keys/keys',$keys);

	/*
	 * If we found a match
	 */
	if($match !== false) {

		/*
		 *	Forces the browser to download a new file
		 */
		$contenttype = $PROTECTED_DOWNLOADS[$i]['content_type'];
		$filename = $PROTECTED_DOWNLOADS[$i]['suggested_name'];
		$file = $PROTECTED_DOWNLOADS[$i]['protected_path'];

		set_time_limit(0);
		header("Content-Description: File Transfer");
		header("Content-type: {$contenttype}");
		header("Content-Disposition: attachment; filename=\"{$filename}\"");
		header("Content-Length: " . filesize($file));
		header('Pragma: public');
		header("Expires: 0");
		readfile($file);

		// Exit
		exit;

	} else {
	/*
	 * 	We did NOT find a match
	 *	OR the link expired
	 *	OR the file has been downloaded already
	 */

?>

<?php require_once("../header.php"); ?>

<div class="hbuffer"></div>

<div class="infoHold">
    <div class="infoCell">
    	<h1>Your download has expired.</h1>

    	<p>Contact us at <a href="mailto:paperplanetechnologies@gmail.com?Subject=Expired%20Download" target="_blank">paperplanetechnologies@gmail.com</a> to fix this.</p>
    </div>
</div>

<?php
	} // end matching
?>
