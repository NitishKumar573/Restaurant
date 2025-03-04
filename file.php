<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['REQUEST_URI']?>" method="POST" enctype="multipart/form-data">
        <input type="file" class="file" name="filename">
        <input type="submit" name="submit" value="upload file">
    </form>
   
</body>
</html>
<?php
$filename=$_FILES["filename"]["name"];
$tempfile=$_FILES["filename"]["tmp_name"];
$folder="image/".$filename;
$tile=move_uploaded_file($tempfile,$folder);
echo $folder;
?>