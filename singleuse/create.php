<?php

	require_once("/home/papenwxe/public_html/singleuse/variables.php");


// Get a human readable file size from bytes
	function human_filesize($bytes, $decimals = 2) {
		$sz = 'BKMGTP';
		$factor = floor((strlen($bytes) - 1) / 3);
		return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
	}

	function generate() {
		include("/home/papenwxe/public_html/singleuse/variables.php");
		// Create a list of files to download from
		$download_list = array();

		if(is_array($PROTECTED_DOWNLOADS)) {
			foreach ($PROTECTED_DOWNLOADS as $key => $download) {
				// Create a new key
				$new = uniqid('key',TRUE);

				// get download link and file size
				$download_link = "http://" . $_SERVER['HTTP_HOST'] . DOWNLOAD_PATH . "?key=" . $new . "&i=" . $key;

				// Add to the download list
				$download_list[] = array(
					'download_link' => $download_link
				);

				/*
				 *	Create a protected directory to store keys in
				 */
				if(!is_dir('/home/papenwxe/public_html/singleuse/keys')) {
					mkdir('/home/papenwxe/public_html/singleuse/keys');
					$file = fopen('/home/papenwxe/public_html/singleuse/keys/.htaccess','w');
					fwrite($file,"Order allow,deny\nDeny from all");
					fclose($file);
				}

				/*
				 *	Write the key key to the keys list
				 */
				$file = fopen('/home/papenwxe/public_html/singleuse/keys/keys','a');
				fwrite($file,"{$new}\n");
				fclose($file);


				echo "<h4><a href='". $download_link . "'>Click here to begin the download of " . $download['suggested_name'] . "</a></h4><br>";
			}


			}

			return $download_link;
		}




?>
