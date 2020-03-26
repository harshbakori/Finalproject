<?php
   include('session.php');

    // echo $_GET["id"];
        $id = $_GET["id"];
    $sql = "UPDATE `imglog` SET `varyfied` = '0' WHERE `imglog`.`id` = $id ";
    $result = mysqli_query($db,$sql);
    echo $result;

    $sql = "SELECT * FROM `imglog` WHERE `id` = $id";
    $result = mysqli_query($db,$sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $imgp = $row["imgname"];
            if (!move_uploaded_file( "varified/$imgp","../../uploads" )) { 
                echo "File cannot be moved! \n"; 
            } 
            else{
                echo "moved";
                // header("Location: varyfy.php");
            }
        }
    }

?>