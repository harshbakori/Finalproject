<?php
   include('session.php');

    // echo $_GET["id"];
        $id = $_GET["id"];
    $sql = "UPDATE `imglog` SET `varyfied` = '1' WHERE `imglog`.`id` = $id ";
    $result = mysqli_query($db,$sql);
    echo $result;

    $sql = "SELECT * FROM `imglog` WHERE `id` = $id";
    $result = mysqli_query($db,$sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $imgp = $row["imgname"];
            $file = '../uploads/'.$imgp;
            $newfile = '../varified/'.$imgp;
            if (!copy($file, $newfile)) {
                echo "failed to copy $file...\n";
            }
            else{
                echo "copyed";
                header("Location: varyfy.php");
            }
            
        }
    }
?>