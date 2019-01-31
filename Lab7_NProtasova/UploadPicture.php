<?php 
    include('./Lab7Common/Header.php');
    include('./Lab7Contents/Functions.php');
    include('./Lab7Contents/Picture_Lib.php');
    include('./Lab7Contents/CanstantsAndSettings.php');
?>

<html>
    
    <body>
   <?php
            if (isset($_POST["btnUpload"]))
            {
                // first make pictures folder if it doesn't exist
                $picFolder = "./Pictures";
                
                if (!file_exists($picFolder))
                {
                    mkdir($picFolder);
                }
                
                $destination = ORIGINAL_PICTURES_DIR;

                if (!file_exists($destination))
                {
                    mkdir($destination);
                }

                for ($i = 0; $i < count($_FILES["imageUpload"]["tmp_name"]); $i++)
                {
                    if ($_FILES["imageUpload"]["error"][$i] == 0)
                    {
                        $fileTempPath = $_FILES["imageUpload"]["tmp_name"][$i];
                        $filePath = $destination."/".$_FILES["imageUpload"]["name"][$i];
                        
                        $pathInfo = pathinfo($filePath);
                        $dir = $pathInfo["dirname"];
                        $fileName = $pathInfo["filename"];
                        $ext = $pathInfo["extension"];
                        echo $fileName;
                        //echo $ext;
                        $j = "";

                        while (file_exists($filePath))
                        {
                            $j++;
                            $filePath = $dir."/".$fileName."_".$j.".".$ext;
                        }
                        
                        // creating picture object
                        $picture = new Picture($fileName, $i);
                        
                        // move image
                        move_uploaded_file($fileTempPath, $filePath);
                                               
                        
                        // image details
                        $imageDetails = getimagesize($filePath);
                        
                        if ($imageDetails && in_array($imageDetails[2], $supportedImageTypes))
                        {
                            resamplePicture($filePath, ALBUM_PICTURES_DIR, IMAGE_MAX_WIDTH, IMAGE_MAX_HEIGHT);
                            resamplePicture($filePath, ALBUM_THUMBNAILS_DIR, THUMB_MAX_WIDTH, THUMB_MAX_HEIGHT);
                        }
                        else
                        {
                            $error = "Upload files is not a supported type.";
                            unlink($filePath); 
                        }
                    }
                    elseif ($_FILES["imageUpload"]["error"][$i] == 1) 
                    {
                        $error = "$fileName is too large <br>";
                    }
                    elseif ($_FILES["imageUpload"]["error"][$i] == 4)
                    {
                        $error = "No upload file specified <br>";
                    }
                    else
                    {
                        $error = "Error happened while uploading the file(s). Try another time. <br>";
                    }
                }

        ?>

        
        <div class="container">
            <h1>Upload Pictures</h1>

            <p>Accepted picture types: JPG(JPEG), GIF and PNG.</p>

            <p>You can upload multiple pictures at a time by pressing the shift key while selecting pictures.</p>
            
            <span class='error' style="color:red"><?php echo $error;?></span>
            
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                
                <div class="row">   
                    <div class="form-group">
                        <!--<div class="col-xs-4">-->
                            <label for="fileUpload">File to Upload:</label>
                            <input type="file" class="form-control" id="fileUpload" name="imageUpload[]" multiple>                            
                        <!--</div>-->
                    </div>
                 </div>
                
                <br /><br/>
                
                <br /><br/>

                <div class="row">
                    <div class="row">
                   <div class="col-sm-6">
                    <input class="btn btn-primary" type = "submit" name="btnUpload" value = "Upload" class="btn btn-info" />
                     <input type="button" onclick="location.href='UploadPicture.php'; " value="Reset"class="btn btn-info"  />
                </div>
                    </div>
                </div>  
                
            </form>
        </div>
    </body>
    <!-- include footer page -->
    <?php include('./Lab7Common/Footer.php') ?>
</html>

