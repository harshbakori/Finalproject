<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".<br>";
        $uploadOk = 1;
    } else {
        echo "File is not an image.<br>";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.<br>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.<br>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo 'Sorry, your file was not uploaded.<br>
    <a href="index.php">retry</a>';
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.<br>";
        
          $myfile = fopen("uplodelog.txt", 'a') or die("Unable to open file!");
          $txt = "" . date("Y/m/d") . " " . date("h:i:sa") . " file uploded";
          fwrite($myfile, $txt);
          $txt = " ". basename( $_FILES["fileToUpload"]["name"]). "";

          fwrite($myfile, $txt);
          fclose($myfile);

          include('/Xam/htdocs/Finalproject/Admin/dbconnecter.php');
          #include a query
          $sql = "INSERT INTO `imglog` (`id`, `time`, `imgname`) VALUES ('', '" .date("Y/m/d") . " " . date("h:i:sa") . "', '". basename( $_FILES["fileToUpload"]["name"]). "') ";
          $result = mysqli_query($db,$sql);
          

        header("Location: afteruplode.php?filename=". basename( $_FILES["fileToUpload"]["name"])."");
    } else {
        echo "Sorry, there was an error uploading your file.<br>";
    }
}


?>