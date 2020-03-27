<?php
    ?>
<html>
<link rel="stylesheet" href="css/fileuplode.css" type="text/css">
<script src="js/uplode.js"></script>


<head>
    <style>
    /* Set the size of the div element that contains the map */
    #map {
        height: 400px;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
    }

    .result {
        background-color: #ffffff;
        width: 600px;
        margin: 0 auto;
        padding: 20px;
    }
    .result_img {
        background-color: #ffffff;
        width: 600px;
        padding: 20px;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    </style>
</head>
<body>
    <!-- run detection script  -->
    <?php
            $i ="uploads/".$_GET['filename'];
            echo "<img src='$i.' class ='result_img'  alt='image preview' style='width : 100px; height : 100px;'>";
            echo "<div class='result'>";
    //execute pythom model to get result
    if($_GET["filename"]){
        $name = $_GET["filename"];
        // echo $name."\n";
        $command = 'python -u "i:\Xam\htdocs\Finalproject\Pyfiles\modelrun.py" '.$name;
        $command = escapeshellcmd($command);
    $output = shell_exec($command);
    echo $output;
    if(!$output){
        echo "no output";
    }
    
    
    //save result in database
    include('/Xam/htdocs/Finalproject/Admin/dbconnecter.php');
    $sql = "UPDATE `imglog` SET `result` = '$output' WHERE `imgname`= '".$_GET["filename"]."'";
    $result= mysqli_query($db,$sql);
    if(! $result ) {
        die('Could not update data: '.mysqli_error($db));
     }
     //echo "Updated data successfully\n";
     
}
echo "</div>";

?>
<a href="index.php">try other img?
</a>'
    <h3>My Google Maps Demo(under construction)</h3>
    this are possible clinics near your area based on your browser giolocation we found.
    <!-- The div element for the map -->
    <div id="map"></div>

    <script>
    // Note: This example requires that you consent to location sharing when
    // prompted by your browser. If you see the error "The Geolocation service
    // failed.", it means you probably did not give permission for the browser to
    // locate you.
    var map, infoWindow;

    function initMap() {
        //initialize the map and center it into lang and long given with zoom
        map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: -34.397,
                lng: 150.644
            },
            zoom: 10
        });

        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation. to get your lan and long
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    //relode map to your location
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                // console.log(pos);
                infoWindow.setPosition(pos);
                infoWindow.setContent('your Location found (maybe inacurate)');
                infoWindow.open(map);
                map.setCenter(pos);
            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkSshttxbSqLcz92yzYrEA_mqH91o9SLw&callback=initMap">
    </script>

</body>






</html>