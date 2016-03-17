# Upload Images Php
It is a simple Php class to upload images, resize them and more

## Basic functionalities
1. Upload
2. Set Allowed Extensions
3. Set Folder
4. Set file name
5. Resize

## How to get started
Download the UploadFile.php file
Next include the file in your project :
```php
include 'UploadFile.php';
```
Next you will need to instanciate the class :
```php
$image = new UploadFile();
```
Create an HTML form like this one :
```php
<form method="post" enctype="multipart/form-data">
  <input type="file" name="foo">
  <input type="submit" value="Upload">
</form>
```
Now you can add jpg and png images writing :
```php
if (!empty($_FILES)) {
  $file = $_FILES['foo'];
  $image->upload($file);
  $image->resize($file);
}
```
