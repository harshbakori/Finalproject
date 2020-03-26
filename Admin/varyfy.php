<?php
   include('session.php');
?>
<html">

    <head>
        <title>Welcome</title>
        <link rel="stylesheet" href="css/table.css" type="text/css">

    </head>

    <body>
        <?php
            include("navbar.php");
        ?>
        <img src="" alt="">
        <div class="log">
            <?php 
         ?>
            <table class="table_log">
                <tr>
                    <th>
                        <h4>ID</h4>
                    </th>
                    <th>
                        <h4>Time</h4>
                    </th>
                    <th>
                        <h4>Name</h4>
                    </th>
                    <th>
                        <h4>Preview</h4>
                    </th>
                    <th>
                        <h4>use for data</h4>
                    </th>
                    <th>
                        <h4>result</h4>
                    </th>
                    <th>
                        <h4>varyfyed?</h4>
                    </th>
                </tr>
                <?php

         $sql = "SELECT * FROM `imglog`";
         $result = mysqli_query($db,$sql);
         
         if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
               $imgp = $row["imgname"];
               $i ="../uploads/".$row["imgname"]."";
               echo "<tr><td>" . $row["id"]. "</td><td>" . $row["time"]. "</td> <td>.$imgp.</td>
               <td><img src='$i.'  alt='image preview' style='width : 100px; height : 100px;'> </td>";
               $id = $row["id"];
               if ($row["to_use"]==0){
                  echo "<td><a href='use.php?id=$id' class='signout-btn'>use</a></td> ";
               }else{
                  echo "<td><a href='not_use.php?id=$id' class='signout-btn' style='background: red;'>not_use</a></td> ";
               }
               echo "<td>". $row["result"]."</td>";
               if ($row["varyfied"]==1){
                    echo "<td><a href='varyfied.php?id=$id' class='signout-btn' style='background: red;'>varyfied</a></td></tr>";
               }else{
                    echo "<td><a href='not_varyfied.php?id=$id' class='signout-btn'>not_varified</a></td></tr>";

               }

            }
         } else {
            echo "0 results";
         }         
         ?>
            </table>
            <?php
         // echo '<img src='.$i.' alt="" style="width : 100px; height : 100px;">';
         ?>
        </div>
        <h2><a href="logout.php" class="signout-btn">Sign Out</a></h2>
    </body>

    </html>