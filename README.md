# Upload Images Php
It is a simple Php class to upload images, resize them and more

## Basic functionalities
1. Upload
2. Set Allowed Extensions
3. Set Folder
4. Set file name
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
4. Create an HTML form like this one :
```php
<form method="post" enctype="multipart/form-data">
  <input type="file" name="foo">
  <input type="submit" value="Upload">
</form>
```
5. Now you can add jpg and png images writing :
```php
if (!empty($_FILES)) {
  $file = $_FILES['foo'];
  $image->upload($file);
  $image->resize($file);
}
```
