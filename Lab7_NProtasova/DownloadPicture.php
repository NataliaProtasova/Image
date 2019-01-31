<?php
 include('./Lab7Contents/Functions.php');

$fileToDownload = $_GET["file_download"];

// download function
downloadFile($fileToDownload);

// redirect to my pictures
header("Location: MyPictures.php");
exit;

?>
