<?php

include dirname(__DIR__) . '/upload.class/UploadFile.php';

$image = new UploadFile();

if (!empty($_FILES['image1'])) {
  $file = $_FILES['image1'];
  if($image->upload($file)){
    $image->resize($file);
    echo $image->getId();
  }
}

 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>test</title>
  </head>
  <body>
    <form method="post" enctype="multipart/form-data">
      <input type="file" name="image1">
	 	   <input type="submit" name="upload_image" value="Upload">

    </form>
  </body>
</html>
