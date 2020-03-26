
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="css/fileuplode.css" type="text/css">
<script src="js/uplode.js"></script>


<head>
    <style>
      /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>
  </head>



<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <!-- Select image to upload: -->
    <!-- <input type="file" name="fileToUpload" id="fileToUpload"> -->
<h3>File uplode</h3>

<script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<div class="file-upload">
  <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

  <div class="image-upload-wrap">
    <input class="file-upload-input" name="fileToUpload" type='file' onchange="readURL(this);" accept="image/*" />
    <div class="drag-text">
      <h3>Drag and drop a file or select add Image</h3>
    </div>
  </div>
  <div class="file-upload-content">
    <img class="file-upload-image" src="#" alt="your image" />
    <div class="image-title-wrap">
      <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
    </div>
    <input class="file-upload-btn" type="submit" value="Upload Image" name="submit">
  </div>
</div>



</form>



</body>






</html> 