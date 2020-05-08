<?php
    include 'dbh.sakila.php'; //php connection 
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
        Film Actor.
    </h2>
    <form action="filmActorInsert.php" method="post">
        Actor ID: <input type="text" name="actorid" /><br><br>
        Film ID: <input type="text" name="filmid"/><br><br>
        Last Update: <input type="text" name="lastupdate"/><br><br>
        <input type="submit" name="submit" class="button"/>
    </form>

    <table>
<?php
            $sql = "SELECT * FROM film_actor;";
            $result = mysqli_query($conn, $sql);
            
        if(isset($_POST['actor_id']) && $_POST['actor_id'] == 'y') {  
           echo "<th>Actor ID</th>";
        }
        else{
        ?>  <th style="display:none;">Actor ID</th>
        <?php
        }
        
        if(isset($_POST['film_id']) && $_POST['film_id'] == 'y') {  
            echo "<th>Film ID</th>";
        }
        else{
        ?> <th style="display:none;">Film ID</th>
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
            if(isset($_POST['actor_id']) && $_POST['actor_id'] == 'y') {  
                echo "<td>".$row['actor_id']."</td>";
            }
            if(isset($_POST['film_id']) && $_POST['film_id'] == 'y') {  
                echo "<td>".$row['film_id']."</td>";
            }
            if(isset($_POST['last_update']) && $_POST['last_update'] == 'y') { 
                echo "<td>".$row['last_update']."</td>";
            } ?>
                    <td>
                    <form action="filmActorInsert.php?actor_id=<?php echo $row['actor_id']; ?> " method="post">
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