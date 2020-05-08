<?php
    include 'dbh.sakila.php'; //php connection 
    include 'index.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="style1.css">
</head>

<body>
    <h2>
        City.
    </h2>
    <form action="cityInsert.php" method="post">
        City ID: <input type="text" name="cityid" /><br><br>
        City: <input type="text" name="city" /><br><br>
        Country ID: <input type="text" name="countryid"/><br><br>
        Last Update: <input type="text" name="lastupdate"/><br><br>
        <input type="submit" name="submit"/>
    </form>
    
<table>

<?php
            $sql = "SELECT * FROM city;";
            $result = mysqli_query($conn, $sql);
            //selecting header
            
            if(isset($_POST['city_id']) && $_POST['city_id'] == 'y') {  
           echo "<th>City ID</th>";
        }
        else{
        ?>  <th style="display:none;">City ID</th>
        <?php
        }
        
        if(isset($_POST['city']) && $_POST['city'] == 'y') {  
            echo "<th>City</th>";
        }
        else{
        ?> <th style="display:none;">City</th>
        <?php
        }
            
        if(isset($_POST['country_id']) && $_POST['country_id'] == 'y') {  
            echo "<th>Country ID</th>";
        }
        else{
        ?> <th style="display:none;">Country ID</th>
        <?php
        }
        
        if(isset($_POST['last_update']) && $_POST['last_update'] == 'y') { 
            echo "<th>Last Update</th>";
        }
        else{
        ?> <th style="display:none;">Last Update</th>
        <?php
        }
        echo "<th>Actions</th>";
        
        //IF WANT TO ADD LAST COLUMN FOR BUTTONS ADD HERE
        //eg <th> Update </th>
        
        //select which rows to show
        while($row =mysqli_fetch_assoc($result)){
            echo "<tr>";
            if(isset($_POST['city_id']) && $_POST['city_id'] == 'y') {  
                echo "<td>".$row['city_id']."</td>";
            }
            if(isset($_POST['city']) && $_POST['city'] == 'y') {  
                echo "<td>".$row['city']."</td>";
            }
            if(isset($_POST['country_id']) && $_POST['country_id'] == 'y') {  
                echo "<td>".$row['country_id']."</td>";
            }
            if(isset($_POST['last_update']) && $_POST['last_update'] == 'y') { 
                echo "<td>".$row['last_update']."</td>";
            } ?>
                    <td>
                    <form action="cityInsert.php?city_id=<?php echo $row['city_id']; ?> " method="post">
                        <input type="submit" name="updt" class="act" value="Update">
                        <input type="submit" name="dlt" class="act" value="Delete">
                    </form>
                    </td>
               
            <?php
            echo "</tr>";
        }//end while
    ?>
</table>

</body>
</html>
