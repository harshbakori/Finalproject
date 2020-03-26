<?php
   include('session.php');

    // echo $_GET["id"];
        $id = $_GET["id"];
    $sql = "UPDATE `imglog` SET `to_use` = '0' WHERE `imglog`.`id` = $id ";
    $result = mysqli_query($db,$sql);
    echo $result;

    header("Location: welcome.php");
?>