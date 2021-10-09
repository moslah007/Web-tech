<!DOCTYPE html>
<html>
<body>
<?php
$success = $failed = "";
$uploadOk = 1;
if(isset($_POST["submit"], $_FILES["fileToUpload"]))
{
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check == false) 
  {
    $failed = "File is not an image.";
    $uploadOk = 0;
  } 
  elseif(file_exists($target_file)) 
  {
    $failed = "Sorry, file already exists.";
    $uploadOk = 0;
  }
  elseif ($_FILES["fileToUpload"]["size"] > 4194304) 
  {
    $failed = "Sorry, your file is too large.";
    $uploadOk = 0;
  }
  elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") 
  {
    $failed = "Sorry, only JPG, JPEG, PNG files are allowed.";
    $uploadOk = 0;
  }
  else
  {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
    {
      $success = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    }
    else 
    {
      $failed = "Sorry, there was an error uploading your file.";
    }
  }
}
?>
<h3>Profile Picture:</h3><br>
<img src="person.png" alt><br>
<form action="" method="post" enctype="multipart/form-data">
  <input type="file" name="fileToUpload" id="fileToUpload"><br><hr>
  <input type="submit" value="Upload Image" name="submit">
</form><br>
<?php
if ($uploadOk == 1) 
{
  echo $success;
}
else
{
  echo $failed;
}
?>
</body>
</html>
