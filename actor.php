<?php
    include 'dbh.sakila.php';    //php connection 
    include 'index.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>
    </title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <h2>
    Actor.
    </h2>
    <form action="actorInsert.php" method="post">
        Actor ID: <input type="text" name="actorid" /><br><br>
        First Name: <input type="text" name="firstname" /><br><br>
        Last Name: <input type="text" name="lastname" /><br><br>
        Last Update: <input type="text" name="lastupdate"/><br><br>
        <input type="submit" name="submit" class="button" />
    </form>
    
    <table>
    <?php
        $sql = "SELECT * FROM actor;";
        $result = mysqli_query($conn, $sql);
        
        //select table headings!!! only selected ones will show
        if(isset($_POST['actor_id']) && $_POST['actor_id'] == 'y') {  
           echo "<th>Actor ID</th>";
        }
        else{
        ?>  
        <th style="display:none;">Actor ID</th>
        <?php
        }
        
        if(isset($_POST['first_name']) && $_POST['first_name'] == 'y') {  
            echo "<th>First Name</th>";
        }
        else{
        ?> <th style="display:none;">First Name</th>
        <?php
        }
            
        if(isset($_POST['last_name']) && $_POST['last_name'] == 'y') {  
            echo "<th>Last Name</th>";
        }
        else{
        ?> <th style="display:none;">Last Name</th>
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
       
            
        while($row =mysqli_fetch_assoc($result)){
            echo "<tr>";
            if(isset($_POST['actor_id']) && $_POST['actor_id'] == 'y') {  
                echo "<td>".$row['actor_id']."</td>";
            }
            if(isset($_POST['first_name']) && $_POST['first_name'] == 'y') {  
                echo "<td>".$row['first_name']."</td>";
            }
            if(isset($_POST['last_name']) && $_POST['last_name'] == 'y') {  
                echo "<td>".$row['last_name']."</td>";
            }
            if(isset($_POST['address_id']) && $_POST['address_id'] == 'y') {  
                echo "<td>".$row['address_id']."</td>";
            }
            if(isset($_POST['last_update']) && $_POST['last_update'] == 'y') { 
                echo "<td>".$row['last_update']."</td>";
            } ?>
                    <td>
                    <form action="actorInsert.php?actor_id=<?php echo $row['actor_id']; ?> " method="post">
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
