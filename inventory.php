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
    Inventory.
    </h2>
    <form action="inventoryInsert.php" method="post">
        Inventory ID: <input type="text" name="invid"/><br><br>
        Film ID: <input type="text" name="filmid" /><br><br>
        Store ID: <input type="text" name="storeid"/><br><br>
        Last Update: <input type="text" name="lastupdate"/><br><br>
        <input type="submit" name="submit" class="button"/>
    </form>

    <table>

    <?php
    
        $sql = "SELECT * FROM inventory;";
        $result = mysqli_query($conn, $sql);
            
        if(isset($_POST['inventory_id']) && $_POST['inventory_id'] == 'y') {  
           echo "<th>Inventory ID</th>";
        }
        else{
        ?>  <th style="display:none;">Inventory ID</th>
        <?php
        }
        
        if(isset($_POST['film_id']) && $_POST['film_id'] == 'y') {  
            echo "<th>Film ID</th>";
        }
        else{
        ?> <th style="display:none;">Film ID</th>
        <?php
        }
        
        if(isset($_POST['store_id']) && $_POST['store_id'] == 'y') {
           echo "<th>Store ID</th>";
        }
        else{
        ?>  <th style="display:none;">Store ID</th>
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
            if(isset($_POST['inventory_id']) && $_POST['inventory_id'] == 'y') {  
                echo "<td>".$row['inventory_id']."</td>";
            }
            if(isset($_POST['film_id']) && $_POST['film_id'] == 'y') {  
                echo "<td>".$row['film_id']."</td>";
            }
            if(isset($_POST['store_id']) && $_POST['store_id'] == 'y') {  
                echo "<td>".$row['store_id']."</td>";
            }
            
            if(isset($_POST['last_update']) && $_POST['last_update'] == 'y') { 
                echo "<td>".$row['last_update']."</td>";
            } ?>
                    <td>
                    <form action="inventoryInsert.php?inventory_id=<?php echo $row['inventory_id']; ?> " method="post">
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
