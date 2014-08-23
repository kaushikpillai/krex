<?php
/**
* Prompts the user to download a file in the browser.
* Works even with IE6.
*
* @param string $path                   The file path to the file to be downloaded
* @param string $browserFilename        The name sent to the browser
* @param string $mimeType               The mime type like 'image/png'
*
* @return void
*/

function promptToDownload($path, $browserFilename, $mimeType)
{
if (!file_exists($path) || !is_readable($path)) {
return null;
}

header("Content-Type: " . $mimeType);
header("Content-Disposition: attachment; filename=\"$browserFilename\"");
header('Expires: ' . gmdate('D, d M Y H:i:s', gmmktime() - 3600) . ' GMT');
header("Content-Length: " . filesize($path));

// If you wish you can add some code here to track or log the download

// Special headers for IE 6
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
$fp = fopen($path, "r");
fpassthru($fp);
}

?>
