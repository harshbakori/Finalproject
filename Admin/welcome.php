<?php
   include('session.php');
?>
<html">
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session; ?></h1> 
      <img src="" alt="">
      <div class="log">


         <?php 
         
         ?>
         <table border="3px" class="table">
            <tr>
                  <th><h4>ID</h4></th>
                  <th><h4>Time</h4></th>
                  <th><h4>Name</h4></th>
                  <th><h4>Preview</h4></th>
            </tr>
            
         <?php
        
         $sql = "SELECT * FROM imglog";
         $result = mysqli_query($db,$sql);
         
         if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
               $imgp = $row["imgname"];
               $i ="../uploads/".$row["imgname"]."";
               echo "<tr><td>" . $row["id"]. "</td><td>" . $row["time"]. "</td> <td>.$imgp.</td><td> <img src='$i.'  alt='image preview' style='width : 100px; height : 100px;'> </td></tr>";
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
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>