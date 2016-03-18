<?php
include dirname(__DIR__) . '/UploadImagesPhp/UploadFile.php';

$image = new UploadFile();

if (!empty($_FILES)) {
  $file = $_FILES['foo'];
  $image->upload($file);
  $image->resize($file);
}

 ?>
    <form method="post" enctype="multipart/form-data">
      <input type="file" name="foo">
	 	  <input type="submit" value="Upload">
    </form>
