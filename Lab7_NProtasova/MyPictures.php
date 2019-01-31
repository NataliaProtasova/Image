<html xmlns = "http://www.w3.org/1999/xhtml">
    <head>
        <title>My Pictures</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta http-equiv="x-ua-compatible" content="ie=edge"/>
        <link rel="stylesheet" type="text/css" href="./Lab7.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
    </head>

<?php     
    include('./Lab7Common/Header.php');
    include('./Lab7Contents/Functions.php');
    include('./Lab7Contents/Picture_Lib.php');
    include('./Lab7Contents/CanstantsAndSettings.php');
  
?>

<div class="container">
            <!--<form method="post">-->
            <h1 id="title"></h1>
            
            <?php
                $pics = Picture::getPictures(); //get pictures array using static method
                
        
            ?>
            <div class="album">
                <img id="viewer" src="" name="albumImage" class="normal">
                    <a href="#" onclick="rotateLeft()" id="left"><span class="glyphicon glyphicon-repeat gly-flip-horizontal-left"></span></a>                   
                    <a href="#" onclick="rotateRight()" id="right"><span style="transform: scaleX(-1)" class="glyphicon glyphicon-repeat gly-flip-horizontal"></span></a>         </a>   
                    <a href="" id="download"><span class="glyphicon glyphicon-download-alt"></span></a>
                    <a href="" id="deleteLink"><span class="glyphicon glyphicon-trash"></span></a>         
                    
            </div>
 
            <?php if (count($pics)>0): ?>
            <div class="scroll">                
                <?php foreach ($pics as $upload): ?>
                <img id="thumb" class="images" src="<?= $upload->getThumbnailFilePath()?>" 
                     onclick="document.getElementById('viewer').src = '<?= $upload->getAlbumFilePath()?>';
                         document.getElementById('title').innerHTML = '<?= $upload->getName()?>';
                     document.getElementById('deleteLink').href='Delete.php?file_path=<?=$upload->getThumbnailFilePath()?>';
                     document.getElementById('download').href='DownloadPicture.php?file_download=<?=$upload->getOriginalFilePath()?>';
                     highlightThumbnail()">                         
                <?php endforeach ?>                
            </div>
            <?php endif ?>
            
            <script>
            function rotateLeft() 
            {
		var image = document.getElementById('viewer');

		if (image.className === "normal") {
			image.className = "rotate-left";
		}
		else if ( image.className === "rotate-left") {
			image.className = 'normal';
		}
            }
            
            function rotateRight() 
            {
		var image = document.getElementById('viewer');

		if (image.className === "normal") {
			image.className = "rotate-right";
		}
		else if ( image.className === "rotate-right") {
			image.className = 'normal';
		}
            }
</script>
            </div>
    
            
        