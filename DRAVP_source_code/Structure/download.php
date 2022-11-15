<?php 
$filename = $_GET['filename'];
header('content-disposition:attachment;filename='.basename($filename));
header('Content-Length:'.filesize($file));
readfile($filename);

?>