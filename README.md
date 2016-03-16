# Upload Images Php
It is a simple Php class to upload images, resize them and more

## Basic functionalities
1. Upload
2. Set Allowed Extensions
3. Set Folder
4. Validate file
5. Resize

## How to get started
1. Download the UploadFile.php file
2. Next include the file in your project :
```php
include 'UploadFile.php';
```
3. Next you will need to instanciate the class :
```php
$image = new UploadFile();
```
4. Now you can add jpg and png images writing :
```php
if($image->upload($file)){
  $image->resize($file);
}
```
