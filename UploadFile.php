<?php

/**
 *
 */
class UploadFile
{
  private $directory;
  private $allowedExtentions;
  private $uniqId;
  private $errors;

  public function __construct()
  {
    $this->directory = 'public/images/galery/';
    $this->allowedExtentions = ['image/jpeg','image/png'];
    $this->errors = [];
  }

  public function upload($file)
  {
    $this->validate($file);

    if(!empty($this->errors)){
      echo var_dump($this->errors);
      return false;
    }else{
      print_r($file);
      $this->setFolder($file);
      print_r($this->directory);
      if(!move_uploaded_file($file["tmp_name"], "$this->directory" . '/' . $file["name"])){
        array_push($this->errors,"Il n'y a pas d'image");
        return false;
      }
      return true;
    }
  }

  public function setAllowedExtentions($type=[])
  {
    $this->allowedExtentions = $type;
  }
  private function uniqId($file)
  {
    $path_parts = pathinfo($file["name"]);
    return $this->uniqId = $path_parts['filename'];
  }
  public function getId()
  {
    return $this->uniqId;
  }
  private function setFolder($file)
  {
    $this->directory = $this->directory . $this->uniqId($file);
    if (!file_exists($this->directory)) {
      var_dump(mkdir($this->directory, 0777, true));
    }
  }

  private function validate($file)
  {
    if(empty($file['name'])){
      array_push($this->errors,"Il n'y a pas d'image");
    }
    if(!in_array($file['type'],$this->allowedExtentions)){
      array_push($this->errors,"Le fichier n'est pas une image");
    }
  }

  public function resize($file)
  {
      $image_source = "$this->directory" . '/' . $file['name'];
      $resize_image = "$this->directory" . '/' . "thumbnail.jpg";
	    /*lister les dimensions de l'image*/
	    list($width, $height) = getimagesize($image_source);
      // définir une nouvelle image avec les dimensions autorisés new_width et new_height
	    $new_width=300;
	    //new height= 300/(width/height)
	    $new_height=$new_width/($width/$height);
	    //Retourne un identifiant de ressource d'image $dst_image
	    $thumb_image = ImageCreateTrueColor( $new_width, $new_height );
	    /*si l'image est un jpeg ou un pjpeg*/
	    if ($file['type']=='image/jpeg') {
	      // lire l'image d'origine
	      $src_image = imagecreatefromjpeg( $image_source );
	    }else{
	      //si l'image est un png
	      $src_image = imagecreatefrompng( $image_source );
	    }
	    //retaillement de l'image
	    imagecopyresized($thumb_image, $src_image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
	    //création d'une image jpeg
	    imagejpeg( $thumb_image, $resize_image, 75 );
	    // effacer les zones mémoire
	    imagedestroy($src_image);
	    imagedestroy($thumb_image);
  }
}

 ?>
