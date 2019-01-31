<?php
// get href url id for file path
$fileToDeleteThumb = $_GET['file_path'];
echo $fileToDeleteThumb;
$pathInfo = pathinfo($fileToDeleteThumb);
$ext = $pathInfo["extension"];
$fileName = $pathInfo["filename"];
$path = $fileName.".".$ext;

$albumfolder = "Pictures/AlbumPictures";
$originalFolder = "Pictures/OriginalPictures";
//
$fileToDeleteAlbum = $albumfolder.$path;
$fileToDeleteOriginal = $originalFolder.$path;
echo $fileToDeleteAlbum;

unlink($fileToDeleteThumb);
unlink($fileToDeleteAlbum);
unlink($fileToDeleteOriginal);

 //redirect to my pictures
header("Location: MyPictures.php");
exit;

?>

